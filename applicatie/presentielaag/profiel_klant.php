<?php

session_start();
require_once __DIR__ . '/datalaag/db_connectie.php';


if (isset($_SESSION['username'])) {
    echo "Welkom, " . $_SESSION['username'] . "!";
}

var_dump($_SESSION['username']);
$huidigePagina = basename($_SERVER['PHP_SELF']);

if ($_SESSION['role'] === 'Client' && $huidigePagina !== 'profiel_klant.php') {
    header("Location: profiel_klant.php");
    exit();
} elseif ($_SESSION['role'] === 'Personnel' && $huidigePagina !== 'profiel_werknemer.php') {
    header("Location: profiel_werknemer.php");
    exit();
}


$sql_orderdata = "SELECT * FROM Pizza_Order WHERE username = $username ORDER BY datum DESC";
$order_data = $conn->query($sql_orderdata);

while ($order_rij = $order_data->fetch()) {

    $username = htmlspecialchars($order_rij['gebruiker']);
    $bedrag = htmlspecialchars($order_rij['bedrag']);
    $bezorger = 
    $orderdatum = explode('-', $order_rij['orderdag']);
    $orderjaar = $orderdatum[0];
    $ordermaand = $orderdatum[1];
    $orderdag = $orderdatum[2];
}

?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiel</title>
    <link rel="stylesheet" href="../applicatielaag/styling_page.css">
</head>

<body>
    <?php include '../applicatielaag/includes/header.php'; ?>
    <div class="container">
        <label class="hamburger-menu">
            <input type="checkbox">
        </label>
        <?php include '../applicatielaag/includes/sidebar.php'; ?>
        <main>
            <div class='content-container'>


                <button class="button">
                    <a href="../applicatielaag/uitloggen.php">Uitloggen</a>
                </button>
            </div>


        </main>

    </div>
    <?php include '../applicatielaag/includes/footer.php'; ?>
</body>

</html>