<?php
/**
 * Created by PhpStorm.
 * User: zekil_000
 * Date: 19/01/2017
 * Time: 17:10
 */

include '../library/util.php';
include '../models/gestionOubliMdp.php';

include_once '../views/MdpOublié.php';


if ($_POST['forgotPassword'] == 'Valider'){
    oubliMdp();
    echo "<script>window.location.replace('controllerIndex.php');</script>";
}
?>