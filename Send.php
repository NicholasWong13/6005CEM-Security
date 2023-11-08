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
$email = $_POST['email'];
$msg = $_POST['msg'];

$qry = "INSERT INTO `contactus`(`name`, `email`, `msg`) VALUES ('$name','$email','$msg')";

$insert = mysqli_query($con,$qry);

if (!$insert){
    $_SESSION['msg'] = 'Details Failed to save, Please try again';
    header("Location:contact.php");  
}
else{
    $_SESSION['msg'] = 'Details Saved, Thank You!!!';
    header("Location:contact.php"); 
}
?>