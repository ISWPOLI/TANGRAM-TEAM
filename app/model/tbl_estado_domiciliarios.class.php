<?php
/*
 * Author: Rafael Rocha - www.rafaelrocha.net - info@rafaelrocha.net
 *
 * Create Date: 1-10-2017
 *
 * Version of MYSQL_to_PHP: 1.1
 *
 * License: LGPL
 *
 */
require_once 'databasemysql_class.php';

Class tbl_estado_domiciliarios
{

    private $ID_ESTADO_DOMICILIARIOS; //int(11)
    private $ID_USUARIO; //int(11)
    private $DESCRIPCION; //varchar(20)
    private $connection;

    public function __construct()
    {
        $this->connection = new DataBaseMysql();
    }

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */
    public function New_tbl_estado_domiciliarios($ID_USUARIO, $DESCRIPCION)
    {
        $this->ID_USUARIO = $ID_USUARIO;
        $this->DESCRIPCION = $DESCRIPCION;
    }

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name;
     *
     * @param key_table_type $key_row
     *
     */
    public function Load_from_key($key_row)
    {
        $result = $this->connection->RunQuery("Select * from tbl_estado_domiciliarios where ID_ESTADO_DOMICILIARIOS = \"$key_row\" ");
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $this->ID_ESTADO_DOMICILIARIOS = $row["ID_ESTADO_DOMICILIARIOS"];
            $this->ID_USUARIO = $row["ID_USUARIO"];
            $this->DESCRIPCION = $row["DESCRIPCION_ESTADO"];
        }
    }

    public function Save_Active_Row_as_New()
    {
        $this->connection->RunQuery("Insert into tbl_estado_domiciliarios (ID_USUARIO, DESCRIPCION_ESTADO) values ('$this->ID_USUARIO', '$this->DESCRIPCION')");
    }

    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
    public function Delete_row_from_key($key_row)
    {
        $this->connection->RunQuery("DELETE FROM tbl_estado_domiciliarios WHERE ID_ESTADO_DOMICILIARIOS = $key_row");
    }

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
    public function GetKeysOrderBy($column, $order)
    {
        $keys = array();
        $i = 0;
        $result = $this->connection->RunQuery("SELECT ID_ESTADO_DOMICILIARIOS from tbl_estado_domiciliarios order by $column $order");
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $keys[$i] = $row["ID_ESTADO_DOMICILIARIOS"];
            $i++;
        }
        return $keys;
    }

    /**
     * @return ID_ESTADO_DOMICILIARIOS - int(11)
     */
    public function getID_ESTADO_DOMICILIARIOS()
    {
        return $this->ID_ESTADO_DOMICILIARIOS;
    }

    /**
     * @return ID_USUARIO - int(11)
     */
    public function getID_USUARIO()
    {
        return $this->ID_USUARIO;
    }

    /**
     * @return DESCRIPCION ESTADO - varchar(20)
     */
    public function getDESCRIPCION()
    {
        return $this->DESCRIPCION;
    }

    /**
     * @param Type : int(11)
     */
    public function setID_ESTADO_DOMICILIARIOS($ID_ESTADO_DOMICILIARIOS)
    {
        $this->ID_ESTADO_DOMICILIARIOS = $ID_ESTADO_DOMICILIARIOS;
    }

    /**
     * @param Type : int(11)
     */
    public function setID_USUARIO($ID_USUARIO)
    {
        $this->ID_USUARIO = $ID_USUARIO;
    }

    /**
     * @param Type : varchar(20)
     */
    public function setDESCRIPCION($DESCRIPCION)
    {
        $this->DESCRIPCION = $DESCRIPCION;
    }

    /**
     * Close mysql connection
     */


    public function ultimoestadodomi($a)
    {
        $result1 = $this->connection->RunQuery("SELECT DESCRIPCION_ESTADO  FROM randys.tbl_estado_domiciliarios where ID_USUARIO = '$a' order by ID_ESTADO_DOMICILIARIOS desc limit 1");
        $result2=mysqli_fetch_row($result1);
        $result = $result2[0];
        return $result;

    }


    public function endtbl_estado_domiciliarios()
    {
        $this->connection->CloseMysql();
    }

}