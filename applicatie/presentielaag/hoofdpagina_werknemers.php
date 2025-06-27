<?php require_once __DIR__ . '/datalaag/db_connectie.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzaria Sole Machina</title>
    <link rel="stylesheet" href="styling_page.css">
</head>

<<?php include 'applicatie/applicatielaag/includes/header.php'; ?>

<body>
    <div class="container">
        <label class="hamburger-menu">
            <input type="checkbox">
        </label>

        <?php include 'applicatielaag/includes/sidebar.php'; ?>


        <div class="content">
            <h1>Welkom bij Pizzeria Sole Machina personeelslid!</h1>
            <p>U kunt uw bezorgingen checken bij op uw profiel en het bezorgingschema bij bezorgingschema.</p>
        </div>

    </div>
</body>
<?php include 'applicatie/applicatielaag/includes/footer.php'; ?>

</html>