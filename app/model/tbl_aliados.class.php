<?php

require_once 'databasemysql_class.php';

Class tbl_aliados {

	private $ID_ALIADOS; //int(11)
	private $NOMBRE; //varchar(30)
	private $connection;
	private $activo;

	public function __construct(){
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_tbl_aliados($NOMBRE){
		$this->NOMBRE = $NOMBRE;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_r){
		$result = $this->connection->RunQuery("Select * from tbl_aliados where ID_ALIADOS = \"$key_r\" ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->ID_ALIADOS = $row["ID_ALIADOS"];
			$this->NOMBRE = $row["NOMBRE"];
            $this->activo = $row["activo"];
		}
	}

    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$this->connection->RunQuery("DELETE FROM tbl_aliados WHERE ID_ALIADOS = $key_row");
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT ID_ALIADOS from tbl_aliados order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["ID_ALIADOS"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return ID_ALIADOS - int(11)
	 */
	public function getID_ALIADOS(){
		return $this->ID_ALIADOS;
	}

	/**
	 * @return NOMBRE - varchar(30)
	 */
	public function getNOMBRE(){
		return $this->NOMBRE;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setID_ALIADOS($ID_ALIADOS){
		$this->ID_ALIADOS = $ID_ALIADOS;
	}

	/**
	 * @param Type: varchar(30)
	 */
	public function setNOMBRE($NOMBRE){
		$this->NOMBRE = $NOMBRE;
	}
    public function setactivo($NOMBRE){
        $this->activo = $NOMBRE;
    }

    /**
     * Close mysql connection
     */
	public function endtbl_aliados(){
		$this->connection->CloseMysql();
	}
    public function listaraliados()
    {

        $result = $this->connection->RunQuery("SELECT ID_ALIADOS, NOMBRE, activo from tbl_aliados where activo = 1");
        return $result;
    }
    public function Save_Active_Row_as_New()
    {
        $this->connection->RunQuery("Insert into tbl_aliados (NOMBRE, activo) values ('$this->NOMBRE', '$this->activo')");
    }


    public function Save_Active_Row(){
        $this->connection->RunQuery("UPDATE tbl_aliados set NOMBRE = '$this->NOMBRE', activo = '$this->activo' where ID_ALIADOS = '$this->ID_ALIADOS'");
    }

}