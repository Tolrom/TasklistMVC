<?php

include './vendor/autoload.php';
include './env.php';
include './utils/connexion.php';

include 'controller/myAccountController.php';

session_start();

$bdd = connexion();
displayMyAcc($bdd);