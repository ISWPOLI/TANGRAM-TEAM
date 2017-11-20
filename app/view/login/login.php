<?php
/**
 * Created by PhpStorm.
 * User: Dancito
 * Date: 30/09/2017
 * Time: 10:17 PM
 */
echo ').value);">Ingresar</button>
			<div class="clear"></div>
			</div>
			<div id="resultado"></div>
		</form>
	</div>

<div class="container-1">
	<row class="text-center">
<a class="naranjapcsistel" href="index.php"><i class="fa fa-home fa-2x"></i> Volver a Inicio</a><br/>
	</row>
	</div>
		</section>
		<script>
            function Validar(user, pass)
            {
                $.ajax({
                    url: "controller/validarlogin.php",
                    type: "POST",
                    data: "user="+user+"&pass="+pass,
                    success: function(resp)

                    {


                        if (resp == 1)
                        {

                            window.location="../../panel_de_control.php";
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
';
