<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Contact Us</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> 
    <link rel="stylesheet" href="assets/css/style1.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

    
</head>
<body>
    <?php include 'includes/session.php';?>
    <?php include 'navbar.php';?>

     <div class="rt-container">
     <br /><h3>Contact Us</h3>
     <p align="center">Get the Fresher Styles & Cuts For Your Needs along with any Beard Trimming Services Or Shaving.</p><hr></div>
          <div class="col-rt-12">
            <div class="container">
           <div class="contact-parent">       
            <div class="contact-child child1">
                        <p>
                            <i class="fas fa-map-marker-alt"></i> Address <br />
                            <span> JALAN SUNGAI DUA, 11700 Gelugor,
                                <br />
                                Penang, Malaysia
                            </span>
                        </p>

                        <p>
                            <i class="fas fa-phone-alt"></i> Let's Talk <br />
                            <span> +6016-412 1820</span>
                        </p>

                        <p>
                            <i class="far fa-envelope"></i> General Support <br />
                            <span>studiochairbeautysalon@gmail.com</span>
                        </p>

                        <p>
                            <i class="fas fa-clock"></i> Business Hours <br />
                            <span>Tuesday - Sunday 11AM TO 7PM</span>
                            <span><br />Monday - Closed</span>
                        </p>
                    </div>

                    <div class="contact-child child2">
                        <div class="inside-contact">
                            <h2>Contact Form</h2>
                            <p>Fill in the form below to send us a message:</p>
                            <form action="Send.php" method="POST" >
                                <div class="form-group">
                                    <label class="sr-only" for="contact-name">Name</label>
                                    <input type="name" name="name" placeholder="Name..." class="contact-name form-control" id="contact-name">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="contact-email">Email</label>
                                    <input type="email" name="email" placeholder="Email..." class="contact-email form-control" id="contact-email">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="contact-message">Message</label>
                                    <textarea name="msg" placeholder="Message..." class="contact-message form-control" id="contact-message"></textarea>
                                </div>
                                <input type="submit" id="btn_send" value="SEND">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            <br /><h3>Locate Us</h3><hr>
            <p align="center">&nbsp;&nbsp;&nbsp;Address: <b>Jalan Sungai Dua, 11700 Gelugor, Pulau Pinang</b> </p>
            <div class="mapouter">
                <div class="gmap_canvas">
                <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Studio C Hair & Beauty Salon&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                </div>
            </div><br/>
        </div>
    </div>

    <?php include 'footer.php';?>

	</body>
</html>