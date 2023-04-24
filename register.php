<?php
     require('php/DB/connect.php');
     
     // Process the registration form
     if (isset($_POST["save"])) {
         $username = $_POST['nom'];
         $email = $_POST['email'];
         $ville = $_POST['ville'];
         $telephone = $_POST['telephone'];
         $adresse = $_POST['adresse'];
         $password = $_POST['password'];
         // If there are no errors, insert the user into the database
     
             $sql = "INSERT INTO client ( nom , gmail , ville , telephone , adresse , password) VALUES ('$username', '$email','$ville','$telephone','$adresse','$password')";
     
             if (mysqli_query($conn, $sql)) {

                 header('Location: php/Client/index.php');
                 
             } else {
                header("Location: login.html");
             }
     }
?>