<?php

	include("../includes/connection.php");

	$sel    = "SELECT cat_img FROM category WHERE cat_id = {$_GET['cat_id']}";
	

	$result = mysqli_query($conn, $sel);
	$row    = mysqli_fetch_assoc($result);

	unlink("upload/".$row['cat_img']);
		
	$query  = "DELETE FROM category WHERE cat_id = {$_GET['cat_id']}";

	mysqli_query($conn, $query);


	header("location:manage_category.php");

?>