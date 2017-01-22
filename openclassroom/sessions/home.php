<?php
session_start();

$_SESSION['prenom'] = 'Jean';
$_SESSION['nom'] = 'Dupont';
$_SESSION['age'] = 24;
 ?>
 <html>
 <head>
   <meta charset="UTF-8">
   <title>Home</title>
 </head>
 <body>
<p>Salut <?php echo $_SESSION['prenom']; ?> <br>
  tu es a l'accueil de mon site (home.php). Souhaites tu voir une autre page?
</p>

<p>
  <a href="mapage.php"> Lien vers mapage.php</a> <br>
  <a href="monscript.php"> Lien vers monscript.php</a> <br>
  <a href="informations.php"> Lien vers informations.php</a> <br>

</p>
 </body>
 </html>