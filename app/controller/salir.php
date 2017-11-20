<?php
/**
 * Created by PhpStorm.
 * User: Dancito
 * Date: 1/10/2017
 * Time: 1:09 PM
 */
session_start();
session_destroy();
unset($_POST['recogerestaurante']);
header ('Location:../index.php');