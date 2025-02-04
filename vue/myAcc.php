<?php ob_start() ?>
    <section>
        <ul>        
            <li><?= $acc['firstname'] ?></li>
            <li><?= $acc['lastname'] ?></li>
            <li><?= $acc['email'] ?></li>
        </ul>
    </section>
<?php $profile = ob_get_clean() ?>