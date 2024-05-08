<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alpainca - Südamerikanischer Shop</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
    <style>
/* CSS für das Layout */
body {
    font-family: Arial, sans-serif; /* Verwende die Schriftart Arial oder eine Standardschriftart ohne Serifen */
    background-color: #f8f9fa; /* Hintergrundfarbe des gesamten Dokuments */
    margin: 0; /* Entferne den Standardabstand des Body-Elements */
    padding: 0; /* Entferne den Standardinnenabstand des Body-Elements */
}
.container {
    max-width: 1200px; /* Maximale Breite des Inhalts */
    margin: 0 auto; /* Zentriere den Container horizontal */
    padding: 0 20px; /* Innenabstand des Containers auf den Seiten */
}

/* CSS-Stile für den Warenkorb */
.cart-content, .order-box {
    background-color: #fff; /* Hintergrundfarbe der Boxen */
    border-radius: 10px; /* Abrundung der Ecken der Boxen */
    padding: 20px; /* Innenabstand der Boxen */
    margin-top: 200px; /* Abstand der Boxen vom oberen Rand */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Schatten hinzufügen */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Füge eine sanfte Animation für Transform und Schatten hinzu */
}

.cart-content:hover, .order-box:hover {
    transform: translateY(-5px); /* Bewege die Boxen nach oben, wenn sie schweben */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Erhöhe den Schatten beim Schweben */
}

.cart-content h2, .order-box h2 {
    margin-top: 20px; /* Abstand des Titels vom oberen Rand */
    font-size: 24px; /* Schriftgröße des Titels */
    color: #333; /* Textfarbe des Titels */
}

/* CSS-Stile für Produkte im Warenkorb */
.product {
    margin-bottom: 15px; /* Abstand zwischen den Produkten */
    background-color: #fff; /* Hintergrundfarbe der Produktbox */
    border: 1px solid #ccc; /* Rand um die Produktbox */
    border-radius: 10px; /* Abrundung der Ecken der Produktbox */
    padding: 20px; /* Innenabstand der Produktbox */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Füge eine sanfte Animation für Transform und Schatten hinzu */
}

.product:hover {
    transform: translateY(-5px); /* Bewege die Produktboxen nach oben, wenn sie schweben */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Erhöhe den Schatten beim Schweben */
}

.product p {
    margin: 0; /* Entferne den Standardabstand für Absatzelemente innerhalb der Produkte */
    font-size: 18px; /* Schriftgröße der Produktinformationen */
}

/* CSS-Stile für den Entfernungsbutton */
.remove-btn {
    background-color: #dc3545; /* Hintergrundfarbe des Entfernungsbuttons */
    color: #fff; /* Textfarbe des Entfernungsbuttons */
    border: none; /* Entferne die Rahmengrenze des Entfernungsbuttons */
    border-radius: 5px; /* Abrundung der Ecken des Entfernungsbuttons */
    padding: 5px 10px; /* Innenabstand des Entfernungsbuttons */
    cursor: pointer; /* Zeige eine Hand als Mauszeiger, um anzuzeigen, dass der Button klickbar ist */
    font-size: 16px; /* Schriftgröße des Entfernungsbuttons */
    transition: background-color 0.3s ease; /* Füge einen sanften Farbübergang beim Schweben über den Button hinzu */
}

.remove-btn:hover {
    background-color: #c82333; /* Ändere die Hintergrundfarbe des Entfernungsbuttons beim Schweben */
}

    </style>
    
</head>
 
<body>
    <!-- Hier wird das Menü von JavaScript hinzugefügt -->
    <header>
        <div class="container">
            <script src="menu.js"></script>
        </div>
    </header>
<!-- Warenkorb-Inhalt -->
<div class="container">
    <div class="cart-content" style="margin-bottom: 50px;">

        <!-- Warenkorb-Inhalt anzeigen -->
        <h2>Warenkorb:</h2>
        <?php
        // Starten der Session
session_start();

