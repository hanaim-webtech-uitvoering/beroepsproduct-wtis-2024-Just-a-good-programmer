<?php
require_once __DIR__ . '/datalaag/db_connectie.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $role = $_POST['role'];


$statement ;
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren</title>
    <link rel="stylesheet" href="styling_page.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class=container>
    <label class="hamburger-menu">
        <input type="checkbox">
    </label>
    <?php include 'includes/sidebar.php'; ?>
    
    
    
    <div class="search-bar">
    <div class="search-container">
    <form action="inloggen.php" method="POST">
        <label for="voornaam">Voornaam: </label>
        <input type="text" placeholder="Voornaam">
        <label for="voornaam">Achternaam: </label>
        <input type="text" placeholder="Achternaam">
        <label for="voornaam">Gebruikersnaam: </label>
        <input type="text" placeholder="Gebruikersnaam">
        <label for="voornaam">Wachtwoord: </label>
        <input type="text" placeholder="Wachtwoord">
        <label for="voornaam">Wachtwoord opnieuw: </label>
        <input type="text" placeholder="Wachtwoord">
        <label for="role">Soort account: </label>
        <select name="role" id="role">
            <option value="Client">Klant</option>
            <option value="Personnel">Personeel</option>
        <button type="submit">Registreren</button>
        </form>
    </div>
    </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>