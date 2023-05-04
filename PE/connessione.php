<?php
// Nome utente e password per l'accesso al database
$servername = "localhost";
$username = "root";
$pass = "Apritidai";
$dbname = "pe";

$mysql = new mysqli($servername,$username,$pass,$dbname);
// Crea una connessione al database
$conn = mysqli_connect($servername, $username, $pass, $dbname);

// Verifica se la connessione è stata stabilita correttamente
if (!$conn) {
  die("Connessione fallita: " . mysqli_connect_error());
}
?>
