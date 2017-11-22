<?php
session_start();

require_once 'controller/registrolaboral_controller.php';
require_once 'controller/restaurante_controller.php';
require_once 'controller/usuario_controller.php';
require_once 'controller/rol_controller.php';
require_once 'controller/control_de_sesion.php';

$objrepo1 = new reporte_domi1();
$objrepo1->arranque();

class reporte_domi1
{

    public function arranque()
    {
        $objregistro = new RegistroController();
        $control = new RestauranteController();
        $controlusuario = new UsuarioController();

        $modelsession = new control_de_sesion(4, 3);
        $modelsession->compruebasessionidrestaurante();


        /*
        if (isset($_POST['botonenviodomi']))
        {
            $objenvio->registradomiparaenvio($_POST['barrasdomiciliario']);
            unset($_POST['botonenviodomi']);

        }

        if (isset($_POST['botonenviootrafactura']))
        {
            $objenvio->registrafacturaparaenvio($_POST['barrasfactura']);

        }
        if (isset($_POST['botonenviofacturaterminar']))
        {
            $objenvio->registraenviototal();

            exit();
        }


        if (isset($_SESSION['envio'][0]))
        {
            $objenvio->envioingresafactura();
        }
        else
        {
            $objenvio->envioingresadomi();
        }*/

        if (isset($_POST['botonEnvHoraIng'])) {
            $objregistro->registradomiliario($_POST['barrasdomi']);
            unset($_POST['botonEnvHoraIng']);

        }

        $controlusuario->reporte_envios_por_domi();


        exit();
    }
}