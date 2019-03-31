<?php
$hostname = "localhost";
$dbname = "alternanza5ci";
$user = "root";
$pass = "";
$db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
if (!$db) {
	die ("Impossibile collegarsi al database");
}

$id_istituto = $_GET['id_istituto'];

$result = $db->query("SELECT * FROM classi WHERE id_istituto = '$id_istituto'");
$classi = $result->fetchAll(PDO::FETCH_ASSOC);
//print_r($classi);

echo json_encode($classi);



?>