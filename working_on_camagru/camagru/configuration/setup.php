<?php
$server = "localhost";
$username = "root";
$password = "changeme";
try{
    $conn = new PDO("mysql:host=$server;dbname=camagru", $username, $password);
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   //$conn ->exec("DROP DATABASE IF EXISTS camagru;");
   // $conn ->exec("CREATE DATABASE IF NOT EXISTS camagru;");
    $sql = "USE camagru";
    
    $sql = "CREATE TABLE IF NOT EXISTS User (
        id INT(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(25) NOT NULL,
        `password` VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        verified int(12) NOT NULL,
        verified_code int(12) NOT NULL
        )";

       $conn->exec($sql);
     echo "successfully";

}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
$conn = NUll;
?>