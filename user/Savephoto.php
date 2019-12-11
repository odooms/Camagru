<?php
session_start();
include_once("../config/setup.php");

if (isset($_POST['image']))
{
    $image = $_POST["image"];
    $image = explode(";", $image)[1];
    $image = explode(",", $image)[1];
    $image = str_replace(" ", "+", $image);
    
    $image = base64_decode($image);
    $photo = time();
    file_put_contents("../uploads/$photo.jpeg",$image);

    $_SESSION['imagePath'] =  "uploads/$photo.jpeg";
}
?>