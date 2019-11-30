<?php

$db_dsn = "mysql:host=localhost;dbname=camagru";
$server = "localhost";
$username = "root";
$password = "changeme";
/*CREATING DATABASE*/
try{
    $conn = new PDO("mysql:host=$server", $username, $password);
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn ->exec("CREATE DATABASE IF NOT EXISTS camagru;");
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
/*CREATING TABLES*/
try {
    $conn = new PDO("mysql:host=$server;dbname=camagru", $username, $password);
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS users (
         id INT(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
         username VARCHAR(25) NOT NULL,
         passwd VARCHAR(50) NOT NULL,
         email VARCHAR(50) NOT NULL,
         verified TINYINT(1) NOT NULL,
         verified_code VARCHAR(50) NOT NULL
         )";
    $conn->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS images (
        id INT(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        image_source VARCHAR(255) NOT NULL,
        image_date VARCHAR(200) NOT NULL,
        image_user VARCHAR(50) NOT NULL
        )";

    $conn->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS comments (
        id INT(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        comment VARCHAR(255) NOT NULL,
        image_id VARCHAR(255) NOT NULL,
        `user_id` VARCHAR(200) NOT NULL,
        post_id VARCHAR(50) NOT NULL
        )";
    
    $conn->exec($sql);
    
    $sql = "CREATE TABLE IF NOT EXISTS likes (
            id INT(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `like` INT (12) NOT NULL,
            image_id VARCHAR(255) NOT NULL,
            `user_id` VARCHAR(200) NOT NULL,
            post_id VARCHAR(50) NOT NULL
            )";

    $conn->exec($sql);
    echo "<br>";
}
catch(PDOException $e)
{
	echo "ERROR";
    echo $sql . "<br>" . $e->getMessage();
}

?>
