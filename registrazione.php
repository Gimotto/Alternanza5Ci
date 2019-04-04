<?php 
	$hostname = "localhost";
	$dbname = "alternanza5ci";
	$user = "root";
	$pass = "";
	$db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
	if (!$db) {die ("Impossibile collegarsi al database");}

	if ($_POST && count($_POST)>0) {
		$nome=$_POST['nome'];
		$cognome=$_POST['cognome'];
		$istituto=$_POST['id_istituto'];
		$classe=$_POST['id_classe'];
		$email=$_POST['email'];
		$password_D=$_POST['password'];
		$password_E=MD5($password_D);

		$query="INSERT INTO utenti(nome, cognome, email, passwordMD5, id_classe, id_istituto) VALUES ('$nome', '$cognome', '$email', '$password_E', '$classe', '$istituto')";
		$db->query($query);
		$lastId=$db->lastInsertId();
		$lastUser=$db->query("SELECT * FROM UTENTI WHERE id=$lastId");
		echo json_encode($lastUser->fetch(PDO::FETCH_ASSOC));

	} else {
		echo "Impossibile accedere";
		exit;
	}
 ?>