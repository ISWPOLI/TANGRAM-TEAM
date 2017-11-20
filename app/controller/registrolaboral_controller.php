<?php
/**
 * Created by PhpStorm.
 * User: Dancito
 * Date: 11/11/2017
 * Time: 3:09 PM
 */
require_once 'model/tbl_envio.class.php';
require_once 'model/tbl_usuario.class.php';
require_once 'model/tbl_factura.class.php';
require_once 'model/tbl_envios_factura.class.php';
require_once 'controller/usuario_controller.php';
require_once 'model/tbl_estado_domiciliarios.class.php';
require 'model/tbl_registro_laboral.class.php';

class RegistroController
{
    public $model6;

    public function __CONSTRUCT()
    {
        $this->model6= new tbl_registro_laboral();
        $this->model5 = new UsuarioController();
    }


    public function registrohoralaboral()
    {
        require_once 'view/envio/header.php';
        require_once 'view/registro/ingresa_hora_entrada.php';
        require_once 'view/envio/footer.php';
    }
    public function registradomiliario($barradomi)
    {

        //comprueba que domi existe
        $barradomi = substr($barradomi, 0,12);
        $objusuario = new tbl_usuario();
        $idusuario = $objusuario->idusuariofromcodigobarras($barradomi);
        if ($idusuario > 1) //comprueba que exista ese codigo de barras
        {
            $compruebaentrada = $this->model6->verificasihoraentrada($idusuario);
            if ($compruebaentrada > 1)// comprurba si tiene registro de entrada
            {
                $compruebasalida = $this->model6->verificasihorasalida($idusuario);
                if ($compruebasalida > 1)// compruba si tiene hora salida
                {
                    header ('Location:registro_jornada.php?x=1'); //ya hizo registro por el dia de hoy
                }
                else // hacer nuevo registro de salida
                {
                    $this->model6->Load_from_key($compruebaentrada);
                    $this->model6->setFECHA_HORA_SALIDA(date('Y-m-d H:i:s'));
                    $this->model6->Save_Active_Row();
                    header ('Location:registro_jornada.php?s=1');
                }

            }
            else
            {
                $this->model6->setFECHA_HORA_LLEGADA(date('Y-m-d H:i:s'));
                $this->model6->setID_USUARIO($idusuario);
                $this->model6->Save_Active_Row_as_New();
                header ('Location:registro_jornada.php?t=1'); // hacer nuevo registro de entrada
            }



        }
        else
        {
            header ('Location:registro_jornada.php?p=1');
        }
        //comprueba que opcion sigue
        // si hoy no tiene registro entrada hoy , le hace un nuevo registro
        //si ya se registro entrada hoy registrar salida
        // si ya registro salida hoy reportar que ya se hizo salida
    }
}
