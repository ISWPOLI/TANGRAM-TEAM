<?php

/**
 * Created by PhpStorm.
 * User: Dancito
 * Date: 11/11/2017
 * Time: 3:09 PM
 */
require_once 'model/tbl_aliados.class.php';
require_once 'model/tbl_restaurante_class.php';
require_once 'model/tbl_usuario.class.php';


class AliadoController
{
    public $model5;
    public $model2;


    public function __CONSTRUCT()
    {
        $this->model5 = new tbl_aliados();
        $this->model2 = new tbl_restaurante();

    }

    public function crudaliados(){

        require_once 'view/header_comun_logueado.php';
        require_once 'view/aliados/crud_aliado.php';

    }

    public function editaraliados(){

        require_once 'view/header_comun_logueado.php';
        require_once 'view/aliados/edita_aliado.php';

    }

    public function crearaliados(){

        require_once 'view/header_comun_logueado.php';
        require_once 'view/aliados/crear_aliado.php';

    }



}
