<?php
session_start();

// Überprüfen, ob das Formular abgesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hier könntest du die eingegebenen Kontaktdaten validieren
    $name = $_POST['name'];
    $email = $_POST['email'];
    $adresse = $_POST['adresse'];

    // Speichere die Bestellung und die Kontaktdaten in der Datenbank
    // Hier müsstest du den Code einfügen, um die Bestelldaten und Kontaktdaten in deiner Datenbank zu speichern

    // Weiterleitung zur PayPal-Zahlungsabwicklung
    header("Location: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=DEINE_PAYPAL_EMAIL&item_name=Produkt&amount=PREIS&currency_code=EUR&return=URL_NACH_ZAHLUNG&cancel_return=URL_NACH_ABBRUCH");
    exit;
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bezahlen mit PayPal</title>
</head>
<body>
    <h1>Bezahlen mit PayPal</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="email">E-Mail:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="adresse">Adresse:</label><br>
        <textarea id="adresse" name="adresse" rows="4" required></textarea><br><br>
        <button type="submit">Mit PayPal bezahlen</button>
    </form>
</body>
</html>
