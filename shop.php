<?php
$active = 'Shop';
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
    					Shop
    				</li>
    			</ul>
    		</div>
    		<div  class="col-md-3">

    			                       <!--  start of sidebar -->
<?php

include("includes/sidebar.php");
            
?>    		
                                       <!--  end of sidebar -->	
    		</div>
    		<div class="col-md-9">

<?php

if (!isset($_GET["p_cat"])) {
    # code...

    if (!isset($_GET["cat"])) {

        echo "


    			        <div class='box'>
    				        <h1>Shop</h1>
    				        <p>
 When you enter a fully qualified domain name such as www.microsoft.com in a browser address bar, that name is translated into an IP address followed by a port number.
    				        </p>
    			        </div>

        ";
    }    

}

?>                 
    			<div class="row">
<?php
if (!isset($_GET["p_cat"])) {
    # code...

    if (!isset($_GET["cat"])) {
        # code...

        $per_page = 6;
        if (isset($_GET["page"])) {
            # code...
            $page = $_GET["page"];
        }else{

            $page = 1;

            }

            $start_from = ($page-1) * $per_page;

            $get_products = "SELECT * FROM product order by 1 DESC LIMIT $start_from,$per_page";
            $run_products = mysqli_query($con, $get_products);

            while ($row_products = mysqli_fetch_array($run_products)) {
                # code...

                $pro_id = $row_products["product_id"];
                $pro_title = $row_products["product_title"];
                $pro_price = $row_products["product_price"];
                $pro_img1 = $row_products["product_img1"];

                echo "

<div class='col-md-4 col-sm-6 center-responsive'>
    <div class='product'>

        <a href='details.php?pro_id=$pro_id'>
           <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
        </a>

        <div class='text'>

            <h3>
               <a href='details.php?pro_id=$pro_id'>$pro_title</a>
            </h3>

            <p class='price'> 
               $ $pro_price
            </p> 

            <p class='buttons'>
            <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
               View Details
            </a>

            <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
               <i class='fa fa-shopping-cart'></i> Add to Cart
            </a>
            </p>

        </div>

    </div>
</div>
                ";


        }

?>

    			</div> <!--  end of row -->
    			<center>
    				<ul class="pagination">

<?php

$query = "SELECT * FROM product";
$result = mysqli_query($con, $query);

$total_records = mysqli_num_rows($result);
$total_pages = ceil($total_records / $per_page);

echo "

<li>
   <a href='shop.php?page=1'>First Page</a>
</li>

";

    for ($i=1; $i <=$total_pages ; $i++) { 
        # code...

        echo "

<li>
   <a href='shop.php?page=$i'>$i</a>
</li>

    ";
        }

    echo "

<li>
   <a href='shop.php?page=$total_pages'>Last Page</a>
</li>

"; 
     

    }
}

?>

    				</ul>
    			</center>
                    
<?php

getpcatpro();

getcatpro();

?>

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






