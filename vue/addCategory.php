<?php ob_start() ?>
    <body>
        <h1>Ajouter une catégorie</h1>
        <form action="" method="post">
            <label for="name">
                Saisir le nom de la catégorie
                <input type="text" name="name">
            </label>
            <input type="submit" value="ajouter" name="submit">
        </form>
        <?= $message ?>
    </body>
<?php $addCategory = ob_get_clean() ?>