<?php

include ('../library/gestion_BD.php');

function getInfosProfil() {
    $connect = connection();
    $query1 = 'SELECT name,firstname,email,natal FROM user WHERE email=:mail';
    $prep1 = $connect->prepare($query1);
    $prep1->bindParam(':mail', $_SESSION["session"],  PDO::PARAM_STR);
    $prep1->execute();
    $tabInfos = $prep1->fetch(PDO::FETCH_ASSOC);

    return $tabInfos;
}

function getInfosLanguages() {
    $connect = connection();
    $query1 = 'SELECT langages.name FROM parler JOIN langages ON parler.id_langue = langages.id WHERE parler.id_user=:idUser';
    $prep1 = $connect->prepare($query1);
    $prep1->bindParam(':idUser', $_SESSION["idUser"],  PDO::PARAM_STR);
    $prep1->execute();
    $tabLang = $prep1->fetch(PDO::FETCH_ASSOC);

    $query0 = 'SELECT langages.name FROM parler JOIN user ON parler.id_langue = user.natal JOIN langages ON parler.id_langue = langages.id WHERE parler.id_user=:idUser';
    $prep0 = $connect->prepare($query0);
    $prep0->bindParam(':idUser', $_SESSION["idUser"],  PDO::PARAM_STR);
    $prep0->execute();
    $tabNatal = $prep0->fetch(PDO::FETCH_ASSOC);

    $query = 'SELECT level.niveau FROM parler JOIN level ON parler.id_level = level.id WHERE parler.id_user=:idUser';
    $prep = $connect->prepare($query);
    $prep->bindParam(':idUser', $_SESSION["idUser"],  PDO::PARAM_STR);
    $prep->execute();
    $tabLevel = $prep->fetch(PDO::FETCH_ASSOC);

    $tab = [$tabLang, $tabLevel, $tabNatal];
    return $tab;
}

function getAllLanguages() {
    $connect = connection();
    $query1 = 'SELECT id, name from langages';
    $prep1 = $connect->prepare($query1);
    $prep1->execute();
    $tabLang = $prep1->fetchAll();

    return $tabLang;
}

function getAllLevel() {
    $connect = connection();
    $query1 = 'SELECT id, niveau from level';
    $prep1 = $connect->prepare($query1);
    $prep1->execute();
    $tabLevel = $prep1->fetchAll();

    return $tabLevel;
}
