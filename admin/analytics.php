<?php
session_start();

// Page Title
$pageTitle = 'Analytics';

// Includes
include 'connect.php';
include 'Includes/functions/functions.php'; 
include 'Includes/templates/header.php';

// Check If user is already logged in
if(isset($_SESSION['username_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4']))
{
    // Begin Page Content
?>

<!-- Page Wrapper -->
<div id="wrapper">

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Analytics Overview</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i>
            Generate Report
        </a>
    </div>

    
    <?php
    // Check the type parameter in the URL
    $chartType = isset($_GET['type']) ? $_GET['type'] : '';

    // Display the corresponding chart based on the type parameter
    switch ($chartType) {
        case 'user':
            include 'user-analytics.php';
            break;
        case 'appointment':
            include 'appointment-analytics.php'; 
            break;
        case 'review':
            include 'review-analytics.php'; 
            break;
        default:
            echo 'Please select a valid analytics from the navigation.';
    }
    ?>
    
<!-- Include your navigation here -->
<ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="analytics.php?type=user">User Analytics</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="analytics.php?type=appointment">Appointment Analytics</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="analytics.php?type=review">Review Analytics</a>
    </li>
    <!-- Other navigation links... -->
</ul><br/>

</div>
<!-- End of Page Content -->

<!-- Include your footer here -->
<?php include 'Includes/templates/footer.php'; ?>

</div>
<!-- End of Page Wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Include your additional scripts here -->

</body>

</html>
<?php
}
else
{
header('Location: login.php');
exit();
}
?>