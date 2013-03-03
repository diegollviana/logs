<?php
	$host = "localhost";
	$db   = "logsexy";
	$user = "postgres";
	$pass = "teste123";
	
	$conn = pg_connect("host=" . $host . " dbname=" . $db . " user=" . $user  . " password=" . $pass) or die("Database temporary error. cod: 004");
?>