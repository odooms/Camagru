<?php
require_once("/goinfre/odooms/Desktop/MAMP/apache2/htdocs/camagru/configuration/setup.php");
//require("configuration/setup.php");
require("registration.php");
// Code for checking username availablilty
if(!empty($_POST["uname"])){
    $username = $_POST["uname"];
    $sql = "SELECT username FROM User WHERE username=:username";
    $query= $conn->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->exec();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0){
        echo "<span style = 'color: red'>Username already exists.</span>";
    }else{
        echo "<span style = 'color: red'>Username available for Registration.</span";   
    }
}
// Code for checking email availablilty
if(!empty($_POST["email"])){
    $email = $_POST["email"];
    $sql = "SELECT email FROM User WHERE email=:email";
    $query= $conn->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->exec();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0){
         echo "<span style = 'color: red'>Email-id already exists.</span>";
     }else{
        echo "<span style = 'color: red'>Email-id available for Registration.</span>";
     }
 }
?>