<?php
session_start();
require_once '../model/tbl_usuario.class.php';
$arranque = new Validarlogin();
$arranque->arranque();

class Validarlogin
{
    private $User;
    private $Contrasena;
    private $salida;
    
    function arranque()
    {
      $this->User = $_POST['user'];
      $this->Contrasena = $_POST['pass'];
      $validar = new tbl_usuario() ;
      $retorno = mysqli_fetch_row($validar->validarusuariologin($this->User, $this->Contrasena));

       if  ($retorno[0] == 1)
        {
            $this->salida= mysqli_fetch_row($validar->tomaridfromemail($_POST['user']));
            $_SESSION['Id_Usuario'] = $this->salida[0];
            echo 1;  
                   
        }
        else
        {
            echo '<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
            </button><strong>Atención  </strong>El usuario o contraseña son incorrectos</div>';
        }
        	  
     }   
    
}

