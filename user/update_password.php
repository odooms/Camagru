<?php
session_start();
$email = $_GET['email'];
$passWord = $_POST['new_passd'];
$Confirm_Password = $_POST['confirm_new_passd'];
try{
    if ($passWord != $Confirm_Password){
        $_SESSION["error"] = "Your passwords do not match";
        header("Location: ./new_password.php");
        return ;
    }else{
        $sql = "UPDATE users SET passwd ':passwd' Where email ':email'";
        $stmt->bindparam(':passwd', $passWord);
        $stmt->bindparam(':email', $email);
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo "successfully";
    }
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage(); 
}
?>