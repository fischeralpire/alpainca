// Funktion zum Erstellen eines Cookies
function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

// Funktion zum Lesen eines Cookies
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

// Cookie-Hinweis-Modal HTML
var modalHTML = `
<div id="cookieModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Warenkorb-Funktionalität</h2>
        <p>Um den Warenkorb nutzen zu können, akzeptieren Sie bitte die Verwendung von Cookies. Durch die Nutzung unserer Website erklären Sie sich damit einverstanden.</p>
        <div class="modal-buttons">
            <button class="accept-btn" onclick="acceptCookies()">Cookies akzeptieren</button>
        </div>
    </div>
</div>
`;

// Modal-HTML zum Dokument hinzufügen
document.body.insertAdjacentHTML('beforeend', modalHTML);

// CSS-Stile für das Modal setzen
var modalStyle = document.createElement('style');
modalStyle.innerHTML = `
.modal {
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    max-width: 600px;
    text-align: center;
    position: absolute; /* Änderung der Position auf absolute */
    top: 50%; /* Zentrieren vertikal */
    left: 50%; /* Zentrieren horizontal */
    transform: translate(-50%, -50%); /* Zentrieren des Modals relativ zu sich selbst */
}

.modal-content h2 {
    color: #333;
    font-size: 24px;
    margin-bottom: 20px;
}

.modal-content p {
    color: #666;
    font-size: 16px;
    margin-bottom: 30px;
}

.modal-buttons .accept-btn {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.modal-buttons .accept-btn:hover {
    background-color: #0056b3;
}

.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    color: #aaa;
    cursor: pointer;
}
`;
document.head.appendChild(modalStyle);

// Funktion zum Anzeigen des Cookie-Hinweis-Modals
window.onload = function() {
    if (!getCookie('cookie_accepted')) {
        document.getElementById('cookieModal').style.display = 'block';
    } else {
        document.getElementById('cookieModal').style.display = 'none'; // Falls Cookies bereits akzeptiert wurden, das Modal ausblenden
    }
}

// Funktion zum Akzeptieren von Cookies
function acceptCookies() {
    setCookie('cookie_accepted', 'true', 30);
    document.getElementById('cookieModal').style.display = 'none';
}

// Funktion zum Ablehnen von Cookies
function declineCookies() {
    // Hier können Sie zusätzliche Logik implementieren, wenn der Benutzer Cookies ablehnt
}