<section>
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
            <br>
            Confirmation du mot de passe :
            <input type="password" name="passwordConf" >
        </label>
        <br>
        <input type="submit" value="Valider" name="submit">
    </form>
    <ul>
        <?= $message ?>
    </ul>
</section>
<section>
    <?php if(isset($accounts)): ?>
        <li id="accountsList">
            <?php foreach ($accounts as $key => $acc): ?>
                <ul>
                    <?= $acc->email ?>
                </ul>
            <?php endforeach; ?>
        </li>
    <?php endif; ?>
</section>