<?php
/**
 * Created by PhpStorm.
 * User: Dancito
 * Date: 9/10/2017
 * Time: 10:57 PM
 */
$a = 121212121212;
if (isset($_POST['idcodigobarras']))
{
    $a = $_POST['idcodigobarras'];
}
echo'<!DOCTYPE html>
<html lang="es">
	<head>
		<title>codigo de barra</title>
        
        <meta charset="utf-8" />
        
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../assets/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="../assets/js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="../assets/css/style.css" />
        
        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	</head>
    <body>
        
    <div class="container">

            <div class="row">
                <div class="col-xs-12">
                    <hr />
                    
                    <table>
                        <tr>
                           <td>
                                <img src="https://barcode.tec-it.com/barcode.ashx?translate-esc=off&data='.$a.'&code=EAN13&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0" alt="Barcode Generator TEC-IT"/>
                           </td>
                           <td style="padding:10px; text-align:center; font-size:15px; font-family:Arial,Helvetica;">
                                
                                <br/>
                                <h1>Codigo barras Domiciliario</h1>
                            </td>
                            
                        </tr>
                    </table>
                  
                    <footer class="text-center well">
                     <a href=javascript:window.print();><button type="button"  class="btn btn-danger">Imprimir Código Barras</button></a> </p>
                    </footer>    
                    
                     <footer class="text-center well">                                        
                        <p><a href="../domiciliarios.php"><button type="button"  class="btn btn-success">Volver a Domiciliarios</button></a> </p>
                    </footer>  
                </div>    
            </div>
        </div>

        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="../assets/js/ini.js"></script>

    </body>
</html>';