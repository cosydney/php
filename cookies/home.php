<?php setcookie('pseudo', 'M@teo21', time() + 365*24*3600, null, null, false, true);
setcookie('pays', 'France', time() + 365*24*3600, null, null, false, true);
?>
<html>
<head>
  <meta charset="UTF-8">
  <title>Cookies</title>
</head>
<body>
<p>
  hé ! je me souviens de toi ! <br>
  Ton pseudo c'est <?php echo $_COOKIE['pseudo'] ?>
</p>
</body>
</html>