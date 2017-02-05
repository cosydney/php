<?php
session_start();
include "navbar.php";
include "../config/setup.php";
if (isset($_SESSION['logged']) && $_SESSION['logged'] !== "") {
    header("Location: ../index.php");
    return;
}
try {
    $query = 'SELECT * FROM tokens WHERE token=:token';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':token', $_GET['token'], PDO::PARAM_INT);
    $prep->execute();
    if ($prep->rowCount() < 1) {
    header("Location: ../index.php");
    $prep->closeCursor();
    $prep = null;
    return;
    }
    $prep->closeCursor();
    $prep = null;
} catch (PDOException $e) {
    $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
    die($msg);
};
?>

<div style="text-align: center;">
<form class="" action="reset_passwd.php" method="post">
<h2>New Password</h2>
  <input type="password" name="password" value="">
  <input type="submit" name="" value="Confirm">
  <input hidden type="text" name="token" value=<?php echo htmlspecialchars($_GET['token']) ?> >
  <!-- <?php 
  echo print_r($_GET['token']) ?> -->
</form>
</div>
