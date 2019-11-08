<?php
include_once("../config/database.php");
if(isset($_GET['verified_code'])){
    $ver_code = $_GET['verified_code'];

    $conn = new PDO("mysql:host=$server;dbname=camagru", $username, $password);
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Validate the email 
    $temp = $conn->prepare("SELECT verified,verified_code FROM users WHERE verified 0 AND verified_code = '$ver_code' LIMIT 1");
    if($temp->num_row == 1){
        $update = $conn->prepare("UPDATE USER SET verified = 1 WHERE verified_code");
        if($update){
            echo"Your account has been verified, You my now login.";
        }else{
            $conn ->error;
        }
    }else{
        echo "This account invalid or already verified";
    }
}else{
    die("Something went Wrong");
}
?>
<html>
<head>
<meta charset= "utf-8">
<link rel="stylesheet" type="text/css" href="user/style/style.css">
</head>
<body>
</body>
</head>
</html>
