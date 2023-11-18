<?php
header("Content-Type: text/html");
?>
<!DOCTYPE html>

<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Studio C Hair & Beauty Salon | Home</title>     
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    
    <link rel="stylesheet" href="assets/css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    </head>

<body>
    <?php include 'includes/session.php';?>
    <?php include 'navbar.php';?>
<div class="page-wrapper">
    
<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel" data-slide-to="0" class="active"></li>
      <li data-target="#carousel" data-slide-to="1"></li>
      <li data-target="#carousel" data-slide-to="2"></li>
      <li data-target="#carousel" data-slide-to="3"></li>
    </ol>
    
    <div class="carousel-inner" role="listbox">

      <div class="carousel-item active">

        <div class="view">
          <img class="d-block w-100" src="assets/img/home_images/Hair Cutting.jpg"
            alt="First slide">
          <div class="mask rgba-black-light"></div>
        </div>
        <div class="carousel-caption">
          <h3 class="h3-responsive">Our Salon</h3>
          <p>VISIT US NOW !</p>
        </div>
      </div>
 
      <div class="carousel-item">
       
        <div class="view">
          <img class="d-block w-100" src="assets/img/home_images/promotion.jpg"
            alt="Third slide">
          <div class="mask rgba-black-slight"></div>
        </div>
        <div class="carousel-caption">
          <h3 class="h3-responsive">Promotion</h3>
          <p>VISIT US NOW !</p>
        </div>
      </div>

      <div class="carousel-item">
       
        <div class="view">
          <img class="d-block w-100" src="assets/img/home_images/promotion2.jpg"
            alt="Second slide">
          <div class="mask rgba-black-strong"></div>
        </div>
        <div class="carousel-caption">
          <h3 class="h3-responsive">Promotion</h3>
          <p>VISIT US NOW !</p>
        </div>
      </div>

      <div class="carousel-item">
       
        <div class="view">
          <img class="d-block w-100" src="assets/img/home_images/Washing Hair.jpg"
            alt="Third slide">
          <div class="mask rgba-black-slight"></div>
        </div>
        <div class="carousel-caption">
          <h3 class="h3-responsive">Washing Hair</h3>
          <p>VISIT US NOW !</p>
        </div>
      </div>

    </div>
    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

<div class="container-fluid">
    <br/><h3> Top Services </h3><br/>
    <div class="box-container-fluid">
        <div class="box">
            <img src="assets/img/icon/Hair Cut icon.jpg" alt=""/>
            <h3>Haircut Styles</h3>
            <p>Providing the fresher styles & cuts for your needs</p>
        </div>

        <div class="box">
            <img src="assets/img/icon/Beard Trim.jpg" alt=""/>
            <h3>Beard Trimming</h3>
            <p>Want to keep the beard but style? Then come on over and get the fresher styles for your Beard</p>
        </div>

        <div class="box">
            <img src="assets/img/icon/Clean Shaving.jpg" alt=""/>
            <h3>Clean Shaving</h3>
            <p>Grew a long beard during the MCO period? We will help you clean shave that beard right off</p>
        </div>

        <div class="box">
            <img src="assets/img/icon/Hair Straight icon.jpg" alt=""/>
            <h3>Hair Straightening Service</h3>
            <p>Providing the fresher styles & custom design for your hair</p>
        </div>
    </div>
</div>
         
</div>
    <?php include 'footer.php';?>

</body>
</html>
   