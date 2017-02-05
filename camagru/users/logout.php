<?php
session_start();
$_SESSION["logged"] = "";
$_SESSION["email"] = "";
header("Location: ../index.php");
 ?>