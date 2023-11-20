<div class="footer-basic">
    <footer>
        <div class="social">
            <a href="" target="_blank"><i class="iconS ion-social-instagram"></i></a>
            <a href="https://www.facebook.com/people/Studio-C-hair-salon/100054425412415/" target="_blank"><i class="iconS ion-social-facebook"></i></a>
        </div>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="home.php">Home</a></li>
            <li class="list-inline-item"><a href="about.php">About</a></li>
            <li class="list-inline-item"><a href="services.php">Services</a></li>
            <li class="list-inline-item"><a href="review_table.php">Review & Feedback</a></li>
            <li class="list-inline-item"><a href="appointment.php">Make Appointment</a></li>
            <li class="list-inline-item"><a href="contact.php">Contact</a></li>
            <li class="list-inline-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Product</a>
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
        </ul>
        <p class="copyright">Studio C Hair & Beauty Salon &copy; Copyright 2022 </p>
        <p class="terms"><a href="privacy-policy.pdf" target="_blank">Privacy Policy</a> | <a href="Disclaimer.pdf" target="_blank">Disclamier</a></p>
    </footer>
</div>