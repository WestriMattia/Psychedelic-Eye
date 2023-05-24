
<?php
//codice nuovo
include("connDB.php");
session_start();

if(isset($_SESSION["idUser"])){
    session_destroy();
}

$Email = $_POST["email"];
$Password = $_POST["password"];

$sql = "SELECT * FROM userdata WHERE email = '$Email' && password = '$Password'";
$result = $conn->query($sql) or
    die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));

if (mysqli_num_rows($result) > 0) {
    $sql = "SELECT ID FROM userdata WHERE email = '$Email'";
    $result = $conn->query($sql) or
        die("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
    $row = $result->fetch_assoc();

    $_SESSION["idUser"] = $row["ID"];
    header("Location:../index.php");

}
header("Location:../index.php");
?>