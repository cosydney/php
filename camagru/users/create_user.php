<?php 
session_start();

include("../config/setup.php");
$password = $_POST['passwd'];
$email = $_POST['email'];
$username = $_POST['login'];
$submit = $_POST['submit'];
if (empty($password) || empty($username) || empty($email) || $submit !== 'OK')
	header("Location: login_form.php?msg=Login is not right, try again or please create an account");
else if(1 !== preg_match('~[0-9]~', $password)){
    header("Location: new_user.php?msg=Password must contain a number please try again");
}
else
{
	try{
		$query = 'INSERT INTO users(username, email, password) VALUES (:username, :email, :password);';
		$prep = $pdo->prepare($query);
		$prep->bindValue(':username', $username, PDO::PARAM_STR);
		$prep->bindValue(':email', $email, PDO::PARAM_STR);
		$prep->bindValue(':password', hash('whirlpool', $password), PDO::PARAM_STR);
		$prep->execute();

		$prep->closeCursor();
		$prep = null;
	} catch (PDOException $e) {
		$msg = 'ERREUR PDO dans ' . $e->getFile() . 'L.' . $e->getline() . ' : ' . $e->getMessage();
		header("Location: new_user.php?msg=". $e->getMessage());

		die($msg);
	}
	$_SESSION['logged'] = $username;
	header("Location: ../index.php");
	return;
}
 ?>
