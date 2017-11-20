<?php
require_once 'model/tbl_usuario.class.php';
require_once 'model/tbl_restaurante_class.php';

class UsuarioController{
    
    public $model;
    public $model2;


    public function __CONSTRUCT()
    {
        $this->model = new tbl_usuario();
        $this->model2 = new tbl_restaurante();
    }
    
    public function Mostrarlogin(){
        require_once 'view/login/login.php';

    }


    public function cruddomiciliarios(){

        require_once 'view/header_comun_logueado.php';
        require_once 'view/usuario/crud_domiciliario.php';
        //require_once 'view/restaurante/crear_restaurante.php';

    }

    public function editardomiciliarios(){

        require_once 'view/header_comun_logueado.php';
        require_once 'view/usuario/edita_domiciliario.php';

    }

    public function creardomiciliarios(){

        require_once 'view/header_comun_logueado.php';
        require_once 'view/usuario/crear_domiciliario.php';

    }

    public function cruddespachador(){

        require_once 'view/header_comun_logueado.php';
        require_once 'view/usuario/crud_despachador.php';


    }

    public function editardespachador(){

        require_once 'view/header_comun_logueado.php';
        require_once 'view/usuario/edita_despachador.php';

    }

    public function creardespachador(){

        require_once 'view/header_comun_logueado.php';
        require_once 'view/usuario/crear_despachador.php';

    }

    public function crudsupervisor(){

        require_once 'view/header_comun_logueado.php';
        require_once 'view/usuario/crud_supervisor.php';


    }

    public function editarsupervisor(){

        require_once 'view/header_comun_logueado.php';
        require_once 'view/usuario/edita_supervisor.php';

    }

    public function crearsupervisor(){

        require_once 'view/header_comun_logueado.php';
        require_once 'view/usuario/crear_supervisor.php';

    }
    public function reporte_envios_por_domi(){

        require_once 'view/usuario/reporte_envio_por_domi.php';

    }




}