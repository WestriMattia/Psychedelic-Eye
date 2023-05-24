<!--codice nuovo-->
<?php

include("./utility/connDB.php");
session_start();

if (isset($_SESSION["idUser"])) {
  $iduser = $_SESSION["idUser"];
}


?>
<!--fine codice nuovo-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/modal.css" />
  <title>HomePage</title>
</head>

<body>
  <!-- Register Modal -->
  <div id="register-modal" class="rmodal">
    <!-- Modal content -->
    <div class="rmodal-content">
      <span class="rclose">&times;</span>
      <h4>Register</h4>
      <br /><br />
      <form action="./utility/reg.php" method="post">
        Nome: <input type="text" name="nome" required /><br /><br />
        Cognome: <input type="text" name="cognome" required /><br /><br /><br />
        Email: <input type="text" name="email" required /><br /><br />
        Password: <input type="password" name="password" required /><br /><br /><br />
        <input type="submit" />
      </form>
    </div>
  </div>

  <!-- Login Modal -->
  <div id="login-modal" class="lmodal">
    <!-- Modal content -->
    <div class="lmodal-content">
      <span class="lclose">&times;</span>
      <h4>Login</h4>
      <br /><br />
      <form action="./utility/login.php" method="post">
        Nome: <input type="text" name="nome" required /><br /><br />
        Cognome: <input type="text" name="cognome" required /><br /><br /><br />
        Email: <input type="text" name="email" required /><br /><br />
        Password: <input type="password" name="password" required /><br /><br /><br />
        <input type="submit" />
      </form>
    </div>
  </div>
  <!--Header-->
  <!--codice nuovo-->
  <header>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="#">Home</a>
      <a href="./pages/shop.php">Shop</a>
      <?php
      if (isset($_SESSION["idUser"])) {
        $sql = "SELECT admin FROM userdata WHERE ID = '$iduser'";
        $result = $conn->query($sql) or
          die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));

        $row = $result->fetch_assoc();

        if ($row["admin"] == 1) {

          $_SESSION["isAdmin"] = true;

          echo ' <a href="./pages/adminPage.php">AdminPage</a>';
        }
        echo '<button class="btn btn-light button1"><a href="./utility/login.php">Log out</a></button>';
      } else {

        echo '      <button id="register-button" class="btn btn-light button1">Register</button>
        <button id="login-button" class="btn btn-light button2">Login</button>';


      }



      ?>
      <!--fine codice nuovo-->


    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="logo-m mt-2 col-4">
          <svg onclick="openNav()" xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="currentColor"
            class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
              d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
          </svg>
        </div>
        <div class="logo mt-2 col-4">
          <a href="./"><img src="./images/logo 2.png" /></a>
        </div>
        <div class="logo-s mt-2 col-4">
          <svg onclick="openNav2()" xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="currentColor"
            class="bi bi-cart3" viewBox="0 0 16 16">
            <path
              d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
          </svg>
        </div>
      </div>
    </div>
    <!--codice nuovo-->
    <div id="mySidenav2" class="sidenav2">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
      <!-- Cart Content -->
      <div class="container text-center my-3 carousel-i">
        <div class="row mx-auto my-auto justify-content-center">
          <?php

          if (isset($_SESSION["idUser"])) {
            $sql = "SELECT *
            FROM prodotti AS P
            WHERE P.ID IN (SELECT IDProdotto FROM carrello WHERE IDUser = '$iduser')
              ";
            $result = $conn->query($sql) or
              die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));

            while ($row = $result->fetch_assoc()) {

              $image = $row['img'];

              echo "<div class='col-md-3 cartCard'>";
              echo "<div class='card'>";
              echo "<img src='$image'/>";
              echo "<p>" . $row["nome"] . "</p>";
              echo "<p>" . $row["prezzo"] . "$</p>";
              echo "</div>";
              echo "</div>";

            }
          

          $sql = "SELECT SUM(P.prezzo) AS prezzo FROM prodotti AS P WHERE P.ID IN (SELECT IDProdotto FROM carrello WHERE IDUser = '$iduser')";
          $result = $conn->query($sql) or
            die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));

          $row = $result->fetch_assoc();


          echo "<h3>Totale: ". $row["prezzo"]."$"."</h3>";
        }

            ?>
        </div>
      </div>

    </div>

  </header>
  <!--end-->

  <!--Body-->
  <!--recent product-->
  <hr class="line">
  <div class="container text-center my-3 carousel-i">
    <h2 class="title">Recently Added</h2>
    <br /> 
    <div class="row mx-auto my-auto justify-content-center">

      <?php


      $sql = "SELECT * FROM prodotti ORDER BY id DESC LIMIT 4";
      $result = $conn->query($sql) or
        die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));

      while ($row = $result->fetch_assoc()) {

        $image = $row['img'];

        echo "<div class='col-md-3'>";
        echo "<div class='card'>";
        echo "<img class='card-bg' src='$image'/>";
        echo "<p>" . $row["nome"] . "</p>";
        echo "<p>" . $row["prezzo"] ."$". "</p>";
        echo "</div>";
        echo "</div>";

      }

      ?>


    </div>
  </div>
  <!--end-->
  <br />
  <div class="container-b">
    <div class="title">Shop</div>
    <br />
    <center>
      <div class="container">
        <div class="row">
          <div class="col-sm">
            <div class="card-c">
              <img src="https://i.ibb.co/dp6D861/spray.png" />
              <p>Spray</p>
              <form action="./pages/shop.php" method="post">
                <input type="number" name="filtro" value="1" hidden>
                <input value="Visualizza" class="inputS" type="submit"></input>
              </form>
            </div>
          </div>
          <div class="col-sm">
            <div class="card-c">
              <img src="./images/marker.png" />
              <p>Marker</p>
              <form action="./pages/shop.php" method="post">
                <input type="number" name="filtro" value="2" hidden>
                <input value="Visualizza" class="inputS" type="submit">
              </form>
            </div>
          </div>
          <div class="col-sm">
            <div class="card-c">
              <img src="./images/spray.png" />
              <p>Vestiti</p>
              <form action="./pages/shop.php" method="post">
                <input type="number" name="filtro" value="3" hidden>
                <input value="Visualizza" class="inputS" type="submit">
              </form>
            </div>
          </div>
        </div>
      </div>
    </center>
  </div>
  <!--end-->
  <br /><br />
  <hr class="line" />
  <div class="title logo">La Nostra Storia</div>
  <p class="story" align="justify"><b>A partire dal 2007, il negozio Ninotchka è diventato un punto di riferimento per gli amanti di questa
    cultura, offrendo una vasta selezione di abbigliamento, scarpe e accessori di marche e designer internazionali.

    Il negozio non si limita solo a vendere capi di abbigliamento e accessori, ma è anche un punto di incontro per gli
    artisti di strada, i writer e i tatuatori che condividono la passione per la cultura urbana. Ninotchka organizza
    regolarmente eventi e mostre d'arte, dando l'opportunità agli artisti emergenti di esporre le loro opere e di farsi
    conoscere.Ma quello che rende Ninotchka un negozio unico è la vasta scelta di prodotti per la street art, tra cui
    spray, markers, vernici e accessori per la personalizzazione degli abiti e degli oggetti. Grazie a questa vasta
    gamma di prodotti, gli artisti di strada possono esprimere la loro creatività in modo ancora più libero e
    originale.Ninotchka è molto più di un semplice negozio di abbigliamento e accessori.È un luogo di incontro per gli
    appassionati della cultura urbana e una fonte di ispirazione per tutti coloro che vogliono esprimersi in modo
    originale ed autentico.<b>
  </p>
  <br />
  <hr class="line">
  <div class="title logo">Vieni a trovarci!</div>
  <br />
  <div class="map">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2881.101251538899!2d11.260101299999997!3d43.770756999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132a54068bf328b1%3A0x85895d69615e8db4!2sNinotchka!5e0!3m2!1sit!2sit!4v1681407261881!5m2!1sit!2sit"
      width="500" height="250" style="border: 0" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>

  <br />

  <!-- footer -->
  <footer class="foo">
    <div class="container-fluid grid">
      <center class="row">
        <div class="col-4">
          <span style="font-size: 125%">Socials:</span><br>
          Coming soon...
        </div>

        <div class="col-4">
          <span style="font-size: 125%">Contatti Negozio:</span><br>
          <a href="tel:+0553980029">+0553980029</a><br>
          <a href="mailto:info@firenzestreetart.com">info@firenzestreetart.com</a><br>
          Via Masaccio 105 - Firenze - IT
        </div>

        <div class="col-4">
          <span style="font-size: 125%">Contatti Staff:</span><br>
          <a href="tel:+3237921853">Mirko Ragusa</a><br>
          <a href="tel:+3927169012">Alessandro Ferretti</a><br>
          <a href="tel:+3445783841">Gabriele Duka</a>
        </div>
      </center>
    </div>
  </footer>

</body>
<script src="./js/index.js"></script>
<script src="js/rmodal.js"></script>
<script src="js/lmodal.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
<!--DELETE FROM `prodotti` WHERE 0-->
<!--UPDATE `prodotti` SET `ID`='[value-1]',`nome`='[value-2]',`descrizione`='[value-3]',`img`='[value-4]',`categoria`='[value-5]',`prezzo`='[value-6]' WHERE 1-->