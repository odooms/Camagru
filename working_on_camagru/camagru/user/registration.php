<?php 

$email = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
$email = test_input($_POST["email"]);
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return ($data);
    }
if (empty($_POST["email"])){
    $EmailERROR = "Email is required";
}else{
    $email = test_input($_POST["email"]);
    // do filter validate in html
    //$email = input($_POST["email"]);
   // if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
     //   $EmailERROR = "Invaild format and please re-enter vaild email";
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="Camagru.css">
<body>
<div class= "header">
<a href= "index.php">HOME PAGE</a>
</div>
<div class = "wrap";>
<h1>sign up</h1>
<form method= "post" action = "">
<input class = "uname" type= "text" placeholder = "Enter Username" name = "uname"/><br>
<span class = "error"><?php if (isset($UnameERROR)) echo $UnameERROR ?> </span>
<input class = "email" placeholder = "Enter Email" name = "email"/><br>
<span class = "error"><?php if (isset($EmailERROR)) echo $EmailERROR ?> </span>
<input class = "pwd" type= "password" placeholder = "Enter Password" name= "pwd1"/><br>
<span class = "error"><?php if (isset($Pwd1ERROR)) echo $Pwd1ERROR ?> </span>
<input class = "pwd" type= "password" placeholder = "Confirm Password" name= "pwd2"/><br>
<span class = "error"><?php if (isset($Pwd2ERROR)) echo $Pwd2ERROR ?> </span>
<button type = "submit" name= "login">Submit</button>
<p><a href= "login.php">Back to the login</a></p>
</form>
</div>
</body>
</head>
