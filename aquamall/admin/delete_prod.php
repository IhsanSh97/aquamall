<?php

	include("../includes/connection.php");

	$sel    = "SELECT prod_img FROM product WHERE product_id = {$_GET['product_id']}";
	

	$result = mysqli_query($conn, $sel);
	$row    = mysqli_fetch_assoc($result);

	unlink("upload/".$row['prod_img']);

	$query = "DELETE FROM product WHERE product_id = {$_GET['product_id']}";

	mysqli_query($conn, $query);

	header("location:manage_product.php");

?>