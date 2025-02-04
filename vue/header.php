<?php ob_start() ?>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP</title>
        <link rel="stylesheet" href="assets/style.css">
    </head>
    <header>
        <nav>
            <a href="/exophp">Accueil</a>
            <a href="/tasks">Tâches</a>
            <a href="/categories">Catégories</a>
            <?php if(isset($_SESSION['pseudo'])): ?>    
                <a href="/exophp/profile">Mon compte</a>
                <a href="/exophp/logout">Déconnexion</a>
            <?php endif; ?>
        </nav>
    </header>
<?php $navbar = ob_get_clean() ?>