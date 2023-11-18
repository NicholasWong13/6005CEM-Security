<?php
session_start();

require 'assets/conn.php';
require 'functions.php';

if (isset($_POST['register'])) {
    $uname = $_POST['username'];
    $pword = $_POST['password'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $phonenumber = $_POST['phonenumber'];
    $date_joined = date("Y-m-d");

    // Example of server-side validation
    if (empty($uname) || empty($pword) || empty($email) || empty($fullname) || empty($phonenumber)) {
        $_SESSION['errprompt'] = "All fields are required.";
        header("Location: register.php");
        exit;
    }

    $check_query = "SELECT * FROM users WHERE username=?";
    $check_stmt = mysqli_prepare($con, $check_query);
    mysqli_stmt_bind_param($check_stmt, 's', $uname);
    mysqli_stmt_execute($check_stmt);
    $result = mysqli_stmt_get_result($check_stmt);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['errprompt'] = "Username already exists. Choose a different username.";
        header("Location: register.php");
        exit;
    }

    // Use MD5 for password hashing
    $hashed_password = md5($pword);

    // Use prepared statements for database operations to prevent SQL injection
    $query = "INSERT INTO users (username, password, email, fullname, phonenumber, date_joined) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);

    if (!$stmt) {
        $_SESSION['errprompt'] = "Error preparing the statement.";
        header("Location: register.php");
        exit;
    }

    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'ssssss', $uname, $hashed_password, $email, $fullname, $phonenumber, $date_joined);

    if (mysqli_stmt_execute($stmt)) {
        // Registration successful, you can add further actions if needed
    } else {
        $_SESSION['errprompt'] = "Error registering the account.";
        header("Location: register.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Register - Studio C Hair & Beauty Salon </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    
</head>
<body>

  <?php include 'login-header.php'; ?>

  <section class="center-text">
    
    <strong>Register</strong>

    <div class="registration-form box-center">
    <?php 
        if(isset($_SESSION['errprompt'])) {
          echo '<div class="error-message">' . $_SESSION['errprompt'] . '</div>';
          unset($_SESSION['errprompt']);
        }
      ?>

<form action="register.php" method="POST" onsubmit="return validateForm()">
    <div class="row">
        <div class="account-info col-md-8 offset-md-2">
            <fieldset>
                <legend>Account Info</legend>

                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username">
                <span id="usernameError" class="error-message"></span>

                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" name="fullname" placeholder="Full Name">
                <span id="fullnameError" class="error-message"></span>

                <label for="email">Email Address</label>
                <input type="text" class="form-control" name="email" placeholder="Email Address">
                <span id="emailError" class="error-message"></span>

                <label for="phonenumber">Phone Number</label>
                <input type="text" class="form-control" name="phonenumber" placeholder="Phone Number">
                <span id="phonenumberError" class="error-message"></span>

                <label for="password">Password</label>
                <div class="input-group">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="fa fa-eye" aria-hidden="true"></i> Show
                        </button>
                    </div>
                </div>
                <span id="passwordError" class="error-message"></span>

                <label for="confpassword">Confirm Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="confpassword" id="confpassword" placeholder="Confirm Password">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="toggleConfPassword">
                            <i class="fa fa-eye" aria-hidden="true"></i> Show
                        </button>
                    </div>
                </div>
                <span id="confpasswordError" class="error-message"></span>
            </fieldset>

            <div id="error-message"></div>

            <a href="login.php">Go back</a>
            <input class="btn btn-primary" type="submit" name="register" value="Register">
        </div>
    </div>
   
</form>
 <label>
  <input type="checkbox" id="termsCheckbox" name="termsCheckbox">
  I agree to the <a href="../privacy-policy.pdf" target="_blank">Privacy Policy</a>
</label>
<br><span id="termsError" class="error-message"></span>

<script>
  function validateForm() {
 var username = document.querySelector('input[name="username"]').value;
 var password = document.querySelector('input[name="password"]').value;
 var confirmPassword = document.querySelector('input[name="confpassword"]').value;
 var email = document.querySelector('input[name="email"]').value;
 var fullname = document.querySelector('input[name="fullname"]').value;
 var phonenumber = document.querySelector('input[name="phonenumber"]').value;

 if (username.trim() === '' || password.trim() === '' || confirmPassword.trim() === '' || email.trim() === '' || fullname.trim() === '' || phonenumber.trim() === '') {
     document.getElementById('error-message').innerText = 'Please fill in all fields.';
     return false;
 }

 if (!validateUsername(username)) {
     document.getElementById('usernameError').innerText = 'Letters and numbers only.';
     return false;
 } else {
     document.getElementById('usernameError').innerText = '';
 }

 if (email.trim() === '') {
     document.getElementById('emailError').innerText = 'Please enter an email.';
     return false;
 }

 if (!validateEmailWithDomain(email)) {
     document.getElementById('emailError').innerText = 'Valid email domains are: gmail.com, yahoo.com, outlook.com';
     return false;
 } else {
     document.getElementById('emailError').innerText = '';
 }

 if (!validateEmail(email)) {
     document.getElementById('emailError').innerText = 'Enter a valid email address.';
     return false;
 } else {
     document.getElementById('emailError').innerText = '';
 }

 if (!validatePassword(password)) {
     document.getElementById('passwordError').innerText = 'Min 8 chars, 1 uppercase, 1 lowercase, 1 number, and 1 special character.';
     return false;
 } else {
     document.getElementById('passwordError').innerText = '';
 }

 if (password !== confirmPassword) {
     document.getElementById('confpasswordError').innerText = 'Passwords do not match.';
     return false;
 } else {
     document.getElementById('confpasswordError').innerText = '';
 }

 if (fullname.trim() === '') {
     document.getElementById('fullnameError').innerText = 'Please enter your full name.';
     return false;
 } else {
     document.getElementById('fullnameError').innerText = '';
 }

 if (!validatePhoneNumber(phonenumber)) {
     document.getElementById('phonenumberError').innerText = 'Please enter a valid phone number.';
     return false;
 } else {
     document.getElementById('phonenumberError').innerText = '';
 }

 // Check if terms and conditions are accepted
 var termsCheckbox = document.getElementById('termsCheckbox');
  if (!termsCheckbox.checked) {
    document.getElementById('termsError').innerText = 'Please accept the Terms and Conditions.';
    return false;
  } else {
    document.getElementById('termsError').innerText = '';
  }

 return true; // Form will submit if all validations pass
}

 function validateUsername(username) {
     return /^[a-zA-Z0-9]+$/.test(username);
 }

 function validatePhoneNumber(phonenumber) {
 return /^[0-9]+$/.test(phonenumber);
 }

 function validateEmail(email) {
     return /\S+@\S+\.\S+/.test(email);
 }

 function validateEmailWithDomain(email) {
     // Extract domain from email
     var domain = email.split('@')[1];

     // List of valid email domains
     var validDomains = ['gmail.com', 'yahoo.com', 'outlook.com'];

     // Check if the extracted domain is in the list of valid domains
     return validDomains.includes(domain);
 }

 function validatePassword(password) {
     return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(password);
 }


   document.getElementById('togglePassword').addEventListener('click', function () {
        togglePasswordVisibility('password');
    });

    function togglePasswordVisibility(inputId) {
        var passwordInput = document.getElementById(inputId);
        passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
    }

    // Toggle confirm password visibility
    document.getElementById('toggleConfPassword').addEventListener('click', function () {
        togglePasswordVisibility('confpassword');
    });

    function togglePasswordVisibility(inputId) {
        var passwordInput = document.getElementById(inputId);
        passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
    }
</script>
 
  <script src="assets/js/validation.js"></script>
	<script src="assets/js/jquery-3.1.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

<?php 

  unset($_SESSION['errprompt']);
  mysqli_close($con);

?>