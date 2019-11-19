<?php
include_once("../config/setup.php");
session_start();
$email = $_SESSION['updatePasswdNeedEmail'] =
echo $_SESSION['updatePasswdNeedEmail'];
if(isset($_POST['new_password'])){
echo $update_email;
echo $email;
echo $reset_email;
$passWord = $_POST['New_passd'];
$Confirm_Password = $_POST['confirm_new_passd'];
echo $passWord;
echo $Confirm_Password;

}
// try{
//     if ($passWord != $Confirm_Password){
//        $_SESSION["error"] = "Your passwords do not match";
//        header("Location: ./new_password.php");
//        return ;
//     }else{
//         header("Location: ./update_password.php");
//        return ;
// //         $sql = "UPDATE users SET passwd ':passwd' Where email ':email'";
// //         $stmt->bindparam(':passwd', $passWord);
// //         $stmt->bindparam(':email', $email);
// //         $stmt = $conn->prepare($sql);
// //         $stmt->execute();
// //         echo "successfully";
//     }
// }
// catch(PDOException $e)
// {
//     echo $sql . "<br>" . $e->getMessage(); 
// }
?>