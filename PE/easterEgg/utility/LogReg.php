<?php

include("connDB.php");
session_start();

$Nome = $_POST["nome"];
$Cognome = $_POST["cognome"];
$Email = $_POST["email"];
$Password = $_POST["password"];

$sql = "SELECT * FROM users WHERE email = $Email";
$result = $conn->query($sql) or
    die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));


if (mysqli_num_rows($result) < 1) {

    $sql = "INSERT INTO `users`(`Nome`, `Cognome`, `Email`, `Password`) VALUES ('$nome','$cognome','$email','$password')";
    $result = $conn->query($sql) or
        die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));

    $sql = "SELECT ID FROM users WHERE email = $Email";
    $result = $conn->query($sql) or
        die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
    $row = $result->fetch_assoc();

    $_SESSION["idUser"] = $row["ID"];
    header("Location:login.html");

}

$sql = "SELECT * FROM users WHERE email = $Email && password = $Password";
$result = $conn->query($sql) or
    die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));

if (mysqli_num_rows($result) > 0) {
    $sql = "SELECT ID FROM users WHERE email = $Email";
    $result = $conn->query($sql) or
        die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
    $row = $result->fetch_assoc();

    $_SESSION["idUser"] = $row["ID"];
    header("Location:index.html");

}



?>