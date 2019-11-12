<?php
session_start();
include_once("../config/database.php");

if (isset($_POST['reset_password'])){
    //$_SESSION["forgot"] = $_POST['email'];
   /* if(!filter_var($email, FILTER_VARIDATE_EMAIL)){
        $_SESSION["forgot"] = "Email address is invalid";
    }if(empty($errors)){
        $_SESSION["forgot"] = "Email required";
    }*/
    try{
        $conn = new PDO("mysql:host=$server;dbname=camagru", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'database connected';
        /*$sql = "SELECT * FROM users WHERE email='$email' limit 1";

        $result = query($conn, $sql);
        $ver_key = fetch($result);
        $verified_code = $ver_key['verified_code'];
        sendLink($email, $verified_code);
        header('location: password_message.php');*/
    }
    catch(PDOException $error)
    {
        $error->getMessage();
    }
}
?> 