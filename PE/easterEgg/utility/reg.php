<?php
//codice nuovo
include("connDB.php");
session_start();

$Nome = $_POST["nome"];
$Cognome = $_POST["cognome"];
$Email = $_POST["email"];
$Password = $_POST["password"];

$sql = "SELECT * FROM userdata WHERE email = '$Email'";
$result = $conn->query($sql) or
    die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));


if (mysqli_num_rows($result) < 1) {

    $sql = "INSERT INTO userdata(nome,cognome,indirizzo,email, password,admin) VALUES ('$nome','$cognome',null,'$email','$password',0)";
    $result = $conn->query($sql) or
        die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));

    $sql = "SELECT ID FROM userdata WHERE email = '$Email'";
    $result = $conn->query($sql) or
        die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
    $row = $result->fetch_assoc();

    $_SESSION["idUser"] = $row["ID"];
    header("Location:../index.php");

} else {
    echo "<center>";
    echo "<h1>Questo utente esiste già</h1>";
    echo "<h3>Verrai reindirizzato alla home</h3>";
    echo "</center>";

    header("Location:../index.php");



}





?>