<?php
/**
 * Created by PhpStorm.
 * User: zekil_000
 * Date: 22/01/2017
 * Time: 15:30
 */

function getInfosProfil() {
    $connect = connection();
    $query1 = 'SELECT * FROM Users WHERE mail=:mail';
    $prep1 = $connect->prepare($query1);
    $prep1->bindParam(':mail', $mail,  PDO::PARAM_STR);
    $prep1->execute();
    $tabInfos = $prep1->fetchAll();


    return $tabInfos;
    /*$firstname =;
    $lastname =;
    $mail=;
    $tel =;
    $fixe =;
    $adresse=;
    $ville=;
    $CP=;*/

}