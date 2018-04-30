<?php


function sendContactMail(){
    if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) === false) {
        $lastname = htmlspecialchars ($_POST['lastname']);
        $firstname = htmlspecialchars ($_POST['firstname']);
        $mail = htmlspecialchars ($_POST['mail']);
        $msg = htmlspecialchars ($_POST['message']);
        $header = "From: \"$mail\"<$mail>\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $msg .= "\n" . 'send by ' . $lastname . ' ' . $firstname . '.' . "\n";
        if ($mail == '') $_SESSION['messageEmail'] = 'mail non renseigné';
        else if ($firstname == '') $_SESSION['messageEmail'] = 'prenom non renseigné';
        else if ($lastname == '') $_SESSION['messageEmail'] = 'nom non renseigné';
        else if ($message = '') $_SESSION['messageEmail'] = 'veuillez saisir un message';
        else
            envoyerMessage($mail, $msg, $header);
    }
}

function envoyerMessage($mail,$msg,$header){
    mail($mail,'Contact',$msg,$header);
}
?>