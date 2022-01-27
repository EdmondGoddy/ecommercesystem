
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
				<li class="active">
					<i class="fa fa-dashboard"></i> Dashboard / Create Term
				</li>
			</ol>
		</div>
	</div><!--  END OF ROW  -->

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-money fa-fw"></i> Create Term
					</h3>
				</div>
				<div class="panel-body">
					<form method="post" class="form-horizontal">
						<div class="form-group">
							<label class="col-md-3 control-label">Term Title</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="term_title" required="">
							</div>
						</div>	
						<div class="form-group">
							<label class="col-md-3 control-label">Term Link</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="term_link" required="">
							</div>
						</div>											
						
						<div class="form-group">
							<label class="col-md-3 control-label">Term Description</label>
							<div class="col-md-6">
								<textarea id="mytextarea" class="form-control" name="term_desc" cols="19" rows="6" required=""></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<input type="submit" value="Create Term" class="btn btn-primary form-control" name="submit">
							</div>
						</div>
					</form>
				</div><!--  END OF PANEL-BODY  -->
			</div><!--  END OF PANEL PANEL-DEFAULT  -->
		</div><!--  END OF COL-LG-12  -->
	</div><!--  END OF ROW  -->


	<?php

	if(isset($_POST["submit"])) {
		# code...

		$term_title = $_POST["term_title"];
		$term_link = $_POST["term_link"];
		$term_desc = $_POST["term_desc"];

		$insert_term = "INSERT INTO terms (term_title, term_link, term_desc) VALUES ('$term_title', '$term_link', '$term_desc') ";
		$run_term = mysqli_query($con, $insert_term);

		if ($run_term) {
			# code...

			echo "<script>alert('Your Term Has Been Created')</script>";
			echo "<script>window.open('index.php?view_terms', '_self')</script>";
		}
	}


	?>
	
<?php /* }  */ ?>

 
 <!--   <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
     <script type="text/javascript">tinymce.init({selector:'#mytextarea'});</script>  -->



