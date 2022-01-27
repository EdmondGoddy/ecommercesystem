
<?php

/* MAY INCLUDE THIS CODE

if(!isset($_SESSION["admin_email"])){
	
	echo "<script> window.open('login.php', '_self'); </script>";
}else{
	

*/

?>

<?php


if (isset($_GET["delete_customer"])) {
	# code...

	$delete_id = $_GET["delete_customer"];

	$delete_c = "DELETE FROM customers WHERE customer_id='$delete_id' ";
	$run_delete = mysqli_query($con, $delete_c);

	if ($run_delete) {
		# code...

		echo "<script> alert('Customer Deleted Successfully') </script>";
		echo "<script> window.open('index.php?view_customers', '_self') </script>";
	}

}


?>



<?php /* }  */ ?>













