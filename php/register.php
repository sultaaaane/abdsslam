<?php
     require('DB/connect.php');
     
     // Process the registration form
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $username = $_POST['nom'];
         $email = $_POST['gmail'];
         $ville = $_POST['ville'];
         $telephone = $_POST['telephone'];
         $adresse = $_POST['adresse'];
         $password = $_POST['password'];
         // If there are no errors, insert the user into the database
     
             $sql = "INSERT INTO client ('nom','email','ville','telephone','adresse','password') VALUES ('$username', '$email','$ville','$telephone','$adresse', '$password')";
     
             if (mysqli_query($connection, $sql)) {
                 header('Location: login.php');
                 exit;
             } else {
                 $errors[] = 'Registration failed';
             }
     }
     



?>