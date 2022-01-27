<?php
$active = "Cart";

session_start();


include("includes/db.php"); 
include("functions/functions.php");


?>
<?php

if (isset($_POST["submit"]))
{
    $number = $_POST["number"];

    $data = array( 'service' => 'qY5f7UoyTwREUf0sgHOI0JOjO9fpzXHW', 
             'phonenumber' => $number, 
             'amount' => $_POST["total"],
             'currency' => 'XAF'
           );

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.monetbil.com/payment/v1/placePayment'); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    curl_setopt($ch, CURLOPT_POST, 1); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);

    $json = curl_exec($ch); 
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
    $jsonArry = json_decode($json, true); 
    //print_r($jsonArry);

    header('Location:checkout_details.php?checkPayment='.$jsonArry['paymentId']);
    exit();

    //Result:

    /*Array ( 
      
     [status] => REQUEST_ACCEPTED
     [message] => payment pending
     [channel_ussd] => *126*1#
     [channel_name] => MTN Mobile Money
     [channel] => CM_MTNMOBILEMONEY
     [paymentId] => 61347672161751969872

    ) */  
  
}

 //- CheckPayment

    function checkPayment($paymentId) {

      $data = array( 'paymentId' => $paymentId ); 
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.monetbil.com/payment/v1/checkPayment'); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data, '', '&'));
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);

    $json = curl_exec($ch); 
    $jsonArry = json_decode($json, true);
 

    if (is_array($jsonArry) and array_key_exists('transaction', $jsonArry)) {
      $transaction = $jsonArry['transaction']; 
      $status = $transaction['status']; 

      if ($status == 1)
        { 
        // Successful payment
                    
                                  
            $con = mysqli_connect("localhost", "root", "", "eddy_mall");
                          
            $customer_id = $_SESSION["ID"];  
              
                    $query = "SELECT * FROM customers where customer_id='$customer_id'";
                    $results = mysqli_query($con, $query) or die(mysql_error());
                    $row = mysqli_fetch_array($results);
            
            
                        $first_name = $row["first_name"];
                        $last_name = $row["last_name"];
                        $full_name = $row["first_name"]. " " .$row["last_name"];
                        $email_address = $row["email_address"];
                        $country = $row["country"];
                        $city = $row["city"];
                        $state = $row["state"];
                        $contact = $row["contact"];
                        $address = $row["address"];
                        $zipcode = $row["zipcode"]; 
            
            
            
            $orderid = mysqli_insert_id($con);
            $ip_add = getRealIpUser();
            $today = date("Y-m-d");
            $sessid = session_id();
            
            
            $sql = "INSERT INTO orders (`order_date`, `customer_name`, `email_address`, `shipping_address`, `shipping_city`, `shipping_state`, `shipping_country`, `shipping_zipcode`) VALUES ('$today','$full_name','$email_address','$address','$city', '$city','$country','$zipcode')";
            $result = mysqli_query($con, $sql) or die(mysqli_error($con));
            
            
            
            $query = "SELECT * FROM cart WHERE ip_add='$ip_add'";
            $results = mysqli_query($con, $query) or die(mysqli_error($con));
            //$row = mysqli_fetch_array($results);
            
            
            while ($row = mysqli_fetch_array($results)) {
            
            
            $product_id = $row["p_id"];
            $quantity = $row["qty"];
            $size = $row["size"];
            $price = $row["price"];
            
            $sql2 = "INSERT INTO orders_details (customer_id, product_id, order_date, item_name, quantity, price, size) VALUES ('$customer_id', '$product_id', '$today', 'name', '$quantity', '$price', '$size')";
            $insert = mysqli_query($con, $sql2) or die(mysqli_error($con));
            }
            
            
            $query = "DELETE FROM cart WHERE ip_add='$ip_add' ";
            $delete = mysqli_query($con, $query) or die(mysqli_error($con));
            //if ($delete) {
              # code...
              //echo "Deleted";
            //}
            
                          ?>
            
                          <script type="text/javascript">
                            alert("Thanks for Shopping with EDDYMALL");
                           window.location.href = "customer/my_account.php?my_orders";
                          </script>
            
                          <?php

        
        
        } else if ($status == -1) {
         // Payment failed 
         
                          ?>
            
                          <script type="text/javascript">
                            alert("Payment Failed. Kindly Make Payment Again");
                          // window.location.href = "customer/my_account.php?my_orders";
                          </script>
            
                          <?php
         
         echo "<script> alert('HELLO') </script>";
          
          }else{
              
              
                          ?>
            
                          <script type="text/javascript">
                            alert("Payment Concelled. Kindly Make Payment Again");
                          // window.location.href = "customer/my_account.php?my_orders";
                          </script>
            
                          <?php

          }
        
                
    }

    if (!array_key_exists('transaction', $jsonArry)) {

       echo "Awaiting your payment...";
       //header("Refresh:5");
       ?>
       <script>
           window.location.reload();
       </script>
       
       <?php
    }
  }

    
  if (isset($_GET['checkPayment'])) {

       checkPayment($_GET['checkPayment']);

  }
