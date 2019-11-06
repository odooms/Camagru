<?php

session_start();

/*require("configuration/setup.php");
$username = $email = $password = $Confirm_password = "";
if($_SERVER["REQUEST_METHOD"] === "POST")
{
    if(empty(trim($_POST["uname"]))) {
        $UnameERROR = "Please enter a username.";
	}else{
        $username = trim($_POST['uname']);
    }
    
    if(empty(trim($_POST["email"]))) {
        $EmailERROR = "Please enter you email.";
    }else{
        $email = trim($_POST['email']);
    }

    if(empty(trim($_POST["pwd1"]))) {
        $Pwd1ERROR = "Password cannot be empty";
    }elseif(strlen(trim($_POST['pwd1'])) < 6){
        $Pwd1ERROR = "Password must have atleast 6 characters.";
    }else{
        $password = trim($_POST["password"]);
    }

    if(empty(trim($_POST["pwd2"]))) {
        $Pwd1ERROR = "Password confirm password.";
    }else{
        $Confirm_password = trim($_POST["pwd2"]);
        if(empty($Pwd1ERROR) && empty($password != $Confirm_password)){
            $Pwd2ERROR = "password did not match.";
        }
    }
}*/
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="Camagru.css">
        <body>
            <div class= "header">
                <a href= "../index.php">HOME PAGE</a>
            </div>
            <div class = "wrap";>
                <h1>sign up</h1>
                <?php
                    if ($_SESSION["error"]) {
                        echo $_SESSION["error"];
                    }
                    $_SESSION["error"] = null;
                ?>
                <form method= "post" action="signup.php">
                    <input class = "uname" type= "text" placeholder = "Enter Username" name = "uname"/><br>
                        <span class = "error"><?php if (isset($UnameERROR)) echo $UnameERROR ?> </span>
                    <input class = "email" placeholder = "Enter Email" name = "email"/><br>
                        <span class = "error"><?php if (isset($EmailERROR)) echo $EmailERROR ?> </span>
                    <input class = "pwd" type= "password" placeholder = "Enter Password" name= "pwd1"/><br>
                        <span class = "error"><?php if (isset($Pwd1ERROR)) echo $Pwd1ERROR ?> </span>
                    <input class = "pwd" type= "password" placeholder = "Confirm Password" name= "pwd2"/><br>
                        <span class = "error"><?php if (isset($Pwd2ERROR)) echo $Pwd2ERROR ?> </span>
                    <button type="submit" name="signup">Create Account</button>
                    <p><a href= "login.php">Back to the login</a></p>
                </form>
            </div>
        </body>
    </head>
</html>