// Überprüfen, ob das Formular zum Entfernen eines Produkts gesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_product_id'])) {
    // Das Produkt entfernen
    $productIdToRemove = $_POST['remove_product_id'];
    $index = array_search($productIdToRemove, $_SESSION['cart']);
    if ($index !== false) {
        unset($_SESSION['cart'][$index]);
        // Anzahl der Produkte im Warenkorb aktualisieren
        $cartItemCount = count($_SESSION['cart']);
    }
}
        // Überprüfen, ob ein Warenkorb in der Session vorhanden ist
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            // Hier könntest du eine Datenbankabfrage verwenden, um die Produktinformationen basierend auf den Produkt-IDs im Warenkorb abzurufen
            // In diesem Beispiel nehmen wir an, dass die Produktdaten in der Datenbank gespeichert sind

            // Verbindungsdaten zur Datenbank
            $servername = "Muster";
            $port = "Muster";
            $username = "Muster";
            $password = "Muster";
            $database = "Muster";

            // Verbindung zur Datenbank herstellen
            $conn = new mysqli($servername, $username, $password, $database);

            // Überprüfen, ob die Verbindung erfolgreich hergestellt wurde
            if ($conn->connect_error) {
                die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
            }

            // Zähle die Anzahl der Produkte im Warenkorb
            $cartItemCount = count($_SESSION['cart']);

            // Warenkorb-Produkte ausgeben
            // Variable für die Gesamtsumme initialisieren
            $totalPrice = 0;
            
            // Warenkorb-Produkte ausgeben
            foreach ($_SESSION['cart'] as $productId) {
                // Produktinformationen aus der Datenbank abrufen
                $sql = "SELECT name, price, image, category FROM products WHERE id = $productId";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    // Produktinformationen anzeigen
                    echo "<div class='product'>";
                    // Anpassen des Bildpfads basierend auf der Kategorie
                    $categoryFolder = strtolower($row['category']); // Konvertieren Sie die Kategorie in Kleinbuchstaben
                    echo "<img src='assets/products/$categoryFolder/" . $row['image'] . "' alt='" . $row['name'] . "' style='width: 50px; height: 50px;'>";
                    echo "<p><strong>Produkt:</strong> " . $row['name'] . "</p>";
                    echo "<p><strong>Preis:</strong> $" . $row['price'] . "</p>";
                    // Addiere den Preis zum Gesamtpreis
                    $totalPrice += $row['price'];
                    // Formular zum Entfernen des Produkts anzeigen
                    echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
                    echo "<input type='hidden' name='remove_product_id' value='" . $productId . "'>";
                    echo "<button type='submit' class='remove-btn'>Produkt entfernen</button>";
                    echo "</form>";
                    echo "</div>";
                } else {
                    echo "Produkt nicht gefunden.";
                }
            }
            // Verbindung zur Datenbank schließen
            $conn->close();
            // Gesamtsumme anzeigen
            echo "<h3>Gesamtsumme: $" . number_format($totalPrice, 2) . "</h3>";

        } else {
            // Wenn der Warenkorb leer ist, eine entsprechende Nachricht ausgeben
            echo "<p>Ihr Warenkorb ist leer.</p>";
        }
        ?>

        <!-- Anzeige der Anzahl der Produkte im Warenkorb -->
        <p>Anzahl der Produkte im Warenkorb: <?php echo $cartItemCount; ?></p>
    </div>
</div>

<div class="container">
    <div class="order-box">
        <h2>Bestellung abschließen</h2>
        <form method="post" action="bezahlen.php">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" autocomplete="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-Mail:</label>
                <input type="email" class="form-control" id="email" name="email" autocomplete="email" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Adresse:</label>
                <input type="text" class="form-control" id="address" name="address" autocomplete="street-address" required>
            </div>
            <div class="mb-3">
                <label for="street_number" class="form-label">Hausnummer:</label>
                <input type="text" class="form-control" id="street_number" name="street_number" autocomplete="address-line2" required>
            </div>
            <div class="mb-3">
                <label for="zip_code" class="form-label">Postleitzahl:</label>
                <input type="text" class="form-control" id="zip_code" name="zip_code" autocomplete="postal-code" required>
            </div>
            <div class="mb-3">
                <label for="payment_method" class="form-label">Zahlungsmethode:</label>
                <select class="form-control" id="payment_method" name="payment_method" required>
                    <option value="paypal">PayPal</option>
                    <option value="lastschrift">Lastschrift</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Bestellung abschließen</button>
        </form>
    </div>
</div>


<style>
/* CSS für das Bestellformular */
.order-box {
    background-color: #fff; /* Hintergrundfarbe der Bestellbox */
    border-radius: 10px; /* Abrundung der Ecken der Bestellbox */
    padding: 20px; /* Innenabstand der Bestellbox */
    margin: 0 auto; /* Zentriere die Bestellbox horizontal */
    max-width: 1200px; /* Maximale Breite der Bestellbox */
    margin-bottom: 100px; /* Abstand zum unteren Rand des Bildschirms */
}
/* CSS für den Button "Bestellung abschließen" */
.order-box button[type="submit"] {
    background-color: #4CAF50; /* Hintergrundfarbe des Buttons ändern */
    color: #fff; /* Textfarbe des Buttons */
    border: none; /* Entfernen der Rahmengrenze des Buttons */
    border-radius: 5px; /* Abrunden der Ecken des Buttons */
    padding: 10px 20px; /* Innenabstand des Buttons */
    cursor: pointer; /* Zeiger anzeigen, um anzuzeigen, dass der Button klickbar ist */
    font-size: 16px; /* Schriftgröße des Buttons */
    transition: background-color 0.3s ease; /* Sanfter Farbübergang beim Schweben über den Button */
}

.order-box button[type="submit"]:hover {
    background-color: #45a049; /* Ändern der Hintergrundfarbe des Buttons beim Schweben */
}

</style>
    <footer>
        <!-- Dein Footer -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="footer.js"></script>
    </footer>
<script src="cart.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha1/js/bootstrap.bundle.min.js"></script>
    <script>
        // Scroll-to-Top Funktion
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>

    <script>
        // Beispielcode zum Aktualisieren des Local Storage basierend auf der PHP-Session
        document.addEventListener('DOMContentLoaded', function() {
            let cartItemCount = <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>;
            localStorage.setItem('cartItemCount', cartItemCount);
            updateCartItemCount(); // Stelle sicher, dass diese Funktion die Anzeige im Menü aktualisiert
        });
    </script>
</body>
</html>