
<?php

/* MAY INCLUDE THIS CODE

if(!isset($_SESSION["admin_email"])){
	
	echo "<script> window.open('login.php', '_self'); </script>";
}else{
	

*/

?>



<?php


$file = "../styles/style.css";

if (file_exists($file)) {
	# code...

	$data = file_get_contents($file);
}


?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard / CSS Editor
			</li>
		</ol>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-pencil"></i> CSS Editor
				</h3>
			</div>

			<div class="panel-body">
				<form action="" class="form-horizontal" method="post">
					<div class="form-group">
						<div class="col-lg-12">
							<textarea name="newdata" id="" rows="25" class="form-control">
								<?php echo $data; ?>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3" ></label>
						<div class="col-md-6">
							<input type="submit" name="update" value="Update CSS" class="form-control btn btn-primary">
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

	$newdata = $_POST["newdata"];
	$handle = fopen($file, "w");
	fwrite($handle, $newdata);
	fclose($handle);

	echo "<script>alert('Your CSS Has Been Updated')</script>";
	echo "<script>window.open('index.php?edit_css', '_self')</script>";


}


?>


<?php /* }  */ ?>