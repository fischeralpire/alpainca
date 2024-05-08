// footer.js
const footerContainer = document.createElement('div');
footerContainer.innerHTML = `
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4 style="color: white;">Folge uns:</h4>
                <ul class="social-media" style="list-style: none; padding: 0;">
                    <li><a href="#"><i class="fab fa-facebook-f" style="color: white;"></i> Facebook</a></li>
                    <li><a href="#"><i class="fab fa-twitter" style="color: white;"></i> Twitter</a></li>
                    <li><a href="#"><i class="fab fa-instagram" style="color: white;"></i> Instagram</a></li>
                    <li><a href="#"><i class="fab fa-linkedin" style="color: white;"></i> LinkedIn</a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <h4 style="color: white;">Impressum</h4>
                <ul class="impressum" style="list-style: none; padding: 0;">
                    <li><a href="Datenschutz.html" style="color: white;">Datenschutz</a></li>
                    <li><a href="nutzungsbedingungen.html" style="color: white;">Nutzungsbedingungen</a></li>
                    <li><a href="cookies.html" style="color: white;">Cookies</a></li>
                    <li><a href="contact.php" style="color: white;">Kontakt</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <p style="color: white;">&copy; 2024 Joanna Fischer. Alle Rechte vorbehalten.</p>
            </div>
        </div>
    </div>
</footer>
`;

document.body.appendChild(footerContainer);
