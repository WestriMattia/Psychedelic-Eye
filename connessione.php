<<<<<<< HEAD
<?php
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "pe";

$mysql = new mysqli($servername,$username,$pass,$dbname);
$conn = mysqli_connect($servername, $username, $pass, $dbname);

if (!$conn) {
  die("Connessione fallita: " . mysqli_connect_error());
}
?>
=======
<?php
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "pe";

$mysql = new mysqli($servername,$username,$pass,$dbname);
$conn = mysqli_connect($servername, $username, $pass, $dbname);

if (!$conn) {
  die("Connessione fallita: " . mysqli_connect_error());
}
?>
>>>>>>> 0f85ff6 (modifica db e piccoli miglioramenti)
