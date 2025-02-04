<?php ob_start() ?>
    <?php if(!isset($_SESSION['pseudo'])): ?>
        <section>
            <h1>Connexion</h1>
            <form action="" method="post">
                <label>
                    Email :
                    <input type="email" name="emailLogin" >
                </label>
                <br>
                <label>
                    Mot de passe :
                    <input type="password" name="passwordLogin" >
                </label>
                <br>
                <input type="submit" value="Connexion" name="submitLogin">
            </form>
            <ul>
                <?= $message ?>
            </ul>
        </section>
    <?php endif; ?>
<?php $loginForm = ob_get_clean() ?>