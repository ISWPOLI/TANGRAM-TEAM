<?php
/**
 * Created by PhpStorm.
 * User: Dancito
 * Date: 1/10/2017
 * Time: 1:36 PM
 */

$alma = $this->model2->nombrerestaurante($_SESSION['id_restaurante']);
$result=mysqli_fetch_row($alma);
$controlusuario2 = new UsuarioController();
$controlusuario2->model->Load_from_key($_SESSION['Id_Usuario']);

echo '
<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  		<!-- Favicon -->
		<link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="assets/img/favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
		<link rel="manifest" href="assets/img/favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">


    <title>Reporte Entregas Domiciliario | D-Control</title>

    <!-- Bootstrap core CSS -->

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="assets/css/custompcsistel.css" rel="stylesheet">
	<link href="assets/css/datatables/css/dataTables.css" rel="stylesheet">	
<link href="assets/css/datatables/tools/css/dataTables.tableTools.css")"" rel="stylesheet">
<link href="assets/css/datatables/css/responsive.dataTables.css" rel="stylesheet">
<link href="assets/css/buttons/buttons.dataTables.min.css" rel="stylesheet">
<link href="assets/css/datatables/css/colReorder.dataTables.css" rel="stylesheet">
<link href="assets/css/datatables/css/select.dataTables.min.css" rel="stylesheet">
	

    <script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
	
	        <!-- Datatables -->
	<script src="assets/js/datatables/js/jquery.dataTables.1.10.15.min.js"></script>
	<script src="assets/js/datatables/js/dataTables.responsive.js"></script>
	<script src="assets/js/pdf/dataTables.buttons.min.js"></script>
	<script src="assets/js/pdf/buttons.flash.min.js"></script>
	<script src="assets/js/pdf/jszip.min.js"></script>
	<script src="assets/js/pdf/pdfmake.min.js"></script>
	<script src="assets/js/pdf/vfs_fonts.js"></script>
	<script src="assets/js/pdf/buttons.html5.min.js"></script>
	<script src="assets/js/pdf/buttons.print.min.js"></script>	

    <!--[if lt IE 9]>
        <script src="assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0; padding:0.5em;">
                        <a href="index.php" class="site_title">
                            <img src="assets/img/d-control-3.png">
                       </a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- /menu prile quick info -->

                    <br/>

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>Menú</h3>
                            <ul class="nav side-menu">
                            <li><a href="panel_de_control.php"><i class="fa fa-home"></i> Inicio</a>
                            </li>
                             <li><a href="domiciliarios.php"><i class="fa fa-building-o"></i>  Gestión Restaurantes</a>
                            </li>
                            <li><a href="domiciliarios.php"><i class="fa fa-user"></i>  Gestión Supervisores</a>
                            </li>
                            <li><a href="domiciliarios.php"><i class="fa fa-street-view"></i>  Gestión Domiciliarios</a>
                            </li>
                            <li><a href="domiciliarios.php"><i class="fa fa-user-plus"></i>  Gestión Aliados</a>
                            </li>
                            <li><a><i class="fa fa-bar-chart"></i>Reportes<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                   <li><a href="reportes.php?r=domi">Envios Por Domiciliario</a>
                                    </li>
                                    <li><a href="reportes.php?r=resta">Envios por Restaurantes</a>
                                    </li>                                      
                                </ul>                                                                 
                        </ul>
                        </div>
                    </div>

                </div>
            </div>

            <!-- top navigation -->
			
            <div class="top_nav navbar-fixed-top">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    '. $result[0].'
                                    <span class=" glyphicon glyphicon-cutlery"></span>
                                </a>

                            </li>
                            
                            
                            <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="assets/img/img.jpg" alt="">'.$controlusuario2->model->getNOMBRE().' '.$controlusuario2->model->getAPELLIDO().'
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="javascript:;">  Mis Datos</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="badge bg-red pull-right">100%</span>
                                            <span>Seguridad</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">Ayuda</a>
                                    </li>
                                    <li><a href="controller/salir.php"><i class="fa fa-sign-out pull-right"></i> Salir</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                               Report de entregas domiciliario
                   
                </h3>
                        </div>

                
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                
                                <div class="x_content">
                                    <h4> Lista Entregas Domiciliario</h4>
                                    <table id="tablaCrudDomic" class="table table-striped responsive-utilities jambo_table" style="width: 100%;">  
                                    
                                        <thead>
                                            <tr class="headings">
                                                <!-- <th>
                                                    <input type="checkbox" class="tableflat">
                                                </th> -->
                                                <th>Nombres</th>
                                                <th>Apellidos </th>
                                                <th>Código</th>
                                                <th>Teléfono</th>
                                                <th>Empresa</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                                <th>Cod. Barras</th>
                                        </thead>

                                        <tbody>';

            $controlusuario2 = new tbl_usuario();

            //ID_USUARIO 	NOMBRE 	APELLIDO 	IDENTIFICACION 	PASSWORD 	CELULAR 	CORREO_ELECTRONICO 	CODIGO_DE_BARRAS 	ID_ROL 	ID_ALIADOS
              $arreglo = $controlusuario2->listardomiciliarios();
            while ($row = mysqli_fetch_row($arreglo))
              {
                 echo'<tr class="even pointer">
                      <td>'.$row[1].'</td>
                      <td>'.$row[2].'</td>
                      <td>'.$row[3].'</td>
                      <td>'.$row[5].'</td>
                      <td>'.$row[9].'</td>
                      <td>
                        <a href="?e='.$row[0].'">Editar</a>
                        </td>
                        
                        
                        
                        
                        <td>';?>

                        <a onclick="javascript:return confirm('¿Desea eliminar este supervisor?');" href="?d=<?php echo $row[0]; ?>">Eliminar</a>

                         <?php echo'</td>

                        <td><form method="post" action="view/codigobarras.php">
                                            <input type="hidden" name="idcodigobarras" value = "';echo $row[7].'"/>
                                            <button input type="submit" name="button" id="button" class="btn btn-dark btn-xs "><span class="glyphicon glyphicon-barcode"></span></button>
                                            </form></td>
                      </tr>';

                }



echo'                </tbody>

                                    </table>
                                    
                                     <div class="well well-sm text-right">
                                    // <a class="btn btn-primary" href="?c=1">Nuevo Supervisor</a>
                                    </div>
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

        <script src="assets/js/bootstrap.min.js"></script>

        <!-- chart js -->
        <script src="assets/js/chartjs/chart.min.js"></script>
        <!-- bootstrap progress js -->
        <script src="assets/js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="assets/js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="assets/js/icheck/icheck.min.js"></script>

        <script src="assets/js/custompcsistel.js"></script>


        <!-- Datatables -->
        <script src="assets/js/datatables/js/jquery.dataTables.js"></script>
		<script src="assets/js/datatables/js/jquery.dataTables.responsive.js"></script>
		<!-- <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script> -->
        <!-- <script src="js/datatables/tools/js/dataTables.tableTools.js"></script> -->
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
