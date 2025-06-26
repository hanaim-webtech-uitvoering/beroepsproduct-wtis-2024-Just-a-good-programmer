<?php
require_once __DIR__ . '/datalaag/db_connectie.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $role = $_POST['role'];

    if (empty($username) || empty($password) || empty($first_name) || empty($last_name) || empty($role)) {
        $error = "Vul alle velden in.";
    } elseif ($password !== $password2) {
        $error = "Wachtwoorden komen niet overeen.";
    } else {
        // Check of de gebruiker al bestaat
        $check = $verbinding->prepare("SELECT * FROM [User] WHERE username = :username");
        $check->bindParam(':username', $username);
        $check->execute();

        if ($check->fetch()) {
            $error = "Gebruikersnaam bestaat al.";
        } else {
            // Encrypt wachtwoord
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Invoegen in de database
            $sql = "INSERT INTO [User] (username, password, first_name, last_name, role)
                    VALUES (:username, :password, :first_name, :last_name, :role)";
            $stmt = $verbinding->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':role', $role);

            if ($stmt->execute()) {
                $success = "Registratie succesvol! Je kunt nu inloggen.";
            } else {
                $error = "Er is iets misgegaan bij het registreren.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren</title>
    <link rel="stylesheet" href="styling_page.css">
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <div class=container>
        <label class="hamburger-menu">
            <input type="checkbox">
        </label>
        <?php include 'includes/sidebar.php'; ?>

        <?php if (!empty($error)): ?>
            <div class="error-message"><?= htmlspecialchars($error) ?></div>
        <?php elseif (!empty($success)): ?>
            <div class="success-message"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

    <main class="content">
        <div class="search-bar">
                <form method="POST" action="registreren.php" >
                    <label for="first_name">Voornaam:</label>
                    <input type="text" id="first_name" name="first_name" placeholder="Voornaam" required>

                    <label for="last_name">Achternaam:</label>
                    <input type="text" id="last_name" name="last_name" placeholder="Achternaam" required>

                    <label for="username">Gebruikersnaam:</label>
                    <input type="text" id="username" name="username" placeholder="Gebruikersnaam" required>

                    <label for="password">Wachtwoord:</label>
                    <input type="password" id="password" name="password" placeholder="Wachtwoord" required>

                    <label for="password2">Wachtwoord opnieuw:</label>
                    <input type="password" id="password2" name="password2" placeholder="Herhaal wachtwoord" required>
                    <label for="role">Soort account: </label>
                    <select name="role" id="role" required>
                        <option value="Client">Klant</option>
                        <option value="Personnel">Personeel</option>

                        <button type="submit">Registreren</button>
                </form>
        </div>
    </main>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>

</html>