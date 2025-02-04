<header>
    <nav>
            <a href="/exophp">Accueil</a>
        <?php if(isset($_SESSION['pseudo'])): ?>    
            <a href="/exophp/profile">Mon compte</a>
            <a href="/exophp/logout">Déconnexion</a>
        <?php endif; ?>
    </nav>
</header>