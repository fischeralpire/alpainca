<?php
$servername = "Muster";
$port = "Muster";
$username = "Muster";
$password = "Muster";
$database = "Muster";

// Verbindung zur Datenbank herstellen
function connectToDatabase($servername, $username, $password, $database, $port) {
    $conn = new mysqli($servername, $username, $password, $database, $port);
    if ($conn->connect_error) {
        die("Verbindung zur MySQL-Datenbank fehlgeschlagen: " . $conn->connect_error);
    } else {
        return $conn;
    }
}

// Funktion zum Einfügen eines Produkts in die Datenbank
function insertProduct($conn, $name, $price) {
    // Absichern gegen SQL-Injection und Preis als Fließkommazahl konvertieren
    $name = $conn->real_escape_string($name);
    $price = (float) $price;
    
    // SQL-Abfrage vorbereiten
    $sql = "INSERT INTO products (name, price) VALUES ('$name', '$price')";
    
    // SQL-Abfrage ausführen und Erfolg/Misserfolg zurückgeben
    if ($conn->query($sql) === TRUE) {
        return true; // Erfolg
    } else {
        return false; // Misserfolg
    }
}
?>
