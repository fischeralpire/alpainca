<?php
// Starten der Session
session_start();

// Überprüfen, ob das Produkt-ID-Feld im POST-Array vorhanden ist
if (isset($_POST['product_id'])) {
    // Produkt-ID aus dem POST-Array abrufen
    $productId = $_POST['product_id'];

    // Überprüfen, ob der Warenkorb-Array in der Session vorhanden ist
    if (!isset($_SESSION['cart'])) {
        // Wenn der Warenkorb-Array nicht vorhanden ist, erstellen Sie ihn
        $_SESSION['cart'] = array();
    }

    // Das Produkt zur Warenkorbliste hinzufügen
    $_SESSION['cart'][] = $productId;

    // Optional: Weiterleitung zur Warenkorbseite oder einer anderen Seite
    header("Location: cart.php");
    exit();
} else {
    // Wenn keine Produkt-ID im POST-Array vorhanden ist, eine Fehlermeldung ausgeben oder eine Rückleitung durchführen
    echo "Fehler: Produkt-ID nicht gefunden.";
}
?>
