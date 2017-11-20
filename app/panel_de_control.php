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
$modelsession = new control_de_sesion(3, $controlusuario->model->getID_ROL());
$modelsession->compruebasessionidrestaurante();
$modelsession->compruebasessionrolusuario();

$controlusuario->model->Load_from_key($_SESSION['Id_Usuario']);
$control->model2->Load_from_key($_SESSION['id_restaurante']);
$controlusuario->model->getNOMBRE();
$controlusuario->model->getAPELLIDO();

$control->panel();

