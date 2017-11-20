<?php
/**
 * Created by PhpStorm.
 * User: Dancito
 * Date: 1/10/2017
 * Time: 1:36 PM
 */
echo'            

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                               Reporte Todos los Envios por Cada Restaurante
                   
                </h3>
                        </div>

                
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                
                                <div class="x_content">
                                    <h4> Lista envios</h4>
                                     <table id="tablaRepEnvioRest" class="table table-striped responsive-utilities jambo_table" style="width: 100%;"> 
                                    
                                        <thead>
                                            <tr class="headings">
                                                <!-- <th>
                                                    <input type="checkbox" class="tableflat">
                                                </th> -->
                                                <th>Restaurante</th>
                                                <th>Nombre </th>
                                                <th>apellido/th>
                                                <th>Fecha salida</th>
                                                <th>Fecha llegada</th>
                                                <th>No factura</th>
                                                <th>Zona</th>
                                                
                                        </thead>

                                        <tbody>';

$controlusuario2 = new tbl_restaurante();

//ID_USUARIO 	NOMBRE 	APELLIDO 	IDENTIFICACION 	PASSWORD 	CELULAR 	CORREO_ELECTRONICO 	CODIGO_DE_BARRAS 	ID_ROL 	ID_ALIADOS
$arreglo = $controlusuario2->listarcantidadenviosporrestaurante($_SESSION['id_restaurante']);
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



echo'                </tbody>

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
</body>

</html>
