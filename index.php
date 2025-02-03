<?php

include './vendor/autoload.php';
include './env.php';
include './utils/connexion.php';


include 'controller/categorieController.php';
include 'controller/accountController.php';

session_start();

include 'vue/header.php';

$bdd = connexion();
categoryAdd($bdd);
accountAdd($bdd);
login($bdd);
displayAccounts($bdd);


