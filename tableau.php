<?php
session_start();
if  (isset ($_SESSION["Login"])) {
    require "connexion_bdd.php"; // Inclusion de notrebibliothèque de fonctions

    $db = connexionBase(); // Appel de la fonction deconnexion
}
if(!empty($log)&& !empty($password)) {


    $result = $db->prepare("SELECT * FROM users WHERE us_login= :us_login");
    $result->execute(['us_login' => $_SESSION["Login"]]);
// Renvoi de l'enregistrement sous forme d'un objet
    $row1 = $result->fetch();
    $role = $row1['role'];
}
?>
<?php
include("entete.php");
?>
<?php
        require "connexion_bdd.php"; // Inclusion de notrebibliothèque de fonctions

        $db = connexionBase();

        $requete01 = "SELECT * FROM produits ";
        $result = $db->query($requete01);
        
        
    ?>
<?php
if($_SESSION['role']!="admine"){
    header("Location:te.php");

}else{
    echo "ok";
}
?>
 <table class="table table-striped table-bordered container-fluid col-lg-8">
        <thead>
            <tr>
                <th scope="col">Photo</th>
                <th scope="col">ID</th>
                <th scope="col">Référence</th>
                <th scope="col">Libell&eacute;</th>
                <th scope="col">Prix</th>
                <th scope="col">Stock</th>
                <th scope="col">Couleur</th>
                <th scope="col">Ajout</th>
                <th scope="col">Modif</th>
                <th scope="col">Bloqué</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nbLigne = $result->rowCount(); 
            if ($nbLigne >1){
             while ($row = $result->fetch(PDO::FETCH_OBJ)) {?>
              <tr>
                <th scope="row" class="table-warning"><img src="images/<?php echo $row->pro_id.".".$row->pro_photo;?>" width="75"></th>
                <td ><?php echo $row->pro_id;?></td>
                <td ><?php echo $row->pro_ref;?></td>
                <td class="table-warning"><a class="nav-link" href="details.php?pro_id=<?php echo $row->pro_id?>"><?php echo $row->pro_libelle;?></a></td>
                <td ><?php echo $row->pro_prix;?></td>
                <td ><?php echo $row->pro_stock;?></td>
                <td ><?php echo $row->pro_couleur;?></td>
                <td ><?php echo $row->pro_d_ajout;?></td>
                <td ><?php echo $row->pro_d_modif;?></td>
                
                <?php
                if ( $row -> pro_bloque > 0 ) {echo  "<th>"."BLOQUE" . "</th>" ;} else { echo "<th>" ."" . "</th>" ;}
             }
                $result->closeCursor();
               ?>
             </tr>
             <?php
             }
            ?>
            <a class="nav-link" href="add_form.php">Ajout</a>

        </tbody>
    </table>
    <?php
    require "piedpage.php";
    ?>

</body>
</html>