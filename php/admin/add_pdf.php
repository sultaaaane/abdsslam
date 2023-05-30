<?php
// Check if the form was submitted
require('../DB/connect.php');
// Check if files were selected
if(isset($_FILES["file"])) {
  // Get other form data
  $id = $_POST["id"];
  
  // Connect to the database
  
  // Check if the connection was successful
  if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  // Prepare the SQL statement
  $sql = "INSERT INTO dossier (pdf,name, type,id_client) VALUES (?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $sql);

  // Iterate through each uploaded file
  foreach ($_FILES["file"]["tmp_name"] as $key => $tmp_name) {
    $name = $_FILES["file"]["name"][$key];
    $type = pathinfo($name, PATHINFO_EXTENSION);
    $file = file_get_contents($_FILES["file"]["tmp_name"][$key]);
    
    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "ssss", $file, $name, $type, $id);

    // Execute the statement
    mysqli_stmt_execute($stmt);
  }

  // Close the statement and the connection
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

  echo "Files uploaded successfully!";
  header("Location: client.php");
} else {
  echo "Please select files to upload.";
}
?>
