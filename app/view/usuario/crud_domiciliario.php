<?php
echo'

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                               Gestion de Domiciliarios
                   
                </h3>
                        </div>

                
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                
                                <div class="x_content">
                                    <h4> Lista domiciliarios</h4>
                                    <table id="tablaCrudDomic" class="table table-striped responsive-utilities jambo_table" style="width: 100%;">  
                                    
                                        <thead>
                                            <tr class="headings">
                                                <!-- <th>
                                                    <input type="checkbox" class="tableflat">
                                                </th> -->
                                                <th>Nombres</th>
                                                <th>Apellidos </th>
                                                <th>identificacion</th>
                                                <th>celular</th>
                                                <th>Empresa</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                                <th>Cod. Barras</th>
                                        </thead>

                                        <tbody>';

            $controlusuario2 = new tbl_usuario();

            // ID_USUARIO, nombre, APELLIDO, IDENTIFICACION, CELULAR, epmpresa, codigobarras
              $arreglo = $controlusuario2->listardomiciliariosconaliado();


            while ($row = mysqli_fetch_row($arreglo))
              {
                 echo'<tr class="even pointer">
                      <td>'.$row[1].'</td>
                      <td>'.$row[2].'</td>
                      <td>'.$row[3].'</td>
                      <td>'.$row[4].'</td>
                      <td>'.$row[5].'</td>';




                  echo'<td>
                        <a href="?e='.$row[0].'">Editar</a>
                        </td>

                      
                        <td>';?>

                        <a onclick="javascript:return confirm('¿Seguro de eliminar este domiciliario?');" href="?d=<?php echo $row[0]; ?>">Eliminar</a>

                         <?php echo'</td>

                        <td><form method="post" action="view/codigobarras.php">
                                            <input type="hidden" name="idcodigobarras" value = "';echo $row[6].'"/>
                                            <button input type="submit" name="button" id="button" class="btn btn-dark btn-xs "><span class="glyphicon glyphicon-barcode"></span></button>
                                            </form></td>
                      </tr>';

                }

                echo'</tbody>

                                    </table>                                                                         
                                </div>
                                <div class="well well-sm text-center">
                                    <a class="btn btn-primary" href="?c=1">Nuevo domiciliario</a>
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
        $('#tablaCrudDomic').DataTable( {
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
