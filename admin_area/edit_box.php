
<?php

/* MAY INCLUDE THIS CODE

if(!isset($_SESSION["admin_email"])){
	
	echo "<script> window.open('login.php', '_self'); </script>";
}else{
	

*/

?>


<?php

if (isset($_GET["edit_box"])) {
	# code...

	$edit_box_id = $_GET["edit_box"];

	$edit_box_query = "SELECT * FROM boxes_section WHERE box_id='$edit_box_id' ";
	$run_edit_box = mysqli_query($con, $edit_box_query);

	$row_edit_box = mysqli_fetch_array($run_edit_box);
	$box_id = $row_edit_box["box_id"];
	$box_title = $row_edit_box["box_title"];
	$box_desc = $row_edit_box["box_desc"];
}

?>


<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / Edit Box
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-pencil fa-fw"></i> Edit Box
				</h3>
			</div>
			<div class="panel-body">
				<form action="" class="form-horizontal" method="post">
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Box Title
						</label>
						<div class="col-md-6">
							<input value="<?php echo $box_title; ?>" name="box_title" type="text" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							Box Description
						</label>
						<div class="col-md-6">
							<textarea type="text" name="box_desc" cols="30" rows="10" class="form-control">
								<?php echo $box_desc; ?>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">
							
						</label>
						<div class="col-md-6">
							<input value="Update Box" name="update_box" type="submit" class="form-control btn btn-primary">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<?php


if (isset($_POST["update_box"])) {
	# code...

	$box_title = $_POST["box_title"];
	$box_desc = $_POST["box_desc"];

	$update_box = "UPDATE boxes_section SET box_title='$box_title', box_desc='$box_desc' WHERE box_id='$box_id' ";
	$run_box = mysqli_query($con, $update_box);

	if ($run_box) {
		# code...

		echo "<script> alert('Box Updated Successfully') </script>";
		echo "<script> window.open('index.php?view_boxes', '_self') </script>";
	}


}



?>




<?php /* }  */ ?>

