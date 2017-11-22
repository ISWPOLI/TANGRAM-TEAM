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

$objdespacha = new despachadores();
$objdespacha->arranque();

class despachadores
{

    public function arranque()
    {

        $control = new RestauranteController();
        $controlusuario = new UsuarioController();
        $controlrol = new RolController();

        $controlusuario->model->Load_from_key($_SESSION['Id_Usuario']);
        $modelsession = new control_de_sesion(2, $controlusuario->model->getID_ROL());
        $modelsession->compruebasessionidrestaurante();
        $modelsession->compruebasessionrolusuario();

        if (isset($_POST['botoneditar']) && $_POST['botoneditar'] == 2) {
            $controlusuario->model->Load_from_key($_POST['numeroid']); // nombres apellidos identificacion celular empresa
            $elcorreo = $controlusuario->model->getCORREO_ELECTRONICO();
            $controlusuario->model->setNOMBRE($_POST['nombres']);
            $controlusuario->model->setAPELLIDO($_POST['apellidos']);
            $controlusuario->model->setIDENTIFICACION($_POST['identificacion']);
            $controlusuario->model->setCORREO_ELECTRONICO($_POST['correo']);
            $controlusuario->model->setPASSWORD($_POST['password']);
            if ($controlusuario->model->validarsiemailexiste($_POST['correo']) >= 1) {

                if ($elcorreo == $_POST['correo']) {
                    $controlusuario->model->Save_Active_Row();
                } else {
                    header('Location:despachadores.php?p=1');
                }
            } else {

                $controlusuario->model->Save_Active_Row();
            }


        }

        if (isset($_POST['botoncrear']) && $_POST['botoncrear'] == 3) {

            $controlusuario->model->setID_ROL(3);
            $controlusuario->model->setNOMBRE($_POST['nombres']);
            $controlusuario->model->setAPELLIDO($_POST['apellidos']);
            $controlusuario->model->setIDENTIFICACION($_POST['identificacion']);
            $controlusuario->model->setCORREO_ELECTRONICO($_POST['correo']);
            $controlusuario->model->setPASSWORD($_POST['password']);
            if ($controlusuario->model->validarsiemailexiste($_POST['correo'] >= 1)) {
                header('Location:despachadores.php?p=1');
            } else {
                $controlusuario->model->Save_Active_Row_as_New();
            }


        }

        //
        // e editar d eliminar c crear
        if (isset($_REQUEST['e']) || isset($_REQUEST['d']) || isset($_REQUEST['c'])) {
            if (isset($_REQUEST['e'])) {
                $controlusuario->editardespachador();
            }
            if (isset($_REQUEST['d'])) {
                $controlusuario->model->Load_from_key($_REQUEST['d']);
                $controlusuario->model->setID_ROL(99);
                $controlusuario->model->Save_Active_Row();


                header('Location:despachadores.php');

            }
            if (isset($_REQUEST['c'])) {
                $controlusuario->creardespachador();
            }
        } else {
            $controlusuario->cruddespachador();
        }
        exit();
    }
}


