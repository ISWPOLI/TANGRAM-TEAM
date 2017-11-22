<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Dancito
 * Date: 9/10/2017
 * Time: 11:39 PM
 */
require_once 'controller/restaurante_controller.php';
require_once 'controller/usuario_controller.php';
require_once 'controller/rol_controller.php';
require_once 'controller/control_de_sesion.php';

$objreportes = new reportes();
$objreportes->arranque();

class reportes
{

    public function arranque()
    {

        $control = new RestauranteController();
        $controlusuario = new UsuarioController();
        $controlrol = new RolController();

        $controlusuario->model->Load_from_key($_SESSION['Id_Usuario']);
        $modelsession = new control_de_sesion(3, $controlusuario->model->getID_ROL());
        $modelsession->compruebasessionidrestaurante();
        $modelsession->compruebasessionrolusuario();


        if (isset($_REQUEST['r']) && $_REQUEST['r'] == 'domi') {
            $control->reportedomi();
        }

        if (isset($_REQUEST['r']) && $_REQUEST['r'] == 'resta') {
            $control->reporteresta();
        }


        if (isset($_REQUEST['r']) && $_REQUEST['r'] == 'canresta') {
            $control->reporte_cant_envi_resta();
        }
        if (isset($_REQUEST['r']) && $_REQUEST['r'] == 'rast') {
            $control->reporte_rastreo_factura();
        }


        if (isset($_REQUEST['r']) && $_REQUEST['r'] == 'candomi') {
            $control->reporte_cant_envi_domis();
        }
        if (isset($_REQUEST['r']) && $_REQUEST['r'] == 'efici') {
            $control->reporte_eficiencia();
        }
    }
}