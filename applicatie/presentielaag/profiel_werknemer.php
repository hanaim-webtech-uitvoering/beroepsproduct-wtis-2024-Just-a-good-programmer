<?php require_once __DIR__ . '/datalaag/db_connectie.php';
session_start();

if (isset($_SESSION['username'])) {
    echo "Welkom, " . $_SESSION['username'] . "!" ;
}

if (!isset($_SESSION['username'])) {
    header("Location: profiel.php");
    exit();

$huidigePagina = basename($_SERVER['PHP_SELF']); 

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
    <?php include 'applicatie/applicatielaag/includes/header.php'; ?>
    <div class="container">
    <label class="hamburger-menu">
        <input type="checkbox">
    </label>
    <?php include 'applicatie/applicatielaag/includes/sidebar.php'; ?>
    <main>
    <div class='content-container'>
    

    <button class="button">
        <a href="applicatie/applicatielaag/uitloggen.php">Uitloggen</a>
    </button>
    </div>
    
    
    </main>
    </div>
    <?php include 'applicatie/applicatielaag/includes/footer.php'; ?>
</body>
</html>