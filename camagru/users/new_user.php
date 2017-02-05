<?php
  include ("./navbar.php")
?>
<br>
<form method="POST" action="create_user.php" class="login">
<?php 
  $msg = $_GET['msg'];
  if (!empty($msg))
  	echo "<p>". $msg . "</p>";
  	 ?>
    <h3>Créer son compte</h3>
  Identifiant: <br/><input type="text" name="login" value='todo' placeholder="Bobthetexan"><br>
  Email: <br><input type="email" name="email" placeholder="bob@mailinator.com" value="todo@mailinator.com"> <br>
  Mot de Passe: <br/><input type="password" name="passwd" value='todotodo25' placeholder="*******">
  <br>
  <input type="submit" name="submit" value="OK">
</form>


</body>
</html>
