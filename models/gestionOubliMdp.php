<?php
/**
 * Created by PhpStorm.
 * User: zekil_000
 * Date: 19/01/2017
 * Time: 17:08
 */

/*
 * fonction qui gere l'envoi d'un nouveau mot de passe et l'enregistre en BD
 */
function oubliMdp() {
    $mail = htmlspecialchars ($_POST['mail']);

    //si le mail n'a pas été renseigné on quitte la fonction
    if ($mail == '') {
        echo 'mail non renseigné';
        return;
    }
    else {
        $header = "From: \"$mail\"<$mail>\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $nouveauMdp=uniqid();
        $msg = "\n" .'Votre nouveau mot de passe : '. "\n" .$nouveauMdp;


        mail($mail, $msg, $header);
    }

    $nouveauMdp = md5($nouveauMdp);
    $connect = connection();
    $query = 'UPDATE user SET password=:nouveauMdp WHERE email=:mail';
    $prep = $connect->prepare($query);
    $prep->bindParam(':mail', $mail);
    $prep->bindParam(':nouveauMdp', $nouveauMdp);
    $prep->execute();
    $prep->closeCursor();
    $prep = NULL;

}

