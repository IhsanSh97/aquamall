<?php

		//define the database
		include("config.php");
		//open connection
		$conn = mysqli_connect("localhost","root", "", "aquamall");
		
		//check the connection
		if(!$conn){
			die("cannot connect to server");
		}

?>