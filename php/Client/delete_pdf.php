<?php
// Check if the form was submitted
require('../DB/connect.php');
if(isset($_POST['fileId'])) {

	$id = $_POST['fileId'];

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
