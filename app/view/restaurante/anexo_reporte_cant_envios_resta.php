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
                'dom': 'B<"clear">lfrtip',
                buttons: [
                    {
                        extend: 'copy', text: 'Copiar'
                    },
                    {
                        extend: 'print',
                        text: 'Imprimir',
                        modifier: {
                            style: 'fullWidth',
                            alignment: 'center'
                        }
                    },
                    {
                        extend: 'pdf', text: 'PDF',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                    },

                    { extend: 'excel', text: 'Excel' },
                    { extend: 'csv', text: 'CSV' }
                ]
            } );

        });
    </script>
<?php

class Validarlogin
{
    private $recogerestaurante;
    private $fecha1;
    private $fecha2;
    private $salida;

    function arranque()
    {
        $this->recogerestaurante = $_POST['recogerestaurante'];
        $this->fecha1 = $_POST['fecha1'];
        $this->fecha2 = $_POST['fecha2'];


        echo'<div class="x_content">
                                    <h4> Lista envios</h4>
                                     <table id="tablaRepEnvioRest" class="table table-striped responsive-utilities jambo_table" style="width: 100%;"> 
                                    
                                        <thead>
                                            <tr class="headings">
                                                <!-- <th>
                                                    <input type="checkbox" class="tableflat">
                                                </th> -->
                                                <th>Restaurante</th>
                                                <th>Nombre </th>
                                                <th>apellido</th>
                                                <th>Fecha salida</th>
                                                <th>Fecha llegada</th>
                                                <th>No factura</th>
                                                <th>Zona</th>
                                                
                                        </thead>

                                        <tbody>';

      $controlusuario2 = new tbl_restaurante();

        //ID_USUARIO 	NOMBRE 	APELLIDO 	IDENTIFICACION 	PASSWORD 	CELULAR 	CORREO_ELECTRONICO 	CODIGO_DE_BARRAS 	ID_ROL 	ID_ALIADOS
        $arreglo = $controlusuario2->listarcantidadenviosporrestaurante($this->recogerestaurante);



        while ($row = mysqli_fetch_row($arreglo))
        {

            echo'<tr class="even pointer">
                      <td>'.$row[0].'</td>
                      <td>'.$row[1].'</td>
                      <td>'.$row[2].'</td>
                      <td>'.$row[3].'</td>
                      <td>'.$row[4].'</td>
                      <td>'.$row[5].'</td>
                      <td>'.$row[6].'</td>
                      </tr>';

        }

        echo'</tbody>';





    }

}

