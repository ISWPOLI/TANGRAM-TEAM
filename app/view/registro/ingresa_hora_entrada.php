<?php


echo'


<!--  /*========================================== BODY  ==============================================*/  -->
<body >
<section id="ingreso" class="logcontrolhora">';

if (isset($_REQUEST['t']))
{
    echo '<div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Hora de entrada</strong> ';
    echo date('H:i:s').' registrada exitosamente!!!';
    echo'</div>';
}
if (isset($_REQUEST['s']))
{
    echo '<div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Hora de Salida</strong> ';
    echo date('H:i:s').' registrada exitosamente!!!';
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

if (isset($_REQUEST['x']))
{
    echo '<div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Domiciliario</strong> ';
    echo 'ya registro su entrada y salida por el dia de hoy';
    echo'</div>';
}

echo'
    <h1 class="wow bounce animated bounceInLeft">Registro Jornada Laboral</h1>
    <div class="loginform">
        <h2>Registro Domiciliario</h2>
        <form action="registro_jornada.php" method="post" id="formentrar">
            <input type="number" autofocus id="horaIngreso" name="barrasdomi" value="" placeholder="Pin Domiciliario" required>
             <button type="submit" name = "botonEnvHoraIng" class="btn btn-primary" onclick="" value = "" ><i class="fa fa-arrow-circle-right"></i></button>
            <div class="secenviar">
              
                <div class="clear"></div>
            </div>
                        
        </form>
        <a href="controller/restaurantedesdeenvio.php"><button type="button"  class="btn btn-default"> Volver al Restaurante</button></a>
    </div>

    
</section>

</body>
';


