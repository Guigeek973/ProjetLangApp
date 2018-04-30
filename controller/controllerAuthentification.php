<?php

include ('../library/util.php');
include('../models/authentificationBD.php');

if ($_POST['register-submit'] == 'Register') {
    addToBD();
    header("Location: controllerIndex.php");
}

if ($_POST['login-submit'] == 'Login')
{
    authentificate();
    header("Location: controllerIndex.php");
}