
<!--  CODE STILL NEEDS EDITING  -->

<?php
require_once("lib/Twocheckout.php");
Twocheckout::privateKey('A4D347E7-791E-4562-8D0F-1A9165F0F878');
Twocheckout::sellerId('251493296933');


$active = "Cart";

session_start();

include("includes/db.php"); 
include("functions/functions.php");


// START OF PHP CODE FOR HEADER 

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
    <link href="styles/checkout_style.css" rel="stylesheet">

    <title>E-commerce System</title>


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
                    <img src="images/ecom-store-logo.png" alt="M-Dev-Store Logo" class="hidden-xs">
                    <img src="images/ecom-store-logo-mobile.png" alt="M-Dev-Store Logo Mobile " class="visible-xs">
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

//if (isset($_SESSION['ID'])){




//}



        $customer_id = $_SESSION["ID"];    

        $query = "SELECT * FROM customers where customer_id='$customer_id'";
        $results = mysqli_query($con, $query) or die(mysql_error());
        $row = mysqli_fetch_array($results);


            $first_name = $row["first_name"];
            $last_name = $row["last_name"];
            $full_name = $first_name." ".$last_name;
            $email_address = $row["email_address"];
            $country = $row["country"];
            $city = $row["city"];
            $state = $row["state"];
            $contact = $row["contact"];
            $address = $row["address"];
            $zipcode = $row["zipcode"];

            $today = date("Y-m-d");
            $sess = session_id();
            $ip_add = getRealIpUser();
           // $total_price = $_POST["price"];
            $total = $_SESSION["price"];

       /* $sql = "INSERT INTO orders ( order_date, customer_name, email_address, shipping_address, shipping_city, shipping_state, shipping_country, shipping_zipcode) VALUES ('$today', '$full_name', '$email_address', '$address', '$city', '$state', '$country', '$zipcode')";
        $results = mysqli_query($con, $sql); */

        $orderid = mysql_insert_id(); // HOW TO GET merchantOrderId


try {
    $charge = Twocheckout_Charge::auth(array(
        "merchantOrderId" => "$orderid",
        "token"      => $_POST['token'],
        "currency"   => 'USD',
        "total"      => '$total_price',
        "billingAddr" => array(
            "name" => '$full_name',
            "addrLine1" => '$address',
            "city" => '$city',
            "state" => '$state',
            "zipCode" => '$zipcode',
            "country" => '$country',
            "email" => '$email_address',
            "phoneNumber" => '$contact'
        )
    ));

    if ($charge['response']['responseCode'] == 'APPROVED') {
        echo "Thanks for your Order!";
       // echo "Please, remember your Order number is $orderid<br>";
        echo "<h3>Return Parameters:</h3>";
        echo "<pre>";
        print_r($charge);
        echo "</pre>";
       /* $query = "SELECT * FROM cart WHERE ip_add='$ip_add' AND session_id='$sess'";
        $results = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($results)) {

            $product_id = $row["p_id"];
            $order_date = $row["order_date"];
            $item_name = $row["item_name"];
            $quantity = $row["qty"];
           // $price = $row["price"];


            $sql2 = "INSERT INTO orders_details (customer_id, product_id, order_date, item_name, quantity, price) VALUES ('$customer_id', '$product_id', '$order_date', '$item_name', '$quantity', '$price')";
            $insert = mysqli_query($con, $sql2) or die(mysql_error());
        }


        $query = "DELETE FROM cart WHERE ip_add='$ip_add' AND session_id='$sess'";
        $delete = mysqli_query($con, $query) or die(mysql_error());
        session_destroy(); */



    }
} catch (Twocheckout_Error $e) { 
    print_r($e->getMessage());
  }


?>



<!--


      <div id='paid' class='paid'>
        <svg id='icon-paid' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 310.277 310.277" style="enable-background:new 0 0 310.277 310.277;" xml:space="preserve" width="180px" height="180px">
        <g> <path d="M155.139,0C69.598,0,0,69.598,0,155.139c0,85.547,69.598,155.139,155.139,155.139   c85.547,0,155.139-69.592,155.139-155.139C310.277,69.598,240.686,0,155.139,0z M144.177,196.567L90.571,142.96l8.437-8.437   l45.169,45.169l81.34-81.34l8.437,8.437L144.177,196.567z" fill="#3ac569"/>
        </g></svg>
        <h2>Your payment was completed.</h2>
        <h2>Thank you!</h2>
      </div>
    </div>

    <div class='icon-credits'>Outlined icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> & <a href="http://www.flaticon.com/authors/abhimanyu-rana" title="Abhimanyu Rana">Abhimanyu Rana</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>

    -->