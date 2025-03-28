<?php
$server_name = "localhost";
$username = "root";
$password = "";
$db_name = "CFM";

try {
    $dsn = "mysql:host=$server_name;dbname=$db_name;charset=utf8";
    $pdo = new PDO($dsn, $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo "Erreur de connexion :" . $e->getMessage();
}
