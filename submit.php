<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "studio c hair & beauty salon";

$con = new mysqli($host,$user,$pass,$db);
if (!$con)
{
    echo "There are some problems while connecting to the Database";
}

session_start();

// There are no errors so Form data in Variables
$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$grade = $_POST['grade'];
$msg = $_POST['msg'];

$qry = "INSERT INTO `feedback`(`name`, `age`, `email`,`phone`, `grade`, `msg`) VALUES ('$name','$age','$email','$phone','$grade','$msg')";

$insert = mysqli_query($con,$qry);

if (!$insert){
    $_SESSION['msg'] = 'Feedback Failed to save, Please try again';
    header("Location:Feedback.php");  
}
else{
    $_SESSION['msg'] = 'Feedback Saved, Thank You!!!';
    header("Location:Feedback.php"); 
}
?>