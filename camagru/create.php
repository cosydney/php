<?PHP
	session_start();
	// error will give an error message if something unexpected comes up
	function error($error)
	{
		header("Location: created.php?error=" . $error);
		exit;
	};

	function logged() {
		$_SESSION['logged'] = $_POST["login"];
    $_SESSION['email'] = $_POST["email"];
	};

	function auth($login, $passwd)
	{
		$file = "./private/passwd";
		$contents = @file_get_contents($file);
		if (!$contents)
			error("No user found");
		$authentication = unserialize($contents);
		foreach ($authentication as $key => $elem)
		{
			if ($elem["login"] === $login && $elem['passwd'] === hash("whirlpool", $passwd))
			{
				logged();
				header("Location: index.php");
				exit;
			}

		}
		error("Password is wrong");
	};



	if ($_POST['submit'] !== "OK")
		error("Wrong submit button");
	if (!$_POST["login"])
		error ("Please enter a login");
	elseif (!$_POST["passwd"])
		error("Please enter a login AND a password");
  elseif (!$_POST["email"])
    error("Please enter an email");
	$path = "./private/";
	$file = $path . "passwd";
	if (file_exists($file))
		$authentication = unserialize(file_get_contents($file));

	$largest_key = 0;
	if ($authentication)
		foreach ($authentication as $key => $element)
		{
			if ($element["login"] === $_POST["login"])
			{
				auth($_POST["login"], $_POST["passwd"]);
				exit;
			}
			if ($key > $largest_key)
				$largest_key = $key;
		}
	$authentication[$largest_key + 1]["login"] = $_POST["login"];
  $authentication[$largest_key + 1]["email"] = $_POST["email"];
	$authentication[$largest_key + 1]["passwd"] = hash("whirlpool", $_POST["passwd"]);
	@mkdir($path);
	file_put_contents($file, serialize($authentication));
	logged();
	header("Location: index.php");
	echo "OK\n";
?>
