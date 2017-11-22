<?php
session_start();

require_once 'controller/envio_controller.php';
require_once 'controller/restaurante_controller.php';
require_once 'controller/usuario_controller.php';
require_once 'controller/control_de_sesion.php';

$objenv = new envio();
$objenv->arranque();

class envio
{

    public function arranque()
    {

        $objenvio = new EnvioController();
        $control = new RestauranteController();
        $controlusuario = new UsuarioController();

        $modelsession = new control_de_sesion(4, 3);
        $modelsession->compruebasessionidrestaurante();


        if (isset($_POST['botonenviodomi'])) {
            $objenvio->registradomiparaenvio($_POST['barrasdomiciliario']);
            unset($_POST['botonenviodomi']);

        }

        if (isset($_POST['botonenviootrafactura'])) {
            $objenvio->registrafacturaparaenvio($_POST['barrasfactura']);

        }
        if (isset($_POST['botonenviofacturaterminar'])) {
            $objenvio->registraenviototal();

            exit();

        }


        if (isset($_SESSION['envio'][0])) {
            $objenvio->envioingresafactura();
        } else {
            $objenvio->envioingresadomi();
        }


        exit();
    }
}
