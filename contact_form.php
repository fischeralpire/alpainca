<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "Muster-Email";
    $subject = "Neue Kontaktanfrage von " . $_POST['name'];
    $message = "Name: " . $_POST['name'] . "\n";
    $message .= "E-Mail: " . $_POST['email'] . "\n";
    $message .= "Telefon: " . $_POST['phone'] . "\n";
    $message .= "Nachricht: " . $_POST['message'];
    $headers = "From: " . $_POST['email'];

    if (mail($to, $subject, $message, $headers)) {
        echo "Vielen Dank! Ihre Nachricht wurde erfolgreich gesendet.";
    } else {
        echo "Es tut uns leid, beim Senden Ihrer Nachricht ist ein Fehler aufgetreten.";
    }
}
?>
