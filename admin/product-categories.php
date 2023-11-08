<?php
    ob_start();
    session_start();

    //Page Title
    $pageTitle = 'Product Categories';

    //Includes
    include 'connect.php';
    include 'Includes/functions/functions.php'; 
    include 'Includes/templates/header.php';

    //Extra JS FILES
    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";

    //Check If user is already logged in
    if(isset($_SESSION['username_barbershop_Xw211qAAsq4']) && isset($_SESSION['password_barbershop_Xw211qAAsq4']))
    {
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
    
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Product Categories</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i>
                    Generate Report
                </a>
            </div>

            <?php
                $do = '';

                if(isset($_GET['do']) && in_array($_GET['do'], array('Add','Edit','Delete')))
                {
                    $do = htmlspecialchars($_GET['do']);
                }
                else
                {
                    $do = 'Manage';
                }

                if($do == 'Manage')
                {
                    $stmt = $con->prepare("SELECT * FROM category");
                    $stmt->execute();
                    $rows_productcategories = $stmt->fetchAll(); 

                    ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Product Categories</h6>
                            </div>
                            <div class="card-body">
                                
                                <!-- ADD NEW Product Categories BUTTON -->
                                <a href="product-categories.php?do=Add" class="btn btn-success btn-sm" style="margin-bottom: 10px;">
                                    <i class="fa fa-plus"></i> 
                                    Add Product Categories
                                </a>

                                <!-- Product Categories Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Category Name</th>
                                                <th scope="col">CAT_SLUG</th>
                                                <th scope="col">Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($rows_productcategories as $productcategories)
                                                {
                                                    echo "<tr>";
                                                        echo "<td>";
                                                            echo $productcategories['id'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo $productcategories['name'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo $productcategories['cat_slug'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            $delete_data = "delete_productcategories_".$productcategories["id"];
                                                    ?>
                                                        <ul class="list-inline m-0">

                                                            <!-- EDIT BUTTON -->

                                                            <li class="list-inline-item" data-toggle="tooltip" title="Edit">
                                                                <button class="btn btn-success btn-sm rounded-0">
                                                                    <a href="product-categories.php?do=Edit&id=<?php echo $productcategories['id']; ?>" style="color: white;">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                </button>
                                                            </li>

                                                            <!-- DELETE BUTTON -->

                                                            <li class="list-inline-item" data-toggle="tooltip" title="Delete">
                                                                <button class="btn btn-danger btn-sm rounded-0">
                                                                    <a href="product-categories.php?do=Delete&id=<?php echo $productcategories['id']; ?>" style="color: white;">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    <?php
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                elseif($do == 'Add')
                {
                    ?>
                    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add New Product Categories</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="product-categories.php?do=Add">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Product Category Name</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['name']))?htmlspecialchars($_POST['name']):'' ?>" placeholder="Name" name="name">
                                            <?php
                                                $flag_add_productcategories_form = 0;
                                                if(isset($_POST['add_new_productcategories']))
                                                {
                                                    if(empty(test_input($_POST['name'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Product Categories name is required.
                                                            </div>
                                                        <?php

                                                        $flag_add_productcategories_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cat_slug">Cat_Slug</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['cat_slug']))?htmlspecialchars($_POST['cat_slug']):'' ?>" placeholder="cat_slug" name="cat_slug">
                                            <?php
                                                if(isset($_POST['add_new_productcategories']))
                                                {
                                                    if(empty(test_input($_POST['cat_slug'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                               Name is required.
                                                            </div>
                                                        <?php

                                                        $flag_add_productcategories_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- SUBMIT BUTTON -->

                                <button type="submit" name="add_new_productcategories" class="btn btn-primary">Add Product Categories</button>

                            </form>

                            <?php

                                /*** ADD NEW Product Categories ***/

                                if(isset($_POST['add_new_productcategories']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $flag_add_productcategories_form == 0)
                                {
                                    $name = test_input($_POST['name']);
                                    $cat_slug = $_POST['cat_slug'];

                                    try
                                    {
                                        $stmt = $con->prepare("insert into category(name,cat_slug) values(?,?) ");
                                        $stmt->execute(array($name,$cat_slug));
                                        
                                        ?> 
                                            <!-- SUCCESS MESSAGE -->

                                            <script type="text/javascript">
                                                swal("New Product Categories","The new Product Categories has been inserted successfully", "success").then((value) => 
                                                {
                                                    window.location.replace("product-categories.php");
                                                });
                                            </script>

                                        <?php

                                    }
                                    catch(Exception $e)
                                    {
                                        echo "<div class = 'alert alert-danger' style='margin:10px 0px;'>";
                                            echo 'Error occurred: ' .$e->getMessage();
                                        echo "</div>";
                                    }
                                    
                                }
                            ?>
                        </div>
                    </div>
                    <?php   
                }
                elseif($do == 'Edit')
                {
                    $id = (isset($_GET['id']) && is_numeric($_GET['id']))?intval($_GET['id']):0;

                    if($id)
                    {
                        $stmt = $con->prepare("Select * from category where id = ?");
                        $stmt->execute(array($id));
                        $productcategories = $stmt->fetch();
                        $count = $stmt->rowCount();

                        if($count > 0)
                        {
                            ?>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit Product Categories</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="product-categories.php?do=Edit&id=<?php echo $id; ?>">
                                        <!-- Product Categories ID -->
                                        <input type="hidden" name="id" value="<?php echo $productcategories['id'];?>">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $productcategories['name'] ?>" placeholder="Name" name="name">
                                                    <?php
                                                        $flag_edit_productcategories_form = 0;
                                                        if(isset($_POST['edit_productcategories_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['name'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Product Categories name is required.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_productcategories_form = 1;
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cat_slug">Cat_Slug</label>
                                                    <input type="text" class="form-control" value="<?php echo $productcategories['cat_slug'] ?>" placeholder="cat_slug" name="cat_slug">
                                                    <?php
                                                        if(isset($_POST['edit_productcategories_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['cat_slug'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Name is required.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_productcategories_form = 1;
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- SUBMIT BUTTON -->
                                        <button type="submit" name="edit_productcategories_sbmt" class="btn btn-primary">
                                            Edit Product Categories
                                        </button>
                                    </form>
                                    <?php
                                        /*** EDIT Product Categories ***/
                                        if(isset($_POST['edit_productcategories_sbmt']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $flag_edit_productcategories_form == 0)
                                        {
                                            $name = test_input($_POST['name']);
                                            $cat_slug = $_POST['cat_slug'];
                                            $id = $_POST['id'];

                                            try
                                            {
                                                $stmt = $con->prepare("update category set name = ?, cat_slug = ? where id = ? ");
                                                $stmt->execute(array($name,$cat_slug,$id));
                                                
                                                ?> 
                                                    <!-- SUCCESS MESSAGE -->

                                                    <script type="text/javascript">
                                                        swal("Product Categories Updated","The Product Categories has been updated successfully", "success").then((value) => 
                                                        {
                                                            window.location.replace("product-categories.php");
                                                        });
                                                    </script>

                                                <?php

                                            }
                                            catch(Exception $e)
                                            {
                                                echo "<div class = 'alert alert-danger' style='margin:10px 0px;'>";
                                                    echo 'Error occurred: ' .$e->getMessage();
                                                echo "</div>";
                                            }
                                            
                                        }
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                        else
                        {
                            header('Location: product-categories.php');
                            exit();
                        }
                    }
                    else
                    {
                        header('Location: product-categories.php');
                        exit();
                    }
                }
                elseif($do == 'Delete')
                {
                        if (isset($_GET["id"]))
                        {
                            $id = $_GET["id"];

                            include_once('dbconnect.php');

                            $sql = "DELETE FROM category WHERE id=$id";
                            $con ->query($sql);
                            header('Location: product-categories.php');
                            exit;
                        }
                }                
            ?>
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