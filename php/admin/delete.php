<?php
include_once '../DB/connect.php';
$sql = "DELETE FROM client WHERE id ='" . $_GET["id"] . "'";
$sql2 = "DELETE FROM dossier WHERE id_client ='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
   header("location: client.php");
   exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>