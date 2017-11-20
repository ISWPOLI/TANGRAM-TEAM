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

Class tbl_registro_laboral {

	private $ID_REGISTRO_LABORAL; //int(11)
	private $ID_USUARIO; //int(11)
	private $FECHA_HORA_LLEGADA; //date
	private $FECHA_HORA_SALIDA; //date
	private $connection;

	public function __construct(){
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_tbl_registro_laboral($ID_USUARIO,$FECHA_HORA_LLEGADA,$FECHA_HORA_SALIDA){
		$this->ID_USUARIO = $ID_USUARIO;
		$this->FECHA_HORA_LLEGADA = $FECHA_HORA_LLEGADA;
		$this->FECHA_HORA_SALIDA = $FECHA_HORA_SALIDA;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     *
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from tbl_registro_laboral where ID_REGISTRO_LABORAL = \"$key_row\" ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->ID_REGISTRO_LABORAL = $row["ID_REGISTRO_LABORAL"];
			$this->ID_USUARIO = $row["ID_USUARIO"];
			$this->FECHA_HORA_LLEGADA = $row["FECHA_HORA_LLEGADA"];
			$this->FECHA_HORA_SALIDA = $row["FECHA_HORA_SALIDA"];
		}
	}

    public function Save_Active_Row_as_New()
    {
        $this->connection->RunQuery("Insert into tbl_registro_laboral (ID_USUARIO, FECHA_HORA_LLEGADA, FECHA_HORA_SALIDA) values ('$this->ID_USUARIO', '$this->FECHA_HORA_LLEGADA ', '$this->FECHA_HORA_SALIDA')");
    }


    public function Save_Active_Row(){
        $this->connection->RunQuery("UPDATE tbl_registro_laboral set ID_USUARIO = '$this->ID_USUARIO', FECHA_HORA_LLEGADA = '$this->FECHA_HORA_LLEGADA' , FECHA_HORA_SALIDA = '$this->FECHA_HORA_SALIDA'where ID_REGISTRO_LABORAL = '$this->ID_REGISTRO_LABORAL'");
    }



    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$this->connection->RunQuery("DELETE FROM tbl_registro_laboral WHERE ID_REGISTRO_LABORAL = $key_row");
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT ID_REGISTRO_LABORAL from tbl_registro_laboral order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["ID_REGISTRO_LABORAL"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return ID_REGISTRO_LABORAL - int(11)
	 */
	public function getID_REGISTRO_LABORAL(){
		return $this->ID_REGISTRO_LABORAL;
	}

	/**
	 * @return ID_USUARIO - int(11)
	 */
	public function getID_USUARIO(){
		return $this->ID_USUARIO;
	}

	/**
	 * @r
	 */
	public function getFECHA_HORA_LLEGADA(){
		return $this->FECHA_HORA_LLEGADA;
	}

	/**
	 *
	 */
	public function getFECHA_HORA_SALIDA(){
		return $this->FECHA_HORA_SALIDA;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setID_REGISTRO_LABORAL($ID_REGISTRO_LABORAL){
		$this->ID_REGISTRO_LABORAL = $ID_REGISTRO_LABORAL;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setID_USUARIO($ID_USUARIO){
		$this->ID_USUARIO = $ID_USUARIO;
	}

	/**
	 * @param Type: date
	 */
	public function setFECHA_HORA_LLEGADA($FECHA_HORA_LLEGADA){
		$this->FECHA_HORA_LLEGADA = $FECHA_HORA_LLEGADA;
	}

	/**
	 * @param Type: date
	 */
	public function setFECHA_HORA_SALIDA($FECHA_HORA_SALIDA){
		$this->FECHA_HORA_SALIDA = $FECHA_HORA_SALIDA;
	}

    public function verificasihoraentrada($a)
    {

       $phpdate  = date('Y-m-d');

       $result1 = $this->connection->RunQuery("SELECT ID_REGISTRO_LABORAL FROM randys.tbl_registro_laboral where DATE_FORMAT(FECHA_HORA_LLEGADA,'%Y-%m-%d') = '$phpdate'  and ID_USUARIO = '$a'");
        $result2=mysqli_fetch_row($result1);
        $result = $result2[0];
        return $result;
    }
    public function verificasihorasalida($a)
    {

        $phpdate  = date('Y-m-d');

        $result1 = $this->connection->RunQuery("SELECT ID_REGISTRO_LABORAL FROM randys.tbl_registro_laboral where DATE_FORMAT(FECHA_HORA_SALIDA,'%Y-%m-%d') = '$phpdate'  and ID_USUARIO = '$a'");
        $result2=mysqli_fetch_row($result1);
        $result = $result2[0];
        return $result;
    }


    /**
     * Close mysql connection
     */
	public function endtbl_registro_laboral(){
		$this->connection->CloseMysql();
	}

}