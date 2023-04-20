<?php
require('DB/connect.php');

if(isset($_POST['submit'])){
    $file = $_FILES['pdf'];
    $filename = $_FILES['pdf']['name'];
    $filetmpname = $_FILES['pdf']['tmp_name'];
    $filesize = $_FILES['pdf']['size'];
    $fileError = $_FILES['pdf']['error'];
    $filetype = $_FILES['pdf']['type'];

    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('pdf' , 'jpeg' , 'jpg' , 'png' ,'docx');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($filesize < 1000000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'pdfs/'.$fileNameNew;
                move_uploaded_file($filetmpname, $fileDestination);
                header("Location: index.php");
            }else{
                echo "Your file is too big!";
            }
        }else{
            echo "There was an error uploading your file!";
        }
      }
}

?>