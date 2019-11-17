<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$server = "localhost";
$username = "root";
$password = "changeme";
$db = "Camagru";

$user = "orion";
$date = time();

    $conn = new PDO("mysql:host=$server;dbname=$db", $username, $password);
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST["UploadImage"])){
    $folder = "uploads/";
    $image = $_FILES["FileToUpload"]["name"];
    $path = $folder . $image;
    $target_file = $folder.basename($_FILES["FileToUpload"]["name"]);
    $ImageType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    $allowed = array('jpeg', 'png', 'jpg');
    $filename = $_FILES["FileToUpload"]["name"];
    $EXT = pathinfo($filename,PATHINFO_EXTENSION);
    
    if(!in_array($EXT,$allowed)){
        echo "Sorry, only jpg, jpeg, png files are allowed.";
    }else{ 
        $stmt = $conn->prepare("INSERT INTO IMAGES (image_source, image_date, image_user) 
        VALUES ('$path', '$date', '$user')");
                $stmt->execute();

}
}

?>