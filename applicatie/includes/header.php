<?php
if (__FILE__ == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header("Location: menu.php"); // redirect to homepage
    exit;
}

?>

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