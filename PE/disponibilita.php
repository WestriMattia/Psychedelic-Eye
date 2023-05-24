<?php
    require_once('connessione.php');
    $idProdotto = $_SESSION['idProdotto'];
    $query = "SELECT taglie.* FROM prodotto 
    INNER JOIN taglie ON taglie.idTaglia=prodotto.idTaglia WHERE prodotto.idProdotto = $idProdotto";
?>
