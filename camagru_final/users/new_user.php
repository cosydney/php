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
  Identifiant: <br/><input type="text" name="login" value='' placeholder="Bobthetexan" required="required"><br>
  Email: <br><input type="email" name="email" placeholder="bob@mailinator.com" value="" required="required"> <br>
  Mot de Passe: <br/><input type="password" name="passwd" value='' placeholder="*******" required="required">
  <br>
  <input type="submit" name="submit" value="OK">
</form>


</body>
</html>
