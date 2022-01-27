<?php
$active = "Account";
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
    					Login
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

            if (!isset($_SESSION["customer_name"])) {
                # code...

                include("customer/customer_login.php");

            }else{
                
                include("payment_options.php");
                
            }

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
