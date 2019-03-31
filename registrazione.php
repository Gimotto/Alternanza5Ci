<?php 
	$hostname = "localhost";
	$dbname = "alternanza5ci";
	$user = "root";
	$pass = "";
	$db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
	if (!$db) {
		die ("Impossibile collegarsi al database");
	}

	if ($_POST && count($_POST)>0) {
		
	} else {
		echo "Impossibile accedere";
		exit;
	}
 ?>