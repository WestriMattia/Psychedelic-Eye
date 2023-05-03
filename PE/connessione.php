<?php
// Nome utente e password per l'accesso al database
$servername = "localhost";
$username = "root";
$password = "Apritidai";
$dbname = "pe";

// Crea una connessione al database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica se la connessione è stata stabilita correttamente
if (!$conn) {
  die("Connessione fallita: " . mysqli_connect_error());
}
?>
