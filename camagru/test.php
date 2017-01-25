<?php
$data = $_POST['img'];
$file = "/path/to/file.png";

file_put_contents($file, base64_decode($uri));
echo $file;
?>

