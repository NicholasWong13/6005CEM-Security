<?php


if (isset($_GET["id"]))
{
    $id = $_GET["id"];
    
    include_once('dbconnect.php');
    
    $sql = "DELETE FROM orders WHERE id=$id";
    $con ->query($sql);
}

header("location:contactus.php");
exit;

?>