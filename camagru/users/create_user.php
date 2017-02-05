<?php 
session_start();
include("../config/setup.php");
$password = $_POST['password'];
$email = $_POST['email'];
$username = $_POST['username'];
$submit = $_POST['submit'];

if (empy($password) || empty($username) || empty($email) || $submit !== 'OK')
	header("Location: new_user.php?msg=findmecreate_user");
else
{
	try{
		$query = 'INSERT INTO users(username, email, password) VALUES (:username, :email, :password);';
		$prep = $pdo->prepare($query);
		$prep->bindValue(':username', $username, PDO::PARAM_STR);
		$prep->bindValue(':email', $email, PDO::PARAM_STR);
		$prep->bindValue(':password', hash('whrilpool', $password), PDO::PARAM_STR);
		$prep->execute();

		$prep->closeCursor();
		$prep = null;
	} catch (PDOException $e) {
		header("Location: new_user.php?msg=findmecreate_user_exception");
		$msg = 'ERREUR PDO dans ' . $e->getFile() . 'L.' . $e->getline() . ' : ' . $e->getMessage();
		die($msg);
	}
	$_SESSION['logged'] = $username;
	header("Location: ../index.php");
	return;
}
 ?>
