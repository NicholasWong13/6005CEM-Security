<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Nicholas Wong">
  
    <title>CheckOut | Studio C Hair & Beauty Salon</title>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<?php 
    
    require_once('./assets/inc/config.php');    
    require_once('./assets/inc/helpers.php');  

    //pre($_SESSION);

    if(isset($_POST['submit']))
    {
        if(isset($_POST['first_name'],$_POST['last_name'],$_POST['email'],$_POST['address'],$_POST['country'],$_POST['state'],$_POST['zipcode']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['address']) && !empty($_POST['country']) && !empty($_POST['state']) && !empty($_POST['zipcode']))
        {
           $firstName = $_POST['first_name'];

           if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) == false)
           {
                 $errorMsg[] = 'Please enter valid email address';
           }
           else
           {
               //validate_input is a custom function
               //you can find it in helpers.php file
                $firstName  = validate_input($_POST['first_name']);
                $lastName   = validate_input($_POST['last_name']);
                $email      = validate_input($_POST['email']);
                $address    = validate_input($_POST['address']);
                $address2   = (!empty($_POST['address'])?validate_input($_POST['address']):'');
                $country    = validate_input($_POST['country']);
                $state      = validate_input($_POST['state']); 
                $zipcode    = validate_input($_POST['zipcode']);

                $sql = 'insert into orders (first_name, last_name, email, address, address2, country, state, zipcode, order_status,created_at, updated_at) values (:fname, :lname, :email, :address, :address2, :country, :state, :zipcode, :order_status,:created_at, :updated_at)';
                $statement = $db->prepare($sql);
                $params = [
                    'fname' => $firstName,
                    'lname' => $lastName,
                    'email' => $email,
                    'address' => $address,
                    'address2' => $address2,
                    'country' => $country,
                    'state' => $state,
                    'zipcode' => $zipcode,
                    'order_status' => 'confirmed',
                    'created_at'=> date('Y-m-d H:i:s'),
                    'updated_at'=> date('Y-m-d H:i:s')
                ];

                $statement->execute($params);
                if($statement->rowCount() == 1)
                {
                    
                    $getOrderID = $db->lastInsertId();

                    if(isset($_SESSION['cart']) || !empty($_SESSION['cart']))
                    {
                        $sqlDetails = 'insert into order_details (order_id, product_id, product_name, product_price, qty, subtotal) values(:order_id,:product_id,:product_name,:product_price,:qty,:subtotal)';
                        $orderDetailStmt = $db->prepare($sqlDetails);

                        $totalPrice = 0;
                        foreach($_SESSION['cart'] as $item)
                        {
                            $totalPrice+=$item['subtotal'];

                            $paramOrderDetails = [
                                'order_id' =>  $getOrderID,
                                'product_id' =>  $item['product_id'],
                                'product_name' =>  $item['name'],
                                'product_price' =>  $item['price'],
                                'qty' =>  $item['quantity'],
                                'subtotal' =>  $item['subtotal']
                            ];

                            $orderDetailStmt->execute($paramOrderDetails);
                        }
                        
                        $updateSql = 'update orders set subtotal = :total where id = :id';

                        $rs = $db->prepare($updateSql);
                        $prepareUpdate = [
                            'total' => $subtotal,
                            'id' =>$getOrderID
                        ];

                        $rs->execute($prepareUpdate);
                        
                        unset($_SESSION['cart']);
                        $_SESSION['confirm_order'] = true;
                        header('location:thank-you.php');
                        exit();
                    }
                }
                else
                {
                    $errorMsg[] = 'Unable to save your order. Please try again';
                }
           }
        }
        else
        {
            $errorMsg = [];

            if(!isset($_POST['first_name']) || empty($_POST['first_name']))
            {
                $errorMsg[] = 'First Name is required';
            }
            else
            {
                $fnameValue = $_POST['first_name'];
            }

            if(!isset($_POST['last_name']) || empty($_POST['last_name']))
            {
                $errorMsg[] = 'Last Name is required';
            }
            else
            {
                $lnameValue = $_POST['last_name'];
            }

            if(!isset($_POST['email']) || empty($_POST['email']))
            {
                $errorMsg[] = 'Email is required';
            }
            else
            {
                $emailValue = $_POST['email'];
            }

            if(!isset($_POST['address']) || empty($_POST['address']))
            {
                $errorMsg[] = 'Address is required';
            }
            else
            {
                $addressValue = $_POST['address'];
            }

            if(!isset($_POST['country']) || empty($_POST['country']))
            {
                $errorMsg[] = 'Country is required';
            }
            else
            {
                $countryValue = $_POST['country'];
            }

            if(!isset($_POST['state']) || empty($_POST['state']))
            {
                $errorMsg[] = 'State is required';
            }
            else
            {
                $stateValue = $_POST['state'];
            }

            if(!isset($_POST['zipcode']) || empty($_POST['zipcode']))
            {
                $errorMsg[] = 'Zipcode is required';
            }
            else
            {
                $zipCodeValue = $_POST['zipcode'];
            }


            if(isset($_POST['address2']) || !empty($_POST['address2']))
            {
                $address2Value = $_POST['address2'];
            }

        }
    }
?>

  <div class="row justify-content-md-center">
        
        <div class="col-md-6">
          <h4 class="mb-3" align="center">Billing Address</h4>
          <?php 
            if(isset($errorMsg) && count($errorMsg) > 0)
            {
                foreach($errorMsg as $error)
                {
                    echo '<div class="alert alert-danger">'.$error.'</div>';
                }
            }
          ?>
          <form class="needs-validation" method="POST">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" name="first_name" placeholder="First Name" value="<?php echo (isset($fnameValue) && !empty($fnameValue)) ? $fnameValue:'' ?>" >
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Last Name" value="<?php echo (isset($lnameValue) && !empty($lnameValue)) ? $lnameValue:'' ?>" >
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="youremail@example.com" value="<?php echo (isset($emailValue) && !empty($emailValue)) ? $emailValue:'' ?>">
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main Street" value="<?php echo (isset($addressValue) && !empty($addressValue)) ? $addressValue:'' ?>">
            </div>

            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite" value="<?php echo (isset($address2Value) && !empty($address2Value)) ? $address2Value:'' ?>">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" name="country" id="country" >
                  <option value="">Choose...</option>
                  <option value="Malaysia">Malaysia</option>
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select class="custom-select d-block w-100" name="state" id="state" >
                  <option value="">Choose...</option>
                  <option value="Penang">Penang</option>
                </select>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip Code</label>
                <input type="text" class="form-control" id="zip" name="zipcode" placeholder="" value="<?php echo (isset($zipCodeValue) && !empty($zipCodeValue)) ? $zipCodeValue:'' ?>" >
              </div>
            </div>
            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="cashOnDelivery" name="cashOnDelivery" type="radio" class="custom-control-input" checked="" >
                <label class="custom-control-label" for="cashOnDelivery">Cash on Delivery</label>
              </div>
            </div>
           
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="submit">Continue to Checkout</button>
          </form>
        </div>
      </div>
      