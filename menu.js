// menu.js
const menuContainer = document.createElement('div');
menuContainer.innerHTML = `
<header>
    <div class="container">
        <div class="logo">
            <a href="https://alpainca.de">
                <img src="assets/logos/Alpainca-Logo.svg" alt="Alpainca Logo">
            </a>
        </div>
        <nav>
            <ul class="nav-links">
             <li><a href="index.php" ${window.location.pathname === '/index.php' ? 'class="active"' : ''}>Startseite</a></li>
                <li><a href="damen.php" ${window.location.pathname === '/damen.php' ? 'class="active"' : ''}>Damen</a></li>
                <li><a href="herren.php" ${window.location.pathname === '/herren.php' ? 'class="active"' : ''}>Herren</a></li>
                <li><a href="kinder.php" ${window.location.pathname === '/kinder.php' ? 'class="active"' : ''}>Kinder</a></li>
                <li><a href="contact.html" ${window.location.pathname === '/contact.html' ? 'class="active"' : ''}>Kontakt</a></li>
            </ul>
            <div class="shopping-cart">
                <a href="cart.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                        <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
                    </svg>
                </a>
                            <div class="shopping-badge">
                <span id="cart-item-count" class="badge badge-danger" data-bs-toggle="false"></span>
            </div>            </div>
            <div class="burger-menu" onclick="toggleMenu()">
                <div class="burger"></div>
                <div class="burger"></div>
                <div class="burger"></div>
            </div>
        </nav>
    </div>
</header>
`;

document.body.appendChild(menuContainer);

// Funktion zum Umschalten des Menüs
function toggleMenu() {
    const navLinks = document.querySelector('.nav-links');
    navLinks.classList.toggle('active');
}
