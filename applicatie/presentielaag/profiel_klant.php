<?php

session_start();
require_once '../datalaag/db_connectie.php';


if (isset($_SESSION['username'])) {
    $username =  $_SESSION['username'];
    echo "<p> Welkom,  $username! <p>";
}

$username =  $_SESSION['username'];
$huidigePagina = basename($_SERVER['PHP_SELF']);

if ($_SESSION['role'] === 'Client' && $huidigePagina !== 'profiel_klant.php') {
    header("Location: profiel_klant.php");
    exit();
} elseif ($_SESSION['role'] === 'Personnel' && $huidigePagina !== 'profiel_werknemer.php') {
    header("Location: profiel_werknemer.php");
    exit();
}

global $verbinding;
$sql_orderdata = "SELECT * FROM Pizza_Order WHERE client_username = :username ORDER BY datetime DESC";
$order_data = $verbinding->prepare($sql_orderdata);
$order_data->bindParam(':username', $username);
$order_data ->execute();

while ($order_rij = $order_data->fetch()) {

    $client_username = htmlspecialchars($order_rij['client_username']);
    $order_id = htmlspecialchars($order_rij['order_id']);
    $bezorger = htmlspecialchars($order_rij['personnel_username']);
    $orderdatum = htmlspecialchars($order_rij['datetime']);
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