<html>
<head>
  <meta charset="UTF-8">
  <title>Salut</title>
</head>
<body>

<form action="formulaire.php" method="POST">
  <p><label for="prenom">Prénom <input type="text" name="prenom"/></label></p>
  <p><label for="veggie">êtes vous veggie?<input type="checkbox" name="veggietrue">oui</label></p>
  <form action="formulaire.php" method="post" enctype="multipart/form-data">
    <p>Formulaire d'envoi de fichier</p>
            <input type="file" name="monfichier" /><br />
            <input type="submit" value="Envoyer le fichier" />
</form>
  <p><input type="submit"></p>
</form>

</body>
</html>