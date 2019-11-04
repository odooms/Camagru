<?php
//require("configuration/setup.php");
$username = $email = $password = $Confirm_password = "";
if($_SERVER["REQUEST_METHOD"] === "POST")
{
    if(empty($_POST["uname"])) {
        $UnameERROR = "Please enter a username.";
	}else{
        $username = validate($_post['uname']);
            if(!preg_match('/^[a-zA-Z0-9\s]+$/', $username)){
            $UnameERROR = 'Name can only contain letters, numbers and white spaces';
        }
    }
    if(empty($_POST["email"])) {
        $EmailERROR = "Please enter you email.";
    }else{
        $email= validate($_post['email']);
            if(!filter_var($email, FILTER_VATIDATE_EMAIL)){
            $EmailERROR = 'Invalid Email';
        }
    }
    if(empty($_POST["pwd1"])) {
        $Pwd1ERROR = "Password cannot be empty";
    }else{
        $password= validate($_post['pwd1']);
            if(strlen($password) < 6 ){
            $Pwd1ERROR = 'Please should be longer than 6 characters';
        }
    }
    if(empty($_POST["pwd2"])) {
        $Pwd2ERROR = "Confirm password cannot be empty";
    }else{
        $Confirm_password = validate($_post['pwd2']);
            if(strlen($Confirm_password ) < 6 ){
            $Pwd2ERROR = 'Please should be longer than 6 characters';
        }
    }
}

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
