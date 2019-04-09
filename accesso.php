<?php 
	$hostname = "localhost";
	$dbname = "alternanza5ci";
	$user = "root";
	$pass = "";

	session_start();

	$con = mysqli_connect($hostname,$user,$pass);
	mysqli_select_db($con, 'alternanza5ci');


		$email=$_POST['email'];
		$password_D=$_POST['password'];
		$password_E=MD5($password_D);

		$s = "SELECT * FROM utenti WHERE email='$email' && passwordMD5='$password_E'";
		$result = mysqli_query($con, $s);
		$num = mysqli_num_rows($result);

		if($num == 1){
			$_SESSION['email'] = $email;
		  header('location:../Alternanza5Ci/prova.php');
		}else{
			header('location:../Alternanza5Ci/login.php');
		}
 ?>