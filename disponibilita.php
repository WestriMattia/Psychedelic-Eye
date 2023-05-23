<<<<<<< HEAD
<?php
    require_once('connessione.php');
    $idProdotto = $_SESSION['idProdotto'];
    $query = "SELECT taglie.* FROM prodotto 
    INNER JOIN taglie ON taglie.idTaglia=prodotto.idTaglia WHERE prodotto.idProdotto = $idProdotto";
?>
=======
<?php
    require_once('connessione.php');
    $idProdotto = $_SESSION['idProdotto'];
    $query = "SELECT taglie.* FROM prodotto 
    INNER JOIN taglie ON taglie.idTaglia=prodotto.idTaglia WHERE prodotto.idProdotto = $idProdotto";
?>
>>>>>>> 0f85ff6 (modifica db e piccoli miglioramenti)
