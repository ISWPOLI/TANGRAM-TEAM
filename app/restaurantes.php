<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Dancito
 * Date: 1/10/2017
 * Time: 1:03 PM
 */

require_once 'controller/restaurante_controller.php';
require_once 'controller/usuario_controller.php';
require_once 'controller/rol_controller.php';
require_once 'controller/control_de_sesion.php';

$control = new RestauranteController();
$controlusuario = new UsuarioController();
$controlrol = new RolController();

$controlusuario->model->Load_from_key($_SESSION['Id_Usuario']);
$modelsession = new control_de_sesion(2, $controlusuario->model->getID_ROL());
$modelsession->compruebasessionidrestaurante();
$modelsession->compruebasessionrolusuario();

if (isset($_POST['botoneditar']) && $_POST['botoneditar'] == 2)

{
    $control->model2->Load_from_key($_POST['numeroid']); // nombres apellidos identificacion celular empresa
    $control->model2->setNOMBRE_SEDE($_POST['nombres']);
    $control->model2->Save_Active_Row();

}

if (isset($_POST['botoncrear']) && $_POST['botoncrear'] == 3)
{

    $control->model2->New_tbl_restaurante($_POST['nombres']);
    $control->model2->Save_Active_Row_as_New();

}

//
// e editar d eliminar c crear
if (isset($_REQUEST['g']) || isset($_REQUEST['f']) || isset($_REQUEST['c']))
{
    if (isset($_REQUEST['g']))
    {
        $control->edita_restaurante();
    }
    if (isset($_REQUEST['f']))
    {

        $control->model2->Load_from_key($_REQUEST['f']); // nombres apellidos identificacion celular empresa
        $control->model2->setactivo(0);
        $control->model2->Save_Active_Row();

        header ('Location:restaurantes.php');

    }
    if (isset($_REQUEST['c']))
    {
        $control->crear_restaurante();
    }
}
else
{
    $control->crud_restaurante();
}
exit();

