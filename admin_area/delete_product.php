
<?php

/* MAY INCLUDE THIS CODE

if(!isset($_SESSION["admin_email"])){
	
	echo "<script> window.open('login.php', '_self'); </script>";
}else{
	

*/

?>

<?php


if (isset($_GET["delete_product"])) {
	# code...

	$delete_id = $_GET["delete_product"];

	$delete_pro = "DELETE FROM products WHERE product_id='$delete_id' ";
	$run_delete = mysqli_query($con, $delete_pro);

	if ($run_delete) {
		# code...

		echo "<script> alert('Product Deleted Successfully') </script>";
		echo "<script> window.open('index.php?view_products', '_self') </script>";
	}

}


?>



<?php /* }  */ ?>













