<?php

require_once('connessione.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM login WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
    } else {
        echo "Credenziali non valide.";
    }
}

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO login (email, password) VALUES ('$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        echo "Account creato con successo.";
    } else {
        echo "Errore durante la creazione dell'account: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login o registrazione</title>
</head>
<body>
    <h1>Login o registrazione</h1>
    <h2>Login</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br>
        <input type="submit" name="login" value="Accedi">
    </form>
    <h2>Registrazione</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br>
        <input type="submit" name="register" value="Registrati">
    </form>
</body>
</html>
