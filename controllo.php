<?php 
	$connessione=mysqli_connect('localhost','root','','alternanza5ci');
	if (isset($_POST['email'])) {
		$email=mysqli_real_escape_string($connessione,$_POST['email']);
		$query="SELECT * FROM utenti WHERE email='".$email."'";
		$result=mysqli_query($connessione,$query);
		echo mysqli_num_rows($result);
	}
?>