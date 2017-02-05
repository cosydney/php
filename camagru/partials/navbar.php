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
		print("<script src=\"//code.jquery.com/jquery-1.11.0.min.js\"></script>");
		if ($_SESSION['logged'] == 'admin' || $_SESSION['logged'] == 'poney')
			echo "<li> <a href='Admin.php'> Admin </a></li>";

		if (isset($_SESSION["logged"]) && $_SESSION["logged"] != "") {
			echo "<li style='float:right'> <a href='users/logout.php'> Logout </a></li>";
			echo "<li style='float:right'> <a href='users/modify.php'> Welcome " . ucfirst($_SESSION["logged"]) . "</a> </li> ";
		}
		else
		{
			echo "<li style='float:right' > <a href='users/new_user.php?status=create'> Créer mon compte </a></li>";
			echo "<li style='float:right' > <a href='users/login_form.php?status=connect'> Connexion </a></li>";
		};
		 ?>
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


	</ul>
</div>


