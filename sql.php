<?php

$host = 'localhost';
$username = 'root';
$password = 'root';
$database = null;
$port = 8889; // 3306

echo "<p>Connexion à la SGBD</p>";

$c = mysqli_connect($host, $username, $password, $database, $port);

if(mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit();
}

echo "<p>Connexion établie</p>";

mysqli_set_charset($c, 'utf8mb4');

echo "<p>Création de la base de données</p>";
$database = "biblio_2023w36";
$sql = "CREATE DATABASE IF NOT EXISTS ".$database;

if (!mysqli_query($c, $sql)) {
    echo mysqli_error($c);
    mysqli_close($c);
    exit();
}

echo "<p>Connexion à la base de données</p>";
mysqli_select_db($c, $database);

// heredoc
$sql = <<<SQL
CREATE TABLE IF NOT EXISTS livre (
    id int PRIMARY KEY AUTO_INCREMENT,
    titre varchar(50) not null,
    `resume` text,
    date_parution date
) ENGINE=InnoDB;
SQL;

echo "<p>Création de la table livre</p>";
if (!mysqli_query($c, $sql)) {
    echo mysqli_error($c);
    mysqli_close($c);
    exit();
}

// heredoc
$sql = <<<SQL
CREATE TABLE IF NOT EXISTS utilisateur (
    id int PRIMARY KEY AUTO_INCREMENT,
    username varchar(50) not null,
    password varchar(150) not null,
    `name` varchar(50)
) ENGINE=InnoDB;
SQL;

echo "<p>Création de la table utilisateur</p>";
if (!mysqli_query($c, $sql)) {
    echo mysqli_error($c);
    mysqli_close($c);
    exit();
}

// blowfish
$password = password_hash('admin',  PASSWORD_DEFAULT);
$sql = "INSERT INTO utilisateur (`username`, `password`, `name`) VALUE ('admin', '".$password."', 'John Doe')";

echo "<p>Insertion utilisateur</p>";
if (!mysqli_query($c, $sql)) {
    echo mysqli_error($c);
    mysqli_close($c);
    exit();
}

mysqli_close($c);
