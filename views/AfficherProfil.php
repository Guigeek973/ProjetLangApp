<?php

$title="Profil";
start_page_min($title);

$data = getInfosProfil();
?>
<div class="container-fluid">
    <div class="text-center">
        <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="profil">Votre profil</h4>
    </div>
    <div class="row" style="display: flex; flex-direction: column;">
        <div class="col-md-4">
            <h5>Votre Photo de profil : </h5>
            <?php
            echo $data['username'];
            echo $data['firstname'];
            echo $data['lastname'];
            echo $data['mail'];
            echo $data['natal'];
            echo $data['souhait1'];
            echo $data['souhait2'];
            echo $data['souhait3'];
            echo $data['niv_souhait1'];
            echo $data['niv_souhait2'];
            echo $data['niv_souhait3'];
            ?>
        </div>
        <div class="col-md-4">
            <img src="avatar.png" class="img-responsive" alt="Responsive image">
        </div>
        <form action="controllerProfil" method="post">
            <input type="submit" name="Modifier" value="Modifier"/>
        </form>
    </div>
</div>

<?php
end_page();
?>
