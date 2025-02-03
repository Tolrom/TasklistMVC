<?php
function displayMyAcc($bdd){
    if(isset($_SESSION['email'])){
        $acc = getAccountByEmail($bdd, $_SESSION['email']);
    }
    else{
        header('location:index.php');
        exit;
    }
    include 'vue/myAcc.php';
}