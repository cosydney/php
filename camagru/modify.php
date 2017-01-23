<?php
session_start();
include ("navbar.php")
?>

<br>

<form method="POST" action="modif.php" class="login">
	<?php
	if ($_GET['error'])
		echo $_GET['error'];
  // todo
  // echo print_r($_SESSION);
	?>
	<h3>Modifier mes info</h3>
	Ancien Identifiant: <br/><input type="text" name="oldlogin" value='<?php echo $_SESSION['logged'] ?>'><br>
  Nouvel Identifiant: <br/><input type="text" name="newlogin" value=''><br>
  New Email: <br><input type="email" value="<?php echo $_SESSION["email"] ?>" name="email" placeholder=""><br>
	Ancien Mot de Passe: <br/><input type="password" name="oldpw" value='todo'><br>
	Nouveau Mot de Passe: <br/><input type="password" name="newpw" value='todo'>
	<br>
	<input type="submit" name="submit" value="OK"><br> <br>
	Supprimer définitivement mon compte:
	<input type="submit" name="delete" value="delete" >
</form>
</body>
</html>

