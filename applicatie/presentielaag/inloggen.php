<?php 

require_once '../datalaag/db_connectie.php';
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);;
    $password = $_POST["password"];
    $role = $_POST['role'];

    $gekozenRol = $_POST['role'] ?? '';
    $sql = "SELECT * FROM [User] WHERE username = :username AND role = :role";
    $stmt = $verbinding->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':role', $gekozenRol);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);



    if (isset($user)) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
        
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
}

?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <link rel="stylesheet" href="../applicatielaag/styling_page.css">
</head>

<body>
    <?php include '../applicatielaag/includes/header.php'; ?>

    <div class="container">
        <label class="hamburger-menu">
            <input type="checkbox">
        </label>
        <?php include '../applicatielaag/includes/sidebar.php'; ?>
        <main class="content">
            <h2>Log in</h2>

            <?php if (!empty($error_message)): ?>
                <div class="error-message"><?= htmlspecialchars($error_message) ?></div>
            <?php endif; ?>

            <div class="input-bar">
                <form method="POST">
                    <label for="username">Gebruikersnaam:</label> <br>
                    <input type="text" id="username" name="username" required><br><br>

                    <label for="password">Wachtwoord:</label> <br>
                    <input type="password" id="password" name="password" required> <br><br>


                    <button type="submit" class="info-button">Inloggen</button>

                </form>
            </div>
    </div>
    </main>

    </div>

    <?php include '../applicatielaag/includes/footer.php'; ?>

</body>

</html>