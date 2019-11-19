<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="Camagru.css">
        <body>
            <div class= "header">
                <a href= "../home.php">HOME PAGE</a>
            </div>
            <div class = "wrap";>
                <h1>User account</h1>
                <?php
                    if ($_SESSION["mod_error"]) {
                        echo $_SESSION["mod_error"];
                    }
                    $_SESSION["mod_error"] = null;
                ?>
                <form method= "post" action = "modify_setup.php">
                    <p>1)<a href= "change_username.php">change Username</a></p>
                    <input class = "email" type = "email" placeholder = "Enter Email" name = "mod_email"/><br>
                    <input class = "pwd" type= "password" placeholder = "Enter Password" name= "mod_pwd1"/><br>
                    <input class = "pwd" type= "password" placeholder = "Confirm Password" name= "mod_pwd2"/><br>
                    <button type="submit" name="modify">update account</button>
                    
                </form>
            </div>
        </body>
    </head>
</html>