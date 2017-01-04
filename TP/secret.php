<html>
<head>
  <meta charset="UTF-8">
  <title>Secret</title>
</head>
<body>
<?php
  if (isset($_POST['mdp']) AND $_POST['mdp'] == 'kangourou') {
    echo 'Mot de passe intergalactique: 42';
  }
  else
  {
    echo $_POST['mdp'];
    echo 'bienvenue';
  }
 ?>
</body>
</html>