<header class="site-header">
    <div class="site-identity">
    <a href="index.php"><img src="assets/img/StudioC.png" alt="Studio C Hair & Beauty Salon"/></a>
    <h1><a href="index.php">Studio C Hair & Beauty Salon</a></h1> 
</div>
    <nav class="navigation">
    <li><a href="about.php">About Us</a></li>
    <li><a href="services.php">Services</a></li>
    <li><a href="review_table.php">Review & Feedback</a></li>
    <li><a href="appointment.php">Make Appointment</a></li>
    <li><a href="contact.php">Contact Us</a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Product</a>
        <ul class="dropdown-menu" role="menu">
          <?php
            $conn = $pdo->open();
            try{
              $stmt = $conn->prepare("SELECT * FROM category");
              $stmt->execute();
              foreach($stmt as $row){
                echo "
                  <li><a href='category.php?category=".$row['cat_slug']."'>".$row['name']."</a></li>
                ";                  
              }
            }
            catch(PDOException $e){
              echo "There is some problem in connection: " . $e->getMessage();
            }

            $pdo->close();

          ?>
        </ul>
     </li>
      <li><a href="Product-Cart/login.php">Login</a></li>
      <li><a href="admin/login.php">Admin</a></li>
    
  </div>
    </nav>
  </header>