?>


  
<br>
<!-- 
<form method="get" action="">
    <input type="hidden" name="checkPayment" value="<?php //echo $_GET['checkPayment'] ?>">
   <button> Check my payment</button>
</form>

-->


<?php

if (isset($_GET["pro_id"])) {
    # code...

    $product_id = $_GET["pro_id"];

    $get_product = "SELECT * FROM product WHERE product_id='$product_id'";
    $run_product = mysqli_query($con, $get_product);

    $row_product = mysqli_fetch_array($run_product);
    $p_cat_id = $row_product['p_cat_id'];
    $pro_title = $row_product['product_title'];
    $pro_price = $row_product['product_price'];
    $pro_desc = $row_product['product_desc'];
    $pro_img1 = $row_product['product_img1'];
    $pro_img2 = $row_product['product_img2'];
    $pro_img3 = $row_product['product_img3'];


    $get_p_cat = "SELECT * FROM product_categories WHERE p_cat_id='$p_cat_id'";
    $run_p_cat = mysqli_query($con, $get_p_cat);

    $row_p_cat = mysqli_fetch_array($run_p_cat);
    $p_cat_title = $row_p_cat['p_cat_title'];
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.6.3/css/font-awesome.min.css">
    <link href="styles/style.css" rel="stylesheet">

    <title>E-commerce System</title>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://www.2checkout.com/checkout/api/2co.min.js"></script>

</head>
<body>
    <div id="top">  <!--  beginning of first top id div  -->

        <div class="container">  <!--  beginning of first container class div  -->

            <div class="col-md-6 offer">  <!--  beginning of first col-md-6 offer class div  -->
                <a href="#" class="btn btn-success btn-sm">
                    <?php

                    if (!isset($_SESSION["customer_name"])) {
                        # code...

                        echo "Welcome Guest";
                    }else{

                        echo "Welcome " . @$_SESSION["customer_name"] . " ";
                    }
                    ?>

                </a>
                <a href="checkout.php"><?php items(); ?> Items in your cart | Total price: <?php  total_price()  ?></a>
            </div>  <!--  end of first col-md-6 offer class div  -->

            <div class="col-md-6">  <!--  beginning of first col-md-6 class div  -->

                <ul class="menu">  <!--  beginning of first menu class ul  -->
                    <li class="<?php// if($active == 'Account') echo 'active';  ?>">
                        <a href="customer_register.php">Register</a>
                    </li>
                    <li>
                        <a href="customer/my_account.php">My Account</a>
                    </li>
                    <li>
                        <a href="cart.php">Go To Cart</a>
                    </li>
                    <li>
                        <a href="checkout.php">
                            <?php

                            if (!@isset($_SESSION["customer_name"])) {
                                # code...

                                echo "<a href='checkout.php'> Login </a>";
                            }else{

                                echo "<a href='logout.php'> Logout </a>";
                            }
                            ?>
                        </a>
                    </li>
                </ul>  <!--  end of first menu class ul  -->

            </div><!--  end of first col-md-6 class div  -->

        </div>  <!--  end of first container class div  -->

    </div> <!--  end of first top id div -->

                                        <!--  start of the second and main menu -->

    <div id="navbar" class="navbar navbar-default">  

        <div class="container"> 
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand home">
                    <!--<img src="images/ecom-store-logo.png" alt="M-Dev-Store Logo" class="hidden-xs">-->
                    <!--<img src="images/ecom-store-logo-mobile.png" alt="M-Dev-Store Logo Mobile " class="visible-xs">-->
                </a>
                <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                                <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle Search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="navigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav left">
                        <li>
                            <a style="color: red;" href="#">EDDYMALL</a>
                        </li>
                        <li class="<?php if($active == 'Home') echo 'active';  ?>">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="<?php if($active == 'Shop') echo 'active';  ?>">
                            <a href="shop.php">Shop</a>
                        </li>
                        <li class="<?php if($active == 'Account') echo 'active';  ?>">
                            <?php

                            if (!@isset($_SESSION["customer_name"])) {
                                # code...
                                echo "<a href='checkout.php'>My Account</a>";
                            }else{

                                echo "<a href='customer/my_account.php?my_orders'>My Account</a>";
                            }
                            
                            ?>
                        </li>
                        <li class="<?php if($active == 'Cart') echo 'active';  ?>">
                            <a href="cart.php">Shopping Cart</a>
                        </li>
                        <li class="<?php if($active == 'Contact') echo 'active';  ?>">
                            <a href="contact.php">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <a href="cart.php" class="btn navbar-btn btn-primary right">
                    <i class="fa fa-shopping-cart"></i>
                    <span><?php items(); ?> Items In Your Cart</span>
                </a>
                <div class="navbar-collapse collapse right">
                    <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <div class="collapse clear-fix" id="search">
                    <form method="get" action="results.php" class="navbar-form">
                        <div class="input-group">
                            <input type="text" name="user_query" class="form-control" placeholder="Search" required="">
                            <span class="input-group-btn">
                                <button type="submit" name="search" value="Search" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

                                         <!--  end of the second and main menu -->

                                         


    <?php


        if (isset($_SESSION["ID"])) {
            # code...

        $customer_id = $_SESSION["ID"];    

        $query = "SELECT * FROM customers where customer_id='$customer_id'";
        $results = mysqli_query($con, $query) or die(mysql_error());
        $row = mysqli_fetch_array($results);


            $first_name = $row["first_name"];
            $last_name = $row["last_name"];
            $email_address = $row["email_address"];
            $country = $row["country"];
            $city = $row["city"];
            $state = $row["state"];
            $contact = $row["contact"];
            $address = $row["address"];
            $zipcode = $row["zipcode"];
            
            
            $_SESSION["first_name"] = $first_name; 
            $_SESSION["last_name"] = $last_name;
            $_SESSION["email_address"] = $email_address;
            $_SESSION["country"] = $country; 
            $_SESSION["city"] = $city;
            $_SESSION["state"] = $state; 
            $_SESSION["contact"] = $contact; 
            $_SESSION["address"] = $address; 
            $_SESSION["zipcode"] = $zipcode; 
            

    ?>    

    <div id="content" style="padding-left: 25px !important;">
        <div class="container-fluid">
            <div class="col-md-12"> 
                <ul class="breadcrumb"> 
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        Cart
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">    
          <div class="row" style="margin-top: 5%; margin-bottom: 5%; box-shadow: 0 0 25px 0 gray;" >
            <div class="col-sm-8" style="box-shadow: 0 0 15px 0 lightgray;" >
              <div class="card">
                <h3 class="card-title text-center">Customer Details</h3>
                <div class="card-body" style="margin-top: 2%; margin-bottom: 2%;">
                  <form action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                          <label>Customer Firstname:</label>
                          <input type="text" class="form-control" value="<?php echo $first_name; ?>" name="c_name" required="">
                      </div>
                      <div class="form-group">
                          <label>Customer Lastname:</label>
                          <input type="text" class="form-control" value="<?php echo $last_name; ?>" name="c_name" required="">
                      </div>
                      <div class="form-group">
                          <label>Customer Email:</label>
                          <input type="text" class="form-control" value="<?php echo $email_address; ?>" name="c_email" required="">
                      </div>
                      <div class="form-group">
                          <label>Customer Country:</label>
                          <input type="text" class="form-control" value="<?php echo $country; ?>" name="c_country" required="">
                      </div>
                      <div class="form-group">
                          <label>Customer City:</label>
                          <input type="text" class="form-control" value="<?php echo $city; ?>" name="c_city" required="">
                      </div>
                      <div class="form-group">
                          <label>Customer Contact:</label>
                          <input type="text" class="form-control" value="<?php echo $contact; ?>" name="c_contact" required="">
                      </div>
                      <div class="form-group">
                          <label>Customer Address:</label>
                          <input type="text" class="form-control" value="<?php echo $address; ?>" name="c_address" required="">
                      </div>
                      <div class="form-group">
                          <label>Customer Zipcode:</label>
                          <input type="text" class="form-control" value="<?php echo $zipcode; ?>" name="c_address" required="">
                      </div>
                      <div class="text-center">
                          <button type="submit" name="update" class="btn btn-primary" style=" box-shadow: 0 2px 5px rgba(0,0,0,0.3);">
                              <i class="fa fa-user-md"></i> Update Details
                          </button>
                      </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-sm-4" style="box-shadow: 0 0 15px 0 lightgray;">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title text-center">Items</h3>
                  <ul class='order-list' style="margin-top: 5%; margin-bottom: 5%;">

                      <?php
                      
                           $sess = session_id();
                           $ip_add = getRealIpUser();
                           $select_cart = "SELECT * FROM cart WHERE ip_add='$ip_add' AND session_id='$sess'";
                           $run_cart = mysqli_query($con, $select_cart);
                           $count = mysqli_num_rows($run_cart);
                           $total = 0;

                           while ($row_cart = mysqli_fetch_array($run_cart)) {
                               # code...

                               $pro_id = $row_cart["p_id"];
                               $pro_size = $row_cart["size"];
                               $pro_qty = $row_cart["qty"];

                               $get_products = "SELECT * FROM product WHERE product_id='$pro_id'";
                               $run_products = mysqli_query($con, $get_products);

                               while ($row_products = mysqli_fetch_array($run_products)) {
                                   # code...

                                   $product_title = $row_products["product_title"];
                                   $product_img1 = $row_products["product_img1"];
                                   $only_price = $row_products["product_price"];
                                   $sub_total = $row_products["product_price"] * $pro_qty;
                                   $total += $sub_total;
                                   $_SESSION["price"] = $total;


                      ?>
                                  <li style="display: inline-block;">
                                      <img width="100" height="100" src='admin_area/product_images/<?php echo $product_img1; ?>'>
                                      <h5><?php echo $product_title; ?></h5><h5>$ <?php echo $pro_qty * $only_price; ?></h5>
                                  </li>


                                  <?php

                              }
                          }

                          ?>
                  </ul>

                      <div id="order-summary" class="box">
                          <div class="box-header">
                              <h3>Order Summary</h3>
                          </div>
                          <p class="text-muted">
                              Shipping and additional costs are calculated based on value you have entered 
                          </p>
                          <div class="table-responsive">
                              <table class="table">
                                  <tbody>
                                      <tr>
                                          <td>Order All Sub-total</td>
                                          <th>$<?php echo $total; ?></th>
                                      </tr>
                                      <tr>
                                          <td>Shipping and Handling</td>
                                          <th>$0</th>
                                      </tr>
                                      <tr>
                                          <td>Tax</td>
                                          <th>$0</th>
                                      </tr>
                                      <tr class="total">
                                          <td>Total</td>
                                          <th>$<?php echo $total; ?></th>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                
                      <form method="post" action="" style="margin-top: 5%; margin-bottom: 5%;">
                        <input type="hidden" name="total" value="100">
                        <input type="text" name="number" class="form-control" style="width: 200px; float: left;  box-shadow: 0 2px 5px rgba(0,0,0,0.3);" placeholder="TEL: XXX XXX XXX" required="">
                        <input type="submit" name="submit" value="Purchase" class="btn btn-primary mb-2" style=" box-shadow: 0 2px 5px rgba(0,0,0,0.3);">
                      </form>

                
                </div>
              </div>
            </div>
          </div>

        </div>
    </div> 



                                         <!--  start of footer -->
    
    <?php

      }else{
        ?>
            

            <div id="cart" class="col-md-12">
                <div class="box">
                  <h1 style="">Not Logged in Yet</h1>
                  <p>
                  You are currently not logged into our system.<br>
                  You can do purchasing or checkout only if you are logged in.<br>
                  If you have already registered,
                  <a href="checkout.php">click here</a> to login, or if would like to create an
                  account, <a href="customer_register.php">click here</a> to register.
                  </p>
                </div>
            </div>
        <?php
      }

    ?> 
<?php

include("includes/footer.php");

?>

                                         <!--  end of footer -->                                         


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>  
     <script src="js/checkout_form.js"></script>  
</body>
</html>


