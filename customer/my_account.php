<?php 

session_start();


if (!isset($_SESSION["customer_email"])) {
    # code...

    echo "<script>window.open('../checkout.php', '_self')</Script>";
}else{

include("includes/db.php"); 
include("../functions/functions.php");

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
    <title>Shopping Here</title>
</head>
<body>
    <div id="top">  <!--  beginning of first top id div  -->

        <div class="container">  <!--  beginning of first container class div  -->

            <div class="col-md-6 offer">  <!--  beginning of first col-md-6 offer class div  -->
                <a href="#" class="btn btn-success btn-sm">
                    <?php

                    if (!isset($_SESSION["customer_name"])) {
                        # code...

                        echo "Welcome: Guest";
                    }else{

                        echo "Welcome " . @$_SESSION["customer_name"] . " ";
                    }
                    ?>
                </a>
                <a href="checkout.php"><?php items(); ?> Items in your cart | Total price: <?php  total_price()  ?></a>
            </div>  <!--  end of first col-md-6 offer class div  -->

            <div class="col-md-6">  <!--  beginning of first col-md-6 class div  -->

                <ul class="menu">  <!--  beginning of first menu class ul  -->
                    <li>
                        <a href="../customer_register.php">Register</a>
                    </li>
                    <li>
                        <a href="my_account.php">My Account</a>
                    </li>
                    <li>
                        <a href="../cart.php">Go To Cart</a>
                    </li>
                    <li>
                        <a href="../checkout.php">
                            <?php

                            if (!@isset($_SESSION["customer_name"])) {
                                # code...

                                echo "<a href='../checkout.php'> Login </a>";
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
                <a href="../index.php" class="navbar-brand home">
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
                        <li>
                            <a href="../index.php">Home</a>
                        </li>
                        <li>
                            <a href="../shop.php">Shop</a>
                        </li>
                        <li class="active">
                            <a href="my_account.php">My Account</a>
                        </li>
                        <li>
                            <a href="../details.php">Shopping Cart</a>
                        </li>
                        <li>
                            <a href="../contact.php">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <a href="../cart.php" class="btn navbar-btn btn-primary right">
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



    <div id="content">
        <div class="container">
            <div class="col-md-12"> 
                <ul class="breadcrumb"> 
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        My Account
                    </li>
                </ul>
            </div>
            <div  class="col-md-3">    <!--  start of col-md-3 -->
                                
<?php

include_once("includes/sidebar.php");

?>          
            </div>                     <!--  end of col-md-3 --> 

            <div class="col-md-9">
                <div class="box">
<?php

if(isset($_GET["my_orders"])){
    include("my_orders.php");
}

if(isset($_GET["pay_offline"])){
    include("pay_offline.php");
}

if(isset($_GET["edit_account"])){
    include("edit_account.php");
}


if(isset($_GET["change_pass"])){
    include("change_pass.php");
}

if(isset($_GET["delete_account"])){
    include("delete_account.php");
}

?>                    
                </div>
            </div>                    <!--  end of col-md-9 -->


        </div>                        <!--  end of container --> 
    </div>                            <!--  end of content -->


                                     <!--  start of footer -->

<?php

include_once("includes/footer.php");

?>

                                         <!--  end of footer -->


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>  
</body>
</html>

<?php } ?>