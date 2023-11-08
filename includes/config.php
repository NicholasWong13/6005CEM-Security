<?php

$conn = new mysqli("localhost","root","","studio c hair & beauty salon");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
$servername = "localhost";
$dbname = "studio c hair & beauty salon";
$username = "root";
$password = "";
$db_conn;

try {
    $db_conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $db_conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e)
{   
    echo "Connection failed " . $e -> getMessage();
}

?>