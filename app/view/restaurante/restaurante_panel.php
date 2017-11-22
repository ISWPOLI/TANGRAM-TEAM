<?php
/**
 * Created by PhpStorm.
 * User: Dancito
 * Date: 1/10/2017
 * Time: 1:36 PM
 */
require_once 'model/tbl_envio.class.php';


echo '

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                                Panel de control  '. $result[0].'
                   
                </h3>
                        </div>

                
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                
                                <div class="x_content">
                                    <h4> Domiciliarios Disponibles</h4>
                                    <table id="tablaPane" class="table table-striped responsive-utilities jambo_table" style="width: 100%;">                                
                                        <thead>
                                            <tr class="headings">
                                                <!-- <th>
                                                    <input type="checkbox" class="tableflat">
                                                </th> -->
                                                <th>Celular</th>
                                                <th>Nombre Apellido</th>
                                                <th>Hora LLegada</th>
                                                <th>Cant envios</th>
                                                <th>Estado</th>
												
                                        </thead>

                                        <tbody>';
$objresta = new tbl_restaurante();
$arreglo = $objresta->listardomiciliariosactivosporrestauranteconenvioactivo(date('Y-m-d'), $_SESSION['id_restaurante']);

// id_envio 	NOMBRE 	APELLIDO 	hora_llegada 	cantidad_domicilios 	DESCRIPCION_ESTADO
                                        while ($row = mysqli_fetch_row($arreglo))
                                        {

                                            echo'<tr class="even pointer">
                                                          <td class=" ">'.$row[0].'</td>
                                                          <td class=" ">'.$row[1].' '.$row[2].'</td>
                                                          <td class=" ">'.$row[3].'</td>
                                                          <td class=" ">'.$row[4].'</td>
                                                          <td class=" ">';
                                                            if ($row[5] == 1)
                                                            {echo'Ocupado';}
                                                            else
                                                            {{echo'Disponible';}}

                                                          echo'</td>
                                                          
                                                                                                               
                                                          </tr>';
                                        }

                                        echo'</tbody>

                                    </table>
                                    
                                    <h4> Envios activos</h4>
                                    <table id="tablaPane" class="table table-striped responsive-utilities jambo_table" style="width: 100%;">                                
                                        <thead>
                                            <tr class="headings">
                                                <!-- <th>
                                                    <input type="checkbox" class="tableflat">
                                                </th> -->
                                                <th>Envio</th>
                                                <th>Domiciliario</th>
                                                <th>Fecha hora salida </th>
                                                <th>Tiempo Trascurrido</th>
												
                                        </thead>

                                        <tbody>';
                                        $objenvios = new tbl_envio();
                                        $arreglo1 = $objenvios->listarenviosactivosporreestaurante( $_SESSION['id_restaurante'], date('Y-m-d'));

                                                        while ($row = mysqli_fetch_row($arreglo1))
                                                        {
                                                            echo'<tr class="even pointer">
                                                              <td class=" ">'.$row[0].'</td>
                                                              <td class=" ">'.$row[1].'</td>
                                                              <td class=" ">'.$row[2].'</td>
                                                              <td class=" ">'.$row[3].'</td>
                                                              </tr>';
                                                        }

                                        echo'</tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                        <br />
                        <br />
                        <br />

                    </div>
                </div>
                    <!-- footer content -->
                <footer>
                    
                </footer>
                <!-- /footer content -->
                    
                </div>
                <!-- /page content -->
            </div>

        </div>

		
		

		
        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>



		
		
		
		
		
';
?>

<script>
    $(document).ready(function () {
        $('#tablaPanel').DataTable( {
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
                },
				"lengthMenu": "Ver _MENU_ registros"
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


</body>

</html>
