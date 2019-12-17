<?php

	session_start();

	unset($_SESSION['cust_id']);
	header("location:login.php");

?>
