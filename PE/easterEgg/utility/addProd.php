<?php

include("./connDB.php");
session_start();

if (isset($_POST["nome"])) {
    $nome = $_POST["nome"];
    $desc = $_POST["desc"];
    $img = $_POST["img"];
    $cat = $_POST["cat"];
    $pre = $_POST["pre"];

    $query = "INSERT INTO prodotti(nome, descrizione, img, categoria, prezzo) VALUES ('$nome','$desc','$img','$cat','$pre')";

    $result = $conn->query($query) or
        die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./addProd.php" method="post">
        nome:<br>
        <input type="text" name="nome" required><br>
        descrizione:<br>
        <input type="text" name="desc" required><br>
        img (link):<br>
        <input type="text" name="img" required><br>
        categoria:<br>
        <select name="cat">
            <option value="1">Spray</option>
            <option value="2">Marker</option>
            <option value="3">Vestiti</option>
        </select><br>
        prezzo:<br>
        <input type="number" name="pre" required><br>
        <input type="submit">
    </form>
</body>

</html>