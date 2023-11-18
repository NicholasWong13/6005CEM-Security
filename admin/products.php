<?php
    ob_start();
    session_start();

    //Page Title
    $pageTitle = 'Products';

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
                <h1 class="h3 mb-0 text-gray-800">Products</h1>
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
                    $stmt = $con->prepare("SELECT * FROM products");
                    $stmt->execute();
                    $rows_products = $stmt->fetchAll(); 

                    ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                            </div>
                            <div class="card-body">
                                
                                <!-- ADD NEW Products BUTTON -->
                                <a href="products.php?do=Add" class="btn btn-success btn-sm" style="margin-bottom: 10px;">
                                    <i class="fa fa-plus"></i> 
                                    Add Products
                                </a>

                                <!-- Products Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Category ID</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Product Description</th>
                                                <th scope="col">Product Slug</th>
                                                <th scope="col">Price (RM)</th>
                                                <th scope="col">Code</th>
                                                <th scope="col">Discount</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Manage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($rows_products as $products)
                                                {
                                                    echo "<tr>";
                                                         echo "</td>";
                                                        echo "<td>";
                                                            echo $products['category_id'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo $products['name'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo $products['description'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo $products['slug'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo $products['price'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo $products['code'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo $products['discount'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            echo $products['quantity'];
                                                        echo "</td>";
                                                        echo "<td>";
                                                            $delete_data = "delete_products_".$products["id"];
                                                    ?>
                                                        <ul class="list-inline m-0">

                                                            <!-- DELETE BUTTON -->

                                                            <li class="list-inline-item" data-toggle="tooltip" title="Delete">
                                                                <button class="btn btn-danger btn-sm rounded-0">
                                                                    <a href="products.php?do=Delete&id=<?php echo $products['id']; ?>" style="color: white;">
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
                            <h6 class="m-0 font-weight-bold text-primary">Add New Products</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="products.php?do=Add">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category_id">Product Category ID</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['category_id']))?htmlspecialchars($_POST['category_id']):'' ?>" placeholder="category_id" name="category_id">
                                            <?php
                                                $flag_add_products_form = 0;
                                                if(isset($_POST['add_new_products']))
                                                {
                                                    if(empty(test_input($_POST['category_id'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Product Category ID is required.
                                                            </div>
                                                        <?php

                                                        $flag_add_products_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Product Category Name</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['name']))?htmlspecialchars($_POST['name']):'' ?>" placeholder="Name" name="name">
                                            <?php
                                                $flag_add_products_form = 0;
                                                if(isset($_POST['add_new_products']))
                                                {
                                                    if(empty(test_input($_POST['name'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Product Category name is required.
                                                            </div>
                                                        <?php

                                                        $flag_add_products_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">Product Description</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['description']))?htmlspecialchars($_POST['description']):'' ?>" placeholder="description" name="description">
                                            <?php
                                                if(isset($_POST['add_new_products']))
                                                {
                                                    if(empty(test_input($_POST['description'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                               Description is required.
                                                            </div>
                                                        <?php

                                                        $flag_add_products_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="slug">Product Slug</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['slug']))?htmlspecialchars($_POST['slug']):'' ?>" placeholder="slug" name="slug">
                                            <?php
                                                if(isset($_POST['add_new_products']))
                                                {
                                                    if(empty(test_input($_POST['slug'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                               Slug is required.
                                                            </div>
                                                        <?php

                                                        $flag_add_products_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">Product Price(RM)</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['price']))?htmlspecialchars($_POST['price']):'' ?>" placeholder="Products Price" name="price">
                                            <?php

                                                if(isset($_POST['add_new_products']))
                                                {
                                                    if(empty(test_input($_POST['price'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Product price is required.
                                                            </div>
                                                        <?php

                                                        $flag_add_products_form = 1;
                                                    }
                                                    elseif(!is_numeric(test_input($_POST['price'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Invalid price.
                                                            </div>
                                                        <?php

                                                        $flag_add_products_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="code">Product Code</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['code']))?htmlspecialchars($_POST['code']):'' ?>" placeholder="code" name="code">
                                            <?php
                                                if(isset($_POST['add_new_products']))
                                                {
                                                    if(empty(test_input($_POST['code'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                               Code is required.
                                                            </div>
                                                        <?php

                                                        $flag_add_products_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="discount">Product Discount</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['discount']))?htmlspecialchars($_POST['discount']):'' ?>" placeholder="discount" name="discount">
                                            <?php

                                                if(isset($_POST['add_new_products']))
                                                {
                                                    if(empty(test_input($_POST['discount'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Product Discount is required.
                                                            </div>
                                                        <?php

                                                        $flag_add_products_form = 1;
                                                    }
                                                    elseif(!is_numeric(test_input($_POST['discount'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Invalid discount.
                                                            </div>
                                                        <?php

                                                        $flag_add_products_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="quantity">Quantity</label>
                                            <input type="text" class="form-control" value="<?php echo (isset($_POST['quantity']))?htmlspecialchars($_POST['quantity']):'' ?>" placeholder="quantity" name="quantity">
                                            <?php

                                                if(isset($_POST['add_new_products']))
                                                {
                                                    if(empty(test_input($_POST['quantity'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Quantity is required.
                                                            </div>
                                                        <?php

                                                        $flag_add_products_form = 1;
                                                    }
                                                    elseif(!ctype_digit(test_input($_POST['quantity'])))
                                                    {
                                                        ?>
                                                            <div class="invalid-feedback" style="display: block;">
                                                                Invalid quantity.
                                                            </div>
                                                        <?php

                                                        $flag_add_products_form = 1;
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- SUBMIT BUTTON -->

                                <button type="submit" name="add_new_products" class="btn btn-primary">Add Product</button>

                            </form>

                            <?php

                                /*** ADD NEW Product ***/

                                if(isset($_POST['add_new_products']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $flag_add_products_form == 0)
                                {
                                    $category_id = $_POST['category_id'];
                                    $name = test_input($_POST['name']);
                                    $description = test_input($_POST['description']);
                                    $slug = $_POST['slug'];
                                    $price = test_input($_POST['price']);
                                    $code = test_input($_POST['code']);
                                    $discount = test_input($_POST['discount']);
                                    $quantity = test_input($_POST['quantity']);
                                    

                                    

                                    try
                                    {
                                        $stmt = $con->prepare("insert into products(category_id,name,description,slug,price,code,discount,quantity) values(?,?,?,?,?,?,?,?) ");
                                        $stmt->execute(array($category_id,$name,$description,$slug,$price,$code,$discount,$quantity));
                                        
                                        ?> 
                                            <!-- SUCCESS MESSAGE -->

                                            <script type="text/javascript">
                                                swal("New Product ","The new Product  has been inserted successfully", "success").then((value) => 
                                                {
                                                    window.location.replace("products.php");
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
                elseif($do == "Edit")
                {
                    $id = (isset($_GET['id']) && is_numeric($_GET['id']))?intval($_GET['id']):0;

                    if($id)
                    {
                        $stmt = $con->prepare("Select * from products where id = ?");
                        $stmt->execute(array($id));
                        $products = $stmt->fetch();
                        $count = $stmt->rowCount();

                        if($count > 0)
                        {
                            ?>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit Service</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="products.php?do=Edit&id=<?php echo $id; ?>">
                                        <!-- SERVICE ID -->
                                        <input type="hidden" name="id" value="<?php echo $products['id'];?>">

                                        <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="category_id">Product Category ID</label>
                                                    <input type="text" class="form-control" value="<?php echo $products['category_id'] ?>" placeholder="category_id" name="category_id">
                                                    <?php
                                                        $flag_edit_products_form = 0;

                                                        if(isset($_POST['edit_products_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['category_id'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Product Category ID name is required.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_products_form = 1;
                                                            }
                                                            
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $products['name'] ?>" placeholder="Name" name="name">
                                                    <?php
                                                        $flag_edit_products_form = 0;

                                                        if(isset($_POST['edit_products_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['name'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Product name is required.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_products_form = 1;
                                                            }
                                                            
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <input type="text" class="form-control" value="<?php echo $products['description'] ?>" placeholder="description" name="description">
                                                    <?php
                                                        $flag_edit_products_form = 0;

                                                        if(isset($_POST['edit_products_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['description'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Product description is required.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_products_form = 1;
                                                            }
                                                            
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="slug">Slug</label>
                                                    <input type="text" class="form-control" value="<?php echo $products['slug'] ?>" placeholder="slug" name="slug">
                                                    <?php
                                                        $flag_edit_products_form = 0;

                                                        if(isset($_POST['edit_products_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['slug'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Product Slug is required.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_products_form = 1;
                                                            }
                                                            
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="code">Code</label>
                                                    <input type="text" class="form-control" value="<?php echo $products['code'] ?>" placeholder="code" name="code">
                                                    <?php
                                                        $flag_edit_products_form = 0;

                                                        if(isset($_POST['edit_products_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['code'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Product Code is required.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_products_form = 1;
                                                            }
                                                            
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="quantity">Quantity</label>
                                                    <input type="text" class="form-control" value="<?php echo $products['quantity'] ?>" placeholder="quantity" name="quantity">
                                                    <?php

                                                        if(isset($_POST['edit_products_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['quantity'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Quantity is required.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_products_form = 1;
                                                            }
                                                            elseif(!ctype_digit(test_input($_POST['quantity'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Invalid quantity.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_products_form = 1;
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="discount">Product Discount</label>
                                                    <input type="text" class="form-control" value="<?php echo $products['discount'] ?>" placeholder="discount" name="discount">
                                                    <?php

                                                        if(isset($_POST['edit_products_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['discount'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Discount is required.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_products_form = 1;
                                                            }
                                                            elseif(!is_numeric(test_input($_POST['discount'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Invalid discount.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_products_form = 1;
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="price">Product Price(RM)</label>
                                                    <input type="text" class="form-control" value="<?php echo $products['price'] ?>" placeholder="Price" name="price">
                                                    <?php

                                                        if(isset($_POST['edit_products_sbmt']))
                                                        {
                                                            if(empty(test_input($_POST['price'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Price is required.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_products_form = 1;
                                                            }
                                                            elseif(!is_numeric(test_input($_POST['price'])))
                                                            {
                                                                ?>
                                                                    <div class="invalid-feedback" style="display: block;">
                                                                        Invalid price.
                                                                    </div>
                                                                <?php

                                                                $flag_edit_products_form = 1;
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- SUBMIT BUTTON -->
                                        <button type="submit" name="edit_products_sbmt" class="btn btn-primary">Save Edits</button>
                                    </form>
                                    
                                    <?php                                
                                    
                                /*** EDIT Product ***/

                                if(isset($_POST['edit_products_sbmt']) && $_SERVER['REQUEST_METHOD'] == 'POST' && $flag_edit_products_form == 0)
                                {
                                    $category_id = $_POST['category_id'];
                                    $name = test_input($_POST['name']);
                                    $description = test_input($_POST['description']);
                                    $slug = $_POST['slug'];
                                    $price = test_input($_POST['price']);
                                    $code = test_input($_POST['code']);
                                    $discount = test_input($_POST['discount']);
                                    $quantity = test_input($_POST['quantity']);
                                    

                                    

                                    try
                                    {
                                        $stmt = $con->prepare("update products set category_id = ?, name = ?, description = ?, slug = ?, price = ?, code = ?, discount = ?, quantity = ? where id = ? ");
                                        $stmt->execute(array($category_id,$name,$description,$slug,$price,$code,$discount,$quantity));
                                        
                                        ?> 
                                            <!-- SUCCESS MESSAGE -->

                                            <script type="text/javascript">
                                                swal("Updated Product ","The new updated Product  has been inserted successfully", "success").then((value) => 
                                                {
                                                    window.location.replace("products.php");
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
                            }
                    
                        }
                
                            ?>
                        
                        </div>
                    </div>
                    <?php   
                }                
                elseif($do == 'Delete')
                {
                        if (isset($_GET["id"]))
                        {
                            $id = $_GET["id"];

                            include_once('dbconnect.php');

                            $sql = "DELETE FROM products WHERE id=$id";
                            $con ->query($sql);
                            header('Location: products.php');
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