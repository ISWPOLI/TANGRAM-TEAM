<?php
/**
 * Created by PhpStorm.
 * User: Dancito
 * Date: 11/11/2017
 * Time: 3:09 PM
 */
require 'model/tbl_rol.class.php';

class RolController
{
    public $model3;

    public function __CONSTRUCT()
    {
        $this->model3 = new tbl_rol();
    }

}
