<?php
session_start();
include_once("../config/setup.php");

$user = $_POST['uname'];
$date = time();

if(isset($_POST["UploadImage"])){
	$random = rand();
    $folder = "uploads/";
    $image = $_FILES["FileToUpload"]["name"];
	$path = $folder .$random. $image;
	echo $path;
    $target_file = $folder.basename($_FILES["FileToUpload"]["name"]);
    $ImageType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    $allowed = array('jpeg', 'png', 'jpg');
    $filename = $_FILES["FileToUpload"]["name"];
    $EXT = pathinfo($filename,PATHINFO_EXTENSION);
    
    if(!in_array($EXT,$allowed)){
        echo "Sorry, only jpg, jpeg, png files are allowed.";
	}else{
		if (move_uploaded_file($_FILES['FileToUpload']['tmp_name'], "../".$path)) {
    	    $stmt = $conn->prepare("INSERT INTO IMAGES (image_source, image_date, image_user) 
    	    VALUES ('$path', '$date', '$user')");
			$stmt->execute();
			header("Location: ../gallery.php");
		} else {
			echo "failed to upload";
		}

}
}
?>
