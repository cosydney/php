<?PHP

function add_data($array_data, $init)
{
	if ($requet = mysqli_prepare($init, "INSERT INTO Objet(genre, color, type, model, prix, img) VALUES (?, ?, ?, ?, ?, ?)"));
//		echo("request add item...\n");
	else
		echo("request item fail\n");
	if (!mysqli_stmt_bind_param($requet, "ssssss", $array_data[0], $array_data[1], $array_data[2], $array_data[3], $array_data[4], $array_data[5]))
		echo("request add item bind param fail\n");
	if (mysqli_stmt_execute($requet));
		// echo("Item Added\n");
}

function init_database()
{
$init = mysqli_init();
if (!$init)
	exit();
if (!mysqli_real_connect($init))
	exit();
//echo('Succès, ' . mysqli_get_host_info($init) . "\n");
// mysqli_query($init, "DROP DATABASE IF EXISTS coco");
if (!mysqli_select_db($init, "coco"))
{
	// echo("base data created !");
if ($requet = mysqli_prepare($init, "CREATE DATABASE IF NOT EXISTS coco"))
{
	if (mysqli_execute($requet))
	{
		if (!mysqli_select_db($init, "coco"))
			echo("error selection database.\n");
		if ($requet = mysqli_prepare($init, "CREATE TABLE Objet(genre varchar(255), color varchar(255), type varchar(255), model varchar(255), prix int, img varchar(1500))"))
		{
			mysqli_execute($requet);
			// echo("TABLE Objet created...\n");
		}
		if (!$fd = fopen("./data/database.csv", "r"))
			exit("error database.\n");
		while ($tab = fgetcsv($fd, 0, ";"))
			add_data($tab, $init);
	}
}
}
return $init;
}
?>
