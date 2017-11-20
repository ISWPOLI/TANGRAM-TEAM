<?php
/**
 * Created by PhpStorm.
 * User: Dancito
 * Date: 12/11/2017
 * Time: 11:59 PM
 */
session_start();
require_once '../../model/tbl_usuario.class.php';
require_once '../../model/tbl_restaurante_class.php';
require_once '../../model/tbl_envio.class.php';

$arranque = new Validarlogin();
$arranque->arranque();
?>

    <script>
        $(document).ready(function () {
            $('#tablaRepEnvioRest').DataTable( {
                'responsive': true,
                'language': {
                    "search": "Buscar: ",
                    "paginate": {
                        "first": "Primero",
                        "last": "Últ.",
                        "previous": "Ant.",
                        "next": "Sig.",
                        'processing': "Procesando",
                        "infoEmpty": "No hay registros"
                    }
                },
                'order': [1, 'asc'],
                'iDisplayLength': 10,
                "sPaginationType": "full_numbers",

            } );

        });
    </script>
<?php

class Validarlogin
{
    private $idrestaurante;
    private $fecha1;
    private $fecha2;
    private $barras;


    function arranque()
    {

        $this->barras  = substr($_POST['recogerestaurante'], 0,12);
        $this->fecha1 = date('Y-m-d');
        $this->fecha2 = date('Y-m-d');
        $this->idrestaurante = $_SESSION['id_restaurante'];
        //  fecha 	hora_salida 	hora_llegada 	ID_ENVIO
        //echo '*********'.$this->barras.'*********'.$this->fecha1.'*********'.$this->fecha2.'*********'.$this->idrestaurante.'*********';

        echo'<div class="x_content">
                                    <h4> Lista envios</h4>
                                     <table id="tablaRepEnvioRest" class="table table-striped responsive-utilities jambo_table" style="width: 100%;"> 
                                    
                                        <thead>
                                            <tr class="headings">                                               
                                                <th>Fecha</th>
                                                <th>hora_salida </th>
                                                <th>hora_llegada </th>
                                                <th>ID_ENVIO</th>
                                                
                                        </thead>

                                        <tbody>';

        $objenvios = new tbl_envio();
        $controlusuario2 = new tbl_restaurante();

       $arreglo = $objenvios->listarenviospordomiciliariodesdedomi($this->barras, $this->fecha1, $this->fecha2 , $this->idrestaurante); //  $codigobarra, $fecha1, $fecha2, $idrestau



        while ($row = mysqli_fetch_row($arreglo))
        {

            echo'<tr class="even pointer">
                      <td>'.$row[0].'</td>
                      <td>'.$row[1].'</td>
                      <td>'.$row[2].'</td>
                      <td>'.$row[3].'</td>                      
                      </tr>';

        }

        echo'</tbody>';

    }

}

