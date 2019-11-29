<?php
include_once("../config/setup.php");

if(isset($_POST['signup']))
{
    //Get form data
    $userName = $_POST['uname'];
    $passWord = $_POST['pwd1'];
    $Confirm_Password = $_POST['pwd2'];
    $userEmail = $_POST['email'];
    $verifiED = 0;
    //$_SESSION['uname'] = $_POST['uname'];
    
    try {
        if (empty($userName) || empty($userEmail) || empty($passWord)) {
            $_SESSION["error"] = "Please enter all fields";
            header("Location: ./registration.php");
            return ;
        }elseif (strlen($userName) < 5){
            $_SESSION["error"] = "Your username must be at least 5 characters";
            header("Location: ./registration.php");
            return ;
        }elseif (strlen($passWord) < 8){
            $_SESSION["error"] = "Your Password must be at least 8 characters";
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
                    echo $message = "
                    <html>
                    <head>
                    <title>Email verification
                    </title>
                    </head>
                    <body>
                    <P>This email contains a link</P>
                    <a href='http://localhost:8080/Camagru/user/verify.php?verified_code=".$verified_CODE."&email=".$userEmail."'>
                    Register Account</a>
                    </body>
                    </thml>";
                    $header = "From: odooms@student.wethinkcode.co.za \r\n";
                    $header = "MIME-Version: 1.0" . "\r\n";
                    $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    mail($to, $subject,$message,$header);
                    echo "ok";
                    header("Location: ./registration.php");
                    $_SESSION["error"] = "Thank you for registering. we have sent a verification email to the address provided";
                }else{
                    echo "error";
                }
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
