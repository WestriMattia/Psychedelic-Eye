<<<<<<< HEAD
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
        </script>
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="mystylee.css">
<title>Accesso</title>
    </head>
    <body class="corpo">
    <center>

    <nav style="background-color: black;" class="navbar">
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn lin" onclick="closeNav()">&times;</a>
      <a class="lin" href="registrazione.php">Registrazione</a>
      <a class="lin" href="accesso.php">Accedi</a>
      <a class="lin" href="#">Clients</a>
      <a class="lin" href="#">Contact</a>
    </div>

    <span onclick="openNav()"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white"
        class="bi bi-list" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
          d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
      </svg>
    </span>

    <a href="index.html">
      <img src="images/logo.png" class="logo2" />
    </a>

    <a href="cart.php">
      <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-cart3"
        viewBox="0 0 16 16">
        <path
          d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
      </svg>
    </a>
  </nav>

    <div  class="regEntr">
<h1 class="titolo">Accesso</h1>
        <form action="accesso.php" methd="get" class="login">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
            </div>
            <br>
            <a href="registrazione.php"  style="font-family: 'Roboto', sans-serif;">Se non possiedi un account registrati</a>
            <br><br>
            <button type="submit" class="btn btn-primary" style="font-family: 'Roboto', sans-serif;">Login</button>
<br><br>
        </form>

        <?php
        if(isset($_SESSION)){
            session_destroy();
        }

        session_start();
    
        if (!empty($_GET)) {
            $email = $_GET["email"];
            $password = $_GET["password"];

            require_once('connessione.php');
            
            $result = $mysql ->query("select idUtente,email,password from login where email = '$email' and password = '$password'");
            if ($result->num_rows ==1) {
                $row = $result->fetch_assoc();
                $_SESSION["idUtente"] = $row["idUtente"];
                echo "<p style='color:green'>Accesso eseguito correttamente</p>";
            }else {
                echo "<p style='color:red'>Dati non corretti o utente inesistente</p>";
            }
        }
    ?>
    </div>
   
       
    </center>
    
    </body>
    
<script src="myscript.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

=======
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
        </script>
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="mystylee.css">
<title>Accesso</title>
    </head>
    <body class="corpo">
    <center>

    <nav style="background-color: black;" class="navbar">
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn lin" onclick="closeNav()">&times;</a>
      <a class="lin" href="registrazione.php">Registrazione</a>
      <a class="lin" href="accesso.php">Accedi</a>
      <a class="lin" href="#">Clients</a>
      <a class="lin" href="#">Contact</a>
    </div>

    <span onclick="openNav()"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white"
        class="bi bi-list" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
          d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
      </svg>
    </span>

    <a href="index.html">
      <img src="images/logo.png" class="logo2" />
    </a>

    <a href="cart.php">
      <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-cart3"
        viewBox="0 0 16 16">
        <path
          d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
      </svg>
    </a>
  </nav>

    <div  class="regEntr">
<h1 class="titolo">Accesso</h1>
        <form action="accesso.php" methd="get" class="login">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
            </div>
            <br>
            <a href="registrazione.php"  style="font-family: 'Roboto', sans-serif;">Se non possiedi un account registrati</a>
            <br><br>
            <button type="submit" class="btn btn-primary" style="font-family: 'Roboto', sans-serif;">Login</button>
<br><br>
        </form>

        <?php
        if(isset($_SESSION)){
            session_destroy();
        }

        session_start();
    
        if (!empty($_GET)) {
            $email = $_GET["email"];
            $password = $_GET["password"];

            require_once('connessione.php');
            
            $result = $mysql ->query("select idUtente,email,password from login where email = '$email' and password = '$password'");
            if ($result->num_rows ==1) {
                $row = $result->fetch_assoc();
                $_SESSION["idUtente"] = $row["idUtente"];
                echo "<p style='color:green'>Accesso eseguito correttamente</p>";
            }else {
                echo "<p style='color:red'>Dati non corretti o utente inesistente</p>";
            }
        }
    ?>
    </div>
   
       
    </center>
    
    </body>
    
<script src="myscript.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

>>>>>>> 0f85ff6 (modifica db e piccoli miglioramenti)
</html>