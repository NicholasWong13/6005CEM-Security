<?php


if (isset($_GET["id"]))
{
    $review_id = $_GET["id"];
    
    include_once('dbconnect.php');
    
    $sql = "DELETE FROM review_table WHERE review_id=$review_id";
    $con ->query($sql);
}

header("location:feedback.php");
exit;

?>