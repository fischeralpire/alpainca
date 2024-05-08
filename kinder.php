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
?>
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
        /* Deine Banner-Stile hier */
        .banner {
            position: relative;
            width: 100%;
            height: 400px;
            overflow: hidden;
            margin-top: 100px; /* Standard-Abstand für größere Bildschirme */
        }

        .banner img {
            width: 100%;
            height: auto;
            position: absolute;
            top: 0;
            left: 0;
        }

        .banner img:hover {
            transform: scale(1.05);
        }

        /* Hauptcontainer-Stile */
            h1 {
            text-align: center;
            margin-top: 100px; /* Abstand von 100px setzen */
            margin-bottom: 100px; /* Abstand von 100px setzen */
            font-size: 32px;
        }

        /* Produktgrid-Stile */
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
            margin-bottom: 100px; /* Abstand von 100px zum Footer setzen */
        }

        .product-card {
            width: calc(33.33% - 20px);
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Schatten hinzufügen */
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-card img {
            width: 100%;
            height: auto;
            display: block;
            border-bottom: 1px solid #eee;
        }

        .product-card .content {
            padding: 20px;
        }

        .product-card h2 {
            font-size: 20px;
            margin-top: 0;
            margin-bottom: 10px;
            color: #333;
        }

        .product-card p {
            font-size: 16px;
            margin-bottom: 15px;
            color: #666;
        }

        .product-card .price {
            font-size: 18px;
            font-weight: bold;
            color: #4CAF50;
            margin-bottom: 10px; /* erhöhter Abstand zum nächsten Element */
            display: block; /* sorgt dafür, dass der Preis unterhalb des Textes ist */
        }

        /* Button-Stile */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #45a049;
        }

        /* Modal-Stile */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 70%;
            max-height: 70%;
            overflow: auto;
            position: relative;
            transition: transform 0.3s ease; /* hinzugefügt für den Schließeffekt */
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 32px; /* erhöht die Größe des Schließsymbols */
            color: #666;
            cursor: pointer;
        }
        /* Stil für den Scroll-to-Top Pfeil */
        .scroll-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            background-color: rgba(226, 114, 91, 0.8);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .scroll-to-top:hover {
            background-color: rgba(226, 114, 91, 1);
        }
        /* Anpassung des Abstands zwischen Banner und Damenkollektion für die Handyversion */
        @media (max-width: 768px) {
            .product-grid {
                flex-direction: column; /* Container für Handyversion zu Spalten machen */
            }
            .product-card {
                width: 100%; /* Auf Handy die volle Breite nutzen */
            }
        }
        /* Anpassung des Abstands zwischen Banner und Damenkollektion für die Handyversion */
        @media (max-width: 768px) {
            h1 {
                text-align: center;
                margin-top: -220px; /* Abstand von 60px zum Banner auf mobilen Geräten ändern */
                margin-bottom: 0px; /* Standard-Abstand zum nächsten Element */
                font-size: 32px;
            }
        }
    </style>
</head>
<body>
<header>

</header>
<!-- Weitere Inhalte der Webseite hier einfügen -->
<main>
<!-- Banner -->
<div class="banner">
    <img src="assets/banner/kinder-banner.jpg" alt="Kinder Banner">
