<?php
include ("partials/navbar.php");
// include ("php.ini");
// include ("install.php");
// $init = init_database();
// $tableau = tri($tri, $init);
// if ($_SESSION['logged'] == 'admin' || $_SESSION['logged'] == 'poney')
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

<!-- form -->
<div id="mypics">
  <!-- TODO database -->
</div>

<div id="mypics">
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
<?php include ("partials/footer.php"); ?>