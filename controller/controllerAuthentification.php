<?php

include_once ('../library/util.php');

if ($_POST['register-submit'] == 'Register') {
    addToBD();
    echo "<script type='text/javascript'>document.location.replace('controllerIndex.php');</script>";
}

if ($_POST['login-submit'] == 'Login')
{
    authentificate();
    echo "<script type='text/javascript'>document.location.replace('controllerIndex.php');</script>";
}