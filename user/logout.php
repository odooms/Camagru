<?php
echo "hello";
session_start();
session_destroy();
unset($_SESSION['uname']);
unset($_SESSION['email']);
header("Location: ../user/login.php");
?>