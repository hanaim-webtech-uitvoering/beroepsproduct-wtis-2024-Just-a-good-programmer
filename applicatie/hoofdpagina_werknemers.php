<?php require_once __DIR__ . '/datalaag/db_connectie.php';
session_start();
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzaria Sole Machina</title>
    <link rel="stylesheet" href="styling_page.css">
</head>

<<?php include 'includes/header.php'; ?>

<body>
    <div class="container">
        <label class="hamburger-menu">
            <input type="checkbox">
        </label>

        <aside class="sidebar">
            <nav>
                <a href="hoofdpagina_werknemers.php">Home</a>
                <a href="profiel.php">Profiel</a>
                <a href="Bezorgschema.php">Bezorgschema</a>
            </nav>
        </aside>


        <div class="content">
            <h1>Welkom bij Pizzeria Sole Machina werknemer</h1>
        </div>

    </div>
</body>
<?php include 'includes/footer.php'; ?>

</html>