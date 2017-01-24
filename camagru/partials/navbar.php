<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title> Coco Selfie</title>
	<link rel="stylesheet" type="text/css" href="./stylescript/stylesheet.css">
</head>
<body>
<!-- Navbar -->
<div class="navbar">
	<ul>
		<li> <a href="index.php"> <strong> Coco Selfie </strong> </a></li>

		<?php
		if ($_SESSION['logged'] == 'admin' || $_SESSION['logged'] == 'poney')
			echo "<li> <a href='Admin.php'> Admin </a></li>";
    // TODO
    // echo print_r($_SESSION);

		if (isset($_SESSION["logged"]) && $_SESSION["logged"] != "") {
			echo "<li style='float:right'> <a href='logout.php'> Logout </a></li>";
			echo "<li style='float:right'> <a href='modify.php'> Welcome " . ucfirst($_SESSION["logged"]) . "</a> </li> ";
		}
		else
		{
			echo "<li style='float:right' > <a href='created.php?status=create'> Créer mon compte </a></li>";
			echo "<li style='float:right' > <a href='created.php?status=connect'> Connexion </a></li>";
		};
		 ?>
	</ul>
</div>


