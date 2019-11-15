<?php
session_start();
require("../config/setup.php");
function validation($data){
    $data = trim($trim);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};
if(isset($_POST['login'])){
    $Email = trim(htmlspecialchars($_POST['email']));
    $pwd = trim(htmlspecialchars($_POST['pword']));
    //$pwd = $_POST['pword'];
    
    $pwd = md5($pwd);
    
    try{
        if(empty($Email) || empty($pwd)){
            $_SESSION["error"] = "please fill in all the fields";
            header("Location: ./login.php");
            return;
        }
        else
        {
           // $conn = new PDO("mysql:host=$server;dbname=camagru", $username, $password);
          //  $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $temp = $conn->prepare("SELECT id FROM users WHERE email = :email AND passwd = :passwd");
            $temp->bindParam(':email', $Email);
            $temp->bindParam(':passwd', $pwd);
            $temp->execute();
            
            if(!$temp->rowCount()){
                
                $_SESSION["error"] = "Either your email or password is incorrect";
                header("Location: ./login.php");
                return;
            }else{
                
               // $idArray = $temp->fetch(PDO::FETCH_NUM);
               // $id = $idArray[0];
               // $_SESSION['id'] = $id;
                header("Location: ../home.php");
                return ;
            }
        }
    }
    catch(PDOException $e)
    {
        die($e->getMessage()); 
    }
}
?>