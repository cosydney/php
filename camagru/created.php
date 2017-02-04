<?php
  include ("partials/navbar.php")
?>
<br>
<form method="POST" action="create.php" class="login">
<?php
  if ($_GET['error'])
    echo $_GET['error'];
  if ($_GET['status'] == "connect")
    echo "<h3>Se Connecter</h3>";
  elseif ($_GET['status'] == "create")
    echo "<h3>Créer son compte</h3>";
  else
    echo "<h3>Créer mon compte</h3>";
  ?>
  Identifiant: <br/><input type="text" name="login" value='todo' placeholder="Bobthetexan"><br>
  Email: <br><input type="email" name="email" placeholder="bob@mailinator.com" value="todo@mailinator.com"> <br>
  Mot de Passe: <br/><input type="password" name="passwd" value='todotodo25' placeholder="*******">
  <br>
  <input type="submit" name="submit" value="OK">

</form>

</body>
</html>