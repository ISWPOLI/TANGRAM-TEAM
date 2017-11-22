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
require_once 'controller/aliado_controller.php';
require_once 'controller/control_de_sesion.php';

$objdomis = new domiciliarios();
$objdomis->arranque();

class domiciliarios
{

    public function arranque()
    {

        $control = new RestauranteController();
        $controlusuario = new UsuarioController();
        $controlrol = new RolController();
        $controlaliado = new AliadoController();

        $controlusuario->model->Load_from_key($_SESSION['Id_Usuario']);
        $modelsession = new control_de_sesion(3, $controlusuario->model->getID_ROL());
        $modelsession->compruebasessionidrestaurante();
        $modelsession->compruebasessionrolusuario();


        if (isset($_POST['botoneditar']) && $_POST['botoneditar'] == 2) {
            $controlusuario->model->Load_from_key($_POST['numeroid']); // nombres apellidos identificacion celular empresa
            $controlusuario->model->setNOMBRE($_POST['nombres']);
            $controlusuario->model->setAPELLIDO($_POST['apellidos']);
            $controlusuario->model->setIDENTIFICACION($_POST['identificacion']);
            $controlusuario->model->setCELULAR($_POST['celular']);
            $controlusuario->model->setID_ALIADOS($_POST['empresa']);
            $controlusuario->model->Save_Active_Row();

        }

        if (isset($_POST['botoncrear']) && $_POST['botoncrear'] == 3) {
            $codigodebarra = $controlusuario->model->ultimo_codigo() + 1;
            $controlusuario->model->setID_ROL(4);
            $controlusuario->model->setNOMBRE($_POST['nombres']);
            $controlusuario->model->setAPELLIDO($_POST['apellidos']);
            $controlusuario->model->setIDENTIFICACION($_POST['identificacion']);
            $controlusuario->model->setCELULAR($_POST['celular']);
            $controlusuario->model->setID_ALIADOS($_POST['empresa']);
            $controlusuario->model->setCODIGO_DE_BARRAS($codigodebarra);
            $controlusuario->model->Save_Active_Row_as_New();


        }

        //
        // e editar d eliminar c crear
        if (isset($_REQUEST['e']) || isset($_REQUEST['d']) || isset($_REQUEST['c'])) {
            if (isset($_REQUEST['e'])) {
                $controlusuario->editardomiciliarios();
            }
            if (isset($_REQUEST['d'])) {
                $controlusuario->model->Load_from_key($_REQUEST['d']);
                $controlusuario->model->setID_ROL(99);
                $controlusuario->model->Save_Active_Row();


                header('Location:domiciliarios.php');

            }
            if (isset($_REQUEST['c'])) {
                $controlusuario->creardomiciliarios();
            }
        } else {
            $controlusuario->cruddomiciliarios();
        }
        exit();
    }
}

