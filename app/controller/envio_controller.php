<?php
/**
 * Created by PhpStorm.
 * User: Dancito
 * Date: 3/10/2017
 * Time: 1:38 AM
 */
require_once 'model/tbl_envio.class.php';
require_once 'model/tbl_usuario.class.php';
require_once 'model/tbl_factura.class.php';
require_once 'model/tbl_envios_factura.class.php';
require_once 'controller/usuario_controller.php';
require_once 'model/tbl_estado_domiciliarios.class.php';

class EnvioController{

    public $model;
    public $model5;
    public function __CONSTRUCT()
    {
        $this->model = new tbl_envio();
        $this->model5 = new UsuarioController();
    }

    public function envioingresadomi()
    {
        require_once 'view/envio/header.php';
        require_once 'view/envio/envio_ingresa_domi.php';
        require_once 'view/envio/footer.php';
    }

    public function envioingresafactura()
    {

        if (isset($_SESSION['cuentaenvio']))
        {
            $_SESSION['cuentaenvio'] = $_SESSION['cuentaenvio'] + 1;
        }
        else
        {
            $_SESSION['cuentaenvio'] = 0;
        }
        require_once 'view/envio/header.php';

        require_once 'view/envio/envio_ingresa_factura.php';

        require_once 'view/envio/footer.php';

    }

    public function registradomiparaenvio($barradomi)
    {

        $barradomi = substr($barradomi, 0,12);
        $objusuario = new tbl_usuario();
        $idusuario = $objusuario->idusuariofromcodigobarras($barradomi); //comprueba que exista ese codigo de barras

        $_SESSION['salida'] = $idusuario;

        if ($idusuario > 1)
        {
            $objestado = new tbl_estado_domiciliarios();
            $estado =$objestado->ultimoestadodomi($idusuario);

            if ($estado == 0)
            {
                $_SESSION['envio'][0] = $idusuario;
                header ('Location:envio.php');
            }
            else
            {
                header ('Location:envio.php?t=1');
            }

        }
        else
        {
            header ('Location:envio.php?p=1');
        }


    }
    public function registrafacturaparaenvio($nofactura)
    {

        $No = $_SESSION['cuentaenvio'];
        $_SESSION['envio'][$No] = $nofactura;

    }



    public function registraenviototal()
    {

        //registra envio
        //ultimo valor envio
        //while registra factura
        //ultimo valor factura
        // ingresa en  tabla auxiliar
        //fin while

        //$_SESSION['envio'],  $_SESSION['cuentaenvio'];
        //$ID_USUARIO,$ID_RESTAURANTE,$FECHA_HORA_LLEGADA,$FECHA_HORA_SALIDA
        $objfatura = new tbl_factura();
        $objenvfact = new tbl_envios_factura();
        $objestado = new tbl_estado_domiciliarios();
        $this->model->New_tbl_envio($_SESSION['envio'][0], $_SESSION['id_restaurante'], '', date('Y-m-d H:i:s'), '1');
        $this->model->Save_Active_Row_as_New();
        $ultimaidenvio =  $this->model->ultimaidenvio();

        $a = 1;
        while ($a < $_SESSION['cuentaenvio'])
        {
            $zona = substr($_SESSION['envio'][$a], 0,2);
            $nofactura = substr($_SESSION['envio'][$a], -10);
            $objfatura->New_tbl_factura($_SESSION['id_restaurante'] ,$nofactura ,$zona ,date('Y-m-d'));
            $objfatura->Save_Active_Row_as_New();
            $ultimaidfactura = $objfatura->ultimaidfactura();
            $objenvfact->New_tbl_envios_factura($ultimaidenvio,$ultimaidfactura );
            $objenvfact->Save_Active_Row_as_New();
            $a++;

        }
        $objestado->setDESCRIPCION('1');
        $objestado->setID_USUARIO($_SESSION['envio'][0]);
        $objestado->Save_Active_Row_as_New();


        unset($_POST['botonenviodomi']);
        unset ($_POST['botonenviootrafactura']);
        unset ($_POST['botonenviofacturaterminar']);
        unset($_SESSION['envio']);
        unset($_SESSION['cuentaenvio']);
        header ('Location:envio.php?x=1');

    }

    public function enviorecojenvio()
    {
        require_once 'view/envio/header.php';
        require_once 'view/envio/recoje_envio_domi.php';
        require_once 'view/envio/footer.php';
    }
    public function registrarecojeenviodomi($barradomi)
    {

        $barradomi = substr($barradomi, 0,12);
        $objusuario = new tbl_usuario();
        $idusuario = $objusuario->idusuariofromcodigobarras($barradomi); //comprueba que exista ese codigo de barras


        if ($idusuario > 1)
        {
            $objestado = new tbl_estado_domiciliarios();
            $estado =$objestado->ultimoestadodomi($idusuario);
            if ($estado == 1)
            {

                $this->model->Load_from_key($this->model->idultimoenviodomi($idusuario));
                $this->model->setFECHA_HORA_LLEGADA(date('Y-m-d H:i:s'));
                $this->model->setESTADO_ENVIO('0');
                $this->model->Save_Active_Row();
                $objestado->setID_USUARIO($idusuario);
                $objestado->setDESCRIPCION('0');
                $objestado->Save_Active_Row_as_New();

                header ('Location:recojeenvio.php?x=1');
            }
            else
            {
                header ('Location:recojeenvio.php?t=1');
            }


        }
        else
        {
            header ('Location:recojeenvio.php?p=1');
        }

    }


}