<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

require 'assets/conn.php';

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    header("location: profile.php");
    exit;
}

// Process login form submission
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $plain_password = mysqli_real_escape_string($con, $_POST['password']);

    // Using prepared statements to prevent SQL injection
    $query = "SELECT user_id, email, password FROM users WHERE email = ?";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            // Verify the password using password_verify
            if (password_verify($plain_password, $row['password'])) {
                // Password is correct, set session and redirect to the dashboard or home page
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['email'] = $row['email'];

                header("location: dashboard.php"); // Update to the appropriate page after login
                exit;
            } else {
                $_SESSION['errprompt'] = "Incorrect password. Please try again.";
            }
        } else {
            $_SESSION['errprompt'] = "User not found. Please check your email.";
        }

        mysqli_stmt_close($stmt); // Close the statement
    } else {
        $_SESSION['errprompt'] = "Error preparing the statement.";
    }

    // Close the database connection
    mysqli_close($con);
}

// Include login header
include 'login-header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Studio C Hair & Beauty Salon</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>

<section class="center-text"><br /><br /><br />
    <strong>Log In</strong>
    <div class="login-form box-center">
        <?php
        if (isset($_SESSION['prompt'])) {
            echo '<div class="prompt-message">' . htmlspecialchars($_SESSION['prompt']) . '</div>';
        }

        if (isset($_SESSION['errprompt'])) {
            echo '<div class="error-message">' . htmlspecialchars($_SESSION['errprompt']) . '</div>';
        }
        ?>

        <form action="login_check.php" method="POST">
            <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Email" required>
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
// Clear session variables
unset($_SESSION['prompt']);
unset($_SESSION['errprompt']);
?>
