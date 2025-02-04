<?php

include './vendor/autoload.php';
include './env.php';
include './utils/connexion.php';

session_start();

// Importing controllers
include 'controller/categorieController.php';
include 'controller/accountController.php';
include 'controller/404Controller.php';
include 'controller/myAccountController.php';

// Importing header
include 'vue/header.php';

// Connecting to Database
$bdd = connexion();

//      Analysing URL and returning components
$url = parse_url($_SERVER['REQUEST_URI']);
//      Redirect to the root if the url has a path
$path = isset($url['path']) ? $url['path'] : '/';

//      Logged in router
if (isset($_SESSION["pseudo"])) {
    switch ($path) {
        case '/exophp/':
            categoryAdd($bdd);
            displayAccounts($bdd);
            break;
        case '/exophp/profile':
            displayMyAcc($bdd);
            break;
        case '/exophp/logout':
            session_destroy();
            header('location:/exophp');
            break;
        default:
            notFound();
            break;
    }
}
//  Visitor router
else {
    switch ($path) {
        case '/exophp/':
            accountAdd($bdd);
            login($bdd);
            break;
        default:
            notFound();
            break;
    }
}