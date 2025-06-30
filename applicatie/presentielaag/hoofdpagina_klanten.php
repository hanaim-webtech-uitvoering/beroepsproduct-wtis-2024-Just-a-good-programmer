<?php require_once __DIR__ . 'applicatie/datalaag/db_connectie.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

 if (isset($_GET['q'])) {
    $search_term = $_GET['q'];
  
    // Sanitize the search term to prevent SQL injection
    $search_term = mysqli_real_escape_string($conn, $search_term);
  
    $sql = "SELECT * FROM Product WHERE name LIKE '%" . $search_term . "%'"; 
    $result = $conn->query($sql);
  
    if ($result->num_rows > 0) {
      // Output results (example: display in a table)
      echo "<table>";
      echo "<tr><th>name</th><th>price</th><th>type_id</th></tr>"; // Replace with actual column names
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"] . "</td><td>" . $row["price"] . "</td></tr>" . $row["type_id"] . "</td></tr>"; 
      }
      echo "</table>";
    } else {
      echo "No results found.";
    }
  }

?>
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

       
        <main>
        <div class="content">
            <h1>Welkom bij Pizzeria Sole Machina </h1>
            <p> Bij Pizzeria Sole Machina draait alles om passie, vakmanschap en de pure liefde voor écht Italiaans eten. 
                Onze steenoven staat dagelijks te gloeien om jou te verwennen met ambachtelijke pizzas,
                 rijkelijk belegd met verse ingrediënten en gebakken tot in perfectie.</p>
        </div>
        </main>
    </div>
</body>
<?php include '../applicatielaag/includes/footer.php'; ?>

</html>