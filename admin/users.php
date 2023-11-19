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
                                    <th>Account Status</th>
                                    <th>Manage</th>
                                </tr>
                            </thead> 
                            <tbody>
                            <?php
                            include_once('dbconnect.php');
                            $sql = "SELECT * FROM users;";
                            $result = mysqli_query($con,$sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                // Convert account status to "Active" or "Inactive"
                                $accountStatus = ($row["account_status"] == 1) ? 'Active' : 'Inactive';
                        
                                $delete_data = "deleteModal" . $row["id"]; // Use a unique identifier for each modal
                        
                                echo "<tr>
                                    <td>"  . $row["username"] . "</td>
                                    <td>"  . $row["fullname"] . "</td>
                                    <td>"  . $row["email"] . "</td>
                                    <td>"  . $row["phonenumber"] . "</td>
                                    <td>"  . $row["date_joined"] . "</td>
                                    <td>"  . $accountStatus . "</td>
                                    <td>
                                    <a class='btn btn-success btn-sm rounded-0 fas fa-ban' href='editstatus.php?id=$row[id]' onclick='editStatus($row[id])'></a>
                                    <button class='btn btn-danger btn-sm rounded-0' type='button' data-toggle='modal' data-target='#$delete_data'><i class='fa fa-trash'></i></button>
                                    
                                        <!-- Delete Modal -->

                                        <div class='modal fade' id='$delete_data' tabindex='-1' role='dialog' aria-labelledby='$delete_data' aria-hidden='true'>
                                            <div class='modal-dialog' role='document'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='exampleModalLabel'>Delete User</h5>
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                            <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        Are you sure you want to delete this user?
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
                                                        <a class='btn btn-danger' href='deleteusers.php?id={$row['id']}'>Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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





