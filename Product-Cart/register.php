<?php
session_start();

require 'assets/conn.php';
require 'functions.php';

if (isset($_POST['register'])) {
    $uname = clean($_POST['username']);
    $pword = clean($_POST['password']);
    $email = clean($_POST['email']);
    $fname = clean($_POST['fullname']);
    $phone = clean($_POST['phonenumber']);

    // Server-side validation
    if (empty($uname) || empty($pword) || empty($email) || empty($fname) || empty($phone)) {
        $_SESSION['errprompt'] = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errprompt'] = "Invalid email address.";
    } elseif (!preg_match("/^[a-zA-Z0-9]+$/", $uname)) {
        $_SESSION['errprompt'] = "Username should only contain letters and numbers.";
    } elseif (!in_array(explode('@', $email)[1], ['gmail.com', 'outlook.com', 'yahoo.com'])) {
        $_SESSION['errprompt'] = "Email must be from gmail.com, outlook.com, or yahoo.com.";
    } else {
        // Check if the username already exists
        $query = "SELECT username FROM users WHERE username = '$uname'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) == 0) {
            // Username is unique, proceed with registration

            $query = "INSERT INTO users (username, password, email, fullname, phonenumber, date_joined)
            VALUES ('$uname', '$pword', '$email', '$fname', '$phone', NOW())";

            if (mysqli_query($con, $query)) {
                $_SESSION['prompt'] = "Account Registered. You can now log in.";
                header("location:login.php");
                exit;
            } else {
                die("Error with the query");
            }
        } else {
            $_SESSION['errprompt'] = "Username already exists.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Studio C Hair & Beauty Salon</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>
    <?php include 'login-header.php'; ?>
    <section class="center-text">
        <br/><h3>Register</h3><br/>
        <div class="registration-form box-center clearfix">
            <?php 
            if(isset($_SESSION['errprompt'])) {
                showError();
            }
            ?>
            <form name="registrationForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return validateForm()">
                <div class="row">
                    <div class="account-info col-sm-6">
                        <fieldset>
                            <legend>Account Info</legend>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" oninput="checkPasswordStrength()" onclick="showPasswordRequirements()">
                                <br/><input type="checkbox" onclick="togglePasswordVisibility()"> Show Password
                                <div id="password-strength"></div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="personal-info col-sm-6">
                        <fieldset>
                            <legend>Personal Info</legend>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="text" class="form-control" name="email" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input type="text" class="form-control" name="fullname" placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <label for="phonenumber">Phone Number</label>
                                <input type="text" class="form-control" name="phonenumber" placeholder="Phone Number">
                            </div>
                        </fieldset>
                    </div>
                </div>
                <a href="login.php">Go back</a>
                <input class="btn btn-primary" type="submit" name="register" value="Register">
            </form>
        </div>
    </section>
    <script>
        function validateForm() {
            var username = document.forms["registrationForm"]["username"].value;
            var password = document.forms["registrationForm"]["password"].value;
            var email = document.forms["registrationForm"]["email"].value;
            var fullname = document.forms["registrationForm"]["fullname"].value;
            var phonenumber = document.forms["registrationForm"]["phonenumber"].value;
            if (username === "" || password === "" || email === "" || fullname === "" || phonenumber === "") {
                alert("All fields are required.");
                return false;
            }
            var allowedDomains = ['gmail.com', 'outlook.com', 'yahoo.com'];
            var emailDomain = email.split('@')[1];
            if (allowedDomains.indexOf(emailDomain) === -1) {
                alert("Email must be from gmail.com, outlook.com, or yahoo.com.");
                return false;
            }
            if (isNaN(phonenumber)) {
                alert("Phone Number must be numeric.");
                return false;
            }
            if (!isStrongPassword(password)) {
                alert("Password must be at least 8 characters long and include uppercase, lowercase, numeric, and special characters.");
                return false;
            }
            return true;
        }

        function calculatePasswordStrength(password) {
            var strength = 0;
            if (password.length >= 8) {
                strength += 1;
            }
            if (/[A-Z]/.test(password)) {
                strength += 1;
                document.getElementById('uppercase-req').style.textDecoration = 'line-through';
            }
            if (/[a-z]/.test(password)) {
                strength += 1;
                document.getElementById('lowercase-req').style.textDecoration = 'line-through';
            }
            if (/\d/.test(password)) {
                strength += 1;
                document.getElementById('numeric-req').style.textDecoration = 'line-through';
            }
            if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                strength += 1;
                document.getElementById('special-char-req').style.textDecoration = 'line-through';
            }
            return strength;
        }

        function isStrongPassword(password) {
            return calculatePasswordStrength(password) >= 4;
        }

        function checkPasswordStrength() {
            var password = document.getElementById('password').value;
            var strength = calculatePasswordStrength(password);
            var strengthText = "";
            switch (strength) {
                case 0:
                case 1:
                    strengthText = "Weak";
                    break;
                case 2:
                    strengthText = "Moderate";
                    break;
                case 3:
                case 4:
                    strengthText = "Strong";
                    break;
                default:
                    strengthText = "Very Strong";
            }
            document.getElementById('password-strength').innerHTML = "Password Strength: " + strengthText;
        }

        function showPasswordRequirements() {
            var popup = document.getElementById("password-requirements-popup");
            popup.style.display = "block";
            setTimeout(function () {
                popup.style.display = "none";
                resetRequirements();
            }, 5000);
        }

        function resetRequirements() {
            document.getElementById('uppercase-req').style.textDecoration = 'none';
            document.getElementById('lowercase-req').style.textDecoration = 'none';
            document.getElementById('numeric-req').style.textDecoration = 'none';
            document.getElementById('special-char-req').style.textDecoration = 'none';
        }

        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>
    <div id="password-requirements-popup" style="display:none; position: absolute; z-index: 1; background: #f9f9f9; border: 1px solid #d3d3d3; border-radius: 5px; padding: 20px; width: 300px; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <span style="color: red;">Password must be at least 8 characters long and include:</span><br>
        <span id="uppercase-req">&#8226; Uppercase letter<br></span>
        <span id="lowercase-req">&#8226; Lowercase letter<br></span>
        <span id="numeric-req">&#8226; Numeric digit<br></span>
        <span id="special-char-req">&#8226; Special character (!@#$%^&*(),.?":{}|<>)</span>
    </div>
    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
