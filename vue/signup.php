<?php ob_start() ?>    
    <?php if(!isset($_SESSION['pseudo'])): ?>
        <section>
            <h1>Inscription</h1>
            <form action="" method="post">
                <label>
                    Prénom :
                    <input type="text" name="firstname" >
                </label>
                <br>
                <label>
                    Nom :
                    <input type="text" name="lastname" >
                </label>
                <br>
                <label>
                    Email :
                    <input type="email" name="email" >
                </label>
                <br>
                <label>
                    Mot de passe :
                    <input type="password" name="password" >
                </label>
                <br>
                <label>
                    Confirmation du mot de passe :
                    <input type="password" name="passwordConf" >
                </label>
                <br>
                <input type="submit" value="Valider" name="submitSignUp">
            </form>
            <ul>
                <?= $message ?>
            </ul>
        </section>
    <?php endif; ?>
<?php $signupForm = ob_get_clean() ?>