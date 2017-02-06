<?php

include "database.php";
try {

    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Ligne 4
    $pdo->exec("CREATE DATABASE IF NOT EXISTS camagru_sycohen");
    $pdo->exec("use camagru_sycohen");
    $pdo->exec("
    CREATE TABLE IF NOT EXISTS users
    (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    CONSTRAINT uc_UserID UNIQUE (username,email)
    );
    ");
    $pdo->exec("
    CREATE TABLE IF NOT EXISTS images
    (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_user INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES Users(id),
    name VARCHAR(255) NOT NULL,
    path VARCHAR(255) NOT NULL
    );
    ");
    $pdo->exec("
    CREATE TABLE IF NOT EXISTS comments
    (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_user INT NOT NULL,
    id_image INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES Users(id),
    FOREIGN KEY (id_image) REFERENCES Images(id),
    content TEXT NOT NULL
    );
    ");
    $pdo->exec("
    CREATE TABLE IF NOT EXISTS likes
    (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_user INT NOT NULL,
    id_image INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES Users(id),
    FOREIGN KEY (id_image) REFERENCES Images(id),
    liked BOOLEAN NOT NULL DEFAULT FALSE
    );
    ");
    $pdo->exec("
    CREATE TABLE IF NOT EXISTS tokens
    (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_user INT NOT NULL,
    token TEXT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES Users(id)
    );
    ");
    // echo "Database 'db_sycohen' created successfully.<br>";
} catch (PDOException $e) {
    $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
    die($msg);
}

?>
