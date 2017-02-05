<?php
include ("partials/navbar.php");
include("config/setup.php");
if (empty($_SESSION['logged']) || !isset($_SESSION['logged']) || $_SESSION['logged'] == "")
  header("Location: ./users/login_form.php?msg=Log in first please");
?>

<br>
<div id="webcam">
  <video id="video"></video>
  <canvas id="canvas"></canvas>
  <canvas id="photo"></canvas>
</div>
<div>
  <button id="startbutton" disabled> Prendre une photo<?php echo json_decode('"\uD83D\uDCF8"'); ?></button>
</div>
<div class="upload">
 Or Upload your pic:  <input type="file" id="fileUpload" onchange="handleFiles(this.files)" >
</div>

<div>
  <div class="play">
    <button type="button" onclick="bigger();">+</button>
    <button type="button" onclick="smaller();">-</button>
  </div>
</div>

<div id="filters">
  <?php 
  $dir = new DirectoryIterator(dirname(__FILE__).'/filters');
  foreach ($dir as $fileinfo) {
    if (!$fileinfo->isDot()) {
      $src = 'filters/'.$fileinfo->getFilename();
      echo  "<img src=\"$src\" class=\"filter\">";
    }
  }
   ?>
</div>
<!-- Upload new filter -->
<div id="uploadfilter">
<?php 
 if ($_GET['msg'])
    echo $_GET['msg'];
   ?>
  <form action="upload.php" method="post" enctype="multipart/form-data">
    Ajouter un filtre:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="Submit">
  </form>  
</div>
<script src="capture.js">  </script>
<!-- form -->
<div id="mypics">
  <?php 
 try {
      $query = 'SELECT * FROM users WHERE username=:username;';
      $prep = $pdo->prepare($query);
      $prep->bindValue(':username', $_SESSION['logged'], PDO::PARAM_STR);
      $prep->execute();
      $arr = $prep->fetchAll();
      $id_user = $arr[0][id];
      $prep->closeCursor();
      $prep = null;
      $query = 'SELECT * FROM images WHERE id_user=:id_user;';
      $prep = $pdo->prepare($query);
      $prep->bindValue(':id_user', $id_user, PDO::PARAM_INT);
      $prep->execute();
      $arr = $prep->fetchAll();
      // print_r($arr);
      $count = 0;
      foreach ($arr as $image) {
          // echo "$count";
      if ($count == 0) {
          echo "<div class=\"line\">";
      }
          echo "<div><div><img class=\"mini\" src=\"$image[path]\"></img></div>";
          print("<div><form action=\"delete_image.php\" method=\"post\">
                <input type=\"hidden\" name=\"id_image\" value=$image[id] >
                <input type=\"submit\" value=\"delete\" >
                </form></div></div>
                ");
          $count += 1;
          if ($count == 2) {
              $count = 0;
              echo "</div>";
          }
      }
  } catch (PDOException $e) {
      $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
      die($msg);
  }
?>
  <!-- TODO database -->
</div>

<?php include ("partials/footer.php"); ?>