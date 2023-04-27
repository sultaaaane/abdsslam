<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
           include 'php/DB/connect.php';
          
            if(isset($_POST["fore"]))
            {
                $nom = $_POST["nom"];
                $ville =$_POST["ville"];
                $email = $_POST["mail"];
                $tele = $_POST["tele"];
                $msg = $_POST["message"];
                $fore = $_POST["form"]; 
            $sql = "INSERT INTO messages (nom,email,ville,tele,message) VALUES('$nom','$ville','$email','$tele','$msg')";
            if(mysqli_query($con, $sql)){
                ?>
                <script>
                swal({
                    title: "Demmande!",
                    text: "Vous avez déja demmander cette propriété!!",
                    icon: "error",
                    button: "Ok",
                    timer: 5000
                })
                </script>
                <?php
            }
        }
            ?>
<section id="contact" style="padding-top: 10vh;padding-bottom: 10vh;">
        <div class="form" id="contact-col">
            <div class="contact-info">
                <h1 style="text-align:center;">Contact</h1>
                <h2>Vous pouvez nous contacter :</h2>
                <ul>
                    <li>Par téléphone au <a href="https://wa.me/0612345678">05-37-72-75-66</a></li><br>
                    <li>Par email à <a href="mailto:tax.expertsarlau@gmail.com">tax.expertsarlau@gmail.com</a>

                    </li><br>
                    <li>Via notre formulaire de contact sur notre site web</li>
                </ul>
            </div>
            <form action="contact.phpsa"  method="POST">
                <input type="text" class="champs" name="nom" placeholder="Nom" required>
                <input type="text" class="champs" name="ville" placeholder="ville" required>
                <input type="text" class="champs" name="mail" placeholder="Email" required>
                <input type="text" class="champs" name="tele" placeholder="Telephone" required>
                <textarea name="message" id="input" class="champs" style="height: 200px;" cols="30" rows="10" placeholder="Message"  required></textarea>
                <input type="submit" name="form" class="submitbtn" value="Envoyez">
            </form>
           
        </div>
        <div class="map" id="contact-col">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13350.280986763686!2d-8.494937769233093!3d33.22536109342131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda91e1d173ae243%3A0x4fa699b9874f3eab!2sFacult%C3%A9%20des%20Sciences%20el%20Jadida!5e0!3m2!1sfr!2sma!4v1673600687100!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

.home{
    align-items: center;
  
    background-position: center;
    background-size: cover;

}
.home1 {
    height: auto;
   
    background-position: center;
    background-size: cover;
    padding-top: 10vh;
    padding-bottom: 10vh;
}
.home nav{
    display:flex;
    justify-content: space-between;
    text-align: center;
    padding-left: 1rem;
    padding-right: 1rem;
    position: relative;
}
.home nav .logo{
    width: 160px;
    border-radius: 90px;
}
nav .menu{
    display: flex;
    flex-basis: 60%;
    justify-content: end;
    align-items: center;
}
ul li{
    display: inline-block;
    padding: 10px 5px;
}
li a{
    color: white;
    text-decoration: none;
    text-transform: uppercase;
    font-weight: 0.9rem;
    transition: 0.3s ease-in-out;
}
li a:hover{
    color: #E7BD70;
    text-shadow: 3px 3px black;
}

.text {
    display: flex;
    margin-left: 1rem;
    margin-right: 1rem;
    align-items: center;
}

.this {
    margin: 1rem 2rem;
    align-items: center;
}

.header-text {
    display: flex;
    align-items: center;
}

.header-text .image {
    flex-basis: 40%;
}

.header-text .text h1 {
    font-size: 2.5rem;
    text-transform: uppercase;
    color: #E7BD70;
}

.header-text .text p {
    color: white;
    font-size: 1rem;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.header-text .text a button {
    text-decoration: none;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    border: 2px solid #E7BD70;
    background-color: transparent;
    color: white;
    transition: 0.3s ease-in-out;
    cursor: pointer;

}

.header-text a button:hover {
    background-color: #E7BD70;
    color: black;
    border-color: white;
}

.Apropos{
    display: flex;
    align-items: center;
    padding-top: 1rem;
    padding-bottom: 1rem;
}
.Apropos .text .image{
    flex: 1;
    order:2;
}
.Apropos .text h1{
    font-size: 2.5rem;
    text-transform: uppercase;
	color:#E7BD70;
}
.Apropos .text .this{
    flex:1;
    order: 1;
    padding: 1rem;
}
.Apropos .text .this p{
    color: white;
    font-size: 1rem;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
.Apropos .text .this .p1{
    display: none;
    color: white;
    font-size: 1rem;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
.Apropos .text a button{
    padding: 0.5rem 1rem;
    border-radius: 20px;
    border:2px solid #E7BD70;
    background-color: transparent;
    color: white;
    transition: 0.3s ease-in-out;
    cursor: pointer;
}
.Apropos a button:hover{
    background-color: #E7BD70;
    color: black;
    border-color: white;
}
.image{
    max-height: 50%;
    max-width: 50%;
}

.services{
    width: 100%;
    margin: auto;
    text-align: center;
    padding-top: 10vh;
    padding-bottom: 10vh;
    background-color: #131313;
}
.services h1{
    font-size:2rem;
    padding-bottom: 10px;
    text-transform: uppercase;
    color: #E7BD70;
}
.contact-info h1 {
    font-size: 2.5rem;
    text-transform: uppercase;
    color: #E7BD70;
}
.services p{
    font-size: 1rem;
    padding: 1px;
    line-height: 20px;
    color: white;
}
.left-container {
    width: 50%;
    margin: auto;
  }
  
  .right-container {
    width: 50%;
    margin: auto;
  }
  
.row{
    padding-top: 20px;
    gap: 20px;
    display: flex;
    justify-content: center;
    width: 80%;
    margin: auto;
}
.row .col{
    background-color:  #292929;
    border-radius: 10px;
    border-color: #E7BD70;
    padding: 10px 10px;
    margin-bottom: 5%;
    transition: 0.5s ease-in-out;
    flex-basis: 50%;
    height: auto;
}

h3{
    color: white;
    font-size: 1rem;
}
.img{
    max-height: 50%;
    max-width: 50%;
    background-color: #292929;
}

/*   contact   */
#contact{
  background-color: rgb(60, 179, 113);
    color: white;
    display: flex;
    height: 100%;
}
#contact a:link{
    text-decoration: none;
    list-style: none;
    color: white;
}
#contact-col{
    flex-basis: 50%;
}
.contact-info{
    text-align: center;
    padding-top: 15px;
}
.contact-info h1 {
    font-size: 2.5rem;
    text-transform: uppercase;
    color: #E7BD70;
}
form{
    display: flex;
    /*star fou9 star*/
    flex-direction: column;
    /*50% 50%*/
    flex: 1;
    padding: 2rem;
    /*space between lkhra*/
    gap: 0.2rem;
}
.champs {
    margin-bottom: 24px;
    width: 100%;
    box-sizing: border-box;
    border-top: 2rem;
    border-bottom: 1rem;
    height: 2.5rem;
    background: rgba(243, 240, 240, 0.082);
    border: none;
    outline: none;
    border-bottom: 1px solid white;
    font-size: 0.9rem;
    font-weight: 700;
    color: white;
  
    box-shadow: 3px 2px 5px 2px;

}

