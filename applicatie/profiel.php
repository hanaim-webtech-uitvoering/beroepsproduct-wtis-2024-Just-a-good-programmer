<?php require_once __DIR__ . '/datalaag/db_connectie.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

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
    <?php include 'includes/header.php'; ?>
    <div class=container>
    <label class="hamburger-menu">
        <input type="checkbox">
    </label>
    <?php include 'includes/sidebar.php'; ?>
    <main>
    <div class='content-container'>

    <button class="button">
        <a href="inloggen.php">Inloggen</a>
    </button>
    <button class="button">
        <a href="registreren.php">Registreren</a>
    </button>
    
    </div>
    </div>
    
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>