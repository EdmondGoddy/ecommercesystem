<?php

if(!isset($_SESSION["admin_email"])){
	
	echo "<script> window.open('login.php', '_self'); </script>";
}else{

?>


<body>
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li class="active">
					<i class="fa fa-dashboard"></i> Dashboard / Insert Users
				</li>
			</ol>
		</div>
	</div><!--  END OF ROW  -->

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-money fa-fw"></i> Insert Users
					</h3>
				</div>
				<div class="panel-body">
					<form method="post" class="form-horizontal" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-3 control-label">User Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="admin_name" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Email</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="admin_email" required="">							
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Password</label>
							<div class="col-md-6">								
								<input type="password" class="form-control" name="admin_pass" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Country</label>
							<div class="col-md-6">								
								<input type="text" class="form-control" name="admin_country" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Contact</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="admin_contact" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Image</label>
							<div class="col-md-6">
								<input type="file" class="form-control" name="admin_image" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Job</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="admin_job" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">About</label>
							<div class="col-md-6">
								<textarea name="admin_about" class="form-control" rows="3"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<input type="submit" value="Insert User" class="btn btn-primary form-control" name="submit">
							</div>
						</div>
					</form>
				</div><!--  END OF PANEL-BODY  -->
			</div><!--  END OF PANEL PANEL-DEFAULT  -->
		</div><!--  END OF COL-LG-12  -->
	</div><!--  END OF ROW  -->

 
    


<?php

if (isset($_POST["submit"])) {
	# code...

	$user_name = $_POST["admin_name"];
	$user_email = $_POST["admin_email"];
	$user_pass = $_POST["admin_pass"];
	$user_country = $_POST["admin_country"];
	$user_contact = $_POST["admin_contact"];
	$user_job = $_POST["admin_job"];
	$user_about = $_POST["admin_about"];

/*         *************  METHOD ONE FOR FILES  ****************    */

	$user_image = $_FILES['admin_image']['name'];
	$temp_admin_image = $_FILES['admin_image']['tmp_name'];

/**********************************************************         */


    

	move_uploaded_file($temp_admin_image, "admin_images/$user_image");

/*************************************************************/


/*         *************  METHOD TWO FOR FILES  ****************

    $target = "product_images/"; //FOLDER TO HOUSE THE IMAGES
    $target_file1 = $target.basename($_FILES["product_image1"]["name"]); // IMAGE COMPLETE PATH
    $target_file2 = $target.basename($_FILES["product_image2"]["name"]); // IMAGE COMPLETE PATH
    $target_file3 = $target.basename($_FILES["product_image3"]["name"]); // IMAGE COMPLETE PATH

    
	move_uploaded_file($_FILES['product_image1']['tmp_name'], $target_file1);
	move_uploaded_file($_FILES['product_image2']['tmp_name'], $target_file2);
	move_uploaded_file($_FILES['product_image3']['tmp_name'], $target_file3);


/*************************************************************/



	$insert_user = "INSERT INTO admins (admin_name, admin_email, admin_pass, admin_country, admin_contact, admin_job, admin_image, admin_about) VALUES ('$user_name', '$user_email', '$user_pass', '$user_country', '$user_contact', '$user_job', '$user_image', '$user_about')";

	$run_user = mysqli_query($con, $insert_user) or die(mysqli_error($con));

	if ($run_user) {
		# code...
		echo "<script>alert('New Admin Added successfully')</script>";
		echo "<script>window.open('index.php?view_users', '_self')</script>"; 

		//echo "trueeeeeeeeeeeeeeeeee";
	}


}

//'$product_cat', '$cat', NOW(), '$product_title', '$product_img1', '$product_img2', '$product_img3', '$product_price', '$product_keywords', '$product_desc'

// this just gives information about Shoes

?>


<?php }  ?>