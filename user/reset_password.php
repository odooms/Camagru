<?php
session_start();
include_once("../config/setup.php");

 if(isset($_POST['email'])){
     $email = $_POST['email'];
     if(!filter_var($email, FILTER_VARIDATE_EMAIL)){
         $_SESSION["error"] = "Email address is invalid";
     }if(empty($errors)){
         $_SESSION["error"] = "Email required";
     }
 echo $email;
   try{
       $temp = $conn->prepare("SELECT id FROM users WHERE email = ?");
       $temp->bindParam(1, $email);
       $temp->execute();
       if(!$temp->rowCount()){
           $_SESSION["error"] = "Your email is incorrect";
           echo "Your email is incorrect";
        
        }else{
            // $idArray = $query->fetch(PDO::FETCH_NUM);
            // $id = $idArray[0];
            // $_SESSION['id'] = $id;
            // echo $id;
           $to = $email;
           $subject = "Reset your password";
           echo $message = "
           <html>
           <head>
           <title>Reset your password
           </title>
           </head>
           <body>
           <P>This email contains a link</P>
           <a href='http://localhost:8080/Camagru/user/new_password.php?verified_code=".$verified_CODE."&email=".$userEmail."'>Register Account</a>
           </body>
           </thml>";
           $headers = "From: odooms@student.wethinkcode.co.za \r\n";
           $headers = "MIME-Version: 1.0" . "\r\n";
           $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
           mail($to, $subject, $msg, $headers);
           header("Location: ./registration.php");
        // }else{
        //     echo "error";
        // }
        // return ;
        }
    }catch(Exception $error){
     die($error->getMessage());
    }
}
?> 
