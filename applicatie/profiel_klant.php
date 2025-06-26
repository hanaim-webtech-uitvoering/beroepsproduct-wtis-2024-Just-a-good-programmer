<?php require_once __DIR__ . '/datalaag/db_connectie.php';


if (isset($_SESSION['username'])) {
    echo "Welkom, " . $_SESSION['username'] . "!" ;
}

$huidigePagina = basename($_SERVER['PHP_SELF']); 

if ($_SESSION['role'] === 'Client' && $huidigePagina !== 'profiel_klant.php') {
    header("Location: profiel_klant.php");
    exit();
} elseif ($_SESSION['role'] === 'Personnel' && $huidigePagina !== 'profiel_werknemer.php') {
    header("Location: profiel_werknemer.php");
    exit();
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

    <div class="table-container">
        <table class="order-table">
            <tr>
                <th>Ordernummer</th>
                <th>Klant naam</th>
                <th>Bezorger gebruikersnaam</th>
                <th>Datum</th>
                <th>Status</th>
                <th>Bezorgaddres</th>
            </tr>
            <tr>
                <td>1</td>                                      <!-- Row 1, Cell 1 -->
                <td>John Doe</td>                               <!-- Row 1, Cell 2 -->
                <td>rdeboer</td>                                <!-- Row 1, Cell 3 -->
                <td>2025-01-22 07:48:00.000</td>                <!-- Row 1, Cell 4 -->
                <td>Bestelling geplaatst</td>                   <!-- Row 1, Cell 5 -->
                <td>Bakkerstraat 1, 6811EG, Arnhem</td>         <!-- Row 1, Cell 6 -->
            </tr>
            <tr>
                <td>2</td>                                      <!-- Row 2, Cell 1 -->
                <td>Maria Vermeer</td>                          <!-- Row 2, Cell 2 -->
                <td>sbakker</td>                                <!-- Row 2, Cell 3 -->
                <td>2025-01-22 08:03:00.000</td>                <!-- Row 2, Cell 4 -->
                <td>Wordt bereid</td>                           <!-- Row 2, Cell 5 -->
                <td>Jansplein 2, 6811GD, Arnhem</td>            <!-- Row 2, Cell 6 -->
            </tr>
            <tr>
                <td>23</td>                                     <!-- Row 3, Cell 1 -->
                <td>Maria Vermeer</td>                          <!-- Row 3, Cell 2 -->
                <td>lheineken</td>                              <!-- Row 3, Cell 3 -->
                <td>2025-01-24 08:18:00.000</td>                <!-- Row 3, Cell 4 -->
                <td>Bestelling geplaatst</td>                   <!-- Row 3, Cell 5 -->
                <td>Sint Jacobslaan 23, 6533BT, Nijmegen</td>   <!-- Row 3, Cell 6 -->
            </tr>
        </table>
    </div>
    </main>

    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>