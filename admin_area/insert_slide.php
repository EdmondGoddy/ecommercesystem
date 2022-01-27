
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
				<i class="fa fa-dashboard"></i> Dashboard / Insert Slide
			</li>
		</ol>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Insert Slide
				</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Slide Name
						</label>
						<div class="col-md-6">
							<input name="slide_name" type="text" class="form-control" required="">
						</div>
					</div><!--
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Slide url
						</label>
						<div class="col-md-6">
							<input name="slide_url" type="text" class="form-control" required="">
						</div>
					</div> -->
					<div class="form-group">
						<label for="" class="control-label col-md-3">
						  Slide Image
						</label>
						<div class="col-md-6">
							<input type="file" name="slide_image" class="form-control" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							
						</label>
						<div class="col-md-6">
							<input type="submit" name="submit" value="Submit Now" class="btn btn-primary form-control">
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

	$slide_name = $_POST["slide_name"];
	// $slide_url = $_POST["slide_url"];

	$slide_image = $_FILES['slide_image']['name'];
	$tmp_name = $_FILES['slide_image']['tmp_name'];

	$view_slides = "SELECT * FROM slider ";
	$view_run_slide = mysqli_query($con, $view_slides);

	$count = mysqli_num_rows($view_run_slide);

	if ($count < 4) {
		# code...

		move_uploaded_file($tmp_name, "slides_images/$slide_image");

		$insert_slide = "INSERT INTO slider (slide_name, slide_image, slide_url) VALUES ('$slide_name', '$slide_image', '$slide_url') ";
		$run_slide = mysqli_query($con, $insert_slide);

		echo "<script>alert('New Slider Image Inserted Successfully')</script>";
		echo "<script>window.open('index.php?view_slides', '_self')</script>";

	}else{

		echo "<script>alert('You Already have Maximum Number (4) of Slider Images.')</script>";
	}


}


?>


<?php /* }  */ ?>