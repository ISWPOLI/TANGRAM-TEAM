<?php


echo'


<!--  /*========================================== BODY  ==============================================*/  -->
<body >
<section id="ingreso" class="logpedido">';


if (isset($_REQUEST['x']))
{
    echo '<div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Envio Entregado</strong> ';
    echo ' Reportado exitosamente!!!';
    echo'</div>';
}
if (isset($_REQUEST['p']))
{
    echo '<div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Domiciliario</strong> ';
    echo ' No encontrado!!!';
    echo'</div>';
}

if (isset($_REQUEST['t']))
{
    echo '<div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Domiciliario</strong> ';
    echo ' Se encuentra disponible!!!, No tiene envio por reportar';
    echo'</div>';
}

echo'
    <h1 class="wow bounce animated bounceInLeft">Reporte Envio Entregado</h1>
    <div class="loginform">
        <h2>Registre el domiciliario</h2>
        <form action="recojeenvio.php" method="post" id="formentrar">
            <input type="number" autofocus id="pedido" name="barrasdomiciliario" value="" placeholder="pin domiciliario." required>
             <button type="submit" name = "botonenviodomi" class="btn btn-primary" onclick="capturarDatosPedido()" value = "4" ><i class="fa fa-arrow-circle-right"></i></button>
            <div class="secenviar">
              
                <div class="clear"></div>
            </div>
                        
        </form>
        <a href="controller/restaurantedesdeenvio.php"><button type="button"  class="btn btn-default"> Volver al Restaurante</button></a>
    </div>

    
</section>

</body>
';


