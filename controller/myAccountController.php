<?php
function displayMyAcc($bdd){
    if(isset($_SESSION['email'])){
        $acc = getAccountByEmail($bdd, $_SESSION['email']);
    }
    else{
        header('location:/exophp');
        exit;
    }
    include 'vue/myAcc.php';
    echo $profile;
}