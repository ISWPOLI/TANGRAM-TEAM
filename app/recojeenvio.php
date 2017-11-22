<?php
session_start();

require_once 'controller/envio_controller.php';
require_once 'controller/restaurante_controller.php';
require_once 'controller/usuario_controller.php';
require_once 'controller/control_de_sesion.php';

$objrecoje = new recojeenvio();
$objrecoje->arranque();

class recojeenvio
{

    public function arranque()
    {
        $objenvio = new EnvioController();
        $control = new RestauranteController();
        $controlusuario = new UsuarioController();
        $modelsession = new control_de_sesion(4, 3);
        $modelsession->compruebasessionidrestaurante();


        if (isset($_POST['botonenviodomi'])) {
            $objenvio->registrarecojeenviodomi($_POST['barrasdomiciliario']);
            unset($_POST['botonenviodomi']);

        }

        $objenvio->enviorecojenvio();


        exit();
    }
}