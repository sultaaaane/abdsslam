
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
</head>
<body>
 
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="add_pdf.php" method="post">
                    <div class="form-group">
                            <label>PDF</label>
                            <input type="file" name="pdf" class="form-control" value="" maxlength="50" required="">
                        </div>
                        <input type="submit" class="btn btn-primary" name="save" value="submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>

            </div> 
               
        </div>

</body>
</html>
