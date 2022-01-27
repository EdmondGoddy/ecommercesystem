<?php
$active = "Cart";
include("includes/header.php");


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

?>


    <div class="content">
        <div class="container">  
            <div class="col-md-12"> 
                <ul class="breadcrumb"> 
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        Shipping Details
                    </li>
                </ul>
            </div>

            <div id="cart" class="col-md-9">
                <div class="box">
                    <form action="" method="post" enctype="multipart/form-data">
                        <center>               
                            <h1>Confirm Shipping Details</h1>
                        </center>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>

                                    <tr>
                                        <td style="float: left;">
                                            <label>First Name</label>
                                            <input type="text" name="first_name" class="form-control" value=" <?php echo $first_name; ?> " style="width: 300px;">
                                        </td>

                                        <td style="float: right;">
                                            <label>Last Name</label>
                                            <input type="text" name="last_name" class="form-control" value=" <?php echo $last_name; ?> " style="width: 300px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="float: none;">
                                            <label>Country</label>
                                            <input type="text" name="country" class="form-control" value=" <?php echo $country; ?> " style="width: ;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="">
                                            <label>Street Address</label>
                                            <input type="text" name="address" class="form-control" value=" <?php echo $address; ?> " style="width: ;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="">
                                            <label>Town/City</label>
                                            <input type="text" name="city" class="form-control" value=" <?php echo $city; ?> " style="width: ;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="">
                                            <label>State</label>
                                            <input type="text" name="state" class="form-control" value=" <?php echo $state; ?> " style="width: ;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="">
                                            <label>Postal/Zip Code</label>
                                            <input type="text" name="zipcode" class="form-control" value=" <?php echo $zipcode; ?> " style="width: ;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="float: left;">
                                            <label>Phone Number</label>
                                            <input type="text" name="contact" class="form-control" value=" <?php echo $contact; ?> " style="width: 300px;">
                                        </td>

                                        <td style="float: right;">
                                            <label>Email</label>
                                            <input type="text" name="email_address" class="form-control" value=" <?php echo $email_address; ?> " style="width: 300px;">
                                        </td>
                                    </tr>

                                </tbody>
                                
                                <tfoot>
                                    <tr>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="box-footer">
                            <div class="pull-left">
                                <button type="submit" name="update" value="Update" class="btn btn-default">
                                    <i class="fa fa-refresh"></i> Update Details
                                </button> 
                            </div>
                            <div class="pull-right">
                                <a href="checkout_form.php" class="btn btn-primary">
                                    Proceed Checkout <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                
                <?php // START OF UPDATE CART FUNCTION ?>

                <?php


                    // if (isset($_POST["update"])) {
                    //     # code...

                    //     $first_name = $_POST["first_name"];
                    //     $last_name = $_POST["last_name"];
                    //     $email_address = $_POST["email_address"];
                    //     $country = $_POST["country"];
                    //     $city = $_POST["city"];
                    //     $state = $_POST["state"];
                    //     $contact = $_POST["contact"];
                    //     $address = $_POST["address"];
                    //     $zipcode = $_POST["zipcode"];


                    //         $update_product = "UPDATE customers SET email_address='$email_address', first_name='$first_name', last_name='$last_name', address='$address', city='$city', state='$state', zipcode='$zipcode', country='$country', contact='$contact' WHERE customer_id='$customer_id' ";

                    //         $run_update = mysqli_query($con, $update_product);

                    //         if ($run_update) {
                    //             # code...

                    //             echo "<script> alert('Shipping Details Updated'); </script>";
                    //         }
                        
                    // }
                
                ?>


                <?php

                function update_cart(){

                    global $con;

                    if (isset($_POST["update"])) {
                        # code...
                        $first_name = $_POST["first_name"];
                        $last_name = $_POST["last_name"];
                        $email_address = $_POST["email_address"];
                        $country = $_POST["country"];
                        $city = $_POST["city"];
                        $state = $_POST["state"];
                        $contact = $_POST["contact"];
                        $address = $_POST["address"];
                        $zipcode = $_POST["zipcode"];


                            $update_product = "UPDATE customers SET email_address='$email_address', first_name='$first_name', last_name='$last_name', address='$address', city='$city', state='$state', zipcode='$zipcode', country='$country', contact='$contact' WHERE customer_id='$customer_id' ";
                            $run_update = mysqli_query($con, $update_product);

                            if ($run_update) {
                                # code...

                                echo "<script> alert('Shipping Details Updated'); </script>";
                            }
                        
                    }
                }

                echo @$up_cart = update_cart();

                ?>


            </div>
        </div>
    </div>


                                         <!--  start of footer -->

<?php

include("includes/footer.php");


}else{
   /* echo "<script> 

        var Entity = document.getElementById('Err');
        Entity.style.display = 'block';


     </script>"; */
?>
<!--

<script type="text/javascript">
    document.getElementById("Err").style.display = "block";
</script>

-->

<div class="container" id="Err" style="color: white !important;">
    <div class="col-md-12">
<h1 style="color: white !important;">Not Logged in Yet</h1>
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

                                         <!--  end of footer -->


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>  
</body>
</html>


