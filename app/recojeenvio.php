<?php
session_start();

require_once 'controller/envio_controller.php';
require_once 'controller/restaurante_controller.php';
require_once 'controller/usuario_controller.php';
require_once 'controller/control_de_sesion.php';

$objenvio = new EnvioController();
$control = new RestauranteController();
$controlusuario = new UsuarioController();
$modelsession = new control_de_sesion(4, 3);
$modelsession->compruebasessionidrestaurante();



if (isset($_POST['botonenviodomi']))
{
    $objenvio->registrarecojeenviodomi($_POST['barrasdomiciliario']);
    unset($_POST['botonenviodomi']);

}

$objenvio->enviorecojenvio();









//$objenvio->envioingresadomi();



/*unset la variable de control
un while para meter las facturas
mete factura, capturda ultima faactura, registra enlace

en pagina factura si no esta seteado session se crea una valor 0 si ya esta se suma 1  session cuentaenvio

la toma de datos es session envio[0][id_usuariosomi]
envio[1]factura]
envio[2[factura]

session con contador para la cantidad de facturas
*/


/*
if
{
    $objenvio->registro_exitoso();
}

else
{
    $objenvio->enviopedidodomiciliario();
}
 */

exit();