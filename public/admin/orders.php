<?php
    session_start();

    //Page Title
    $pageTitle = 'Orders';

    //Includes
    include 'connect.php';
    include 'Includes/functions/functions.php'; 
    include 'Includes/templates/header.php';

    //Check If user is already logged in
    if(isset($_SESSION['username_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4']))
    {
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
    
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Orders Details</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i>
                    Generate Report
                </a>
            </div>

            <!-- Contact Us Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Orders Details</h6>
                </div>
                <div class="card-body">

                    <!-- Contact Us Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>E-mail</th>
                                    <th>Address</th>
                                    <th>Address 2</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>Zip code</th>
                                    <th>Order Status</th>
                                    <th>Created on</th>
                                    <th>Manage</th>
                                </tr>
                            </thead> 
                            <tbody>
                            <?php
                            include_once('dbconnect.php');
                            $sql = "SELECT * FROM orders;";
                            $result = mysqli_query($con,$sql);

                            while ($row = mysqli_fetch_assoc($result))
                                {
                                    echo "<tr>
                                        <td>"  . $row["first_name"] . "</td>
                                        <td>"  . $row["last_name"] . "</td>
                                        <td>"  . $row["email"] . "</td>
                                        <td>"  . $row["address"] . "</td>
                                        <td>"  . $row["address2"] . "</td>
                                        <td>"  . $row["country"] . "</td>
                                        <td>"  . $row["state"] . "</td>
                                        <td>"  . $row["zipcode"] . "</td>
                                        <td>"  . $row["order_status"] . "</td>
                                        <td>"  . $row["created_at"] . "</td>
                                        <td>
                                            <a class ='btn btn-danger btn-sm rounded-0 fa fa-trash' href='deleteorders.php?id=$row[id]'></a>
                                        </td>
                                    </tr>";
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
  
<?php 
        
        //Include Footer
        include 'Includes/templates/footer.php';
    }
    else
    {
        header('Location: login.php');
        exit();
    }

?>