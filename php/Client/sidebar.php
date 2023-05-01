<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="style/sidebar.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">

  <title>Document</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <div class="page-header clearfix">
          <div class="sidebar" style="background-color: rgb(60, 179, 113);">


            <div class="logo-details">
              <div class="logo_name">Client</div>
              <i class='bx bx-menu' id="btn"></i>
            </div>

            <ul class="nav-list">
              <li>
                <a href="index.php" id="client">
                  <i class='bx bx-user'></i>
                  <span class="links_name">Mes fichiers</span>
                </a>
                <span class="tooltip">Client</span>
              </li>
              <li>
                <a href="contact.php">
                  <i class='bx bx-chat'></i>
                  <span class="links_name">Contactez-nous</span>
                </a>
                <span class="tooltip">Ligne Commande</span>
              </li>
              <li class="profile">
         <div class="profile-details">
           <!--<img src="profile.jpg" alt="profileImg">-->

         </div>
         <a href="../../login.html"><i class='bx bx-log-out' id="log_out" ></i></a>
     </li>
            </ul>
          </div>






          <script>
            let sidebar = document.querySelector(".sidebar");
            let closeBtn = document.querySelector("#btn");
            let searchBtn = document.querySelector(".bx-search");

            closeBtn.addEventListener("click", () => {
              sidebar.classList.toggle("open");
              menuBtnChange(); //calling the function(optional)
            });

            searchBtn.addEventListener("click", () => { // Sidebar open when you click on the search iocn
              sidebar.classList.toggle("open");
              menuBtnChange(); //calling the function(optional)
            });

            // following are the code to change sidebar button(optional)
            function menuBtnChange() {
              if (sidebar.classList.contains("open")) {
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
              } else {
                closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
              }
            }
          </script>
</body>

</html>