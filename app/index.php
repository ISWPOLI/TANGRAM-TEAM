<?php
session_start();

require_once 'controller/restaurante_controller.php';

if (isset($_POST['recogerestaurante']))
    {
        $_SESSION['id_restaurante'] = $_POST['recogerestaurante'];
    }


if (isset($_SESSION['id_restaurante']))
{
    require_once "controller/restaurante_controller.php";
    $pagina = new RestauranteController();
    $pagina->home();

}
else
{

    require_once 'controller/restaurante_controller.php';
    $pagina = new RestauranteController();
    $pagina->Index();


}
exit();