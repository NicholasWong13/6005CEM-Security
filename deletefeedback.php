<?php


if (isset($_GET["id"]))
{
    $review_id= $_GET["id"];
    
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "studio c hair & beauty salon";

    $con = new mysqli($host,$user,$pass,$db);
    
    $sql = "DELETE FROM review_table WHERE review_id=$review_id";
    $con ->query($sql);
}

header("location:feedback.php");
exit;

?>