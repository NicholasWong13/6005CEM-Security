<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Nicholas Wong">
  
    <title>CheckOut | Studio C Hair & Beauty Salon</title>    
 
</head>

<body style="background-image: url('assets/img/thankyou.jpg');">
<?php 
    session_start();

     if(!isset($_SESSION['confirm_order']) || empty($_SESSION['confirm_order']))
     {
         header('location:index.php');
         exit();
     }

    require_once('./assets/inc/config.php');    
    require_once('./assets/inc/helpers.php');  

?>

<div class="row">
    <div class="col-md-12" align="center">
        <h1>Thank You!</h1>
        <p>
            Your order has been placed.
            <?php unset($_SESSION['confirm_order']);?>
        </p>
    </div>
    <a href="http://localhost/StudioCHair&BeautySalon/home.php">Back to Main Homepage</a>
</div>
    </body>
</html>