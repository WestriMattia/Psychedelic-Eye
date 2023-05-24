<?php
include("../utility/connDB.php");
session_start();

if(!isset($_SESSION["isAdmin"])){
    header("Location:../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>Document</title>
</head>

<body>
    <br>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Aggiunta Prodotto
                    </div>
                    <div class="card-body">
                        <p class="card-text">Aggiungi un prodotto al negozio</p>
                        <a href="../utility/addProd.php" class="btn btn-success">Inizia</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Aggiorna Prodotto
                    </div>
                    <div class="card-body">
                        <p class="card-text">Cooming Soon</p>
                        <a href="#" class="btn btn-warning">Inizia</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Rimuovi Prodotto
                    </div>
                    <div class="card-body">
                        <p class="card-text">Cooming Soon</p>
                        <a href="#" class="btn btn-danger">Inizia</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
<center>
    <a href="../">Torna alla home</a>
</center>
</body>

</html>