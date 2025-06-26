<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<aside class="sidebar">
    
    <nav>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'Personnel'): ?>
            <a href="hoofdpagina_werknemer.php">Home</a>
            <a href="profiel.php">Profiel</a>
            <a href="bezorgschema.php">Bezorgschema</a>
        <?php else: ?>
            <a href="hoofdpagina_klanten.php">Home</a>
            <a href="menu.php">Menu</a>
            <a href="profiel.php">Profiel</a>
            <a href="bestelling.php">Bestelling</a>
        <?php endif; ?>
    </nav>
</aside>
