<?PHP
session_start();
include("../config/setup.php");
$password = $_POST['passwd'];
$username = $_POST['login'];
$submit = $_POST['submit'];

if (empty($username)
 || empty($password) || $submit !== "OK") {
    header("Location: login_form.php?msg=Please enter a username and a password");
} else {
    try {
        $query = 'SELECT * FROM users WHERE username=:username AND password=:password;';
        $prep = $pdo->prepare($query);

        $prep->bindValue(':username', $username, PDO::PARAM_STR);
        $prep->bindValue(':password', hash('whirlpool', $password), PDO::PARAM_STR);
        $prep->execute();

        if ($prep->rowCount() == 1)
        {
          $_SESSION['logged'] = $username;
          // echo print_r($_SESSION);
          header("Location: ../shoot.php");
          // exit;
        }
        else
          header("Location: login_form.php?msg=Wrong Password");

        $prep->closeCursor();
        $prep = null;
        return ;
    } catch (PDOException $e) {
        // header("Location: login_form.php");
        $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
        die($msg);
    }
}
?>
