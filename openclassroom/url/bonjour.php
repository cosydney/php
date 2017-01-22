<html>
<head>
  <meta charset="UTF-8">
  <title>Bonjour</title>
</head>
<body>
<p>
  <?php
  if (isset($_GET['nom']) AND isset($_GET['prenom']) AND isset($_GET['repeter']))
  {
    $nombre = (int)$_GET['repeter'];
    if ($nombre < 100)
      for ($repetition=1; $repetition <= $nombre; $repetition++) {
        echo '<p> Bonjour ' . $_GET['nom']. ' ' . $_GET['prenom'] . '</p>';
        }
  }
  else
    echo 'Nothing do to here'
  ?>
</p>
</body>
</html>