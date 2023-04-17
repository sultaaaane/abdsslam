<?php
// Retrieve the PDF from the database
require('DB/connect.php');
$stmt = mysqli_prepare($conn, "SELECT doc1 FROM documents WHERE id_doc = 1 ");
mysqli_stmt_bind_param($stmt, "s", $_GET['pdf']);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $pdfContent);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conn);

// Display the PDF in the browser
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="' . $_GET['pdf'] . '"');
echo stripslashes($pdfContent);
?>