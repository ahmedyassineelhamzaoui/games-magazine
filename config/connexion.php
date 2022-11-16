<?php

    require_once '../vendor/autoload.php';
    $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();
    $servername=$_ENV['DB_SERVERNAME'];
    $username=$_ENV['DB_USERNAME'];
    $name=$_ENV['DB_NAME'];
    $password=$_ENV['DB_PASSWORD'];
    //CONNECT TO MYSQL DATABASE USING MYSQLI
    $Connexion = mysqli_connect($servername,$username,$password,$name);
    if (!$Connexion) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>