<?php
/**
 * Created by PhpStorm.
 * User: Dancito
 * Date: 11/11/2017
 * Time: 9:30 PM
 */
session_start();

require_once 'controller/restaurante_controller.php';
require_once 'controller/usuario_controller.php';
require_once 'controller/rol_controller.php';
require_once 'controller/aliado_controller.php';
require_once 'controller/control_de_sesion.php';


$control = new RestauranteController();
$controlusuario = new UsuarioController();
$controlrol = new RolController();
$controlaliado = new AliadoController();

$controlusuario->model->Load_from_key($_SESSION['Id_Usuario']);
$modelsession = new control_de_sesion(2, $controlusuario->model->getID_ROL());
$modelsession->compruebasessionidrestaurante();
$modelsession->compruebasessionrolusuario();




if (isset($_POST['botoneditar']) && $_POST['botoneditar'] == 2)

{

    $controlaliado->model5->Load_from_key($_POST['numeroid']);
    $controlaliado->model5->setNOMBRE($_POST['nombres']);
    $controlaliado->model5->Save_Active_Row();

}

if (isset($_POST['botoncrear']) && $_POST['botoncrear'] == 3)
{

    $controlaliado->model5->setactivo(1);
    $controlaliado->model5->setNOMBRE($_POST['nombres']);
    $controlaliado->model5->Save_Active_Row_as_New();


}

//
// e editar d eliminar c crear
if (isset($_REQUEST['e']) || isset($_REQUEST['d']) || isset($_REQUEST['c']))
{
    if (isset($_REQUEST['e']))
    {
        $controlaliado->editaraliados();
    }
    if (isset($_REQUEST['d']))
    {
        $controlaliado->model5->Load_from_key($_REQUEST['d']);
        $controlaliado->model5->setactivo(0);
        $controlaliado->model5->Save_Active_Row();


        header ('Location:aliados.php');

    }
    if (isset($_REQUEST['c']))
    {
        $controlaliado->crearaliados();
    }
}
else
{
    $controlaliado->crudaliados();
}
exit();