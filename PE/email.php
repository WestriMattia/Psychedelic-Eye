<?php

// Imposta le opzioni per la connessione SMTP
ini_set('SMTP', 'smtp.gmail.com');
ini_set('smtp_port', 587);
ini_set('sendmail_from', 'vestrimattia@gmail.com'); // Sostituisci con il tuo indirizzo email Gmail

// Abilita STARTTLS
$smtpConfig['ssl'] = 'tls';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $messaggio = $_POST['messaggio'];

    // Esegui qui la logica di elaborazione del messaggio
    // Ad esempio, puoi inviare l'email al team di supporto o salvare i dati nel database

    // Esempio di invio email
    $to = 'vestrimattia@gmail.com';
    $oggetto = 'Nuovo messaggio da ' . $nome;
    $corpo = "Hai ricevuto un nuovo messaggio dal form di contatto:\n\nNome: $nome\nEmail: $email\nMessaggio: $messaggio";
    $headers = "From: $email\r\nReply-To: $email\r\n";

    // Invia l'email
    if (mail($to, $oggetto, $corpo, $headers)) {
        echo "<h1>Messaggio inviato con successo!</h1>";
        echo "<p>Grazie per averci contattato, $nome. Ti risponderemo al più presto.</p>";
    } else {
        echo "<h1>Si è verificato un errore nell'invio del messaggio.</h1>";
        echo "<p>Si prega di riprovare più tardi o di contattarci direttamente all'indirizzo email supporto@brandmoda.com.</p>";
    }
} else {
    echo "<h1>Accesso non valido.</h1>";
    echo "<p>Si prega di utilizzare il modulo di contatto per inviare un messaggio.</p>";
}
?>
