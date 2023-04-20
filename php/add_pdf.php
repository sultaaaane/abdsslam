<?php

if(isset($_POST['submit'])){

    $file = $_FILES['file'];

    $filename = $_FILES['file']['name'];
    $filetmpname = $_FILES['file']['tmp_name'];
    $filesize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $filetype = $_FILES['file']['type'];

    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('pdf' , 'jpeg' , 'jpg' , 'png' ,'docx');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($filesize < 1000000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'files/'.$fileNameNew;
                move_uploaded_file($filetmpname, $fileDestination);
                header("Location: index.php?uploadsuccess");
            }else{
                echo "Your file is too big!";
            }
        }else{
            echo "There was an error uploading your file!";
        }
      }
}

?>