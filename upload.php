<?php
if(isset($_POST["submit_login"])){
    $file = $_FILES['file'];

    $F_Name = $_FILES['file']['name'];
    $F_TmpName = $_FILES['file']['tmp_name'];
    $F_Size = $_FILES['file']['size'];
    $F_Error = $_FILES['file']['error'];
    $F_Type = $_FILES['file']['type'];

    $F_Ext = explode('.', $F_Name);
    $F_ActualExt = strtolower(end($F_Ext));
    $allowed = array('jpg','jpeg','png','pdf');

    if(is_array($F_ActualExt, $allowed)){
        if($F_Error === 0){
            if ($F_Size < 10000000){
                $F_NameNew = uniqid('',true).".".$
                $F_ActualExt;
                $F_Dest = 'uplaods/'.$F_NameNew;
                move_uploaded_file($F_TmpName, $F_Dest);
                header("location: home.php?upload_success");
            }else{
                echo "Your file is too big!";
            }    
            }else{
                echo "There was an error uplaoding your file!";
            }
        }else{
            echo "You cannot upload files of this type";
        }
    }


?>