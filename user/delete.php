<?php
session_start();
include_once("../config/setup.php");

/*$img = $_POST['snap_shot'];
$folder = "user/uploads/";*/

if (isset($_POST['delete'])) {

    try {
        $id = $_POST['image_source'];
        echo $_POST['image_source'];
        // sql to delete a record
        $sql=$conn->prepare("DELETE FROM images WHERE image_source=:image_source");
        $sql->bindParam(":image_source",$id);
        $sql->execute();
        header("Location: ../gallery.php");
        return;
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
    
    $conn = null;
    

}

?>