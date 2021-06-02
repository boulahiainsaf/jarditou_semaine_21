
<?php
require "connexion_bdd.php";
$db = connexionBase();

$requete01 = "SELECT * FROM produits ";
$result = $db->query($requete01);


?>

<?php
include("entete.php");
?>
<table class="table table-striped table-bordered container-fluid col-lg-8">
    <thead>
    <tr>
        <th scope="col">Photo</th>

        <th scope="col">Libell&eacute;</th>
        <th scope="col">Prix</th>
        <th scope="col">Couleur</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $nbLigne = $result->rowCount();
    if ($nbLigne >1){
        while ($row = $result->fetch(PDO::FETCH_OBJ)) {?>
            <tr>
            <th scope="row" class="table-warning"><img src="images/<?php echo $row->pro_id.".".$row->pro_photo;?>" width="75"></th>

            <td class="table-warning"><a class="nav-link" ><?php echo $row->pro_libelle;?></a></td>
            <td ><?php echo $row->pro_prix;?></td>
            <td ><?php echo $row->pro_couleur;?></td>
                <?php
}
?>
            <?php
            }
        $result->closeCursor();
        ?>
        </tr>

    </tbody>
</table>
<?php
require "piedpage.php"
?>
</body>

</html>
