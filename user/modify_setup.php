<?php
session_start();
include_once("../config/setup.php");
$upemail = $_SESSION['email'];

if(isset($_POST['modify']))
{
    //Get form data
    $userName = $_POST['mod_user'];
    $passWord = $_POST['mod_pwd1'];
    $Confirm_Password = $_POST['mod_pwd2'];
    $userEmail = $_POST['mod_email'];
    $verifiED = 0;
    
    if(isset($_POST['No_Email']) && $_POST['No_Email'] == '1')
    {
        $Email_Notification = 1;
        $_SESSION['Email_Notification'] = $Email_Notification;
    }else{
        $Email_Notification = 0;
        $_SESSION['Email_Notification'] = $Email_Notification;
    }
    try {
        if (empty($userName) || empty($userEmail) || empty($passWord)) {
            $_SESSION["mod_error"] = "Please enter all fields";
            header("Location: ./modify_account.php");
            return ;
        }elseif (strlen($userName) < 5){
            $_SESSION["mod_error"] = "Your username must be at least 5 characters";
            header("Location: ./modify_account.php");
            return ;
        }elseif (preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[A-Z]).*$/", $passWord) == 0){
            $_SESSION["mod_error"] = "Password must be at least 8 characters and must 
            contain at least no lower case letter, upper case letter and digits";;
            header("Location: ./modify_account.php");
            return ;
        }elseif ($passWord != $Confirm_Password){
            $_SESSION["mod_error"] = "Your passwords do not match";
            header("Location: ./modify_account.php");
            return ;
        }else{
            $temp = $conn->prepare("SELECT id FROM users WHERE email = :email");
            $temp->bindparam(':email', $upemail);
            $temp->execute();
            if(!$temp->rowCount()){
                echo "not successfully";
            }else{
                $idArray = $temp->fetch(PDO::FETCH_NUM);
                $id = $idArray[0];
                $_SESSION['id'] = $id;
                
                $New_passWord = md5($passWord);
               
                $sql = "UPDATE users SET passwd='$New_passWord', username='$userName',email='$userEmail' ,Email_Notification='$Email_Notification' Where id='$id'";
                $tmp = $conn->prepare($sql);
                $tmp->execute();
                header("Location: ./login.php");
              
            }
        }
    
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
} 
?>