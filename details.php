<?php
$active = "Details";
include("includes/header.php");

?>


<?php

/*

if (isset($_GET["pro_id"])) {
    # code...

    $product_id = $_GET["pro_id"];

    $get_product = "SELECT * FROM products WHERE product_id='$product_id'";
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

*/

?>

    <div id="content">
    	<div class="container">
    		<div class="col-md-12"> 
    			<ul class="breadcrumb"> 
    				<li>
    					<a href="index.php">Home</a>
    				</li>
    				<li>
    					Shop
    				</li>
                    <li>
                        <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"> <?php echo $p_cat_title; ?> </a>
                    </li>
                    <li> <?php echo $pro_title;  ?> </li>
    			</ul>
    		</div>   

                                    <!--  start of sidebar -->

    		<div  class="col-md-3">

<?php

include("includes/sidebar.php");

?>    		
                                       	                   
    		
    		</div>
                                      <!--  end of sidebar -->


                                      <!--  start of Carousel Slider -->

            <div class="col-md-9">
                <div id="productMain" class="row">
                    <div class="col-sm-6">
                        <div id="mainImage">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                   <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                   <li data-target="#myCarousel" data-slide-to="1"></li>
                                   <li data-target="#myCarousel" data-slide-to="2"></li> 
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 1"></center>
                                    </div>
                                    <div class="item">
                                        <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Product 2"></center>
                                    </div>
                                    <div class="item">
                                        <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Product 3"></center>
                                    </div>
                                </div>
                                <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a href="#myCarousel" class="right carousel-control" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="box">
                            <h1 class="text-center"> <?php echo $pro_title; ?> </h1>

<?php

add_cart();

?>

                            <form action="" class="form-horizontal" method="post" onsubmit="return validate(this);">
                                <div class="form-group">
                                    <label for="" class="col-md-5 control-label">Products Quantity</label>
                                    <div class="col-md-7">
                                        <select name="product_qty" id="" class="form-control" required="">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Product Size</label>
                                    <div class="col-md-7">
                                        <select name="product_size" id="opt" class="form-control" required oninvalid="setCustomValidity('Must choose a size for the product')">
                                            <option disabled="" selected="">Select a Size</option>
                                            <option>Small</option>
                                            <option>Medium</option>
                                            <option>Large</option>
                                        </select>
                                        <div id="check"></div>
                                    </div>
                                </div>
                                <input type="hidden" name="price" value="<?php echo  $pro_price; ?>">
                                <p class="price"> $ <?php echo  $pro_price; ?> </p>
                                <p class="text-center buttons">
                                    <button type="submit" class="btn btn-primary i fa fa-shopping-cart" name="cart"> Add to cart</button>
                                </p>
                            </form>
                        </div>
                        <div class="row" id="thumbs">
                            <div class="col-xs-4">
                                <a data-target="#myCarousel" data-slide-to="0" href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 1" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a data-target="#myCarousel" data-slide-to="1" href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Product 2" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a data-target="#myCarousel" data-slide-to="2" href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo $pro_img3; ?>" alt="Product 3" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box" id="details">
                    <h4>product Details</h4>
                    <p>
                      <?php echo  $pro_desc; ?>            
                    </p>
                    <h4>Size</h4>
                    <ul>
                        <li>Small</li>
                        <li>Medium</li>
                        <li>Large</li>
                    </ul>
                    <hr>
                </div>
                <div id="row same-heigh-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height headline">
                            <h3 class="text-center">Products You May Like</h3>
                        </div>
                    </div>
                    
<?php

$get_product = "SELECT * FROM product ORDER BY rand() DESC LIMIT 0,6";
$run_products = mysqli_query($con, $get_product);

while ($row_product = mysqli_fetch_array($run_products)) {
    # code...
    $pro_id = $row_product["product_id"];
    $pro_title = $row_product["product_title"];
    $pro_img1 = $row_product["product_img1"];
    $pro_price = $row_product["product_price"];

    echo "

<div class='col-md-3 col-sm-6 center-resposive'>
    <div class='product same-height'>
         <a href='details.php?pro_id=$pro_id'>
             <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
         </a>
         <div class='text'>
             <h3> <a href='details.php?product_id=$pro_id'> $pro_title </a> </h3>
             <p class='price'> $ $pro_price </p>
         </div>
    </div>
</div>

    ";
}

?>

                </div>
            </div>

                                        <!--  end of Carousel Slider -->

    	</div>
    </div>


                                         <!--  start of footer  -->

<?php

include("includes/footer.php");

?>

                                         <!--  end of footer -->


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>  
    <script type="text/javascript">

        function validate(userForm){

            var content = document.getElementById("opt");
            var checks = document.getElementById("check");
            checks.style.color = "red";

            if (content.value == "" || content.value == "Select a Size") {

                checks.innerHTML = "You must Select a Size";
                return false;
            }

            return true;
        }
        
    </script>
</body>
</html>