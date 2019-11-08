<?php
session_start();
include_once("../config/database.php");

if(isset($_POST['signup']))
{
    //Get form data
    $userName = $_POST['uname'];
    $passWord = $_POST['pwd1'];
    $Confirm_Password = $_POST['pwd2'];
    $userEmail = $_POST['email'];
    $verifiED = 0;
    
    try {
        if (empty($userName) || empty($userEmail) || empty($passWord)) {
            $_SESSION["error"] = "Please enter all fields";
            header("Location: ./registration.php");
            return ;
        }elseif (strlen($userName) < 5){
            $_SESSION["error"] = "Your username must be at least 5 characters";
            header("Location: ./registration.php");
            return ;
        }elseif ($passWord != $Confirm_Password){
            $_SESSION["error"] = "Your passwords do not match";
            header("Location: ./registration.php");
            return ;
        }
        //form is vaild
        else
        {
            $conn = new PDO("mysql:host=$server;dbname=camagru", $username, $password);
            $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $temp = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $temp->execute([':email' => $userEmail]);
            $count = $temp->rowCount();

            if($count > 0){
                $_SESSION["error"] = "Email already exist Please try another email!!!";
                header("Location: ./registration.php");
                return ;
            } else {
                //generate verified_code
                $verified_CODE = md5($_POST['uname']);
                //Insert account into the database
                $passWord = md5($passWord);
                $stmt = $conn->prepare("INSERT INTO users (username, passwd, email , verified, verified_code)
                VALUES (:username, :passwd, :email, :verified, :verified_code)");
                $stmt->bindParam(':username', $userName);
                $stmt->bindParam(':passwd', $passWord);
                $stmt->bindParam(':email', $userEmail);
                $stmt->bindParam(':verified', $verifiED);
                $stmt->bindParam(':verified_code', $verified_CODE);
                $stmt->execute();
                //send Email
                if($stmt){
                    $to = $userEmail;
                    $subject = "Email Verification";
                    $message = "<a href='http://localhost/Camagru/user/registration.php/verify.php?verified_code=$verified_CODE'>Register Account</a>";
                    $header = "From: odooms@student.wethinkcode.co.za \r\n";
                    mail($to, $subject,$message,$header);
                    echo "ok";
                    header("Location: ../thankyou.php");
                }else{
                    echo "error";
                }
                // $_SESSION["error"] = "Please confirm email to login!!";
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