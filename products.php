<?php
require_once 'database.php'; // Verbindung zur Datenbank einbinden

// Produkte aus der Datenbank abrufen
$sql = "SELECT id, name, description, price FROM products";
$result = $conn->query($sql);

// Überprüfen, ob Produkte vorhanden sind
if ($result->num_rows > 0) {
    // Produkte im JSON-Format ausgeben
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    echo json_encode($products);
} else {
    echo "Keine Produkte gefunden.";
}

// Verbindung zur Datenbank wird automatisch geschlossen, wenn das Skript beendet wird
?>
