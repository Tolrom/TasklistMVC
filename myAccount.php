<?php

include './vendor/autoload.php';
include './env.php';
include './utils/connexion.php';

include 'controller/categorieController.php';
include 'controller/accountController.php';
include 'controller/myAccountController.php';

session_start();

include 'vue/header.php';

$bdd = connexion();
displayMyAcc($bdd);