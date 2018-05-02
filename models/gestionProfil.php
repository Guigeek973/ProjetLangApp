<?php

include ('../library/gestion_BD.php');

function getInfosProfil() {
    $connect = connection();
    $query1 = 'SELECT username,firstname,lastname,mail,natal,souhait1,souhait2,souhait3,niv_souhait1,niv_souhait2,niv_souhait3 FROM Users WHERE mail=:mail';
    $prep1 = $connect->prepare($query1);
    $prep1->bindParam(':mail', $_SESSION["session"],  PDO::PARAM_STR);
    $prep1->execute();
    $tabInfos = $prep1->fetch(PDO::FETCH_ASSOC);


    return $tabInfos;
}