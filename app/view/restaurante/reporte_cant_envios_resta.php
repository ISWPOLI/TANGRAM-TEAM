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
                               Reporte Cantidad de  Envios por Cada Restaurante
                            </h3>               
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <form  action="return false" onsubmit="return false" method="POST" id="formentrar"> 
                                <div class="col-md-4 col-md-offset-4">                                       
                                     <select name="recogerestaurante" class="form-control" required id="recogerestaurante">
                                        ';
                                        $alm = $this->model2->listarrestaurantes();
                                        while ($row = mysqli_fetch_row($alm))
                                            {
                                            echo '<option value="'.$row[0].'"> '.$row[1].'</option>';
                                            }
                                        echo'    
                                      </select> 
                                      <br>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombreDom">Rango de fecha <span class="required"></span>
                                        </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">                                                      
                                                <input type="date" id="fecha1" required class="form-horizontal col-md-6 col-xs-12" name="fecha1" value="" placeholder="17/07/2017">
                                                <input type="date" id="fecha2" required class="form-horizontal col-md-6 col-xs-12" name="fecha2" value="" placeholder="17/07/2019">        
                                            </div>                                                                                                     
                                    </div>                                                
                                    <button class="btn btn-primary" onclick="Validar(document.getElementById(\'recogerestaurante\').value, document.getElementById(\'fecha1\').value, document.getElementById(\'fecha2\').value);">Ingresar</button>                                                                                                                               
                                </div>
                            </form>
                            </table>
                            <div id="resultado"></div>                                                                
                        </div>
                    </div>                                           
                </div>
            </div>    
                    <!-- footer content -->
                <footer>
                    
                </footer>
                <!-- /footer content -->
                    
            
                <!-- /page content -->
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
    http = new XMLHttpRequest();
    function Validar(recogerestaurante, fecha1, fecha2)
    {

        $.ajax({
            url: "view/restaurante/anexo_reporte_cant_envios_resta.php",
            type: "POST",
            data: "recogerestaurante="+recogerestaurante+"&fecha1="+fecha1+"&fecha2="+fecha2,
            success: function(resp)

            {
                if (resp == 1)
                {

                    window.location="../../../panel_de_control.php";
                }

                else
                {
                    $("#resultado").html(resp)
                }


            }


        });
    }
</script>

</body>

</html>
