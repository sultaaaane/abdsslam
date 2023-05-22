
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerer le types</title>
    <link rel="stylesheet" href="css/gererType.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../style/sidebar.css">
    
</head>
<body>
    
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
    <div class="content">
        <div class="tab">
            <div class="search">
                <div>
                    <select id="searchOption" class="champ">
                        <option value="nom">Nom</option>
                        <option value="gmail">Gmail</option>
                        <option value="ville">Ville</option>
                        <option value="telephone">N°Telephone</option>
                        <option value="adresse">Adresse</option>
                    </select>
                    <input type="button" id="btnsrch" value="Rechercher">
                    <input type="text" class="champ" id="searchInput" placeholder="Saisir le nom..">
                </div>
                
                <div>
                    <input type="button" value="+ Nouveau fichier" id="addnew">
                </div>
            </div>
            
            <?php
            include_once '../DB/connect.php';

            // Check if a search query is provided
            $searchQuery = isset($_GET['query']) ? $_GET['query'] : '';

            // Check if a search option is provided
            $searchOption = isset($_GET['option']) ? $_GET['option'] : 'nom';

            // Modify the SQL query to include the search condition based on the selected option
            $query = "SELECT * FROM client";
            if (!empty($searchQuery)) {
                $query .= " WHERE $searchOption LIKE '%$searchQuery%'";
            }

            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
            ?>
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Gmail</th>
                    <th>Ville</th>
                    <th>N°Telephone</th>
                    <th>Adresse</th>
                    <th>Supprimer</th>
                    <th>Choisir un fichier</th>
                    <th>Ajouter le fichier</th>
                </tr>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $row["nom"]; ?></td>
                        <td><?php echo $row["gmail"]; ?></td>
                        <td><?php echo $row["ville"]; ?></td>
                        <td><?php echo $row["telephone"]; ?></td>
                        <td><?php echo $row["adresse"]; ?></td>
                        <td>
                            <a href="delete.php?id=<?php echo $row["id"]; ?>">
                                <img src="../../images/delete.png">
                            </a>
                        </td>
                        <form action="add_pdf.php" enctype="multipart/form-data" method="post">
                            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                            <td><input type="file" name="file" value="file" maxlength="50" required=""></td>
                            <td><input type="submit" value="ajouter"></td>
                        </form>
                    </tr>
                <?php
                    $i++;
                }
                ?>
            </table>
            <?php
            } else {
                echo "No result found";
            }
            ?>
        </div>
    </div>
</section>

<script>
    // JavaScript function to handle the search button click event
    document.getElementById("btnsrch").addEventListener("click", function() {
        var searchOption = document.getElementById("searchOption").value;
        var searchInput = document.getElementById("searchInput").value;
        window.location.href = "client.php?option=" + searchOption + "&query=" + searchInput;
    });
</script>


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
                    <form action="add_client.php" method="post" >
                    <div class="form-group">
                            <label>Client</label>
                            <label>nom</label><input type="text" name="nom"   required="">
                            <label>email</label><input type="email" name="email"   required="">
                            <label>ville</label><input type="text" name="ville"   required="">
                            <label>telephone</label><input type="text" name="telephone"   required="">
                            <label>adresse</label><input type="text" name="adresse"   required="">
                            <label>mot de passe</label><input type="password" name="password"   required="">
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
        
    <!--Style de la page
/////////////
/////////////
-->
   <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}
img{
    width: 30px;
    height: 30px;
}

    .content{
    position:absolute;
    width: 95%;
    height: 600px;
   right: 0;
 
}
.tab{
    width: 90%;
    padding: 5px 0px;
    position: relative;
    margin: auto;
}
th,td{
    border-bottom: 1px solid #ddd;
    border-collapse: collapse;
}
table{
    width: 100%;
}
th{
    height: 40px;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: 18px;
    background-color: rgb(47, 207, 119);
    color: white;
}
table td{
    height: 30px;
    text-align: center;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}
.search{
    position: relative;
    height: 70px;
    width: 100%;
    display: flex;
    justify-content: space-between;
    
    
}
/* SearchBox */
.champ{
    width: 200px;
    height: 2rem;
    background: rgba(128, 128, 128,0.14);
    border: none;
    outline: none;
    font-weight: 700;
    border-radius: 0px 10px 10px 0px;
    color: black;
}
.search div{
    display: flex;
    padding: 0px 20px;
}
.search span{
    margin-top: 7px;
    padding: 0px 5px;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}


table button{
    font-weight: 600;
    height: 100%;
    width: 50%;
    border: none;
    cursor: pointer;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}
table button:hover{
    background-color: #ffc001;
    color: white;

}

#btnsrch{
    height: 2rem;
    border: none;
    width: 90px;
    border-radius: 10px 0 0 10px;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-size: 15px;
}


select{
    font-size: 13px;
}

#addnew{
    height: 2rem;
    width: 10rem;
    cursor: pointer;
    border: none;
    border-radius: 10px;
   font-weight: 600;
    transition : 0.2s ease-in-out;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}
#addnew:hover{
    background-color: rgb(60,179,113);
    color: white;
}
tr:nth-child(even) {
    background-color: #f2f2f2;
}

  
 
  
  .close:hover,
  .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
  }
  .inputes{
    display: flex;
    margin-bottom: 40px;
  }
  .inputes div{
    width: 50%;
    margin-left: 50px;
  }
  .submitbtn{
        color: white;
        background-color: rgb(150, 154, 232);
        font-weight: 700;
        height: 40px;
        border: 0.8px rgb(223, 189, 189) solid;
        width: 40%;
        border-radius: 5px;
        text-transform: uppercase;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s ease-in-out;
        margin-top: 20px;
  }
  .champs{
    width: 100%;
    box-sizing: border-box;
    height: 2.1rem;
    border: none;
    border-bottom: 1px solid gray;
    font-size: 0.9rem;
    font-weight: 600;
    outline: none;
    background-color: rgba(224, 196, 196, 0.121);
  }
  .inputes label{
    text-transform: uppercase;
    font-size: 13px;
    font-weight: 500;
    margin-top: 1rem;
    margin-bottom: 0.5rem;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }
 .divbtn{
    width: 100%;
    text-align: center;
 }
 form{
    margin-top: 25px;
 }
 .inputes ::placeholder{
    color: rgba(121, 129, 134, 0.747);
    font-weight: 500;
    font-size: 14px;
 }
 #btnsrch:hover{
    cursor: pointer;
    background-color: rgb(224, 169, 107);
    color: white;
}
#d{
    background-color:antiquewhite;
    color: black;
}



   </style>
</body>
</html>
