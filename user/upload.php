<?php
include_once("../config/setup.php");
session_start();

if(isset($_POST['uploads'])){
    $countfiles = count($_FILES['uploads']['name']);
    $temp = "INSERT INTO images (name, image) values(?,?)";
    $stmt = $conn->prepare($temp);
    
    //loop all files
    for($i = 0; $i< $countfiles;$i++)
    // file name
    $filename = $_FILES['uploads']['name'][$i];
    $EXT = end((explode(".", $filename)));
    $valid_ext = array("png", "jpeg", "jpg");
    if(in_array($EXT, $valid_ext)){
        if(move_upload_file($_FILES['uploads']['tmp_name'][$i], 'upload/'.$filename)){

        $stmt->execute(array($filename,'upload/'.$filename));
        }
        }
    
    echo "file  upload successfully";

}
?>