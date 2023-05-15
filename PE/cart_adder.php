<?php
require_once("connessione.php");
session_start();
$idProdotto = $_SESSION['idProdotto'];
$taglia = $_POST["taglia"];
$quantita = $_POST["quantita"];
var_dump($quantita);
$idName = "idProdotto";
$query = "SELECT * FROM prodotto";
$xl="xl";
$l="l";
$m="m";
$s="s";
$result = $conn->query($query);
while ($row = $result->fetch_assoc()) {
    if ($row["idProdotto"] == $idProdotto) {
        $query = "SELECT * FROM taglie INNER JOIN prodotto ON prodotto.idTaglia = taglie.idTaglia WHERE prodotto.idProdotto = $idProdotto";
        $result = $conn->query($query);
        while ($row_taglie = $result->fetch_assoc()) {
            switch ($taglia) {
                case 'xl':
                    $test = $row_taglie[$xl] - $quantita;
                    $query = "UPDATE taglie SET xl = $test  WHERE idTaglia = $idProdotto";
                    $result = $conn->query($query);
                    var_dump($row_taglie[$xl]);
                    var_dump($result);
                    break;
                case 'l':
                    $query = "UPDATE taglie SET l = $row_taglie[$l] - $quantita WHERE idTaglia = $idProdotto";
                    $result = $conn->query($query);
                    var_dump();
                    var_dump($result);
                    break;
                case 'm':
                    $query = "UPDATE taglie SET m = $row_taglie[$m] - $quantita WHERE idTaglia = $idProdotto";
                    $result = $conn->query($query);
                    var_dump();
                    var_dump($result);
                    break;
                case 's':
                    $query = "UPDATE taglie SET s = $row_taglie[$s] - $quantita WHERE idTaglia = $idProdotto";
                    $result = $conn->query($query);
                    var_dump();
                    var_dump($result);
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }
}

?>