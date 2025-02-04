<?php ob_start() ?>
    <section>
        <h1>Liste des comptes présents en BDD</h1>
            <?php if(!empty($accounts)): ?>
                <ul id="accountsList">
                    <?php foreach ($accounts as $key => $acc): ?>
                        <li>
                            <?= $acc['firstname'] ?>
                            <?= $acc['lastname'] ?>
                            -
                            <?= $acc['email'] ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
    </section>
<?php $accounts = ob_get_clean() ?>