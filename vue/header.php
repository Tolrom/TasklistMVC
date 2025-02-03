<header>
    <nav>
            <a href="index.php">Accueil</a>
        <?php if(isset($_SESSION['pseudo'])): ?>    
            <a href="myAccount.php">Mon compte</a>
            <a href="deco.php">Déconnexion</a>
        <?php endif; ?>
    </nav>
</header>