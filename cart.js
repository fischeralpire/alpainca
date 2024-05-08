// DIESE DATEI EXISTIER NICHT
function fetchCartItemsFromDatabase() {
    fetch('get_cart_items.php') // Existiert nicht
        .then(response => response.json())
        .then(cartItems => {
            // Hier werden die erhaltenen Produkte im Warenkorb angezeigt
            const cartItemsDiv = document.getElementById('cart-items');
            if (cartItems.length > 0) {
                // Anzahl der Artikel im Warenkorb aktualisieren
                cartItemCount = cartItems.length;

                cartItems.forEach(item => {
                    // Erstelle ein HTML-Element für jeden Artikel und füge es dem DOM hinzu
                    const itemElement = document.createElement('div');
                    itemElement.innerHTML = `
                        <p>${item.name} - ${item.price}</p>
                        <!-- Hier weitere Informationen zum Artikel einfügen -->
                    `;
                    cartItemsDiv.appendChild(itemElement);
                });
            } else {
                // Falls der Warenkorb leer ist
                cartItemsDiv.textContent = 'Der Warenkorb ist leer.';
            }
            
            // Anzahl der Produkte im Warenkorb aktualisieren
            updateCartItemCount(cartItemCount);
        })
        .catch(error => console.error('Fehler beim Abrufen der Warenkorbartikel:', error));
}
// hier wird php benutzt also mit LocalStorage holt man sich die Variable. KEINE COOKIES
function getCartItemCount() {
    const cartItemCount = localStorage.getItem('cartItemCount');
    return cartItemCount ? parseInt(cartItemCount) : 0;
}

// Funktion zum Aktualisieren der Anzeige der Anzahl der Produkte im Warenkorb im DOM
function updateCartItemCount() {
    const cartItemCount = getCartItemCount();
    const cartItemCountElement = document.getElementById('cart-item-count');
    if (cartItemCountElement) {
        cartItemCountElement.textContent = cartItemCount;
    }
}

// Funktion zum Hinzufügen eines Produkts zum Warenkorb
function addToCart(productId) {
    // Hier kannst du die Logik zum Hinzufügen des Produkts zum Warenkorb implementieren
    // Beispiel: Speichere das Produkt im Warenkorb und aktualisiere die Anzahl im Local Storage
    let cartItemCount = getCartItemCount();
    cartItemCount++;
    localStorage.setItem('cartItemCount', cartItemCount);
    updateCartItemCount(); // Aktualisiere die Anzeige der Anzahl der Produkte im Warenkorb
}

// Funktion zum Entfernen eines Produkts aus dem Warenkorb
function removeFromCart(productId) {
    // Hier kannst du die Logik zum Entfernen des Produkts aus dem Warenkorb implementieren
    // Beispiel: Entferne das Produkt aus dem Warenkorb und aktualisiere die Anzahl im Local Storage
    let cartItemCount = getCartItemCount();
    if (cartItemCount > 0) {
        cartItemCount--;
        localStorage.setItem('cartItemCount', cartItemCount);
        updateCartItemCount(); // Aktualisiere die Anzeige der Anzahl der Produkte im Warenkorb
    }
}

// Initialisierung: Aktualisiere die Anzeige der Anzahl der Produkte im Warenkorb beim Laden der Seite
document.addEventListener('DOMContentLoaded', () => {
    updateCartItemCount();
});