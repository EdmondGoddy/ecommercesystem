
<?php

/* MAY INCLUDE THIS CODE

if(!isset($_SESSION["admin_email"])){
	
	echo "<script> window.open('login.php', '_self'); </script>";
}else{
	

*/

?>


<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Insert Category
			</li>
		</ol>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Insert Category
				</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post">
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Category Title
						</label>
						<div class="col-md-6">
							<input name="cat_title" type="text" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Category Description
						</label>
						<div class="col-md-6">
							<textarea type="text" name="cat_desc" id="" cols="30" rows="10" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							
						</label>
						<div class="col-md-6">
							<input value="Submit" name="submit" type="submit" class="form-control btn btn-primary">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>



<?php


if (isset($_POST["submit"])) {
	# code...

	$cat_title = $_POST["cat_title"];
	$cat_desc = $_POST["cat_desc"];

	$insert_cat = "INSERT INTO categories (cat_title, cat_desc) VALUES ('$cat_title', '$cat_desc') ";
	$run_cat = mysqli_query($con, $insert_cat) or die(mysqli_error($con));

	if ($run_cat) {
		# code...

		echo "<script> alert('New Category Inserted Successfully') </script>";
		echo "<script> window.open('index.php?view_cats', '_self') </script>";
	}
}



?>


<?php /* }  */ ?>