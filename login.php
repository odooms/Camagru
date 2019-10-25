<?php
//include "dbh.inc.php";
?>

<!DOCTYPE html>
<html>
    <head>
                <meta charset= "utf-8">
                <link rel="stylesheet" type="text/css" href="Camagru.css">
    <body>
        <div class= "header">
                <a href= "index.php">HOME PAGE</a>
        </div>
        <div class = "login_form">
                <h1>Login</h1>
                <form action= "user.php" method= "POST">
                <P>Username</P>
                <input class = "uname" type= "username" placeholder = "Enter Username" name = "uname" required/>
        <br>
                <p>Password</P>
                <input class = "pwd" type= "password" placeholder = "Enter Password" name= "passwd" requied/>
        <br>
                <input type = "submit" name= "login">
        <br>
                <a href= "#" type = "forget"> Forget your password</a>
        <br>
                <a href= "sign_up.php" type = "signup"> Don't have account sign up</a></p>
        </form>
        </div>
    </body>
    </head>
</html>