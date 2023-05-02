<?php
// Connect to the database
include_once '../DB/connect.php';

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Retrieve the PDF file from the database
$result = mysqli_query($conn, "SELECT * FROM dossier WHERE id = '" . $_GET["id"] . "'"); // Change the table name and ID as needed
$row = mysqli_fetch_array($result); 
$pdf_blob = $row['pdf'];
$pdf_filename = $row['name'];

// Set the Content-Type and Content-Disposition headers
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $pdf_filename . '"');

// Output the PDF content
echo $pdf_blob;

mysqli_close($conn);
