<?php
$DBserver = "localhost";
$DBuser = "root";
$DBpass = "changeme";
$DBname = "camagru";

try{
    $conn = new PDO("mysql:host= {$DBserver};dbname= {$DBname}", $DBuser, $DBpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //  $sql = "INSERT INTO users_table (user_email, user_username, user_password) 
   // VALUES ($email, $uname, $pwd, )";
    echo("ok");
}catch(PDOException $ex){
    die($ex->getMessage());
}
$conn = NULL; 
?>