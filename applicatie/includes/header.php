<?php
if (__FILE__ == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header("Location: menu.php"); // redirect to homepage
    exit;
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
        <div class="header-buttons">
            <a href="Bezorgschema.php">
                <img src="afbeeldingen/Orderlijst.png" alt="Orderlijst"> Orderlijst
            </a>
            <a href="profiel.php">
                <img src="afbeeldingen/user.png" alt="Account"> Account
            </a>
        </div>
    </header>

<?php else: ?>
    <!-- Header voor klanten of niet-ingelogde bezoekers -->
    <header class="header">
        <img src="afbeeldingen/Pizza-logo.png" alt="Logo">
        <div class="header-buttons">
            <a href="winkelmand.php">
                <img src="afbeeldingen/winkelmandje.png" alt="Winkelmand"> Bestelling
            </a>
            <a href="profiel.php">
                <img src="afbeeldingen/user.png" alt="Account"> Account
            </a>
        </div>
    </header>
<?php endif; ?>