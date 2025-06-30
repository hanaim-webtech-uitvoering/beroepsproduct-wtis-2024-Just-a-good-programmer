<?php require_once '../datalaag/db_connectie.php';





?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestelling</title>
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
                <table class="bestelling">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Prijs</th>
                            <th>Aantal</th>
                            <th>Totaal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Start sessie om de bestelling op te slaan
                        session_start();

                        // Initialiseer de bestelling
                        if (!isset($_SESSION['order'])) {
                            $_SESSION['order'] = [];
                        }

                        // Verwerk toevoeging aan bestelling
                        if (isset($_POST['add_to_order'])) {
                            $productName = $_POST['product_name'];
                            $productPrice = $_POST['product_price'];

                            // Controleer of het product al in de bestelling zit
                            if (isset($_SESSION['order'][$productName])) {
                                $_SESSION['order'][$productName]['quantity']++;
                            } else {
                                $_SESSION['order'][$productName] = [
                                    'price' => $productPrice,
                                    'quantity' => 1,
                                ];
                            }
                        }

                        // Toon de bestelling in een tabel
                        $totalPrice = 0;
                        foreach ($_SESSION['order'] as $productName => $details) {
                            $productTotal = $details['price'] * $details['quantity'];
                            $totalPrice += $productTotal;

                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($productName) . "</td>";
                            echo "<td>€" . number_format($details['price'], 2) . "</td>";
                            echo "<td>" . $details['quantity'] . "</td>";
                            echo "<td>€" . number_format($productTotal, 2) . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"><strong>Totaal:</strong></td>
                            <td>€<?php echo number_format($totalPrice, 2); ?></td>
                        </tr>
                    </tfoot>
                </table>
                <form method="POST">
                    <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($productName); ?>">
                    <button type="submit" name="remove_from_order">-</button>
                </form>

            </div>
        </main>
        <?php include '../applicatielaag/includes/footer.php'; ?>
</body>

</html>