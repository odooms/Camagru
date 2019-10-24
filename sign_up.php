<?php
$uname = $_get["uname"];
$email = $_get["email"];
if ($_get["pwd1"] == $_get["pwd2"])
{
    $pwd = $_get["pwd1"];
}
//$SERVER = 'localhost';
//$username = 'root';
//$password = 'changeme';
//$database = 'camagru';

//try{
  //  $conn = new PDO("mysql:host= $SERVER; dbname = $database;", $username, $password);
//} catch(PDOEXception $e){
  //      die ("Connection faild: ".  $e->getMessage());
//}
//if (!empty($_POST['pwd1']) && !empty($_POST['pwd2']) && !empty($_POST['uname']) && !empty($_POST['email']))
//Enter new user in the database
//endif;

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset= "utf-8">
        <meta name= >
        <!--<link rel="stylesheet" type="text/css" href="Camagru.css">-->
    <body>

    <div class= "header">
            <a href= "index.php">HOME PAGE</a>
        </div>
        <div class = "login_form";>
        <h1>sign up</h1>
        <form method= "GET">
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
        <input class = "pwd" type= " password" placeholder = "Enter Password" name= "pwd2" requied/>
    <br>
        <input type = "submit" name= "login">
    <br>
        <p><a href= "login.php">Back to the login</a></p>
    </form>
        </div>
    </body>
    </head>
</html>