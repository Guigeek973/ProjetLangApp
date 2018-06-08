<?php

session_start();
include ('../library/util.php');

include_once('../views/AfficherProfil.php');

if ($_POST['BackToIndex'] == 'BackToIndex') {
    echo "<script type='text/javascript'>document.location.replace('controllerIndex.php');</script>";
}
if ($_POST['Modify'] == 'Modify') {
    echo "<script type='text/javascript'>document.location.replace('controllerProfilModif.php');</script>";
}