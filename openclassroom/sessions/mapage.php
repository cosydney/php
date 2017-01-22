<?php
session_start();
?>
<html>
<head>
  <meta charset="UTF-8">
  <title>Mapage</title>
</head>
<body>
<p><?php
  echo 'Bonjour ' . $_SESSION['prenom'];
?></p>
</body>
</html>