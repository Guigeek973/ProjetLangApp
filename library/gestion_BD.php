<?php
function connection() {
    try {
        $dbLink = 'mysql:host=mysql-projetlangapp.alwaysdata.net; dbname=projetlangapp_db'; //Ligne 1
        $arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); //Ligne 2
        $pdo = new PDO($dbLink, '147373', 'institutg4', $arrExtraParam); //Ligne 3; Instancie la connexion
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Ligne 4
    }
    catch(PDOException $e) {
        $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
        die($msg);
    }
    return $pdo;
}
?>