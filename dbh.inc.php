<?php
//local server information
$server = "localhost";
$username = "root";
$password = "changeme";
$db = "camagru";

try{
    $handle = new PDO("mysql:host=$server;dbname=$db", "$username", "$password");
    $handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO users_table (user_email, user_username, user_password) 
    VALUES ($email, $uname, $pwd, )";
    $conn->exec($sql);
    echo "ok";
}catch(PDOException $e){
    die("oops");
}
$conn = NULL;
?>