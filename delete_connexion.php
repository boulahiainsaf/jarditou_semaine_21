<?php
session_start();
require "connexion_bdd.php"; // Inclusion de notrebibliothèque de fonctions

$db = connexionBase();
if(!empty($_SESSION['login'])&&!empty($_SESSION['password'])){


    $_SESSION['login'] = "";
    $_SESSION['password'] = "";
    $_SESSION['role']="";
    session_destroy();
    header("Location: index.php");
    exit();
}else{
    header("Location: index.php");
    exit();
}
?>