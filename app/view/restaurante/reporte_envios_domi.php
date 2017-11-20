<?php
/**
 * Created by PhpStorm.
 * User: Dancito
 * Date: 1/10/2017
 * Time: 1:36 PM
 */



echo '
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                               Reporte De Todos Los Envios Por Cada Domiciliario
                   
                </h3>
                        </div>

                
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                
                                <div class="x_content">
                                    <h4> Reporte cantidad envios</h4>
                                  <table id="tablaRepEnvioDomic" class="table table-striped responsive-utilities jambo_table" style="width: 100%;">                                
                                       
                                    
                                        <thead>
                                            <tr class="headings">
                                                <!-- <th>
                                                    <input type="checkbox" class="tableflat">
                                                </th> -->
                                                <th>Nombres</th>
                                                <th>Apellidos </th>
                                                <th>Restaurante</th>
                                                <th>Cantidad envíos</th>
                                                
                                        </thead>

                                        <tbody>';

$controlusuario2 = new tbl_restaurante();


$arreglo = $controlusuario2->listarcantidadenviospordomi();
while ($row = mysqli_fetch_row($arreglo))
{
    echo'<tr class="even pointer">
                      <td>'.$row[0].'</td>
                      <td>'.$row[1].'</td>
                      <td>'.$row[2].'</td>
                      <td>'.$row[3].'</td>

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

      
		<!-- <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script> -->
        <!-- <script src="js/datatables/tools/js/dataTables.tableTools.js"></script> -->
';
?>

<script>
    $(document).ready(function () {
        $('#tablaRepEnvioDomic').DataTable( {
		'responsive': true,
		'language': {
                "search": "Buscar: ",
                "paginate": {
                    "first": "Primero",
                    "last": "Ültimo.",
                    "previous": "Ant.",
                    "next": "Sig.",
					'processing': "Procesando",
                    "infoEmpty": "No hay registros"
                },
                "lenghtMenu": "Ver _MENU_ Registros"
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
