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

Class tbl_factura {

	private $ID_FACTURA; //int(11)
	private $ID_RESTAURANTE; //int(11)
	private $NUMERO_FACTURA; //varchar(20)
	private $ZONA; //varchar(20)
	private $FECHA_FACTUA; //date
	private $connection;

	public function tbl_factura(){
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_tbl_factura($ID_RESTAURANTE,$NUMERO_FACTURA,$ZONA,$FECHA_FACTUA){
		$this->ID_RESTAURANTE = $ID_RESTAURANTE;
		$this->NUMERO_FACTURA = $NUMERO_FACTURA;
		$this->ZONA = $ZONA;
		$this->FECHA_FACTUA = $FECHA_FACTUA;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from tbl_factura where ID_FACTURA = \"$key_row\" ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->ID_FACTURA = $row["ID_FACTURA"];
			$this->ID_RESTAURANTE = $row["ID_RESTAURANTE"];
			$this->NUMERO_FACTURA = $row["NUMERO_FACTURA"];
			$this->ZONA = $row["ZONA"];
			$this->FECHA_FACTUA = $row["FECHA_FACTUA"];
		}
	}

    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$this->connection->RunQuery("DELETE FROM tbl_factura WHERE ID_FACTURA = $key_row");
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT ID_FACTURA from tbl_factura order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["ID_FACTURA"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return ID_FACTURA - int(11)
	 */
	public function getID_FACTURA(){
		return $this->ID_FACTURA;
	}

	/**
	 * @return ID_RESTAURANTE - int(11)
	 */
	public function getID_RESTAURANTE(){
		return $this->ID_RESTAURANTE;
	}

	/**
	 * @return NUMERO_FACTURA - varchar(20)
	 */
	public function getNUMERO_FACTURA(){
		return $this->NUMERO_FACTURA;
	}

	/**
	 * @return ZONA - varchar(20)
	 */
	public function getZONA(){
		return $this->ZONA;
	}

	/**
	 * @return FECHA_FACTUA - date
	 */
	public function getFECHA_FACTUA(){
		return $this->FECHA_FACTUA;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setID_FACTURA($ID_FACTURA){
		$this->ID_FACTURA = $ID_FACTURA;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setID_RESTAURANTE($ID_RESTAURANTE){
		$this->ID_RESTAURANTE = $ID_RESTAURANTE;
	}

	/**
	 * @param Type: varchar(20)
	 */
	public function setNUMERO_FACTURA($NUMERO_FACTURA){
		$this->NUMERO_FACTURA = $NUMERO_FACTURA;
	}

	/**
	 * @param Type: varchar(20)
	 */
	public function setZONA($ZONA){
		$this->ZONA = $ZONA;
	}

	/**
	 * @param Type: date
	 */
	public function setFECHA_FACTUA($FECHA_FACTUA){
		$this->FECHA_FACTUA = $FECHA_FACTUA;
	}

    /**
     * Close mysql connection
     */
	public function endtbl_factura(){
		$this->connection->CloseMysql();
	}
    public function Save_Active_Row_as_New(){
        $this->connection->RunQuery("INSERT INTO randys.tbl_factura
                                                            (ID_RESTAURANTE,
                                                            NUMERO_FACTURA,
                                                            ZONA,
                                                            FECHA_FACTUA)
                                                            VALUES
                                                            ('$this->ID_RESTAURANTE' ,
                                                            '$this->NUMERO_FACTURA' ,
                                                            '$this->ZONA' ,
                                                            '$this->FECHA_FACTUA')");
    }
    public function ultimaidfactura()
    {
        $result1 = $this->connection->RunQuery("select max(ID_FACTURA) from randys.tbl_factura");
        $result2=mysqli_fetch_row($result1);
        $result = $result2[0];
        return $result;

    }
}