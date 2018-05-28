<?php

session_start();
include ('../library/util.php');
include ('../models/gestionProfil.php');

include_once('../views/AfficherProfil.php');

if ($_POST['Back to main page'] == 'Back to main page') {
    echo "<script type='text/javascript'>document.location.replace('controllerIndex.php');</script>";
}
else if ($_POST['Modify'] == 'Modify') {
    echo "<script type='text/javascript'>document.location.replace('controllerProfilModif.php');</script>";
}