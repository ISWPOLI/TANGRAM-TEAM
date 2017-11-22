<?php
session_start();

require_once 'controller/registrolaboral_controller.php';
require_once 'controller/restaurante_controller.php';
require_once 'controller/usuario_controller.php';
require_once 'controller/control_de_sesion.php';

$objreg= new registro_jornada();
$objreg->arranque();

class registro_jornada
{

    public function arranque()
    {

        $objregistro = new RegistroController();
        $control = new RestauranteController();
        $controlusuario = new UsuarioController();

        $modelsession = new control_de_sesion(4, 3);
        $modelsession->compruebasessionidrestaurante();



        if (isset($_POST['botonEnvHoraIng'])) {
            $objregistro->registradomiliario($_POST['barrasdomi']);
            unset($_POST['botonEnvHoraIng']);

        }


        $objregistro->registrohoralaboral();


        //$objenvio->envioingresadomi();




        exit();
    }
}
