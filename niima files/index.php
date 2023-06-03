<?php
require_once "../DB/connection.php";

if(isset($_POST['save']))
{    
        $Nom = $_POST['Nom'];
        $Prenom = $_POST['Prenom'];
        $email = $_POST['email'];
        $Numero = $_POST['Numero'];
        $DateEmbauche = $_POST['DateEmbauche'];
        $Vehicule = $_POST['Vehicule'];    
     $sql = "INSERT INTO Driver (Nom,Prenom,email,Numero,DateEmbauche,Vehicule)
     VALUES ('$Nom','$Prenom','$email','$Numero','$DateEmbauche','$Vehicule')";
     if (mysqli_query($conn, $sql)) {
        header("location: Lindex.php");
        exit();
     } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create L-Command</title>
    <?php include "Lhead.php"; ?>
</head>
<body>
 
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Add L-Command</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="Nom" class="form-control" value="" maxlength="100" required="">

                        </div>
                        <div class="form-group">
                            <label>Prenom</label>
                            <input type="text" name="Prenom" class="form-control" value="" maxlength="100" required="">

                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input type="email" name="email" class="form-control" value="" maxlength="100" required="">

                        </div>
                        <div class="form-group">
                            <label>Numero</label>
                            <input type="text" name="Numero" class="form-control" value="" maxlength="100" required="">

                        </div>
                        <div class="form-group">
                            <label>Date Embauche</label>
                            <input type="date" name="DateEmbauche" class="form-control" value="" maxlength="100" required="">

                        </div>
                        <div class="form-group">
                            <label>Vehicule</label>
                            <input type="text" name="Vehicule" class="form-control" value="" maxlength="100" required="">

                        </div>
                        <input type="submit" class="btn btn-primary" name="save" value="submit">
                        <a href="Lindex.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>

            </div> 
               
        </div>

</body>
</html>