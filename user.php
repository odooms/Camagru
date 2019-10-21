<?php
session_start();
$login = $_GET["name"];
$passwd = $_GET["passwd"];
$submit = $_GET["submit"];
if ($login && $passwd && $submit == "OK")
{
    $_SESSION["login"] = $login;
    $_SESSION["passwd"] = $passwd;
}
?>



<html>
<style>
body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
}
.login_form{
    width: 320px;
    height:420px;
    border-style: outset;
    background-color: #000;
    color: #FFF;
    top: 20%;
    left: 50%;
    position: absolute;
    transform: translate(-50,-50);
    box-sizing: border-box;
}
/*.uname{
    border-style: groove;
    color: #0033cc;

}
.pwd{
    border-style: groove;
    color: #6600ff;
}*/

h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 22px;
}
.login_form p{
    margin: 0;
    padding: 0;
    font-weight: bold;
}
input{
    width: 100%;
    margin-bottom:20px:
}
.login_form input[type = "username"], input[type = "password"]{
    border: none;
    border-bottom: 1px soild #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}
.login_form a{
text-decoration: none;
font-size: 12px;
line-height: 20px;
color: darkgrey;
}


</style>
    <body>
    <div class = "login_form";>
    <h1>Login</h1>
    <form method= "GET">
    <P>Username</P>
    <input class = "uname" type= "username" placeholder = "Enter Username" name = "name" required/>
    <br>
    <p>Password</P>
    <input class = "pwd" type= "password" placeholder = "Enter Password" name= "pwd" requied/>
    <br>
    <input type= "submit" name= "login">
    <br>
    <a href= "#"> Forget your password</a>
    <br>
    <a href= "#"> Don't have account sign up</a></p>
    </form>
    </div>
    </body>
</html>