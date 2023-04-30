<?php
// Check if the form was submitted
require('../DB/connect.php');
if(isset($_POST["submit"])) {
	// Check if a file was selected
	if(isset($_FILES["file"])) {
		// Get file information
		$name = $_FILES["file"]["name"];
		$type = $_FILES["file"]["type"];
		$file = file_get_contents($_FILES["file"]["tmp_name"]);
		
		// Connect to the database
		
		
		// Check if the connection was successful
		if(!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		// Prepare the SQL statement
		$sql = "INSERT INTO dossier (pdf,name, type,id_client) VALUES (?, ?, ?, ?)";
		$stmt = mysqli_prepare($conn, $sql);
		
		// Bind the parameters
		mysqli_stmt_bind_param($stmt, "ssss", $file, $name ,$type, $_COOKIE['id']);

       
		// Execute the statement
		mysqli_stmt_execute($stmt);
		
		// Close the statement and the connection
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
		
		echo "File uploaded successfully!";
        header("Location: index.php");
	} else {
		echo "Please select a file to upload.";
	}
}
?>
