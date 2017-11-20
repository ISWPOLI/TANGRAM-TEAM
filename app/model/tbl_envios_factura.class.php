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

Class tbl_envios_factura
{

    private $ID_ENVIOS_FACTURA; //int(11)
    private $ID_ENVIO; //int(11)
    private $ID_FACTURA; //int(11)
    private $connection;

    public function tbl_envios_factura()
    {
        $this->connection = new DataBaseMysql();
    }

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */
    public function New_tbl_envios_factura($ID_ENVIO, $ID_FACTURA)
    {
        $this->ID_ENVIO = $ID_ENVIO;
        $this->ID_FACTURA = $ID_FACTURA;
    }

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name;
     *
     * @param key_table_type $key_row
     *
     */
    public function Load_from_key($key_row)
    {
        $result = $this->connection->RunQuery("Select * from tbl_envios_factura where ID_ENVIOS_FACTURA = \"$key_row\" ");
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $this->ID_ENVIOS_FACTURA = $row["ID_ENVIOS_FACTURA"];
            $this->ID_ENVIO = $row["ID_ENVIO"];
            $this->ID_FACTURA = $row["ID_FACTURA"];
        }
    }

    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
    public function Delete_row_from_key($key_row)
    {
        $this->connection->RunQuery("DELETE FROM tbl_envios_factura WHERE ID_ENVIOS_FACTURA = $key_row");
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
        $result = $this->connection->RunQuery("SELECT ID_ENVIOS_FACTURA from tbl_envios_factura order by $column $order");
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $keys[$i] = $row["ID_ENVIOS_FACTURA"];
            $i++;
        }
        return $keys;
    }

    /**
     * @return ID_ENVIOS_FACTURA - int(11)
     */
    public function getID_ENVIOS_FACTURA()
    {
        return $this->ID_ENVIOS_FACTURA;
    }

    /**
     * @return ID_ENVIO - int(11)
     */
    public function getID_ENVIO()
    {
        return $this->ID_ENVIO;
    }

    /**
     * @return ID_FACTURA - int(11)
     */
    public function getID_FACTURA()
    {
        return $this->ID_FACTURA;
    }

    /**
     * @param Type : int(11)
     */
    public function setID_ENVIOS_FACTURA($ID_ENVIOS_FACTURA)
    {
        $this->ID_ENVIOS_FACTURA = $ID_ENVIOS_FACTURA;
    }

    /**
     * @param Type : int(11)
     */
    public function setID_ENVIO($ID_ENVIO)
    {
        $this->ID_ENVIO = $ID_ENVIO;
    }

    /**
     * @param Type : int(11)
     */
    public function setID_FACTURA($ID_FACTURA)
    {
        $this->ID_FACTURA = $ID_FACTURA;
    }

    /**
     * Close mysql connection
     */
    public function endtbl_envios_factura()
    {
        $this->connection->CloseMysql();
    }

    public function Save_Active_Row_as_New()
    {
        $this->connection->RunQuery("INSERT INTO randys.tbl_envios_factura
                                                            (ID_ENVIO,
                                                            ID_FACTURA)
                                                            VALUES
                                                            ('$this->ID_ENVIO' ,
                                                            '$this->ID_FACTURA' )");


    }
}