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


