<?php require_once __DIR__ . '/datalaag/db_connectie.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);;
    $password = $_POST["password"];


    $gekozenRol = $_POST['role'] ?? '';
    $sql = "SELECT * FROM [User] WHERE username = :username AND role = :role";
    $stmt = $verbinding->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':role', $gekozenRol);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);



    if ($user) {
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
        }
        if ($user['role'] === 'Client') {
            header("Location: profiel_klant.php");
            exit();
        } elseif ($user['role'] === 'Personnel') {
            header("Location: profiel_werknemer.php");
            exit();
        }
    } else {
        $error_message = "Ongeldige gebruikersnaam of wachtwoord en/of verkeerd type account.";
    }
}


?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
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
                <a href="menu.php">Menu</a>
                <a href="profiel.php">Profiel</a>
                <a href="bestelling.php">Bestelling</a>
            </nav>
        </aside>
        <main class="content">
            <h2>Log in</h2>

            <div id="error-message" style="display: none;">
                <?php if (isset($error_message)) {
                    echo $error_message;
                } ?>
            </div>

            <form action="inloggen.php" method="POST">
                <label for="username">Gebruikersnaam:</label> <br>
                <input type="text" id="username" name="username" required><br><br>

                <label for="password">Wachtwoord:</label> <br>
                <input type="password" id="password" name="password" required> <br><br>


                <label>Type account:</label> <br><br>
                <label><input type="radio" name="keuze" value="Client" required> Klant</label>
                <label><input type="radio" name="keuze" value="Personnel"> Werknemer</label><br><br>

                <button type="submit" class="info-button">Inloggen</button>
    </div>
    </form>


    </main>

    </div>

    <?php include 'includes/footer.php'; ?>

</body>

</html>