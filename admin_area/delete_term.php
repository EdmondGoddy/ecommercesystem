<?php

/* MAY INCLUDE THIS CODE

if(!isset($_SESSION["admin_email"])){
	
	echo "<script> window.open('login.php', '_self'); </script>";
}else{
	

*/

?>


<?php

if (isset($_GET["delete_term"])) {
	# code...

	$delete_id = $_GET["delete_term"];

	$delete = "DELETE FROM terms WHERE term_id='$delete_id' ";
	$run_delete = mysqli_query($con, $delete);

	if ($run_delete) {
		# code...

		echo "<script>alert('One of Your Terms Has been Deleted')</script>";
		echo "<script>window.open('index.php?view_terms', '_self')</script>";
	}
}


?>




<?php /* }  */ ?>
