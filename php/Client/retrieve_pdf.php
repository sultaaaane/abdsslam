<?php
require('../DB/connect.php');

// Create a mysqli object
$mysqli = new mysqli($host, $username, $password, $database);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
    // Create the query
$query = "SELECT * FROM files";

// Execute the query
$result = $mysqli->query($query);
// Loop through the results
while ($row = $result->fetch_assoc()) {
    $file_name = $row['file_name'];
    $file_data = $row['file_data'];
    
    // Output the file as a link
    echo "<a href='data:application/octet-stream;base64," . base64_encode($file_data) . "' download='" . $file_name . "'>" . $file_name . "</a><br>";
}

// Free the result set
$result->free();


// Check if the query was successful
if (!$result) {
    die("Error: " . $mysqli->error);
}

?>