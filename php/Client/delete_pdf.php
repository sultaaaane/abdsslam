<?php
// Check if the form was submitted
require('../DB/connect.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$id = $_POST['data'];

$sql = "DELETE FROM dossier WHERE id = $id ";

if (mysqli_query($conn, $sql)) {

   header("location: index.php");
   exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
} 
}
mysqli_close($conn);
?>
