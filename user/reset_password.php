<?php
session_start();
include_once("../config/setup.php");

if(isset($_POST['reset_password'])){
    $email = $_POST['email'];
    if(!filter_var($email, FILTER_VARIDATE_EMAIL)){
        $_SESSION["error"] = "Email address is invalid";
    }if(empty($errors)){
        $_SESSION["error"] = "Email required";
    }
   try{
       $temp = $conn->prepare("SELECT verified_code FROM users WHERE email = ?");
       $temp->bindParam(1, $userEmail);
       $temp->execute();
       if(!$temp->rowCount()){
           //$_SESSION["error"] = "Email already exist Please try another email!!!";
           echo "Email already exist Please try another email!!!";

        }else{
            
            $id = $idArray[0];
            $_SESSION['id'] = $id;
            echo $id;
            
            }
      //  $verified_code = $ver_key['verified_code'];
     //   sendLink($email, $verified_code);
      //  header('location: password_message.php');
    }
    echo '---cool----';
    catch(PDOException $error)
 {
     $error->getMessage();
    }
}
?> 