</div>
<!-- Hauptcontainer -->
<div class="container">
    <h1>Kinderkollektion</h1>
    <!-- Produktgrid -->
    <div class="product-grid">
        <!-- Produktkarten -->
        <?php
        // Verbindungsdaten zur Datenbank
        $servername = "Muster";
        $port = "Muster";
        $username = "Muster";
        $password = "Muster";
        $database = "Muster";

        // Verbindung zur Datenbank herstellen
        $conn = new mysqli($servername, $username, $password, $database);

        // Verbindung überprüfen
        if ($conn->connect_error) {
            die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
        }

        // Beispielabfrage, um alle Bildernamen abzurufen
        $query = "SELECT id, image, name, description, price FROM products WHERE category = 'Kinder'";
        $result = $conn->query($query);

        // Prüfen, ob Ergebnisse vorhanden sind
        if ($result->num_rows > 0) {
            // Ergebnisse durchgehen und Produktboxen im HTML-Code anzeigen
            while ($row = $result->fetch_assoc()) {
                echo "<div class='product-card'>";
                echo "<img src='assets/products/kinder/" . $row['image'] . "' alt='" . $row['name'] . "' onclick='openModal(\"assets/products/kinder/" . $row['image'] . "\", \"" . $row['name'] . "\", \"" . $row['description'] . "\", \"" . $row['price'] . "\")'>";
                echo "<div class='content'>";
                echo "<h2>" . $row['name'] . "</h2>";
                echo "<p>" . $row['description'] . "</p>";
                echo "<span class='price'>" . $row['price'] . " €</span><br>"; // Hier wurde ein Zeilenumbruch hinzugefügt
                echo "<form action='add_to_cart.php' method='POST'>";
                echo "<input type='hidden' name='product_id' value='" . $row['id'] . "'>";
                echo "<button class='btn' type='submit'>In den Warenkorb</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            // Wenn keine Ergebnisse gefunden wurden, eine Meldung anzeigen
            echo "Keine Produkte gefunden.";
        }

        // Verbindung schließen
        $conn->close();
        ?>
    </div>
</div>
</main>
<footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha1/js/bootstrap.bundle.min.js"></script>
    <script src="footer.js"></script>
    <script src="menu.js"></script>
    <script src="cart.js"></script> <!-- Füge die cart.js-Datei hinzu -->
    <script src="cookies.js"></script>
</footer>
<script>
    // Direktes Anzeigen des Cookie-Modals
    document.getElementById('cookieModal').style.display = 'block';

    function toggleMenu() {
        var navLinks = document.querySelector('.nav-links');
        navLinks.classList.toggle('active');
    }

    // Funktion zum Öffnen des Modals
    function openModal(imageSrc, name, description, price) {
        // Erstellen des Modal-Overlays
        var modalOverlay = document.createElement('div');
        modalOverlay.classList.add('modal-overlay');
        modalOverlay.addEventListener('click', closeModal); // schließt das Modal, wenn außerhalb geklickt wird

        // Erstellen des Modal-Inhalts
        var modalContent = document.createElement('div');
        modalContent.classList.add('modal-content');

        // Erstellen des Bildes im Modal
        var modalImage = document.createElement('img');
        modalImage.src = imageSrc;
        modalImage.alt = name;

        // Erstellen des Namens im Modal
        var modalName = document.createElement('h2');
        modalName.textContent = name;

        // Erstellen der Beschreibung im Modal
        var modalDescription = document.createElement('p');
        modalDescription.textContent = description;

        // Erstellen des Preises im Modal
        var modalPrice = document.createElement('span');
        modalPrice.classList.add('price');
        modalPrice.textContent = price + " €";

        // Erstellen des Schließensymbols
        var closeButton = document.createElement('span');
        closeButton.classList.add('close-btn');
        closeButton.innerHTML = '&times;'; // HTML-Entität für das Schließensymbol
        closeButton.addEventListener('click', closeModal);

        // Modal-Inhalt zum Modal hinzufügen
        modalContent.appendChild(closeButton); // Schließensymbol zuerst hinzufügen
        modalContent.appendChild(modalImage);
        modalContent.appendChild(modalName);
        modalContent.appendChild(modalDescription);
        modalContent.appendChild(modalPrice);

        // Modal-Inhalt zum Overlay hinzufügen
        modalOverlay.appendChild(modalContent);

        // Overlay zum Dokumentkörper hinzufügen
        document.body.appendChild(modalOverlay);
    }

    // Funktion zum Schließen des Modals
    function closeModal() {
        var modalOverlay = document.querySelector('.modal-overlay');
        if (modalOverlay) {
            modalOverlay.remove();
        }
    }
</script>
<!-- Scroll-to-Top Pfeil -->
<a href="#" class="scroll-to-top" onclick="scrollToTop()">
    <!-- Dein SVG-Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-square-fill" viewBox="0 0 16 16">
        <path d="M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0"/>
    </svg>
</a>
</body>
</html>
