<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['role']) && $_SESSION['role'] === 'Personnel'):
?>
    <!-- Header voor werknemers -->
    <header class="header-werknemers">
        <img src="afbeeldingen/Pizza-logo.png" alt="Logo">
        <div class="search-bar">
            <input type="text" placeholder="Zoeken...">
            <button type="submit">Zoek</button>
        </div>
        <div class="header-button">
            <a href="bezorgschema.php">
                <img src="afbeeldingen/Orderlijst.png" alt="Orderlijst"> Orderlijst
            </a>
            <a href="profiel.php">
                <img src="afbeeldingen/user.png" alt="Profiel"> Profiel
            </a>
        </div>
    </header>

<?php else: ?>
    <!-- Header voor klanten of niet-ingelogde bezoekers -->
    <header class="header">
        <img src="afbeeldingen/Pizza-logo.png" alt="Logo">
        <div class="header-button">
            <a href="bestelling.php">
                <img src="afbeeldingen/winkelmandje.png" alt="Bestelling"> Bestelling
            </a>
            <a href="profiel.php">
                <img src="afbeeldingen/user.png" alt="Profiel"> Profiel
            </a>
        </div>
    </header>
<?php endif; ?>