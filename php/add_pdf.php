<?php
require('DB/connect.php');
if ($_SERVER['POST'] === 'POST') {
  // Check if a file was uploaded
  if (isset($_FILES['pdf']) && $_FILES['pdf']['error'] === UPLOAD_ERR_OK) {
    // Read the file contents
    $pdfContent = addslashes(file_get_contents($_FILES['pdf']['tmp_name']));

    // Store the PDF in the database
    $stmt = mysqli_prepare($conn, "INSERT INTO documents (id_docs, doc1) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $_FILES['pdf']['name'], $pdfContent);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
}
?>
