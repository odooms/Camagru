<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include_once("../config/setup.php");
echo "hello";

if(isset($_POST["savephoto"]))
{
    $user = $_SESSION['login_user'];
    $date = time();
    $imagePath = $_SESSION['imagePath'];

    try{
        $stmt = $conn->prepare("INSERT INTO images (image_source, image_date, image_user)
        VALUES (:image_source, :image_date, :image_user)");
        $stmt->bindParam(':image_source', $imagePath);
        $stmt->bindParam(':image_date', $date);
        $stmt->bindParam(':image_user', $user);
        $stmt->execute();
        header("Location: ../gallery.php");
    }
    catch(PDOException $e)
    {
        echo "Error: ". $e->getMessage();
    }
}
?>