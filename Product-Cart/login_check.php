<?php
session_start();

require 'assets/conn.php'; // Include your database connection file

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Example of server-side validation
    if (empty($email) || empty($password)) {
        $_SESSION['errprompt'] = "Email and password are required.";
        header("Location: login.php");
        exit;
    }

    // Check user credentials in the database
    $query = "SELECT username, password FROM users WHERE email=?";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            // Verify the password using MD5
            if (md5($password) === $row['password']) {
                // Password is correct, set session and redirect to the dashboard or home page
                $_SESSION['username'] = $row['username'];
                header("Location: index.php" );
                exit;
            } else {
                // Incorrect password
                $_SESSION['errprompt'] = "Incorrect password.";
            }
        } else {
            // User not found
            $_SESSION['errprompt'] = "User not found. Please check your email.";
        }

        mysqli_stmt_close($stmt); // Close the statement
    } else {
        // Handle statement preparation error
        $_SESSION['errprompt'] = "Error preparing the statement: " . mysqli_error($con);
    }
}

// If the user tries to access this page without submitting the login form
header("Location: login.php");
exit;
?>

