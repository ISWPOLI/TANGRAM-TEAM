<?php
session_start();

require_once 'controller/registrolaboral_controller.php';
require_once 'controller/restaurante_controller.php';
require_once 'controller/usuario_controller.php';
require_once 'controller/rol_controller.php';
require_once 'controller/control_de_sesion.php';


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

if (isset($_POST['botonEnvHoraIng']))
{
    $objregistro->registradomiliario($_POST['barrasdomi']);
    unset($_POST['botonEnvHoraIng']);

}

$controlusuario->reporte_envios_por_domi();







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