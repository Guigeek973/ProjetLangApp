<?php
/**
 * Created by PhpStorm.
 * User: zekil_000
 * Date: 19/01/2017
 * Time: 17:10
 */

include '../library/util.php';
include '../models/gestionOubliMdp.php';
include '../views/MdpOublié.php';


if ($_POST['submitForgotPassword'] == 'Valider'){
    oubliMdp();
    header('Location: controllerAuthentification.php');
}
?>