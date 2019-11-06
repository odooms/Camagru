<?php
session_start();
require("../config/database.php");

if(isset($_POST['login'])){
    $Uname = trim(htmlspecialchars($_POST['uname']));
    $pwd = trim(htmlspecialchars($_POST['pword']));
    try{
        if(empty($Uname) || empty($pwd)){
            $_SESSION["error"] = "please fill in all the fields";
            header("Location: ./login.php");
            return;
        }else{
            $conn = new PDO("mysql:host=$server;dbname=camagru", $username, $password);
            $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $temp = $conn->prepare("SELECT id FROM users WHERE username = :username AND passwd = :passwd");
            $temp->bindParam(':username', $Uname);
            $temp->bindParam(':passwd', $pwd);
            $temp->execute();
            
            if(!$temp->rowCount()){
                echo "Either your email or password is incorrect";
            }else{
               
                $idArray = $temp->fetch(PDO::FETCH_NUM);
               $id = $idArray[0];
               $_SESSION['id'] = $id;
               echo $id;
            }
        }
    }
    catch(PDOException $e)
    {
        die($e->getMessage()); 
    }
}
?>