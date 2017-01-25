<?php
include ("partials/navbar.php");
// include ("install.php");
// include ("tri.php");
// $tri = (isset($GET['tri'])? $GET['tri']: (isset($_GET['tri'])? $_GET['tri']:"genre" ))  ;
// $init = init_database();
// $tableau = tri($tri, $init);
?>

<?php
// if ($_SESSION['logged'] == 'admin' || $_SESSION['logged'] == 'poney')
 ?>
<br>
<video id="video"></video>
<button id="startbutton">Prendre une photo</button>
<canvas id="canvas" hidden></canvas>
<canvas id="photo" hidden></canvas>
<canvas id="res" ></canvas>

<script src="capture.js">  </script>
<!-- <br>
<div class="contentarea">
  <div class="camera">
    <video id="video">Video stream not available.</video>
    <button id="startbutton">Take photo</button>
  </div>
  <canvas id="canvas">
  </canvas>
  <div class="output">
    <img id="photo" alt="The screen capture will appear in this box.">
  </div>
  <p>
    Visit our article <a href="https://developer.mozilla.org/en-US/docs/Web/API/WebRTC_API/Taking_still_photos"> Taking still photos with WebRTC</a> to learn more about the technologies used here.
  </p>
</div>
 --><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<?php include ("partials/footer.php"); ?>