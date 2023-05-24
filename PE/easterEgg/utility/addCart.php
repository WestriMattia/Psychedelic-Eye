<?php

include("connDB.php");
session_start();

if(isset($_SESSION["idUser"])){
    $id = $_SESSION["idUser"];
    $prod = $_POST["idprodotto"];
    
    $query= "INSERT INTO carrello(IDUser,IDProdotto) VALUES ('$id','$prod')";
    
    $result = $conn->query($query) or
    die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
    header("Location:../pages/shop.php");    
}else{
    echo '<h1>ricorda di effettuare il login prima di aggiungere al carrello un prodotto</h1>';
    echo '<a href="../index.php">torna alla home...</a>';
}





?>