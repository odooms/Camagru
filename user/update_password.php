<?php
include_once("../config/setup.php");
session_start();

$upemail = $_SESSION['email'];

if(isset($_POST['new_password'])){
    $passWord = $_POST['New_passd'];
    $Confirm_Password = $_POST['confirm_new_passd'];

    try{
        if($passWord != $Confirm_Password){
            $_SESSION["pwd_error"] = "Your passwords do not match";
            header("Location: ./new_password.php");
            return ;
        }elseif (preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[A-Z]).*$/", $passWord) == 0){
            $_SESSION["pwd_error"] = "Password must be at least 8 characters and must 
            contain at least no lower case letter, upper case letter and digits";
            header("Location: ./new_password.php");
            return;
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
                echo "hello";
                $updated_passWord = md5($passWord);
                $sql = "UPDATE users SET passwd='$updated_passWord' Where id='$id'";
                $tmp = $conn->prepare($sql);
                $tmp->execute();
                header("Location: ./login.php");
                echo "successfully";
            }
        }
    }
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage(); 
}
}
?>