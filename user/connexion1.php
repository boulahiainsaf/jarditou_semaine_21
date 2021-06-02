<?php
include("entete.php");
?>
<form action="verefconnexion.php" method="POST" enctype="multipart/form-data">
    <h2>Déjà client ?</h2>
    <input class="form-control form-control-sm" type="text" name="login" id="login" placeholder="Login" >
    <p></p>
    <input class="form-control form-control-sm" type="password" name="password" id="password" placeholder="mots de passe" >
    <p></p>
    <div>
    <input type="submit" class="btn btn-dark btn-outline-primary" value="se connecter">
        <p></p>
    </div>
</form>
    <p>Nouveau client ?</p>
    <form action="inscription.php" method="POST" enctype="multipart/form-data">
    <input type="submit" class="btn btn-dark btn-outline-primary"   value="Créer un compte">
    </form>

<?php
include("piedpage.php");
?>

</body>

</html>