::placeholder {
    color: white;
    font-size: 15px;
    letter-spacing: 0.6px;

}

.submitbtn {
    color: #f6f7f8;
    background-color: rgba(0, 0, 0, 0.2);
    font-weight: 700;
    height: 50px;
    width: 100%;
    border-radius: 3px;
    text-transform: uppercase;
    font-size: 16px;
    cursor: pointer;
    border: 0.8px #E7BD70 solid;
    border-radius: 5px;
    transition: 0.3s ease-in-out;
    margin-top: 10px;
}

.submitbtn:hover {
    background-color: #E7BD70;
    color: black;

}
.map{
    display: flex;
    justify-content: center;
    align-items: center;
}
iframe {
    height: 70%;
    width: 80%; /*IE8 bug fix*/
    vertical-align: middle;
}

/*   footer   */
footer{
    background: linear-gradient(to right,#3e3e3e,#3f3f3f);
}


#footer-info{
    display: flex;
    margin: auto;
    width: 100%;
    padding: 5vh 0;
}
.footer-col{
    margin: 2rem;
    text-align: center;
    color: white;
    flex-basis: 33.33%;
}
.footer-col h2{
    font-size: 1.5rem;
    color: #E7BD70;
}
.footer-col ul{
    list-style: none;
}
.footer-col ul li a:link{
    list-style: none;
    text-decoration: none;
    color: white;
}
#footer-copyright{
    background-color: rgb(40, 38, 38);
    color: white;
    text-align: center;
    text-decoration: none;
    padding: 0.8rem 0;
}


/*   mobile nav    */
.mobile-nav{
    display:none;
}
.mobile-nav header{
    font-size: 25px;
    width: 100%;
    position:fixed;
    top: 0;
}
.mobile-nav nav{
    border-radius: 15px;
    margin: 0 0 20px 0;
    text-align: center;
    align-items: top;
    width: 100%;
    height: fit-content;
    background-color: black;
}
.mobile-nav nav a i{
    color: rgb(238,229,229);
    margin: 0.5rem 0 -0.5rem 0;
}
.mobile-nav nav ul li a ul {
    width: fit-content;
}
.mobile-nav nav ul li a ul li{
    color: rgb(238,229,229);
    text-decoration: none;
    list-style: none;
}
.mobile-nav label{
    font-size: 0.8rem;
    margin: 5px 0;
    text-decoration: none;
    list-style: none;
    color: white;

}


/*    Responsive   */
@media screen and (max-width:650px){
    .Apropos{
        width: 100%;
    }
    .Apropos .text h1{
        text-align: center;
        font-size: 2.5rem;
        text-transform: uppercase;
        color:#E7BD70;
    }
    .Apropos .text p{
        text-align: center;
        color: white;
        font-size: 0.5rem;
    }
    .header-text .text h1{
        text-align: center;
        font-size: 2.5rem;
        text-transform: uppercase;
        color:#E7BD70;
    }
    .header-text .text p{
        text-align: center;
        color: white;
        font-size: 1rem;
    }
    
    .image {
        display: block;
        margin: 0 auto;
        text-align: center;
        max-height: 50%;
        max-width: 80%;
    }
    .home nav{
        display: block;
    }
    .home nav a{
        margin: auto;
        text-align: center;
    }
    .home nav .logo{
        text-align: center;
        width: 100px;
    }
    .menu ul{
        position: fixed;
        top: 0;
        right: 0;
        background-color:  rgba(4,9,30,0.7);
        height: 100vh;
        width: 35vw;
        text-align: left;
        padding: 20px;
        display: none;
    }
    ul li{
        display: block;
        padding: 10px 15px;
    }
    .row{
        flex-direction: column;
    }
    .text{
        display: block;
    }
    
   /*   contact   */


    .form{
        display: block;
    }
    #contact{
        display: block;
    }
    button{
        align-self:center;
    }
    
    .map{
        padding-bottom:15px ;
    }
    iframe{
        height: 250px;
    }
    /*   footer   */
     #footer-info{
        display: block;
    }

    /*mobile-nav*/
    .mobile-nav{
        display: block;
    }
}





    </style>
</body>
</html>