<?php
// Set session cookie parameters for security
$sessionParams = session_get_cookie_params();
session_set_cookie_params(
    $sessionParams["lifetime"],
    $sessionParams["path"],
    $sessionParams["domain"],
    true,
    true  // HTTPOnly flag
);
session_start();
session_regenerate_id(true); // Regenerate session ID to prevent session fixation

require 'assets/conn.php';
require 'functions.php';

if (isset($_POST['login'])) {
    $uname = clean($_POST['username']);
    $pword = clean($_POST['password']);

    // Using prepared statements to prevent SQL injection
    $query = "SELECT id, username, password, account_status FROM users WHERE username = ?";
    $stmt = mysqli_prepare($con, $query);

    // Bind parameters and execute the query
    mysqli_stmt_bind_param($stmt, 's', $uname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    
        // Check if the account is active (status = 1)
        if ($row['account_status'] == 1) {
            // Use password_verify to check the hashed password
            if (password_verify($pword, $row['password'])) {
                $_SESSION['userid'] = $row['id'];
                $_SESSION['username'] = $row['username'];
    
                header("location:index.php");
                exit;
            } else {
                $_SESSION['errprompt'] = "Wrong username or password.";
            }
        } else {
            $_SESSION['errprompt'] = "Your account is inactive. Please contact support.";
        }
    } else {
        $_SESSION['errprompt'] = "Wrong username or password.";
    }
}    

if (!isset($_SESSION['username'], $_SESSION['password'])) {
    // Your login form goes here
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Studio C Hair & Beauty Salon</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>
    <?php include 'login-header.php'; ?>
    <section class="center-text"><br /><br /><br />

        <h3>Login</h3>
        <div class="login-form box-center">
            <?php 
            if(isset($_SESSION['prompt'])) {
                showPrompt();
            }
            if(isset($_SESSION['errprompt'])) {
                showError();
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="form-group">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                </div>
                <div class="form-group">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <a href="register.php">Need an account?</a>
                <input class="btn btn-primary" type="submit" name="login" value="Log In">
                <br/><a href="http://localhost/6005CEM-Security/home.php">Back to Main Homepage</a>
            </form>
        </div>
    </section>
    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

<?php
} else {
    header("location:profile.php");
    exit;
}

unset($_SESSION['prompt']);
unset($_SESSION['errprompt']);
mysqli_close($con);
?>
