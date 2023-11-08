<?php

$user = 'root';
$password = '';
$database = 'studio c hair & beauty salon';
$servername='localhost:3306';
$mysqli = new mysqli($servername, $user,$password, $database);
				
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

// SQL query to select data from database
$sql = " SELECT * FROM Services ORDER BY service_id ASC ";
$result = $mysqli->query($sql);
$mysqli->close();
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Services</title>   
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/style1.css"> 

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

    </head>

  <body>
    <?php include 'includes/session.php';?>
    <?php include 'navbar.php';?>
    
    <div class="container">
        
    <br/><h3>Our Services</h3>
    
    <div class="box-container">
    
    
        <div class="box">
    <?php
		while($rows=$result->fetch_assoc())
			{
	?>
            <img src="assets/img/services_images/<?php echo $rows['img']; ?>" alt="">
            <h3><?php echo $rows['service_name'];?></h3>
            <p>RM <?php echo $rows['service_price'];?></p>
            <p><?php echo $rows['service_description'];?></p><hr>
    <?php
        }
    ?>    </div>

    </div>

</div>

    <?php include 'footer.html';?>

    </body>
</html>