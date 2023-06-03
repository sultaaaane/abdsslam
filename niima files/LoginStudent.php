<?php

$host = 'localhost';
$dbName = 'aman';
$username = 'root';
$password = '';


$conn = new mysqli($host, $username, $password, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["submit"])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

   
    $sql = "SELECT * FROM Driver WHERE Email='$email' AND Password='$password' ";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {

        echo "Login successful!";
    } else {
   
        echo "Invalid email or password";
    }

 
    $conn->close();
}
?>