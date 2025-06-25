<?php require_once __DIR__ . '/datalaag/db_connectie.php';



$huidigePagina = basename($_SERVER['PHP_SELF']); 


if (isset($_SESSION['username'])) {
    if ($_SESSION['role'] === 'Client' && $huidigePagina !== 'profiel_klant.php') {
        header("Location: profiel_klant.php");
        exit();
    } elseif ($_SESSION['role'] === 'Personnel' && $huidigePagina !== 'profiel_werknemer.php') {
        header("Location: profiel_werknemer.php");
        exit();
    } 
}




?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiel</title>
    <link rel="stylesheet" href="styling_page.css">
</head>
<body>
    <header class="header">
        <img src="afbeeldingen/Pizza-logo.png" alt="Logo">
        <div class="search-bar">
            <input type="text" placeholder="Zoeken...">
            <button type="submit">Zoek</button>
        </div>
        <div class="header-buttons">
            <a href="winkelmand.php">
                <img src="afbeeldingen/winkelmandje.png" alt="Winkelmand"> Bestelling
            </a>
            <a href="profiel.php">
                <img src="afbeeldingen/user.png" alt="Account"> Account
            </a>
        </div>
    </header>
    <div class="container">
    <label class="hamburger-menu">
        <input type="checkbox">
    </label>
    <aside class="sidebar">
        <nav>
            <a href="hoofdpagina_klanten.php">Home</a>
            <a href="producten.php" >Menu</a>
            <a href="profiel.php">Profiel</a>
            <a href="bestelling.php" >Bestelling</a>
        </nav>
    </aside>
    <main>
    <div class='content-container'>
    
    
    <button class="button">
        <a href="inloggen.php">Inloggen</a>
    </button>
    <button class="button">
        <a href="registreren.php">Registreren</a>
    </button>

    <button class="button">
        <a href="uitloggen.php">Uitloggen</a>
    </button>
    </div>
    
    
    </main>
    </div>
    <footer>
        <a href="privacy_statement.php">Privacyverklaring</a>
    </footer>
</body>
</html>