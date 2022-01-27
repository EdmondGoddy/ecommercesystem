
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
				<i class="fa fa-dashboard"></i> Dashboard / View Terms
			</li>
		</ol>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-tags fa-fw"></i> View Terms
				</h3>
			</div>
			<div class="panel-body">
				<?php

				$get_terms = "SELECT * FROM terms ";
				$run_terms = mysqli_query($con, $get_terms);

				while ($run_terms_section = mysqli_fetch_array($run_terms)) {
					# code...

					$term_id = $run_terms_section["term_id"];
					$term_title = $run_terms_section["term_title"];
					$term_desc = substr($run_terms_section["term_desc"], 0,400);

				?>

				<div class="col-lg-4 col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title" align="center">
								<?php echo $term_title; ?>
							</h3>
						</div>
						<div class="panel-body">
							<?php echo $term_desc; ?>
						</div>
						<div class="panel-footer">
							<center>
								<a href="index.php?delete_term=<?php echo $term_id; ?>" class="pull-right">
									<i class="fa fa-trash"></i> Delete
								</a>
								<a href="index.php?edit_term=<?php echo $term_id; ?>" class="pull-left">
									<i class="fa fa-pencil"></i> Edit
								</a>
								<div class="clearfix"></div>
							</center>
						</div>
					</div>
				</div>

			    <?php  } ?>

			</div>
		</div>
	</div>
</div>






<?php /* }  */ ?>