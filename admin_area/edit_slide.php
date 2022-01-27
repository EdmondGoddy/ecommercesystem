
<?php

/* MAY INCLUDE THIS CODE

if(!isset($_SESSION["admin_email"])){
	
	echo "<script> window.open('login.php', '_self'); </script>";
}else{
	

*/

?>


<?php

if (isset($_GET["edit_slide"])) {
	# code...

	$edit_slide_id = $_GET["edit_slide"];

	$edit_slide = "SELECT * FROM slider WHERE slide_id='$edit_slide_id' ";
	$run_edit_slide = mysqli_query($con, $edit_slide);

	$row_slide = mysqli_fetch_array($run_edit_slide);
	$slide_id = $row_slide["slide_id"];
	$slide_url = $row_slide["slide_url"];
	$slide_name = $row_slide["slide_name"];
	$slide_image = $row_slide["slide_image"];

}

?>


<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Edit Slide
			</li>
		</ol>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Edit Slide
				</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Slide Name
						</label>
						<div class="col-md-6">
							<input name="slide_name" type="text" class="form-control" required="" value="<?php echo $slide_name; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Slide Url
						</label>
						<div class="col-md-6">
							<input name="slide_url" type="text" class="form-control" required="" value="<?php echo $slide_url; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						  Slide Image
						</label>
						<div class="col-md-6">
							<input type="file" name="slide_image" class="form-control" required=""><br>
							<img src="slides_images/<?php echo $slide_image; ?>" alt="<?php echo $slide_image; ?>" class="img-responsive">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							
						</label>
						<div class="col-md-6">
							<input type="submit" name="update" value="Update Now" class="btn btn-primary form-control">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>



<?php

if (isset($_POST["update"])) {
	# code...

	$slide_name = $_POST["slide_name"];
	$slide_url = $_POST["slide_url"];

	$slide_image = $_FILES['slide_image']['name'];
	$tmp_name = $_FILES['slide_image']['tmp_name'];


	move_uploaded_file($tmp_name, "slides_images/$slide_image");

	$update_slide = "UPDATE slider SET slide_name='$slide_name', slide_image='$slide_image', slide_url='$slide_url' WHERE slide_id='$slide_id' ";
	$run_update_slide = mysqli_query($con, $update_slide);

	if ($run_update_slide) {
		# code...

		echo "<script>alert('Slider Image Updated Successfully')</script>";
		echo "<script>window.open('index.php?view_slides', '_self')</script>";

	}

}


?>


<?php /* }  */ ?>