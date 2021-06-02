<?php
$nom = $_POST['Nom'];
$prenom = $_POST["prenom"];
$mail = $_POST["mail"];
$mPass=$_POST["mPass"];
$mPass1=password_hash($mPass, PASSWORD_DEFAULT);
$mPass2=$_POST["mPass2"];
$login=$_POST["login"];
$dateinscription = date("y-m-d");
$Email = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/";
$erreur = 0;
$erreur_prenom="";
$erreur_nom="";
$erreur_mail="";
$erreur_mPass="";
if(empty($nom)){
    $erreur_nom="Veulliez saisir votre nom";
    $erreur++;
}else{}
// validation de prenom:
if(empty($prenom)){
    $erreur_prenom="Veulliez saisir votre prénom";
    $erreur++;
}else{}
if(empty($login)){
    $erreur_login="Veulliez saisir votre login";
    $erreur++;
}else{}
if(empty($mPass) || $mPass!=$mPass2){
    $erreur_mPass="Veulliez saisir votre prénom";
    $erreur++;
}else{}

if(preg_match($Email,$mail)){

}else{
    $erreur_mail="Veulliez saisir votre Email";
    $erreur++;
}
if($erreur==0){
    require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
    $db = connexionBase();


    $requete = $db->prepare("INSERT INTO users (us_nom,us_prenom,us_mail,us_login,us_password,us_date_inscription) 
                        values(:us_nom,:us_prenom,:us_mail,:us_login,:us_password,:us_date_inscription)");
    $requete->bindValue(':us_nom', $nom);
    $requete->bindValue(':us_prenom', $prenom);
    $requete->bindValue(':us_mail', $mail);
    $requete->bindValue(':us_login', $login);
    $requete->bindValue(':us_password', $mPass1);
    $requete->bindValue(':us_date_inscription', $dateinscription);
    $requete->execute();
    echo "votre inscription est validée";
}else {
    include "inscription.php";
}
?>