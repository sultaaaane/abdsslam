<?php
include_once '../DB/connect.php';
$sql = "DELETE FROM dossier WHERE id ='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
   header("location: client_pdf.php");
   exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>