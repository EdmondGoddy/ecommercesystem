
<?php

/* MAY INCLUDE THIS CODE

if(!isset($_SESSION["admin_email"])){
	
	echo "<script> window.open('login.php', '_self'); </script>";
}else{
	

*/

?>

<?php


if (isset($_GET["delete_order"])) {
	# code...

	$delete_id = $_GET["delete_order"];

	$delete_order = "DELETE FROM pending_orders WHERE order_id='$delete_id' ";
	$run_delete = mysqli_query($con, $delete_order);

	if ($run_delete) {
		# code...

		echo "<script> alert('Order Deleted Successfully') </script>";
		echo "<script> window.open('index.php?view_orders', '_self') </script>";
	}

}


?>



<?php /* }  */ ?>













