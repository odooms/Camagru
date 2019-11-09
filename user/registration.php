<?php
session_start();
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
                    <input class = "email" placeholder = "Enter Email" name = "email"/><br>
                    <input class = "pwd" type= "password" placeholder = "Enter Password" name= "pwd1"/><br>
                    <input class = "pwd" type= "password" placeholder = "Confirm Password" name= "pwd2"/><br>
                    <button type="submit" name="signup">Create Account</button>
                    <p><a href= "login.php">Back to the login</a></p>
                </form>
            </div>
        </body>
    </head>
</html>
