<?php

$db_dsn = "mysql:host=$servername;dbname=camagru";
$server = "localhost";
$username = "root";
$password = "changeme";

/*******************
 * 
 * CREATING DATABASE
 * 
 ********************/

try{
    $conn = new PDO("mysql:host=$server", $username, $password);
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn ->exec("DROP DATABASE IF EXISTS camagru;");
    echo "database dropped successfully";
    echo "<br>";
    $conn ->exec("CREATE DATABASE IF NOT EXISTS camagru;");
    echo "database created successfully";
    echo "<br>";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}


/*******************
 * 
 * CREATING TABLES
 * 
 ********************/

try {
    //$conn ->exec("USE camagru");
    $conn = new PDO("mysql:host=$server;dbname=camagru", $username, $password);
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE users (
         id INT(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
         username VARCHAR(25) NOT NULL,
         passwd VARCHAR(50) NOT NULL,
         email VARCHAR(50) NOT NULL,
         verified TINYINT(1) NOT NULL,
         verified_code INT(12) NOT NULL
         )";

    $conn->exec($sql);
    echo "users table created successfully";

}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
//$conn = NUll;
?>