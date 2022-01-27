<?php

if(!isset($_SESSION["admin_email"])){
	
	echo "<script> window.open('login.php', '_self'); </script>";
}else{

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insert Products</title>
</head>
<body>
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li class="active">
					<i class="fa fa-dashboard"></i> Dashboard / Insert Products
				</li>
			</ol>
		</div>
	</div><!--  END OF ROW  -->

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-money fa-fw"></i> Insert Product
					</h3>
				</div>
				<div class="panel-body">
					<form method="post" class="form-horizontal" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-3 control-label">Product Title</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="product_title" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Category</label>
							<div class="col-md-6">
								<select class="form-control" name="product_cat" required="">
									<option>Select a Category Product</option>

<?php

$query = "SELECT * FROM product_categories";
$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($result)) {
	# code...
	$id = $row["p_cat_id"];
	$product_title = $row["p_cat_title"];
?>

                                    <option value="<?php echo $id ?>"><?php echo $product_title ?></option>
<?php
}

?>									
								</select> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Category</label>
							<div class="col-md-6">
								<select class="form-control" name="cat" required="">
									<option>Select a Category</option>

<?php

$query_cat = "SELECT * FROM categories";
$result_cat = mysqli_query($con, $query_cat);

while ($row = mysqli_fetch_array($result_cat)) {
	# code...
	$id = $row["cat_id"];
	$cat_title = $row["cat_title"];
?>

                                    <option value="<?php echo $id ?>"><?php echo $cat_title ?></option>
<?php
}

?>									
								</select> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Image 1</label>
							<div class="col-md-6">
								<input type="file" class="form-control" name="product_image1" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Image 2</label>
							<div class="col-md-6">
								<input type="file" class="form-control" name="product_image2" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Image 3</label>
							<div class="col-md-6">
								<input type="file" class="form-control" name="product_image3" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Price</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="product_price" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Keywords</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="product_keywords" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Description</label>
							<div class="col-md-6">
								<textarea class="form-control" name="product_desc" cols="19" rows="6" required=""></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<input type="submit" value="Insert Product" class="btn btn-primary form-control" name="submit">
							</div>
						</div>
					</form>
				</div><!--  END OF PANEL-BODY  -->
			</div><!--  END OF PANEL PANEL-DEFAULT  -->
		</div><!--  END OF COL-LG-12  -->
	</div><!--  END OF ROW  -->

 
     <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
     <script type="text/javascript">tinymce.init({selector:'textarea'});</script> 
</body>
</html>


<?php

if (isset($_POST["submit"])) {
	# code...

	$product_title = $_POST["product_title"];
	$product_cat = $_POST["product_cat"];
	$cat = $_POST["cat"];
	$product_price = $_POST["product_price"];
	$product_keywords = $_POST["product_keywords"];
	$product_desc = $_POST["product_desc"];

/*         *************  METHOD ONE FOR FILES  ****************    */

	$product_img1 = $_FILES['product_image1']['name'];
	$product_img2 = $_FILES['product_image2']['name'];
	$product_img3 = $_FILES['product_image3']['name'];


	$temp_name1 = $_FILES['product_image1']['tmp_name'];
	$temp_name2 = $_FILES['product_image2']['tmp_name'];
	$temp_name3 = $_FILES['product_image3']['tmp_name'];

/**********************************************************         */


    

	move_uploaded_file($temp_name1, "product_images/$product_img1");
	move_uploaded_file($temp_name2, "product_images/$product_img2");
	move_uploaded_file($temp_name3, "product_images/$product_img3");

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



	$insert_product = "INSERT INTO products (p_cat_id, cat_id, date, product_title, product_img1, product_img2, product_img3, product_price, product_keywords, product_desc) VALUES ('$product_cat', '$cat', NOW(), '$product_title', '$product_img1', '$product_img2', '$product_img3', '$product_price', '$product_keywords', '$product_desc')";

	$run_product = mysqli_query($con, $insert_product) or die(mysqli_error($con));

	if ($run_product) {
		# code...
		echo "<script>alert('product has been inserted successfully')</script>";
		echo "<script>window.open('index.php?view_products', '_self')</script>"; 

		//echo "trueeeeeeeeeeeeeeeeee";
	}


}

//'$product_cat', '$cat', NOW(), '$product_title', '$product_img1', '$product_img2', '$product_img3', '$product_price', '$product_keywords', '$product_desc'

// this just gives information about Shoes

?>


<?php }  ?>