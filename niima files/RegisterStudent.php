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
   
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $numero = $_POST['numero'];
    $date = $_POST['date'];
    $vehicule = $_POST['vehicule'];
    $statut = $_POST['statut'];
    $password = $_POST['password'];

    $sql = "INSERT INTO driver (nom,prenom,email,numero,DateEmbauche,vehicule,password)) 
            VALUES ('$nom','$prenom','$email','$numero','$date','$vehicule','$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    
    $conn->close();
}
?>