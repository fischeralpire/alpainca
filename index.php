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
        main {
            margin-top: 100px; /* Oberer Abstand des Carousel vom Header */
        }

        .carousel-item img {
            height: auto; /* Automatische Höhe für die Handy-Version */
            height: 100vh; /* Höhe des Carousel auf 100% der sichtbaren Höhe des Viewports setzen */
            width: 100%; /* Volle Breite für die Bilder */
            object-fit: cover;
        }
        /* Anpassungen für die Carousel-Caption */
        .carousel-caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white; /* Textfarbe */
            font-family: 'Arial', sans-serif; /* Neue Schriftart */
        }

        .carousel-caption h5 {
            font-size: 2rem; /* Größere Schriftgröße */
            font-weight: bold; /* Erhöhte Schriftstärke */
            color: white; /* Textfarbe */
        }

        .carousel-caption p {
            font-size: 1.5rem; /* Größere Schriftgröße für den Text */
            color: white; /* Textfarbe */
        }

        /* Stil für den Button */
        .carousel-caption .btn {
            background-color: rgba(226, 114, 91, 0.8); /* Hintergrundfarbe des Buttons */
            color: white; /* Textfarbe des Buttons */
            padding: 10px 20px; /* Innenabstand des Buttons */
            border: none; /* Kein Rand */
            border-radius: 5px; /* Abgerundete Ecken */
            font-size: 1.2rem; /* Schriftgröße */
            text-transform: uppercase; /* Text in Großbuchstaben */
            cursor: pointer; /* Zeigercursor */
            transition: background-color 0.3s ease; /* Übergangseffekt */
            text-decoration: none; /* Keine Unterstreichung */
            margin-top: 20px; /* Abstand zum vorherigen Element */
        }

        .carousel-caption .btn:hover {
            background-color: rgba(226, 114, 91, 1); /* Hintergrundfarbe des Buttons bei Hover */
        }
        /* Media Query für die Handy-Ansicht */
        @media (max-width: 768px) {
            .logo {
                left: 10px; /* Reduziere den Abstand für die Handy-Version */
            }

            /* Anpassungen für die Handy-Version des Carousel */
            .carousel-item img {
                height: auto; /* Automatische Höhe für die Handy-Version */
                height: 20vh; /* Höhe des Carousel auf 50% der sichtbaren Höhe des Viewports setzen */
            }

            .carousel-caption h5 {
                font-size: 1.5rem; /* Kleinere Schriftgröße für den Titel */
            }

            .carousel-caption p {
                font-size: 1rem; /* Kleinere Schriftgröße für den Text */
            }

            .carousel-caption .btn {
                padding: 8px 15px; /* Kleinere Padding für die Schaltflächen */
                font-size: 0.8rem; /* Kleinere Schriftgröße für die Schaltflächen */
            }
        }


        /* Overlay-Stil für die Carousel-Bilder */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.3); /* Dunkles Overlay mit weniger Opazität */
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
    </style>
</head>
<body>
    <header>

    </header>
    <!-- Weitere Inhalte der Webseite hier einfügen -->
    <main>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/images/2.jpg" class="d-block w-100" alt="...">
                    <div class="overlay"></div>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Willkommen bei Alpainca!</h5>
                        <p>Entdecke unsere faszinierende Auswahl an südamerikanischen Produkten.</p>
                        <a href="#about-us" class="btn">Über uns</a> <!-- Button-Text geändert und Link angepasst -->
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/images/4.jpg" class="d-block w-100" alt="...">
                    <div class="overlay"></div>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Erlebe die Schönheit der Anden.</h5>
                        <p>Handgefertigte Ponchos, inspiriert von der traditionellen Handwerkskunst.</p>
                        <a href="#about-us" class="btn">Über uns</a> <!-- Button-Text geändert und Link angepasst -->
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/images/3.jpg" class="d-block w-100" alt="...">
                    <div class="overlay"></div>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Genieße einzigartige südamerikanische Köstlichkeiten.</h5>
                        <p>Von handgemachten Leckereien bis zu köstlichem Kaffee - entdecke den Geschmack Südamerikas.</p>
                        <a href="#about-us" class="btn">Über uns</a> <!-- Button-Text geändert und Link angepasst -->
                    </div>
                </div>
            </div>
        </div>
        <div class="container" id="about-us"> <!-- ID für den Abschnitt "Das sind wir" hinzugefügt -->
            <section class="about-us">
                <div class="row">
                    <div class="col-md-12">
                        <div class="about-us-title">
                            <h2>Das sind wir</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-us-text">
                            <p>Tauche ein in die faszinierende Welt der südamerikanischen Handwerkskunst und entdecke unsere einzigartigen Ponchos, die mit Liebe und Tradition handgefertigt werden. Als Familienunternehmen ist es unsere Leidenschaft, die Schönheit und Authentizität der Anden in jedes einzelne Stück zu bringen.</p>
                            <p>Doch bei uns geht es nicht nur um Mode und Stil. Wir glauben fest daran, etwas Gutes in die Welt zu bringen. Deshalb spenden wir für jeden verkauften Poncho einen Teil unserer Einnahmen an die ärmsten Gemeinden Boliviens, um dort dringend benötigte Unterstützung zu leisten. Mit jedem Kauf bei Alpaca's Haven hilfst du also nicht nur dabei, einzigartige handgefertigte Produkte zu erhalten, sondern auch die Lebensbedingungen weniger privilegierter Menschen zu verbessern.</p>
                            <p>Neben unseren wunderschönen Ponchos bieten wir auch eine Vielzahl anderer südamerikanischer Produkte an, darunter handgefertigte T-Shirts und köstliche essbare Leckereien. Jedes einzelne Produkt in unserem Sortiment wird mit Sorgfalt und Hingabe hergestellt, um dir ein Stück südamerikanischer Kultur und Lebensfreude näher zu bringen.</p>
                            <p>Genieße das Einkaufen bei Alpaca's Haven und lass dich von der Schönheit und Vielfalt Südamerikas verzaubern. Wir freuen uns darauf, dich auf deiner Reise zu begleiten!</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-us-image">
                            <img src="assets/images/familie.jpg" alt="Familie Bild">
                        </div>
                    </div>
                </div>
            </section>
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
