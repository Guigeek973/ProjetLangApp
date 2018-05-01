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
        $msg = htmlspecialchars ($_POST['message']);
        $header = "From: \"$mail\"<$mail>\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $nouveauMdp=uniqid();
        $msg .= "\n" .'Votre nouveau mot de passe : '. "\n" .$nouveauMdp;


        mail($mail, $msg, $header);
        $_SESSION['nouvMdp']='Un mail contenant le nouveau mot de passe vous a été envoyé' . '</br>' . 'Si vous ne recevez pas le message veuillez consulter votre boite de spams' . '</br>';
    }

    $nouveauMdp = md5($nouveauMdp);
    $connect = connection();
    $query = 'UPDATE utilisateur SET password=:nouveauMdp WHERE $mail=:mail';
    $prep = $connect->prepare($query);
    $prep->bindParam(':mail', $mail);
    $prep->bindParam(':nouveauMdp', $nouveauMdp);
    $prep->execute();
    $prep->closeCursor();
    $prep = NULL;

}


?>