<?php
session_start();
function auth($login, $passwd)
{
	$file = "./private/passwd";
	$contents = @file_get_contents($file);
	if (!$contents)
		return false;
	$authentication = unserialize($contents);
	foreach ($authentication as $key => $elem)
	{
		if ($elem["login"] === $login && $elem['passwd'] === hash("whirlpool", $passwd))
			return true;
	}
	return false;
};


if ($_GET["login"] && $_GET["passwd"] && auth($_GET["login"], $_GET["passwd"]))
{
	$_SESSION['loggued_on_user'] = $_GET["login"];
	echo "Ok\n";
}
else
{
	$_SESSION['loggued_on_user'] = "";
	echo "ERROR\n";
}
?>
