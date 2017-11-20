<?php
$controlusuario3 = new UsuarioController();
$controlusuario3->model->Load_from_key($_SESSION['envio'][0]);
$nombre = (string)$controlusuario3->model->getNOMBRE();
$apellido = (string)$controlusuario3->model->getAPELLIDO();
$No = $_SESSION['cuentaenvio'];
echo'


<!--  /*========================================== BODY  ==============================================*/  -->
<body >
<section id="ingreso" class="logpedido">

    <h1 class="wow bounce animated bounceInLeft">Registro Envios</h1>
    <span class="pull-center badge bg-red"><h2 class="wow bounce animated bounceInRight">Datos envio</h2></span>
        
    <div class="loginform">
      
        <ul class="nav nav-stacked">
                    <li><h2>Domiciliario: '.$nombre.' '.$apellido.'  <span class="pull-center badge bg-green"><i class="fa fa-check"></i></span></h2></li>
                    ';
                    $a = 1;
                    if ($No >= 1)
                    {
                        while ($a < $No)
                        {
                            echo'<li><h2>-'.$a.'-Factura No: '.$_SESSION['envio'][$a].'  <span class="pull-center badge bg-green"><i class="fa fa-check"></i></span></h2></li>';
                            $a++;
                        }
                    }



                    
                   // while para imprimir factura
                                      
   echo' </div>
    
    <div class="loginform">
        <h2>Ingresar Factura</h2>
        <form action="envio.php" method="post" id="formentrar">
            <input type="number" autofocus id="pedido" name="barrasfactura" value="" placeholder="pin factura">
            <div class="secenviar">
            <div class="clear"></div>
            <br/>
               <button type="submit" name = "botonenviootrafactura" class="btn btn-primary" onclick="capturarDatosPedido()" value = "4" >Ingresar factura</button>
               <div class="clear"></div> <br/>';

                    if (isset($_SESSION['envio'][1]))
                    {
                            echo'<button type="submit" name = "botonenviofacturaterminar" class="btn btn-success"  value = "4" >Terminar</button>';
                    }

                echo'<div class="clear"></div>
            </div>
        </form>
        
        <a href="controller/restaurantedesdeenvio.php"><button type="button"  class="btn btn-default">Volver al Restaurante</button></a>
        <a href="controller/salirenvio.php"><button type="button"  class="btn btn-danger">Cancelar/Nuevo Envio</button></a>
               
        
    </div>


</section>

</body>
';

