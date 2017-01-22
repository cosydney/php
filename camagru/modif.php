<?PHP
	session_start();

	function error($error)
	{
		header("Location: modify.php?error=" . $error);
		exit;
	};

	function delete($login)
	{
		$file = "./private/passwd";
		$contents = @file_get_contents($file);
		if (!$contents)
			error("File couldn't open or doesn't exist");
		$authentication = unserialize($contents);
		foreach ($authentication as $key => $element)
		{
			if ($element["login"] === $login)
			{
				unset($authentication[$key]);
				file_put_contents($file, serialize($authentication));
				$_SESSION["logged"] = "";
        $_SESSION["email"] = "";
				error("Account has been deleted");
				break;
			}
		}
		error("couldn't find account");
		exit;
	}

  function modify_user_info($oldlogin, $newlogin, $oldpw, $newpw, $newemail)
  {
    $file = "./private/passwd";
    $contents = @file_get_contents($file);
    if (!$contents)
      error("File couldn't open or doesn't exist");
    $authentication = unserialize($contents);

    foreach ($authentication as $key => $element)
    {
      if ($element["login"] === $oldlogin)
      {
        $found_key = $key;
        break;
      }
    }
    if (!isset($found_key))
      error("Couldn't find Login");
    if ($authentication[$found_key]['passwd'] !== hash("whirlpool", $oldpw))
      error("Old Password doesn't match database");
      $_SESSION["logged"] = $newlogin;
      $authentication[$found_key]["login"] = $newlogin;
      $authentication[$found_key]["passwd"] = hash("whirlpool", $newpw);
      $_SESSION["email"] = $newemail;
      $authentication[$found_key]["email"] = $newemail;
      file_put_contents($file, serialize($authentication));
    return true;
  }

  // function get_user_email($login)
  // {
  //   $file = "./private/passwd";
  //   $contents = @file_get_contents($file);
  //   if (!$contents)
  //     error("File couldn't open or doesn't exist");
  //   $authentication = unserialize($contents);

  //   foreach ($authentication as $key => $element)
  //   {
  //     if ($element["login"] === $oldlogin)
  //     {
  //       $found_key = $key;
  //       break;
  //     }
  //   }
  //   if (!isset($found_key))
  //     error("Couldn't find Login");
  //   $email = $authentication[$found_key]["email"]
  // return $email
  // }

	if ($_POST['delete'] == 'delete')
		delete($_SESSION["logged"]);
	if ($_POST['submit'] !== "OK")
		error("Button is wrong");
	if (!$_POST["oldlogin"] || !$_POST["newlogin"] || !$_POST["oldpw"] || !$_POST["newpw"] || !$_POST["email"])
		error("Missing input");

  modify_user_info($_POST["oldlogin"], $_POST["newlogin"], $_POST["oldpw"], $_POST["newpw"], $_POST["email"]);
	header("Location: index.php?status=motdepassechange");
	echo "OK\n";
?>
