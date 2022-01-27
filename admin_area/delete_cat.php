<?php

/* MAY INCLUDE THIS CODE

if(!isset($_SESSION["admin_email"])){
	
	echo "<script> window.open('login.php', '_self'); </script>";
}else{
	

*/

?>


<?php

if (isset($_GET["delete_cat"])) {
	# code...

	$delete_cat_id = $_GET["delete_cat"];

	$delete_cat = "DELETE FROM categories WHERE cat_id='$delete_cat_id' ";
	$run_delete = mysqli_query($con, $delete_cat);

	if ($run_delete) {
		# code...

		echo "<script>alert('One Category Has been Deleted')</script>";
		echo "<script>window.open('index.php?view_cats', '_self')</script>";
	}
}


?>




<?php /* }  */ ?>
