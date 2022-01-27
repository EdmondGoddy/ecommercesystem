
<?php

/* MAY INCLUDE THIS CODE

if(!isset($_SESSION["admin_email"])){
	
	echo "<script> window.open('login.php', '_self'); </script>";
}else{
	
*/

?>


<?php

if (isset($_GET["edit_product"])) {
	# code...

	$edit_id = $_GET["edit_product"];

	$get_p = "SELECT * FROM products WHERE product_id='$edit_id' ";
	$run_edit = mysqli_query($con, $get_p);

	$row_edit = mysqli_fetch_array($run_edit);
	$p_id = $row_edit["product_id"];
	$p_title = $row_edit["product_title"];
	$p_cat = $row_edit["p_cat_id"];
	$cat = $row_edit["cat_id"];
	$p_image1 = $row_edit["product_img1"];
	$p_image2 = $row_edit["product_img2"];
	$p_image3 = $row_edit["product_img3"];
	$p_price = $row_edit["product_price"];
	$p_keywords = $row_edit["product_keywords"];
	$p_desc = $row_edit["product_desc"];

}

    $get_p_cat = "SELECT * FROM product_categories WHERE p_cat_id='$p_cat' ";
    $run_p_cat = mysqli_query($con, $get_p_cat);

    $row_p_cat = mysqli_fetch_array($run_p_cat);
    $p_cat_title = $row_p_cat["p_cat_title"];
    


    $get_cat = "SELECT * FROM categories WHERE cat_id='$cat' ";
    $run_cat = mysqli_query($con, $get_cat);

    $row_cat = mysqli_fetch_array($run_cat);
    $cat_title = $row_cat["cat_title"];


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
					<i class="fa fa-dashboard"></i> Dashboard / Edit Products
				</li>
			</ol>
		</div>
	</div><!--  END OF ROW  -->

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-money fa-fw"></i> Edit Product
					</h3>
				</div>
				<div class="panel-body">
					<form method="post" class="form-horizontal" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-3 control-label">Product Title</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="product_title" required="" value="<?php echo $p_title; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Category</label>
							<div class="col-md-6">
								<select class="form-control" name="product_cat" required="">
									<option value="<?php echo $p_cat; ?>"><?php echo $p_cat_title; ?></option>

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
									<option value="<?php echo $cat; ?>"> <?php echo $cat_title; ?> </option>

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
								<input type="file" class="form-control" name="product_image1" required=""> <br>
								<img width="70" height="70" src="product_images/<?php echo $p_image1; ?>" alt="<?php echo $p_image1; ?>">

							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Image 2</label>
							<div class="col-md-6">
								<input type="file" class="form-control" name="product_image2" required=""><br>
								<img width="70" height="70" src="product_images/<?php echo $p_image2; ?>" alt="<?php echo $p_image2; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Image 3</label>
							<div class="col-md-6">
								<input type="file" class="form-control" name="product_image3" required=""> <br>
								<img width="70" height="70" src="product_images/<?php echo $p_image3; ?>" alt="<?php echo $p_image3; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Price</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="product_price" required="" value="<?php echo $p_price; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Keywords</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="product_keywords" required="" value="<?php echo $p_keywords; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Product Description</label>
							<div class="col-md-6">
								<textarea class="form-control" name="product_desc" cols="19" rows="6" required="">
									<?php echo $p_desc; ?>
								</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<input type="submit" value="Update Product" class="btn btn-primary form-control" name="update">
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

if (isset($_POST["update"])) {
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


	$update_product = "UPDATE products SET p_cat_id='$product_cat', cat_id='$cat', date=NOW(), product_title='$product_title', product_img1='$product_img1', product_img2='$product_img2', product_img3='$product_img3', product_keywords='$product_keywords', product_desc='$product_desc' WHERE product_id='$p_id' ";
	$run_product = mysqli_query($con, $update_product);

	if ($run_product) {
		# code...

		echo "<script> alert('Product Updated Successfully') </script>";
		echo "<script> window.open('index.php?view_products', '_self') </script>";
	}




}


?>


<?php /* }  */ ?>













