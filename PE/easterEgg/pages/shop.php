<?php
include("../utility/connDB.php");
session_start();

if (isset($_SESSION["idUser"])) {
  $iduser = $_SESSION["idUser"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/modal.css" />
  <title>Shop</title>
</head>

<body>
  <!-- Register Modal -->
  <div id="register-modal" class="rmodal">
    <!-- Modal content -->
    <div class="rmodal-content">
      <span class="rclose">&times;</span>
      <h4>Register</h4>
      <br /><br />
      <form action="../utility/reg.php" method="post">
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
      <form action="../utility/login.php" method="post">
        Nome: <input type="text" name="nome" required /><br /><br />
        Cognome: <input type="text" name="cognome" required /><br /><br /><br />
        Email: <input type="text" name="email" required /><br /><br />
        Password: <input type="password" name="password" required /><br /><br /><br />
        <input type="submit" />
      </form>
    </div>
  </div>
  <!--Header-->
  <header>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="../">Home</a>
      <a href="./shop.php">Shop</a>
      <?php

      if (isset($_SESSION["idUser"])) {
        $sql = "SELECT admin FROM userdata WHERE ID = '$iduser'";
        $result = $conn->query($sql) or
          die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));

        $row = $result->fetch_assoc();

        if ($row["admin"] == 1) {

          echo ' <a href="./adminPage.php">AdminPage</a>';
        }
        echo '<button class="btn btn-light button1"><a href="../utility/login.php">Log out</a></button>';
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
          <a href="./index.html"><img src="../images/logo 2.png" /></a>
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


            echo "<h3>Totale: " . $row["prezzo"] . "$</h3>";

          } else {
            echo "<h3>Carrello Vuoto</h3>";
          }



          ?>
        </div>
      </div>

    </div>

  </header>
  <!--end-->

  <!--Body-->
  <!--codice nuovo-->
  <div class="container-b">
  <div class="title">Filtro</div>
    <form action="./shop.php" method="post">
      Spray: <input type="radio" name="filtro" value="1">
      Marker: <input type="radio" name="filtro" value="2">
      Vestiti: <input type="radio" name="filtro" value="3">
      <input type="submit" value="filtra">
    </form>
    <hr class="line">
    <div class="container text-center my-3 carousel-i">
    <div class="title">Shop</div>
    <br>
    <center>

      <?php

      if (!isset($_POST["filtro"])) {
        $sql = "SELECT *
          FROM prodotti";
        $result = $conn->query($sql) or
          die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
      } else {
        $filtro = $_POST["filtro"];
        $sql = "SELECT *
        FROM prodotti WHERE categoria = $filtro";
        $result = $conn->query($sql) or
          die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
      }

      if (true) {
/*         echo ' <div class="backS">';
        echo ' <div class="row">'; */

       echo '<div class="row mx-auto my-auto justify-content-center">';

        while ($row = $result->fetch_assoc()) {

          $image = $row['img'];

/*           echo " <div class='col-md-3'>";
          echo "<div class='card-c'>";
          echo "<img src='$image'/>";
          echo "<p>" . $row["nome"] . "</p>";
          echo "<p>" . $row["prezzo"] . "</p>";
          echo "</div>";
          echo "</div>";
          echo "   <form action='../utility/addCart.php' method='post'>";
          echo "     <input type='number' name='idprodotto' value=" . $row["ID"] . " hidden>";
          echo "     <input type='submit'>";
          echo "  </form>";
          echo "</div>";
          echo " </div>"; */
          echo "<div class='col-md-3'>";
          echo "<div class='card'>";
          echo "<img class='card-bg' src='$image'/>";
          echo "<p>" . $row["nome"] . "</p>";
          echo "<p>" . $row["prezzo"] ."$". "</p>";
          echo "   <form action='../utility/addCart.php' method='post'>";
          echo "     <input type='number' name='idprodotto' value=" . $row["ID"] . " hidden>";
          echo "     <input value='Aggiungi al carrello' type='submit' class='inputS'>";
          echo "  </form>";
          echo "</div>";
          echo "</div>";
        }
        echo "</div>";
      }

      ?>
</div>
      <br />
      <hr class="line">
      <center class="ringrShop title">
        Grazie per aver scelto Ninotchka!
      </center>
      <!--end-->

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
<script src="../js/index.js"></script>
<script src="../js/rmodal.js"></script>
<script src="../js/lmodal.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>