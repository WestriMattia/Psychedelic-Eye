



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="mystylee.css" type="text/css" />
    <title>Prodotto</title>
  </head>
  <body>
  <?php
    require_once('connessione.php');
    session_start();
  ?>
    <nav class="navbar" style="background-color: black; ">
      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn lin" onclick="closeNav()">&times;</a>
        <a class="lin" href="registrazione.php">Registrazione</a>
      <a class="lin" href="accesso.php">Accedi</a>
      <a class="lin" href="shop.php">Shop</a>
      <a class="lin" href="contattaci.html">Contattaci</a>
      </div>

      <span onclick="openNav()">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-list" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
      </span>

        <a href="index.html">
          <img src="images/logo.png" class="logo" >
          </a>

        <a href="cart.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-cart3" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>
        </a>    
    </nav><center>
    <?php
  

if (isset($_GET['idProdotto'])) {
    $idProdotto = $_GET['idProdotto'];
    $_SESSION['idProdotto'] = $idProdotto;
    require_once('connessione.php');
    $sql = "SELECT idProdotto, colore, nome, prezzo, descrizione,
    tipo, taglie.xl, taglie.l, taglie.m, taglie.s, foto.foto1
    FROM prodotto 
    INNER JOIN taglie ON taglie.idTaglia=prodotto.idTaglia
    INNER JOIN foto ON foto.idFoto=prodotto.idFoto 
    WHERE idProdotto = $idProdotto";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows >0) {
        $row = $result->fetch_assoc();
        $idProdotto = $row['idProdotto'];
        $colore = $row['colore'];
        $nome = $row['nome'];
        $prezzo = $row['prezzo'];
        $descrizione = $row['descrizione'];
        $tipo = $row['tipo'];
        $xl = $row['xl'];
        $l = $row['l'];
        $m = $row['m'];
        $s = $row['s'];
        $foto1 = $row['foto1'];
        if(!isset($_SESSION)){
            session_start();
        }
        
?>


<div class="container">
<h2 style="color: #4CAF50;"><?php echo $nome; ?></h2>
  <div class="row">
    <div class="col">
    <img src="./images/<?php echo $foto1; ?>" >
    </div>
    <div class="col">
    <div style="padding-top: 12rem;">
    <p style="color: #4CAF50;"><strong>Prezzo: </strong><?php echo "$prezzo €"; ?></p>
    <form method="post" action="./cart_adder.php">
      <input type="hidden" value="<?php echo $_SESSION['idProdotto']; ?>" name="idProdotto">
      <label for="taglia" style="color: #4CAF50;">Taglia: </label>
      <select required id="taglia" name="taglia">
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
        <option value="XL">XL</option>
      </select>
      <br>
      <label for="quantita" style="color: #4CAF50;">Quantità:</label>
      <input required type="number" id="quantita" name="quantita" min="1" max="99" value="1">
      <?php
      if (!empty($_SESSION["err"])) {
        if ($_SESSION["err"] == 1) {
          echo "<p style='color:red'>Quantità selezionata non disponibile.</p>
                <p style='color:red'>Selezionare un'altra quantità.</p>";
          $_SESSION["err"] = null;
        }
        if ($_SESSION["err"] == 3) {
          echo "<p style='color:red'>Dati inseriti in quantità errati.</p>";
        }
      }
      ?>
      <br>
      <input class="btn btn-success" type="submit" name="submit" value="Aggiungi al carrello">
    </form>
    <div style="border: 2px solid limegreen; padding: 10px; margin-top: 10px; display: inline-block;">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="limegreen" class="bi bi-truck" viewBox="0 0 16 16">
  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
</svg>
<span style="color: limegreen; font-weight: bold;">Consegna gratuita</span>
<br>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="limegreen" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
</svg>
      <span style="color: limegreen; font-weight: bold;">Reso gratuito</span>
    </div>
  </div>
</div>
<p style="color: #4CAF50;"><strong>Descrizione: </strong><?php echo $descrizione; ?></p>

    <?php
 } else {
     echo "<p style='color:red'>Prodotto non trovato :(</p>";
 }
} else {
 echo "<p style='color:red'>Nessun prodotto selezionato :(</p>";
}
?>
    </div>
  </div>


    <footer>
<div class="footer-top">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h3>Informazioni</h3>
        <ul>
          <li><a href="chi-siamo.html">Chi siamo</a></li>
          <li><a href="terminiEcondizioni.html">Termini e condizioni</a></li>
          <li><a href="policy.html">Politica sulla privacy</a></li>
          <li><a href="contattaci.html">Contattaci</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h3>Categorie</h3>
        <ul>
          <li><a href="shop.php">Abbigliamento</a></li>   
          <li><a href="easterEgg/index.php">Spray</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h3>Seguici</h3>
        <ul class="social-icons">
          <li><a href="https://www.instagram.com/davideapolito_/" class="fa fa-instagram">Instagram</a></li>
          <li><a href="https://www.facebook.com/davide.apolito/" class="fa fa-facebook">Facebook</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="footer-bottom">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <p>&copy; 2023 PSYCHEDELIC-EYE. Tutti i diritti riservati.</p>
      </div>
      <div class="col-md-6">
        <p class="text-right">Realizzato da <a href="#">MATTIA VESTRI & DAVIDE APOLITO</a></p>
      </div>
    </div>
  </div>
</div>
</footer>
    </center>
    </body>
    </html>
    

  <script src="myscript.js">
  </script>
  <script
    src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"
  ></script>
  

</html>