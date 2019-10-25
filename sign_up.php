<?php
include "dbh.inc.php";
$uname = $_POST['uname'];
$email = $_POST['email'];
if ($_POST['passwd'] == $_POST['pass'])
{
    $password = $_POST['passwd'];
}
$stmt = $conn->prepare("");
execute($stmt);
header ("location:sign_up.php")
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset= "utf-8">
        <meta name= >
        <link rel="stylesheet" type="text/css" href="Camagru.css">
    <body>

    <div class= "header">
                <a href= "index.php">HOME PAGE</a>
    </div>
    <div class = "login_form";>
                <h1>sign up</h1>
    <form method= "post">
                <P>Email address</P>
                <input class = "email" type= "email_address" placeholder = "Enter Email" name = "email" required/>
        <br>
                <P>Create a Username</P>
                <input class = "uname" type= "username" placeholder = "Enter Username" name = "uname" required/>
        <br>
                 <p>Create a Password</P>
                 <input class = "pwd" type= "password" placeholder = "Enter Password" name= "pwd1" requied/>
        <br>
                <p>Confirm Password</P>
                <input class = "pwd" type= "password" placeholder = "Enter Password" name= "pwd2" requied/>
        <br>
                <input type = "submit" name= "login">
        <br>
                <p><a href= "login.php">Back to the login</a></p>
        </form>
        </div>
    </body>
    </head>
</html>