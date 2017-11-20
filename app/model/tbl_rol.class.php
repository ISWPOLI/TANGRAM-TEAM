<?php

require_once 'databasemysql_class.php';

Class tbl_rol {

	private $ID_ROL; //int(11)
	private $NOMBRE_ROL; //varchar(30)
	private $connection;

	public function __construct(){
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_tbl_rol($NOMBRE_ROL){
		$this->NOMBRE_ROL = $NOMBRE_ROL;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($keys){
		$result = $this->connection->RunQuery("Select * from tbl_rol where ID_ROL = '$keys' ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->ID_ROL = $row["ID_ROL"];
			$this->NOMBRE_ROL = $row["NOMBRE_ROL"];
		}
	}

    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$this->connection->RunQuery("DELETE FROM tbl_rol WHERE ID_ROL = $key_row");
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT ID_ROL from tbl_rol order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["ID_ROL"];
				$i++;
			}
	return $keys;
	}



	/**
	 * @return ID_ROL - int(11)
	 */
	public function getID_ROL(){
		return $this->ID_ROL;
	}

	/**
	 * @return NOMBRE_ROL - varchar(30)
	 */
	public function getNOMBRE_ROL(){
		return $this->NOMBRE_ROL;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setID_ROL($ID_ROL){
		$this->ID_ROL = $ID_ROL;
	}

	/**
	 * @param Type: varchar(30)
	 */
	public function setNOMBRE_ROL($NOMBRE_ROL){
		$this->NOMBRE_ROL = $NOMBRE_ROL;
	}

    /**
     * Close mysql connection
     */
	public function endtbl_rol(){
		$this->connection->CloseMysql();
	}

}