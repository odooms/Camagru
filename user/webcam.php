<?php
session_start();
include_once("../config/setup.php");
	// $U_Email = $_GET['email'];
    // echo $U_Email
$user = "orion";
$date = time();
if(isset($_POST["snap_shot"])){
$folder = "uploads/";
$source = $_FILES["upimage"]["tmp-name"];
$dest = $folder . $source;
// $dest = "upload.png";

$stmt = $conn->prepare("INSERT INTO IMAGES (image_source, image_date, image_user) 
VALUES ('$dest', '$date', '$user')");
$stmt->execute();
}

       