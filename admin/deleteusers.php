<?php


if (isset($_GET["id"]))
{
    $id = $_GET["id"];
    
    include_once('dbconnect.php');
    
    $sql = "DELETE FROM users WHERE id=$id";
    $con ->query($sql);
}

header("location:users.php");
exit;

?>