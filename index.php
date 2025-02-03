<?php

include './vendor/autoload.php';
include './env.php';
include './utils/connexion.php';

include 'controller/categorieController.php';
include 'controller/accountController.php';
$bdd = connexion();
categoryAdd($bdd);
accountAdd($bdd);

