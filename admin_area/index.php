<?php

session_start();

include("includes/db.php");

if(!isset($_SESSION["admin_email"])){
	
	echo "<script> window.open('login.php', '_self'); </script>";
}else{

	$admin_session = $_SESSION["admin_email"];

	$get_admin = "SELECT * FROM admins WHERE admin_email='$admin_session' ";
	$run_admin = mysqli_query($con, $get_admin);

	$row_admin = mysqli_fetch_array($run_admin);
	$admin_id = $row_admin["admin_id"];
	$admin_name = $row_admin["admin_name"];
	$admin_email = $row_admin["admin_email"];
	$admin_image = $row_admin["admin_image"];
	$admin_country = $row_admin["admin_country"];
	$admin_about = $row_admin["admin_about"];
	$admin_contact = $row_admin["admin_contact"];
	$admin_job = $row_admin["admin_job"];



	$get_products = "SELECT * FROM product ";
	$run_products = mysqli_query($con, $get_products);

	$count_products = mysqli_num_rows($run_products);

	$get_customers = "SELECT * FROM customers ";
	$run_customers = mysqli_query($con, $get_customers);

	$count_customers = mysqli_num_rows($run_customers);

	$get_p_categories = "SELECT * FROM product_categories ";
	$run_p_categories = mysqli_query($con, $get_p_categories);

	$count_p_categories = mysqli_num_rows($run_p_categories);

	// $get_pending_orders = "SELECT * FROM pending_orders ";

	$get_pending_orders = "SELECT * FROM orders_details ";
	$run_pending_orders = mysqli_query($con, $get_pending_orders);

	$count_pending_orders = mysqli_num_rows($run_pending_orders);
	

?>



<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
    <link href="css/style.css" rel="stylesheet">
 
	<title>E-commerce System Admin Area</title>
</head>

<body>
	<div id="wrapper">
		<?php include("includes/sidebar.php"); ?>
		 <div id="page-wrapper">
		 	<div class="container-fluid">
		 		<?php

		 		if (isset($_GET["dashboard"])) {
		 			# code...
		 			include("dashboard.php");
		 		}

		 		if (isset($_GET["insert_product"])) {
		 			# code...

		 			include("insert_product.php");
		 		}

		 		if (isset($_GET["view_products"])) {
		 			# code...

		 			include("view_products.php");
		 		}

		 		if (isset($_GET["delete_product"])) {
		 			# code...

		 			include("delete_product.php");
		 		}

		 		if (isset($_GET["edit_product"])) {
		 			# code...

		 			include("edit_product.php");
		 		}


		 		if (isset($_GET["view_p_cats"])) {
		 			# code...

		 			include("view_p_cats.php");
		 		}

		 		
		 		if (isset($_GET["insert_p_cat"])) {
		 			# code...

		 			include("insert_p_cat.php");
		 		}


		 		if (isset($_GET["delete_p_cat"])) {
		 			# code...

		 			include("delete_p_cat.php");
		 		}


		 		if (isset($_GET["edit_p_cat"])) {
		 			# code...

		 			include("edit_p_cat.php");
		 		}


		 		if (isset($_GET["insert_cat"])) {
		 			# code...

		 			include("insert_cat.php");
		 		}


		 		if (isset($_GET["view_cats"])) {
		 			# code...

		 			include("view_cats.php");
		 		} 

		 		if (isset($_GET["edit_cat"])) {
		 			# code...

		 			include("edit_cat.php");
		 		}


		 		if (isset($_GET["delete_cat"])) {
		 			# code...

		 			include("delete_cat.php");
		 		} 


		 		if (isset($_GET["insert_slide"])) {
		 			# code...

		 			include("insert_slide.php");
		 		}


		 		if (isset($_GET["view_slides"])) {
		 			# code...

		 			include("view_slides.php");
		 		}


		 		if (isset($_GET["delete_slide"])) {
		 			# code...

		 			include("delete_slide.php");
		 		} 
		 		
		 		
		 		if (isset($_GET["edit_slide"])) {
		 			# code...

		 			include("edit_slide.php");
		 		}


		 		if (isset($_GET["insert_box"])) {
		 			# code...

		 			include("insert_box.php");
		 		} 

		 		
		 		if (isset($_GET["view_boxes"])) {
		 			# code...

		 			include("view_boxes.php");
		 		} 


		 		if (isset($_GET["delete_box"])) {
		 			# code...

		 			include("delete_box.php");
		 		} 

		 		
		 		if (isset($_GET["edit_box"])) {
		 			# code...

		 			include("edit_box.php");
		 		} 

		 		
		 		if (isset($_GET["insert_term"])) {
		 			# code...

		 			include("insert_term.php");
		 		} 


		 		if (isset($_GET["view_terms"])) {
		 			# code...

		 			include("view_terms.php");
		 		}


		 		if (isset($_GET["edit_term"])) {
		 			# code...

		 			include("edit_term.php");
		 		}  

		 		
		 		if (isset($_GET["delete_term"])) {
		 			# code...

		 			include("delete_term.php");
		 		}  


		 		if (isset($_GET["view_customers"])) {
		 			# code...

		 			include("view_customers.php");
		 		}


		 		if (isset($_GET["delete_customer"])) {
		 			# code...

		 			include("delete_customer.php");
		 		} 

		 		
		 		if (isset($_GET["view_orders"])) {
		 			# code...

		 			include("view_orders.php");
		 		}

		 		
		 		if (isset($_GET["delete_order"])) {
		 			# code...

		 			include("delete_order.php");
		 		} 


		 		if (isset($_GET["view_payments"])) {
		 			# code...

		 			include("view_payments.php");
		 		}


		 		if (isset($_GET["delete_payment"])) {
		 			# code...

		 			include("delete_payment.php");
		 		}

		 		
		 		if (isset($_GET["view_users"])) {
		 			# code...

		 			include("view_users.php");
		 		}


		 		if (isset($_GET["delete_user"])) {
		 			# code...

		 			include("delete_user.php");
		 		} 


		 		
		 		if (isset($_GET["insert_user"])) {
		 			# code...

		 			include("insert_user.php");
		 		}

		 		
		 		if (isset($_GET["user_profile"])) {
		 			# code...

		 			include("user_profile.php");
		 		} 

		 		
		 		if (isset($_GET["edit_css"])) {
		 			# code...

		 			include("edit_css.php");
		 		}



		 		
		 		




		 		?>
		 	</div>
		 </div>
	</div>



     <script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php } ?>
