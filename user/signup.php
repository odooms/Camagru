<?php
include_once("../configuration/setup.php");
error_reporting(0);
echo("ok");

if(isset($_POST['signup']))
{
    $username = $_POST['uname'];
    $userEmail = $_POST['email'];
    $password = $_POST['pword'];
    
    $server = "localhost";
    $username = "root";
    $password = "changeme";
    try{
        $conn = new PDO("mysql:host=$server", $username, $password);
        $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn ->exec("USE camagru");

        $sql = "INSERT INTO user (username, `password`, email) VALUES ('username', 'password', 'userEmail')";
        
        $conn->exec($sql);
        echo "New record created successfully";
    }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    echo("oxx");
$conn = null;
}
?>