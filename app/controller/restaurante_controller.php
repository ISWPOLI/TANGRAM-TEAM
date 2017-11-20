<?php
require_once 'model/tbl_restaurante_class.php';

class RestauranteController{
    
    public $model2;
    
    public function __CONSTRUCT()
    {
        $this->model2 = new tbl_restaurante();
    }
    
    public function Index(){

        require_once 'view/restaurante/restaurante.php';

    }

    public function home(){

        require_once 'view/restaurante/restaurante_home.php';

    }

    public function panel(){

        require_once 'view/header_comun_logueado.php';
        require_once 'view/restaurante/restaurante_panel.php';

    }

    public function crud_restaurante(){

        require_once 'view/header_comun_logueado.php';
        require_once 'view/restaurante/crud_restaurante.php';

    }
    public function edita_restaurante(){

        require_once 'view/header_comun_logueado.php';
        require_once 'view/restaurante/edita_restaurante.php';

    }
    public function crear_restaurante(){
        require_once 'view/header_comun_logueado.php';
        require_once 'view/restaurante/crear_restaurante.php';

    }



    public function reportedomi(){
        require_once 'view/header_comun_logueado.php';
        require_once 'view/restaurante/reporte_envios_domi.php';

    }



    public function reporteresta(){
        require_once 'view/header_comun_logueado.php';
        require_once 'view/restaurante/reporte_envios_resta.php';

    }

    public function reporte_cant_envi_resta(){
        require_once 'view/header_comun_logueado.php';
        require_once 'view/restaurante/reporte_cant_envios_resta.php';

    }

    public function reporte_rastreo_factura(){
        require_once 'view/header_comun_logueado.php';
        require_once 'view/restaurante/reporte_rastreo_fact.php';

    }

    public function reporte_cant_envi_domis(){
        require_once 'view/header_comun_logueado.php';
        require_once 'view/restaurante/reporte_cant_envios_domi.php';

    }

    public function reporte_eficiencia(){
        require_once 'view/header_comun_logueado.php';
        require_once 'view/restaurante/reporte_eficiencia.php';

    }



}