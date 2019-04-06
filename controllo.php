<?php 

	$hostname = "localhost";
	$dbname = "alternanza5ci";
	$user = "root";
	$pass = "";
	$db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
	if (!$db) {die ("Impossibile collegarsi al database");}

	$email=$_POST['email'];

	$query="SELECT * FROM utenti WHERE email='$email'";
	$row=$db->query($query);
	echo $row;
?>