<?php 
session_start();
include "navbar.php";
include "../config/setup.php";

if ($_GET['msg'])
   echo "<div style=\"text-align: center\">".$_GET['msg']."</div>";

$password = $_POST['password'];
if (isset($_SESSION['logged']) && $_SESSION['logged'] !== "")
  header("Location: ../index.php?msg=Password not updated");

if (1 !== preg_match('~[0-9]~', $password) || strlen($password) < 6) {
    header("Location: ./reset_passwd_token.php?msg=Enter a secure password please, min 6 chars and one number&token=". $_POST['token']);
    exit();
}

try {
	$query = 'SELECT * FROM tokens WHERE token =:token';
	$prep = $pdo->prepare($query);
	$prep->bindValue(':token', $_POST['token'], PDO::PARAM_INT);
	$prep->execute();
	if ($prep->rowCount() >= 1){
		$arr = $prep->fetch();
		$id_user = $arr[id_user];
		$prep->closeCursor();
		$prep = null;
		$query = 'UPDATE users SET password = :password WHERE id =:id_user';
		$prep = $pdo->prepare($query);
		$prep->bindValue(':password', hash('whirlpool', $_POST['password']), PDO::PARAM_STR);
		$prep->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $prep->execute();
        $prep->closeCursor();
        $prep = null;
        $query = 'DELETE FROM tokens WHERE id_user IN (:id_user)';
        $prep = $pdo->prepare($query);
        $prep->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $prep->execute();
    }
    else
        header("Location: ../index.php?msg=Couldn't find token");
    $prep->closeCursor();
    $prep = null;
    header("Location: ../index.php?msg=Password updated");
    return;
} catch (PDOException $e) {
    $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
    die($msg);
};
?>
