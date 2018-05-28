<?php

session_start();
include ('../library/util.php');
include ('../models/gestionProfil.php');

include_once('../views/ModifierProfil.php');

if ($_POST['Back to main page'] == 'Back to main page') {
    echo "<script type='text/javascript'>document.location.replace('controllerIndex.php');</script>";
}
if ($_POST['Validate'] == 'Validate') {
    //traitement update
    //echo "<script type='text/javascript'>document.location.replace('controllerIndex.php');</script>";
}