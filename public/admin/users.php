<?php
    session_start();

    //Page Title
    $pageTitle = 'Registered Users';

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
                <h1 class="h3 mb-0 text-gray-800">Registered Users</h1>
                </a>
            </div>

            <!-- Contact Us Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Registered Users</h6>
                </div>
                <div class="card-body">

                    <!-- Contact Us Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Full Name</th>
                                    <th>E-mail</th>
                                    <th>Phone Number</th>
                                    <th>Date Joined</th>
                                    <th>Manage</th>
                                </tr>
                            </thead> 
                            <tbody>
                            <?php
                            include_once('dbconnect.php');
                            $sql = "SELECT * FROM users;";
                            $result = mysqli_query($con,$sql);

                            while ($row = mysqli_fetch_assoc($result))
                                {
                                    echo "<tr>
                                        <td>"  . $row["username"] . "</td>
                                        <td>"  . $row["fullname"] . "</td>
                                        <td>"  . $row["email"] . "</td>
                                        <td>"  . $row["phonenumber"] . "</td>
                                        <td>"  . $row["date_joined"] . "</td>
                                        <td>
                                            <a class ='btn btn-danger btn-sm rounded-0 fa fa-trash' href='deleteusers.php?id=$row[id]'></a>
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