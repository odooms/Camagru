<?php
session_start();
include_once("../config/database.php");
//error_reporting(0);

if(isset($_POST['signup']))
{
    $userName = $_POST['uname'];
    $passWord = $_POST['pwd1'];
    $userEmail = $_POST['email'];
  //  $userName = trim($_POST["uname"]);
    $verifiED = 0;
    $verified_CODE = rand(10000, 90000);
    //$_SESSION["error"] = null;
    
    try {
        if (empty($userName) || empty($userEmail) || empty($passWord)) {
            $_SESSION["error"] = "Please enter all fields";
            header("Location: ./registration.php");
            return ;
        }
        else
        {
            $conn = new PDO("mysql:host=$server;dbname=camagru", $username, $password);
            $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $temp = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $temp->execute([ ':email' => $userEmail ]);
            /*$result = $temp->fetchAll();*/
            $count = $temp->rowCount();

            if($count > 0){
                $_SESSION["error"] = "Email already exist Please try another email!!!";
                header("Location: ./registration.php");
                return ;
            } else {
                $stmt = $conn->prepare("INSERT INTO users (username, passwd, email , verified, verified_code)
                VALUES (:username, :passwd, :email, :verified, :verified_code)");
                $stmt->bindParam(':username', $userName);
                $stmt->bindParam(':passwd', $passWord);
                $stmt->bindParam(':email', $userEmail);
                $stmt->bindParam(':verified', $verifiED);
                $stmt->bindParam(':verified_code', $verified_CODE);
                $stmt->execute();
                $_SESSION["error"] = "Please confirm email to login!!";
                header("Location: ./registration.php");
                return ;
            }
        }
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
} 
?>