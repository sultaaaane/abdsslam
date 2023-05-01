
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
         if (empty($email)) {
            $errors[] = 'Email is required';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email is invalid';
        } else {
            // Check if the email already exists in the database
            $stmt = mysqli_prepare($conn, "SELECT COUNT(*) FROM client WHERE gmail = ?");
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $count);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);
            if ($count > 0) {

                header("Location: login.html");
            }else {
           
             $sql = "INSERT INTO client ( nom , gmail , ville , telephone , adresse , password) VALUES ('$username', '$email','$ville','$telephone','$adresse','$password')";
     
             
     
             if (mysqli_query($conn, $sql)) {
                $user_id = mysqli_insert_id($conn);

                // Store the user ID and favorite color in the session
                session_start();
                $_SESSION['id'] = $user_id;
                setcookie("id", $user_id);
                 header('Location: php/Client/index.php');
                 
             } else {
                header("Location: login.html");
             }
     }
    }
}
?>