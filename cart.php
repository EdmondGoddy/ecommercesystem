<?php
$active = "Cart";
include("includes/header.php");

?>
    
    <div id="content">
        <div class="container">
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
            <div id="cart" class="col-md-9">
                <div class="box">
                    <form action="cart.php" method="post" enctype="multipart/form-data">
                        <h1>Shopping Cart</h1>

                        <?php
                         
                         $sess = session_id();
                         $ip_add = getRealIpUser();
                         $select_cart = "SELECT * FROM cart WHERE ip_add='$ip_add' AND session_id='$sess'";
                         $run_cart = mysqli_query($con, $select_cart);
                         $count = mysqli_num_rows($run_cart);

                        ?>
                        <p class="text-muted">You currently have <?php echo $count;  ?> item(s) in your cart</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Quantity</th>
                                        <th>Unit price</th>
                                        <th>Size</th>
                                        <th colspan="1">Check</th>
                                        <th colspan="2">Sub-Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    
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
                

                                    ?>
                                    <tr>
                                        <td>
                                            <img src="admin_area/product_images/<?php echo $product_img1; ?>" alt="Product 3" class="img-responsive">
                                        </td>
                                        <td>
                                            <a href="details.php?pro_id=<?php echo $pro_id ?>"><?php echo $product_title; ?></a>
                                        </td>
                                        <td>
                                            <input type="text" name="qty" class="form-control"  value=" <?php echo $pro_qty; ?> "> 
                                        </td>
                                        <td>
                                            <?php echo $only_price; ?>
                                        </td>
                                        <td>
                                            <input type="text" name="size" class="form-control" value=" <?php echo $pro_size; ?> " style="width: 80px;"> 
                                        </td>
                                        <td>
                                            <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
                                        </td>
                                        <td>
                                            <?php echo $sub_total; ?>
                                        </td>
                                    </tr>

                                    <?php

                                        }
                                    }

                                    ?>
                                </tbody>
                                
                                <tfoot>
                                    <tr>
                                        <th colspan="5">Total</th>
                                        <th colspan="2"><?php echo "$ " . $total; ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="index.php" class="btn btn-default">
                                    <i class="fa fa-chevron-left"></i> Continue Shopping
                                </a>
                                <button type="submit" name="update" value="Update Cart" class="btn btn-default">
                                    <i class="fa fa-refresh"></i> Update Cart
                                </button> 
                            </div>
                            <div class="pull-right">
                                <button type="submit" name="delete" value="Update Cart" class="btn btn-default">
                                    <i class="fa fa-trash"></i> Delete Cart
                                </button>
                                <a href="checkout_details.php" class="btn btn-primary">
                                    Proceed Checkout <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                
                <?php // START OF UPDATE CART FUNCTION ?>

                <?php

                function update_cart(){

                    global $con;

                    if (isset($_POST["update"])) {
                        # code...
                        $qty = $_POST["qty"];
                        $size = $_POST["size"];

                        foreach ($_POST["remove"] as $remove_id) {
                            # code...

                            $delete_product = "UPDATE cart SET qty='$qty', size='$size' WHERE p_id='$remove_id'";
                            $run_delete = mysqli_query($con, $delete_product);

                            if ($run_delete) {
                                # code...

                                echo "<script> window.open('cart.php', '_self') </script>";
                            }
                        }
                    }
                }

                echo @$up_cart = update_cart();

                ?>

                <?php // END OF UPDATE CART FUNCTION ?>

                
                <?php // START OF DELETE CART FUNCTION ?>

                <?php

                function delete_cart(){

                    global $con;

                    if (isset($_POST["delete"])) {
                        # code...

                        foreach ($_POST["remove"] as $remove_id) {
                            # code...

                            $delete_product = "DELETE FROM cart WHERE p_id='$remove_id'";
                            $run_delete = mysqli_query($con, $delete_product);

                            if ($run_delete) {
                                # code...

                                echo "<script> window.open('cart.php', '_self') </script>";
                            }
                        }
                    }
                }

                echo @$del_cart = delete_cart();

                ?>

                <?php // END OF DELETE CART FUNCTION ?>

                <div id="row same-heigh-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height headline">
                            <h3 class="text-center">Products You May Like</h3>
                        </div>
                    </div>

                    <?php

                    $get_products = "SELECT * FROM Product ORDER BY RAND() LIMIT 0,3";
                    $run_products = mysqli_query($con, $get_products) or die(mysqli_error($con));

                    while ($row_products = mysqli_fetch_array($run_products)) {
                        # code...
                        $pro_id = $row_products["product_id"];
                        $pro_title = $row_products["product_title"];
                        $pro_price = $row_products["product_price"];
                        $pro_img1 = $row_products["product_img1"];

                        echo "

                    <div class='col-md-3 col-sm-6 center-responsive'>
                        <div class='product same-height'>
                            <a href='details.php?pro_id=$pro_id'>
                                <img class='img-responsive' src='admin_area/product_images/$pro_img1' alt='product 6'>
                            </a>
                            <div class='text'>
                                <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                                <p class='price'>$ $pro_price</p>
                            </div>
                        </div>
                    </div>


                        ";
                    }

                    ?>
                </div>
            </div>
            <div class="col-md-3">
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
            </div>
        </div>
    </div>


                                         <!--  start of footer -->

<?php

include("includes/footer.php");

?>

                                         <!--  end of footer -->


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>  
</body>
</html>