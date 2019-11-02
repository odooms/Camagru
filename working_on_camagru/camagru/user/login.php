<?php
include("setup.php");
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if (empty($_POST["uname"])){
        $UnameERROR = "Username is required";
    }else{
        $uname = test_input($_POST["uname"]);
    }
    if (empty($_POST["pword"])){
        $PwordERROR = "Password is required";
    }else{
        $pword = test_input($_POST["pword"]);
    }

    $logUname = mysql_string($db, $_POST["uname"]);
    $logpword = mysql_string($db, $_POST["pword"]);
    
    $sql = "SELECT id FROM user WHERE username = '$logUname' AND password '$logPword'";
    $result =  mysql_query($db, $sql);
    $row = mysql_fetch($result, MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num($result);

    if($count == 1){
        session_register("uname");
        $_SESSION['login_user'] = $logUname;

        header("location:welcome.php");
    }else{
        $error = "Your Login Name or Password is Invalid";
    }
}
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
<div class = "wrap">
<h1>Login</h1>
<form  role = "form" action= "user.php" <?php htmlspecialchars($_SERVER['PHP_SELF']);?> method = "POST">
<input class = "uname" type= "username" placeholder = "Enter Username" name = "uname" />
<span class = "error"><?php if (isset($UnameERROR)) echo $UnameERROR ?> </span>
<input class = "pwd" type= "password" placeholder = "Enter Password" name= "pword" />
<span class = "error"><?php if (isset($PwordERROR)) echo $PwordERROR ?> </span>
<button type = "submit" name= "login">Submit</button>
<br>
<a href= "#" type = "forget"> Forget your password</a>
<br>
<a href= "registration.php" type = "signup"> Don't have account sign up</a></p>
</form>
<div><?php echo $error;?></div>
</div>
</body>
</head>
</html>