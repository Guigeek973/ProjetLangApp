<?php

session_start();
include ('../library/util.php');

include_once('../views/ModifierProfil.php');

if ($_POST['BackToIndex'] == 'BackToIndex') {
    echo "<script type='text/javascript'>document.location.replace('controllerIndex.php');</script>";
}
if ($_POST['Validate'] == 'Validate') {
    //traitement update
    //alert('Modification effectuée');
    //echo "<script type='text/javascript'>document.location.replace('controllerProfil.php');</script>";
}