<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "coffeeshop";

//	Koneksi  Database
	$conn = mysqli_connect($servername, $username, $password);
	if (!$conn) {
		die("Connection failed : ".mysqli_connect_error());
		echo "<br>";
	}else{
		mysqli_select_db($conn, $database);
	}
?>