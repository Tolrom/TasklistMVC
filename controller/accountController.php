<?php 

include 'model/account.php';
include 'utils/utils.php';

function accountAdd(PDO $bdd) {
    $message = '';

    // Form submitted
    if(isset($_POST['submitSignUp'])){

        // Checking if inputs are all filled
        if( !empty($_POST['firstname']) && 
            !empty($_POST['lastname']) && 
            !empty($_POST['email']) && 
            !empty($_POST['password']) && 
            !empty($_POST['passwordConf'])
            ){

            // Checking that password matches the required characters
            $password = $_POST['password'];
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);
            if($uppercase && $lowercase && $number && $specialChars && strlen($password) > 8) {

                // Checking if both passwords match
                if($_POST['password'] == $_POST['passwordConf']){

                    // Cleaning inputs
                    $firstname = cleanInput($_POST['firstname']);
                    $lastname = cleanInput($_POST['lastname']);
                    $email = cleanInput($_POST['email']);

                    // Making sure the account doesn't already exist in the database
                    if(!getAccountByEmail($bdd, $_POST['email'])) {

                        // Hashing password
                        $hash = password_hash(cleanInput($password), PASSWORD_DEFAULT);

                        // Storing data into an array and sending it to the model
                        $acc = [$firstname, $lastname, $email, $hash];
                        addAccount($bdd, $acc);
                    }
                    else {
                        $message = '<li>Compte déjà existant en bdd</li>';
                    }
                }
                else {
                    $message . '<li>Les mots de passe ne correspondent pas</li>';
                }
            }
            else {
                if(!$uppercase){
                    $message . '<li>Le mot de passe doit contenir une majuscule</li>';
                }
                if(!$lowercase){
                    $message . '<li>Le mot de passe doit contenir une minuscule</li>';
                }
                if(!$number){
                    $message . '<li>Le mot de passe doit contenir un chiffre</li>';
                }
                if(!$specialChars){
                    $message . '<li>Le mot de passe doit contenir un caractère spécial</li>';
                }
                if(strlen($password) < 8){
                    $message . '<li>Le mot de passe doit contenir au moins 8 caractères</li>';
                }
            }
        }
        else {
            $message = '<li>Veuillez remplir tous les champs</li>';
        }
    }
    include 'vue/signup.php';
}

function login(PDO $bdd) {
    $message = '';
    // Form submitted
    if(isset($_POST['submitLogin'])){
        if(!isset($_SESSION['pseudo'])){
            // Checking if inputs are all filled
            if( !empty($_POST['emailLogin']) && 
                !empty($_POST['passwordLogin'])
                ){
                        // Cleaning inputs
                        $email = cleanInput($_POST['emailLogin']);
                        $password = cleanInput($_POST['passwordLogin']);

                        // Making sure the account exists in the database
                        $acc = getAccountByEmail($bdd, $_POST['emailLogin']);
                        if(!empty($acc)) {
                            // Verifying match between the given password and the stored hash
                            if(password_verify($password, $acc['password'] )) {
                                $_SESSION['pseudo'] = $acc['firstname'].$acc['lastname'][0].$acc['lastname'][1].$acc['lastname'][2];
                                $_SESSION['email'] = $acc['email'];
                                $message = "Connexion réussie, bienvenue $acc[firstname]";
                                header('location:/exophp/profile');
                            }
                            else{
                                $message = 'Le mot de passe ne correspond pas, veuillez réessayer.';
                            }
                        }
                        else {
                            $message = '<li>Compte inexistant en bdd</li>';
                        }
                    }
            else {
                $message = '<li>Veuillez remplir tous les champs</li>';
            }
        }
        else {
            $message = '<li>Vous êtes déjà connecté!</li>';
        }
    }
    include 'vue/login.php';
}

function displayAccounts(PDO $bdd) {
    $accounts= [];
    $accounts = getAllAccount($bdd);
    // dump($accounts);
    include 'vue/accounts.php';
}