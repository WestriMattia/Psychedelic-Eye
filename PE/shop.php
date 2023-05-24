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
    <title>Home</title>
  </head>
  <body>
    <nav class="navbar" style="background-color: black; ">
      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn lin" onclick="closeNav()">&times;</a>
        <a class="lin" href="accesso.php">Accedi</a>
        <a class="lin" href="chi-siamo.html">Chi Siamo</a>
        <a class="lin" href="#">Clients</a>
        <a class="lin" href="#">Contact</a>
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
        
    </nav>

      <center>
<div>
      <?php
        session_start();
            $tipo0='';
      require_once('connessione.php');
      
      if(!empty($_SESSION["err"])){
        if ($_SESSION["err"] == 2) {
          echo"<p style='color:#4CAF50;'>Prodotto aggiunto correttamente.</p>";
          $_SESSION["err"]=null;
        }
    }
    
      $result = $mysql ->query("select idProdotto, colore, nome, prezzo, descrizione, 
      tipo, taglie.xl, taglie.l, taglie.m, taglie.s, foto.foto1
      from prodotto 
      INNER JOIN taglie ON taglie.idTaglia=prodotto.idTaglia
      INNER JOIN foto ON foto.idFoto=prodotto.idFoto");
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
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
            if($tipo!=$tipo0){
              $tipo0=$tipo;
              ?></div><div class="shop">    
                
              <h2 style="color: #4CAF50;"><?php echo $row['tipo']; ?></h2><?php
            }
            echo "<div class='card'>";
            ?>
            
            <img src='./images/<?php echo $row['foto1']; ?>' class='card-img-top' alt='$nome'>
            <?php
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>$nome</h5>";
            echo "<ul class='list-group list-group-flush'>";
            echo "<b>Prezzo:</b> $prezzo €";
            echo "</ul> <br>"; 
            echo "<a href='prodotto.php?idProdotto=$idProdotto' class='btn btn-success'>Acquista</a>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p style='color:red'>Non ci sono prodotti nello shop al momento :(</p>";
    }
?>
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
          <li><a href=""><i class="fa fa-instagram">Instagram Vestri</i></a></li>
          <li><a href=""><i class="fa fa-facebook">Facebook Vestri</i></a></li>
          <li><a href="https://www.instagram.com/davideapolito_/"><i class="fa fa-instagram">Instagram Apolito</i></a></li>
          <li><a href=""><i class="fa fa-facebook">Facebook Apolito</i></a></li>
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
</div>
        
    </center>
    </body>
    </html>
    

  <script src="myscript.js"></script>
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