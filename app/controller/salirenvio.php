<?php
/**
 * Created by PhpStorm.
 * User: Dancito
 * Date: 1/10/2017
 * Time: 1:09 PM
 */
session_start();

unset($_POST['botonenviodomi']);
unset ($_POST['botonenviootrafactura']);
unset ($_POST['botonenviofacturaterminar']);
unset($_SESSION['envio']);
unset($_SESSION['cuentaenvio']);
header ('Location:../envio.php');