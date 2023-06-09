<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../style/sidebar.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">


<title></title>
<style>
  #client{
    background-color: #deefdb;
 
  }
  .sidebar li a .links_name,
.sidebar li a i{
    
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-weight: 400;
    
  }
  .sidebar li a .links_name{
    color: black;
  }
</style>
    <script type="text/javascript">
    
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>

</head>
<body>
       <!-- <div class="container" >
            <div class="row" >
                <div class="col-lg-12 mx-auto" >
                    <div class="page-header clearfix">
                    <div class="sidebar" style="background-color: rgb(60, 179, 113);">
    <div class="logo-details" >
        <div class="logo_name">Client</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
       <a href="" style="background-color: rgb(60, 179, 113);">
         <i class='bx bx-user' ></i>
         <span class="links_name">Client</span>
       </a>
       <span class="tooltip">Client</span>
     </li>
     <li>
       <a href="../Lcommande/Lindex.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Ligne Commande</span>
       </a>
       <span class="tooltip">Ligne Commande</span>
     </li>
     <li>
       <a href="../produit/Pindex.php" >
         <i class='bx bx-cart-alt' ></i>
         <span class="links_name">Produit</span>
       </a>
       <span class="tooltip">Produit</span>
     </li>    
      <li>
       <a href="../commande/Cindex.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Commande</span>
       </a>
       <span class="tooltip">Commande</span>
     </li>
     <li>
       <a href="../archive/Aindex.php">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Archive</span>
       </a>
       <span class="tooltip">Archive</span>
     </li>
     <li>
       <a href="../password/Psindex.php">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Setting</span>
       </a>
       <span class="tooltip">Setting</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           .....<img src="profile.jpg" alt="profileImg">
           <div class="name_job">
             <div class="name">abdessamad - Mohammed</div>
             <div class="job">Admin</div>
           </div>
         </div>
         <a href="../log-in.html"><i class='bx bx-log-out' id="log_out" ></i></a>
     </li>
    </ul>
  </div>-->
  
  <?php include 'sidebar.php';?>
  <script>

  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
   <section class="home-section">
      <form method="post">
         <div class="contentbutton">
           <div class="add" style="width: 50%;">
           <input type="button" value="+ Nouveau fichier"  id="addnew" class="btn NewFolderButton">
      </div>
  
      </div>
      </form>
    </section>    
    
    

<section class="home-section">  
    <div class="grid">
      
    <?php
    
require('../DB/connect.php');

// Create a mysqli object
$mysqli = new mysqli("localhost", "root", "", "tax-expert");

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Define the directory within the document root to store the files
$directory = '../pdfs/';

// Create the directory if it doesn't exist
if (!is_dir($directory)) {
    mkdir($directory);
}

// Create the query
$query = "SELECT * FROM dossier WHERE id_client = $_COOKIE[id]";

// Execute the query
$result = $mysqli->query($query);

// Loop through the results
while ($row = $result->fetch_assoc()) {
    $file_id = $row['id'];
    $file_name = $row['name'];
    $file_data = $row['type'];
    $file_blob = $row['pdf'];

    // Generate a unique filename for the temporary file
    $filename = time() . '_' . uniqid() . $file_name;

    // Construct the file path relative to the document root
    $filePath = $directory . '/' . $filename;

    // Save the BLOB data to the file
    file_put_contents($filePath, $file_blob);

    // Output the file as a link for download
    echo '
        <div class="card">
            <div class="icone" style="margin: auto;">
                <div class="container-icon" style="display:flex;justify-content:space-between; width:100%;">
                    <div class="imgdiv" style="width: 20%; text-align: center;">
                        <img src="../../icones/pdfff.png" alt="#">
                    </div>
                    <div class="title" style="width: 60%; margin: auto;">
                        <a href="' . $filePath . '" download>' . $file_name . '</a>
                    </div> 
                    <span onclick="fct(' . $file_id . ')" class="close" id="close">&times;</span>
                </div>
            </div>
            
            <div class="text"></div>
        </div>';
}

// Free the result set
$result->free();

// Check if the query was successful
if (!$result) {
    die("Error: " . $mysqli->error);
}

// Close the database connection
$mysqli->close();
?>











          
          </section> 
          </div>
        </div>
        
    </div>
  <!-- The Modal -->
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <span class="close_1">&times;</span>
  <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add the document record to the database.</p>
                    <form action="add_pdf.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                            <label>PDF</label>
                            <input type="file" name="file" class="form-control" value="file" maxlength="50" required="">
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="submit">
                       
                    </form>
                </div>
            </div>   
        </div>
</div>

</div>
    </section> 
    <script>
   
 var modal = document.getElementById("myModal");
      
var btndelete = document.getElementById("close");
      var btn = document.getElementById("addnew");
      
     
      var span = document.getElementsByClassName("close_1")[0];
      var can = document.getElementById("cancel");
     
       function fct(fileId){
        Swal.fire({
  title: 'Voulez vous vraiment supprimer ce pdf?',
  showDenyButton: true,
  
  confirmButtonText: 'Supprimer',
  denyButtonText: `Annuler`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    
                // AJAX request to PHP file
                $.ajax({
                    type: "POST",
                    url: "delete_pdf.php",
                    data: {
                        // data to be sent to PHP file, if any
                     fileId : fileId

                    },
                    success: function(response) {
                        // handle response from PHP file
                    }
                });
                swal.fire("Deleted!", {
                    icon: "success",
                });
           
                location.reload();
       
    

    
  } else if (result.isDenied) {
   
  }
})
      }
      // When the user clicks the button, open the modal 
      btn.onclick = function() {
        modal.style.display = "block";
      }
      
      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
      }
     radioselect1.onclick = function(){
      divradio.style.display = "none"
     }
     radioselect2.onclick = function(){
      divradio.style.display = "block"
     }
can.onclick = function(){
  modal.style.display = "none"
}
     
    </script>
    
</body>
</html>