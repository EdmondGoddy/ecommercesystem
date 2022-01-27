
<?php

/* MAY INCLUDE THIS CODE

if(!isset($_SESSION["admin_email"])){
	
	echo "<script> window.open('login.php', '_self'); </script>";
}else{
	

*/

?>

<?php

if (isset($_GET["edit_term"])) {
	# code...

	$edit_id = $_GET["edit_term"];

	$get_term = "SELECT * FROM terms WHERE term_id='$edit_id' ";
	$run_term = mysqli_query($con, $get_term);

	$row_term = mysqli_fetch_array($run_term);
	$term_id = $row_term["term_id"];
	$term_title = $row_term["term_title"];
	$term_desc = $row_term["term_desc"];
	$term_link = $row_term["term_link"];

}

?>

	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li class="active">
					<i class="fa fa-dashboard"></i> Dashboard / Edit Term
				</li>
			</ol>
		</div>
	</div><!--  END OF ROW  -->

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-money fa-fw"></i> Edit Term
					</h3>
				</div>
				<div class="panel-body">
					<form method="post" class="form-horizontal">
						<div class="form-group">
							<label class="col-md-3 control-label">Term Title</label>
							<div class="col-md-6">
								<input type="text" class="form-control" value="<?php echo $term_title; ?>" name="term_title" required="">
							</div>
						</div>	
						<div class="form-group">
							<label class="col-md-3 control-label">Term Link</label>
							<div class="col-md-6">
								<input type="text" class="form-control" value="<?php echo $term_link; ?>" name="term_link" required="">
							</div>
						</div>											
						
						<div class="form-group">
							<label class="col-md-3 control-label">Term Description</label>
							<div class="col-md-6">
								<textarea id="mytextarea" class="form-control" name="term_desc" cols="19" rows="6" required=""> <?php echo $term_desc; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<input type="submit" value="Update Term" class="btn btn-primary form-control" name="update">
							</div>
						</div>
					</form>
				</div><!--  END OF PANEL-BODY  -->
			</div><!--  END OF PANEL PANEL-DEFAULT  -->
		</div><!--  END OF COL-LG-12  -->
	</div><!--  END OF ROW  -->


	<?php

	if(isset($_POST["update"])) {
		# code...

		$term_title = $_POST["term_title"];
		$term_link = $_POST["term_link"];
		$term_desc = $_POST["term_desc"];

		$update_term = "UPDATE terms SET term_title='$term_title', term_link='$term_link', term_desc='$term_desc' WHERE term_id='$term_id' ";
		$run_term = mysqli_query($con, $update_term);


		if ($run_term) {
			# code...

			echo "<script>alert('Your Term Has Been Updated Successfully')</script>";
			echo "<script>window.open('index.php?view_terms', '_self')</script>";
		}
	}


	?>
	
<?php /* }  */ ?>

 
 <!--   <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
     <script type="text/javascript">tinymce.init({selector:'#mytextarea'});</script>  -->



