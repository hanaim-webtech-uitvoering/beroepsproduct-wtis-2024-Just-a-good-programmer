

<aside class="sidebar">
    
    <nav>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'Personnel'): ?>
            <a href="applicatie/presentielaag/hoofdpagina_werknemer.php">Home</a>
            <a href="applicatie/presentielaag/profiel.php">Profiel</a>
            <a href="applicatie/presentielaag/bezorgschema.php">Bezorgschema</a>
        <?php else: ?>
            <a href="applicatie/presentielaag/hoofdpagina_klanten.php">Home</a>
            <a href="applicatie/presentielaag/menu.php">Menu</a>
            <a href="applicatie/presentielaag/profiel.php">Profiel</a>
            <a href="applicatie/presentielaag/bestelling.php">Bestelling</a>
        <?php endif; ?>
    </nav>
</aside>
