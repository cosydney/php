<html>
<head>
  <meta charset="UTF-8">
  <title>Formulaire</title>
</head>
<body>
<p>Bonjour <?php echo htmlspecialchars($_POST['prenom']) ?></p>
<p>
  <?php
  if (isset($_POST['veggietrue']))
    echo "vous etes donc vegetarien";
  else
    echo "Vous n'etes pas vegetarien";
   ?>
</p>

<p>
<?php
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['monfichier']['size'] <= 1000000)
        {
          $infosfichier = pathinfo($_FILES['monfichier']['name']);
          $extension_upload = $infosfichier['extension'];
          $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/' . basename($_FILES['monfichier']['name']));
                        echo "L'envoi a bien été effectué !";

                }
        }
}
?>
</p>
</body>
</html>