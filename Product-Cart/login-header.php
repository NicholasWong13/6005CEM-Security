<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <a class="navbar-brand" href="http://localhost/StudioCHair&BeautySalon/home.php">Studio C Hair & Beauty Salon</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

    <?php 

      if(isset($_SESSION['username'], $_SESSION['password'])) {

    ?>


    <div class="product-area">
      <a href="index.php?page=products">View Products</a>
    </div>
        
    <div class="welcome"><?php echo "Welcome, <a href='editprofile.php'>".$_SESSION['username']."</a>!";?></div>

      <?php 

        } else {
          echo "<span class='not-logged'>Not logged in.</span>";
        }

      ?>

    </div>
  </div>
</nav>
