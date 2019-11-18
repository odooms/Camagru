<?php
session_start();
include_once("../config/setup.php");

if(isset($_POST['modify']))
{
    //Get form data
    
    $userName = $_POST['mod_uname'];
    $passWord = $_POST['mod_pwd1'];
    $Confirm_Password = $_POST['mod_pwd2'];
    $userEmail = $_POST['mod_email'];
    $verifiED = 0;
    
    try {
        if (empty($userName) || empty($userEmail) || empty($passWord)) {
            $_SESSION["mod_error"] = "Please enter all fields";
            header("Location: ./modify_account.php");
            return ;
        }elseif (strlen($userName) < 5){
            $_SESSION["mod_error"] = "Your username must be at least 5 characters";
            header("Location: ./modify_account.php");
            return ;
        }elseif (strlen($passWord) < 8){
            $_SESSION["mod_error"] = "Your Password must be at least 8 characters";
            header("Location: ./modify_account.php");
            return ;
        }elseif ($passWord != $Confirm_Password){
            $_SESSION["mod_error"] = "Your passwords do not match";
            header("Location: ./modify_account.php");
            return ;
        }
    
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
} 