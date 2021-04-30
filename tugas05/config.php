<?php
    $server="localhost";
	$username="root";
	$pass="";
	$dbname="6706202013_dbbuku";
    $conn = mysqli_connect($server, $username, $pass, $dbname);
	if(!$conn) {
		die("connection failed: ".mysqli_connect_error());
	}
?>