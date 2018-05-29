<?php

session_start();

if($_GET['action'] == 'Deconnection'){
    unset($_SESSION["session"]);
    unset($_SESSION["admin"]);
}

include_once('../index.php');

if ($_POST['action'] == 'Profil') {
    echo "<script type='text/javascript'>document.location.replace('controllerProfil.php');</script>";
}

if ($_POST['action'] == 'Messagerie') {
    echo "<script type='text/javascript'>document.location.replace('controllerIndex.php');</script>";
}

if ($_POST['action'] == 'Recherche') {
    echo "<script type='text/javascript'>document.location.replace('controllerSearching.php');</script>";
}

if ($_POST['action'] == 'Parametres') {
    echo "<script type='text/javascript'>document.location.replace('controllerParemetres.php');</script>";
}

