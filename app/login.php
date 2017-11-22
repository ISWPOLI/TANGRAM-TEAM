<?php
session_start();


require_once 'controller/usuario_controller.php';
require_once 'controller/control_de_sesion.php';

$objlog = new login();
$objlog->arranque();

class login
{

    public function arranque()
    {

        $control = new UsuarioController();

        $modelsession = new control_de_sesion(4, 3);
        $modelsession->compruebasessionidrestaurante();
        $control->Mostrarlogin();
        exit();
    }
}
