<?php

require_once("connessione.php");
$id_Prodotto = $_POST["idProdotto"];
$taglia = $_POST["taglia"];
$query = "SELECT * FROM prodotto";
$result = $conn->query($query);
while ($row = $result->fetch_assoc()) {
    if ($row["idProdotto"] == $idProdotto) {
        $query = "SELECT * FROM taglia  WHERE ";
        $result = $conn->query($query);
        while ($row_taglie = $result->fetch_assoc()) {
            if ($row_taglie[] == $) {
                # code...
            }
        }
    }
}

?>