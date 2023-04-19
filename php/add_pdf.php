
<?php

// Create connection
require('DB/connect.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form submitted
if(isset($_POST['submit'])){

    // Get file details
    $filename = $_FILES['pdf']['name'];
    $filetmpname = $_FILES['pdf']['tmp_name'];
    $filesize = $_FILES['pdf']['size'];
    $filetype = $_FILES['pdf']['type'];

    // Move file to server directory
    move_uploaded_file($filetmpname, 'pdfs/'.$filename);

    // Insert file details into database
    $sql = "INSERT INTO documents (filename, filepath) VALUES ('$filename', 'pdfs/$filename')";

    if ($conn->query($sql) === TRUE) {
        echo "File uploaded successfully.";
    } else {
        echo "Error uploading file: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
