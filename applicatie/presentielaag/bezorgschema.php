<?php require_once '../datalaag/db_connectie.php';
session_start();
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzaria Sole Machina</title>
    <link rel="stylesheet" href="../applicatielaag/styling_page.css">
</head>


<body>
    <?php include '../applicatielaag/includes/header.php'; ?>
    <div class="container">
    <label class="hamburger-menu">
        <input type="checkbox">
    </label>
    <?php include '../applicatielaag/includes/sidebar.php'; ?>
    
    <div class="main-container">
    <main>
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
                   <?php echo "<td>$ordernummer</td>"  ?>                                    <!-- Row 1, Cell 1 -->
                   <?php echo "<td>$username</td>" ?>                              <!-- Row 1, Cell 2 -->
                    <?php echo "<td>$bezorger</td>" ?>                                <!-- Row 1, Cell 3 -->
                    <?php echo "<td>$datum</td>" ?>                <!-- Row 1, Cell 4 -->
                    <?php echo "<td>$status</td>"  ?>                 <!-- Row 1, Cell 5 -->
                   <?php echo "<td>$adres</td>" ?>        <!-- Row 1, Cell 6 -->
                </tr>
                
            </table>
        </div>
    </main>
    </div>

</div>
<?php include '../applicatielaag/includes/footer.php'; ?>

</body>
</html>
