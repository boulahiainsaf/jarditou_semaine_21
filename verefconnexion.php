<?php
session_start();




$log=$_POST['login'];
$password =$_POST['password'];

$_SESSION['login'] = $log;
$_SESSION['password'] = $password;
var_dump($_SESSION);
require "connexion_bdd.php"; // Inclusion de notrebibliothèque de fonctions

$db = connexionBase(); // Appel de la fonction deconnexion

if(!empty($log)&& !empty($password)) {


    $result = $db->prepare("SELECT * FROM users WHERE us_login= :us_login");
    $result ->execute(['us_login' =>$log]);
// Renvoi de l'enregistrement sous forme d'un objet
    $row = $result->fetch();
    $role=$row['role'];
    $hashpassword = $row['us_password'];

    echo  $hashpassword;
    if ($row == true) {
        if (password_verify($_POST['password'] , $hashpassword)) {
            $sql =$db->prepare( 'UPDATE users SET us_date_inscription= :us_date_inscription   WHERE us_login='.$log);
            $sql->bindValue(":us_date_inscription", date('Y-m-d H:i:s'));
            $success= $sql->execute();
            if ($role == 1) {
                $_SESSION['role']="admine";

                header("Location:tableau.php");
            } else {
                $_SESSION['role']="client";
                header("Location:tab1.php");
            }

        } else {
            echo "le mots de passe n'est pas correcte";

        }
        }
    else{
            echo "le compte portant le login " . $log . " n'existe pas ";

        }
    }else {
        echo "Veullez completer l'ensemble des champs";
        }

