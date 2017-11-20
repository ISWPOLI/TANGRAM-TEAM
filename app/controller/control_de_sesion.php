<?php
/**
 * Created by PhpStorm.
 * User: DEPTO SISTEMAS
 * Date: 3/10/2017
 * Time: 8:41 AM
 */
class control_de_sesion
{
    private $rolusuario;
    private $rolrecurso;
    private $idrestaurante;

    public function __construct($rolrecurso, $rolusuario)
    {
        $this->rolrecurso = $rolrecurso;
        $this->rolusuario =  $rolusuario;
        //$this->idrestaurante = $_SESSION['id_restaurante'];  $_SESSION['Id_Usuario']
    }
    public function compruebasessionidrestaurante()
    {
        if (isset($_SESSION['id_restaurante']))
        {
            $this->idrestaurante = $_SESSION['id_restaurante'];
        }
        else
        {
            header ('Location:index.php');

        }
    }

    public function compruebasessionrolusuario()
    {
        if ($this->rolusuario  > $this->rolrecurso)
        {
            header ('Location:index.php');
        }

    }


}