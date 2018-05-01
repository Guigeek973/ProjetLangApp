<?php
/**
 * Created by PhpStorm.
 * User: julie
 * Date: 20/01/2017
 * Time: 17:02
 */

$title="Profil";
start_page_min($title);
?>
<div class="container-fluid">
    <div class="row">
        <div class="text-center">
            <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="profil">Votre profil</h4>
        </div>
        <div class="col-md-4">
            <img src="avatar.png" class="img-responsive" alt="Responsive image">
        </div>
        <div class="col-md-8">
            <h5>Votre Photo de profil : </h5>

            <div class="text-muted">
                sucma
            </div>
            <br>
        </div>
    </div>
</div>
<section>
    <div class="form">
        <h1> Votre Profil</h1>

        <h5>Votre Photo de profil : </h5>
        <h5><?php echo $_POST['photoCV'] ?></h5></>

        <h5>Nom: </h5> <?php echo $_POST['nom'] ?></>

        <h5>Prenom :<?php echo $_POST['prenom'] ?></h5>

        <h5>Adresse Mail :<?php echo $_POST['mail'] ?></h5>

        <h5>Téléphone portable :<?php echo $_POST['tel'] ?></h5>

        <h5>Téléphone fixe :<?php echo $_POST['fix'] ?></h5>

        <h5>Adresse :<?php echo $_POST['adr'] ?></h5>

        <h5>Ville :<?php echo $_POST['ville'] ?></h5>

        <h5>Code postal :<?php echo $_POST['codeP'] ?></h5>

        <form action="controllerProfil" method="post">
            <input type="submit" name="Modifier" value="Modifier"/>
        </form>
    </div>
</section>
<?php
end_page();
?>
