<?php 

include 'model/account.php';
include 'utils/utils.php';

function accountAdd(PDO $bdd) {
    $message = '';

    // Form submitted
    if(isset($_POST['submit'])){

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

                    // Making sure the account doesn't already exist in the database
                    if(!getAccountByEmail($bdd, $_POST['email'])) {

                        // Cleaning inputs
                        $firstname = cleanInput($_POST['firstname']);
                        $lastname = cleanInput($_POST['lastname']);
                        $email = cleanInput($_POST['email']);

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
    include 'vue/account.php';
}

function displayAccounts(PDO $bdd): ?array {
    $accounts = getAllAccount($bdd);
    return $accounts;
}