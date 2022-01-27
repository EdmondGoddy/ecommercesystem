
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
				<i class="fa fa-dashboard"></i> Dashboard / View Info
			</li>
		</ol>
	</div>
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-tags fa-fw"></i> View Boxes
				</h3>
			</div>
			<div class="panel-body">
				<?php

				$get_boxs = "SELECT * FROM boxs_section ";
				$run_boxs = mysqli_query($con, $get_boxs);

				while ($run_boxs_section = mysqli_fetch_array($run_boxs)) {
					# code...

					$box_id = $run_boxs_section["box_id"];
					$box_title = $run_boxs_section["box_title"];
					$box_desc = $run_boxs_section["box_des"];

				?>

				<div class="col-lg-4 col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title" align="center">
								<?php echo $box_title; ?>
							</h3>
						</div>
						<div class="panel-body">
							<?php echo $box_desc; ?>
						</div>
						<div class="panel-footer">
							<center>
								<a href="index.php?delete_box=<?php echo $box_id; ?>" class="pull-right">
									<i class="fa fa-trash"></i> Delete
								</a>
								<a href="index.php?edit_box=<?php echo $box_id; ?>" class="pull-left">
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