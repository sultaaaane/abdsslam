
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
                    <option value="ville">Ville</option>
                    <option value="email">Email</option>
                    <option value="tele">N°Telephone</option>
                    <option value="message">Message</option>
                </select>
                <input type="button" id="btnsrch" value="Rechercher">
                <input type="text" class="champ" id="searchInput" placeholder="Saisir le nom..">
            </div>
            
        </div>
        
        <?php
        include_once '../DB/connect.php';

        // Check if a search query is provided
        $searchQuery = isset($_GET['query']) ? $_GET['query'] : '';

        // Check if a search option is provided
        $searchOption = isset($_GET['option']) ? $_GET['option'] : 'nom';

        // Modify the SQL query to include the search condition based on the selected option
        $query = "SELECT * FROM messages";
        if (!empty($searchQuery)) {
            $query .= " WHERE $searchOption LIKE '%$searchQuery%'";
        }

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
        ?>
        <table>
            <tr>
                <th>Nom</th>
                <th>Ville</th>
                <th>Email</th>
                <th>N°Telephone</th>
                <th>Message</th>
                <th>Delete</th>
            </tr>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row["nom"]; ?></td>
                    <td><?php echo $row["ville"]; ?></td>
                    <td><?php echo $row["email"]; ?></td> 
                    <td><?php echo $row["tele"]; ?></td>
                    <td><?php echo $row["message"]; ?></td>
                    <td>
                        <a href="delete_message.php?id=<?php echo $row["id"]; ?>">
                            <img src="../../images/delete.png">
                        </a>
                    </td>
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

<script>
    // JavaScript function to handle the search button click event
    document.getElementById("btnsrch").addEventListener("click", function() {
        var searchOption = document.getElementById("searchOption").value;
        var searchInput = document.getElementById("searchInput").value;
        window.location.href = "messages.php?option=" + searchOption + "&query=" + searchInput;
    });
</script>



        </section>
        
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

#addpro{
    height: 2rem;
    width: 10rem;
    cursor: pointer;
    border: none;
    border-radius: 10px;
   font-weight: 600;
    transition : 0.2s ease-in-out;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}
#addpro:hover{
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
