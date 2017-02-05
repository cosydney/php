<?php 
session_start();
include "navbar.php";
include "config/setup.php";

if (isset($_SESSION['logged']) && $_SESSION['logged'] !== "")
  header("Location: ./index.php");
try {
	$query = 'SELECT * FROM tokens WHERE token =:token';
	$prep = $pdo->prepare($query);
	$prep->bindValue(':token', $_POST['token'], PDO::PARAM_INT);
	$prep->execute();
	if ($prep->rowCount() >= 1){
		$arr = $prep->fetch();
		$id_user = $arr[id_user]
	}
}


 ?>