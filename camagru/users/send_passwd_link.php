<?php
session_start();
include "navbar.php";
include "../config/setup.php";
if ((isset($_SESSION['logged']) && $_SESSION['logged'] !== "")
|| $_POST['email'] === "") {
    header("Location: ../index.php");
    return;
}
try {
    $query = 'SELECT * FROM users WHERE email=:email';
    $prep = $pdo->prepare($query);
// print("yo");
    $prep->bindValue(':email', $_POST['email'], PDO::PARAM_INT);
    $prep->execute();
    if ($prep->rowCount() == 1) {
        $arr = $prep->fetch();
        $prep->closeCursor();
        $prep = null;
        $token = bin2hex(random_bytes(16));

        $query = 'INSERT INTO tokens(id_user, token) VALUES (:id_user, :token)';
        $prep = $pdo->prepare($query);
        $prep->bindValue(':id_user', $arr[id], PDO::PARAM_INT);
        $prep->bindValue(':token', $token, PDO::PARAM_INT);
        $prep->execute();
        $email = $_POST['email'];
        $subject = 'Reinitialisation de mot de passe';
        $message = 'Bonjour http://localhost:8080/camagru/users/reset_passwd_token.php?token='.$token;
        $boundary = "-----=".md5(rand());
        $header = "From: \"Sydney\"<sydney@mailinator.com>\n";
        $header .= "Reply-to: \"Sydney\" <sydney@mailinator.com>\n";
        $header .= "MIME-Version: 1.0\n";
        $header .= "Content-Type: multipart/alternative;\n"." boundary=\"$boundary\"\n";
        mail($email, $subject, $message);
    }

    $prep->closeCursor();
    $prep = null;
    header("Location: ../index.php?msg=Check your email :)");
    return;
//
} catch (PDOException $e) {
    $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
    die($msg);
}
?>
