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

    $hashed_password = password_hash($pword, PASSWORD_DEFAULT); // Hash the password

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
        // ... (no changes to existing code)
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

    <div class="registration-form box-center clearfix">
    <?php 
        if(isset($_SESSION['errprompt'])) {
          echo '<div class="error-message">' . $_SESSION['errprompt'] . '</div>';
          unset($_SESSION['errprompt']); // Clear the error message
        }
      ?>

      
    <form action="register.php" method="POST" onsubmit="return validateForm()">
        
        <div class="row">
          <div class="account-info col-sm-6">
          
            <fieldset>
              <legend>Account Info</legend>
              
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username">
                <span id="usernameError" class="error-message"></span>
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span id="passwordError" class="error-message"></span>
              </div>

              <div class="form-group">
                <label for="confpassword">Confirm Password</label>
                <input type="password" class="form-control" name="confpassword" placeholder="Confirm Password">
                <span id="confpasswordError" class="error-message"></span>
              </div>

            </fieldset>
            
      </div>
          <div class="personal-info col-sm-6">
            
            <fieldset>
              <legend>Personal Info</legend>
              
              <div class="form-group">
              <label for="email">Email Address</label>
              <input type="text" class="form-control" name="email" placeholder="Email Address">
              <span id="emailError" class="error-message"></span>
              </div>

          <div class="form-group">
              <label for="fullname">Full Name</label>
              <input type="text" class="form-control" name="fullname" placeholder="Full Name">
              <span id="fullnameError" class="error-message"></span>
          </div>

          <div class="form-group">
              <label for="phonenumber">Phone Number</label>
              <input type="text" class="form-control" name="phonenumber" placeholder="Phone Number">
              <span id="phonenumberError" class="error-message"></span>
          </div>


            </fieldset>
            
            
        <div id="error-message"></div>

          </div>
        </div>
        
        <a href="login.php">Go back</a>
        <input class="btn btn-primary" type="submit" name="register" value="Register">

      </form>
    </div>

  </section>
  <script>
    function validateForm() {
        var username = document.querySelector('input[name="username"]').value;
        var password = document.querySelector('input[name="password"]').value;
        var email = document.querySelector('input[name="email"]').value;
        var fullname = document.querySelector('input[name="fullname"]').value;
        var phonenumber = document.querySelector('input[name="phonenumber"]').value;

        if (username.trim() === '' || password.trim() === '' || email.trim() === '' || fullname.trim() === '' || phonenumber.trim() === '') {
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

        if (fullname.trim() === '') {
            document.getElementById('fullnameError').innerText = 'Please enter your full name.';
            return false;
        } else {
            document.getElementById('fullnameError').innerText = '';
        }

        if (phonenumber.trim() === '') {
            document.getElementById('phonenumberError').innerText = 'Please enter your phone number.';
            return false;
        } else {
            document.getElementById('phonenumberError').innerText = '';
        }

        return true; // Form will submit if all validations pass
    }

    function validateUsername(username) {
        return /^[a-zA-Z0-9]+$/.test(username);
    }

    function validateEmail(email) {
        return /\S+@\S+\.\S+/.test(email);
    }

    function validatePassword(password) {
        return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(password);
    }

    document.getElementById('togglePassword').addEventListener('click', function () {
      var passwordInput = document.getElementById('password');
      passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
    });

    // Toggle confirm password visibility
    document.getElementById('toggleConfPassword').addEventListener('click', function () {
      var confPasswordInput = document.getElementById('confpassword');
      confPasswordInput.type = confPasswordInput.type === 'password' ? 'text' : 'password';
    });
</script>

	<script src="assets/js/jquery-3.1.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

<?php 

  unset($_SESSION['errprompt']);
  mysqli_close($con);

?>