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
                    
                    <input class = "uname" type = "text" placeholder = "Enter your new username" name = "mod_user"/><br>
                    <input class = "email" type = "email" placeholder = "Enter Email" name = "mod_email"/><br>
                    <input class = "pwd" type= "password" placeholder = "Enter Password" name= "mod_pwd1"/><br>
                    <input class = "pwd" type= "password" placeholder = "Confirm Password" name= "mod_pwd2"/><br>
                    
                    
                    <label class = "switch">Email Notification
                    <input type = "checkbox" name = "No_Email" value= "1">
                    <span class ="slider"></span>
                    </label>
                    <button type="submit" name="modify"form="test" formaction="javascript:alert(1)">update account</button>
                </form>
            </div>
        </body>
    </head>
</html>
