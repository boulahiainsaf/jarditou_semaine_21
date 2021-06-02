<?php

session_start();
$log=$_POST['login'];
$password =$_POST['password'];
require "connexion_bdd.php"; // Inclusion de notrebibliothèque de fonctions

$db = connexionBase(); // Appel de la fonction deconnexion
if(!empty($log)&& !empty($password)) {


    $result = $db->prepare("SELECT * FROM users WHERE us_login= :us_login");
    $result ->execute(['us_login' =>$log]);
// Renvoi de l'enregistrement sous forme d'un objet
    $row = $result->fetch();
    if ($row == true){
        $hashpassword = $row['us_password'];
        if(password_verify($password, $hashpassword)){
            header("Location:index.php");
            exit;
        }else{
            echo "le mots de passe n'est pas correcte";
        }
    } else{
        echo "le compte portant le login ".$log." n'existe pas ";
    }
}else {
    echo "Veullez completer l'ensemble des champs";
}

