<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
<title></title>

    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>

</head>
<body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="page-header clearfix">
                    <div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">Client</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
       <a href="">
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
           <!--<img src="profile.jpg" alt="profileImg">-->
           <div class="name_job">
             <div class="name">abdessamad - Mohammed</div>
             <div class="job">Admin</div>
           </div>
         </div>
         <a href="../log-in.html"><i class='bx bx-log-out' id="log_out" ></i></a>
     </li>
    </ul>
  </div>
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
                        <a href="add_index.php" class="btn btn-success pull-right">Add New Client</a>
                        <form method="post">
                                          <div>
      <input type="text" class="input" name="search" placeholder="Search Client">
      <button type="submit" name="submit-s" class="button-3">Search</button>
      </div>
      </form>
      </section>          
      <div class="grid">
        <div class="card1">
        <div class="icone"></div>
        <div class="title"><img src="../icones/pdfff.png" alt="#"><span>Cours POO</span></div>
          <div class="img"></div>
          <div class="text">Activité enregistré</div>
        </div>
        <div class="card2">
        <div class="icone"></div>
        <div class="title"><img src="../icones/pdfff.png" alt="#"><span>Cours POO</span></div>
          <div class="img"></div>
          <div class="text">Activité enregistré</div>
        </div>
        <div class="card3">
        <div class="icone"></div>
          <div class="title"><img src="../icones/pdfff.png" alt="#"><span>Cours POO</span></div>
          <div class="img"></div>
          <div class="text">Activité enregistré</div>
        </div>
    </div>

</body>
</html>