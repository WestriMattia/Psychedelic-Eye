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
        while($row_taglie = $result->fetch_assoc()){
            switch ($taglia) {
                case 'XL':
                    if ($row_taglie[$xl] > 0) {
                        if ($row_taglie[$xl] >= $quantita) {
                            $test = $row_taglie[$xl] - $quantita;
                            $query = "UPDATE taglie SET XL = $test  WHERE idTaglia = $idProdotto";
                            $result = $conn->query($query);
                            $_SESSION["err"] = 2;
                            header("Location:./shop.php");  
                        }else {
                            $_SESSION["err"] = 1;
                            header("Location:./prodotto.php?idProdotto=".$idProdotto."");
                        }
                    }else {
                        $_SESSION["err"] = 1;
                        header("Location:./prodotto.php?idProdotto=".$idProdotto."");
                    }
                    break;
                case 'L':
                    if ($row_taglie[$l] > 0) {
                        if ($row_taglie[$l] >= $quantita) {
                        $test = $row_taglie[$l] - $quantita;
                        $query = "UPDATE taglie SET L = $test  WHERE idTaglia = $idProdotto";
                        $result = $conn->query($query);
                        $_SESSION["err"] = 2;
                        header("Location:./shop.php");  
                    }else {
                        $_SESSION["err"] = 1;
                        header("Location:./prodotto.php?idProdotto=".$idProdotto."");
                    }
                }else {
                        $_SESSION["err"] = 1;
                        header("Location:./prodotto.php?idProdotto=".$idProdotto.""); 
                    }
                break;
                case 'M':
                    if ($row_taglie[$m] > 0) {
                        if ($row_taglie[$m] >= $quantita) {
                        $test = $row_taglie[$m] - $quantita;
                        $query = "UPDATE taglie SET M = $test  WHERE idTaglia = $idProdotto";
                        $result = $conn->query($query);
                        $_SESSION["err"] = 2;
                        header("Location:./shop.php");    
                    }else {
                        $_SESSION["err"] = 1;
                        header("Location:./prodotto.php?idProdotto=".$idProdotto."");
                    }
                    }else {
                        $_SESSION["err"] = 1;
                        header("Location:./prodotto.php?idProdotto=".$idProdotto.""); 
                    }
                break;
                case 'S':
                    if ($row_taglie[$s] > 0) {
                        if ($row_taglie[$s] >= $quantita) {
                        $test = $row_taglie[$s] - $quantita;
                        $query = "UPDATE taglie SET S = $test  WHERE idTaglia = $idProdotto";
                        $result = $conn->query($query);
                        $_SESSION["err"] = 2;
                        header("Location:./shop.php");    
                    }else {
                        $_SESSION["err"] = 1;
                        header("Location:./prodotto.php?idProdotto=".$idProdotto."");
                    }
                    }else {
                        $_SESSION["err"] = 1;
                        header("Location:./prodotto.php?idProdotto=".$idProdotto.""); 
                    }
                break;
                default:
                echo"errore";
                    break;
            }   
        }
    }
}

?>