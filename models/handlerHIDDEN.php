<?php
/**
 * Created by PhpStorm.
 * User: zekil_000
 * Date: 04/06/2018
 * Time: 11:10
 */
session_start();

if (!empty($_POST['idContact']) && !empty($_POST['idSession'])) {
    $idContact = $_POST['idContact'];
    $idSession = $_POST['idSession'];
    $_SESSION['idContactSelected'] = $_POST['idContact'];
    echo $_SESSION['idContactSelected'] . " " . $_SESSION["idUser"]  . " " . $_SESSION["session"];
}
else
    echo "raté !";