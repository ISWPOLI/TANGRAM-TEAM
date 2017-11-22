<?php


require_once 'databasemysql_class.php';

Class tbl_envio {

	private $ID_ENVIO; //int(11)
	private $ID_USUARIO; //int(11)
	private $ID_RESTAURANTE; //int(11)
	private $FECHA_HORA_LLEGADA; //date
	private $FECHA_HORA_SALIDA; //date
    private $ESTADO_ENVIO; //INT
	private $connection;

	public function __construct(){
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_tbl_envio($ID_USUARIO,$ID_RESTAURANTE,$FECHA_HORA_LLEGADA,$FECHA_HORA_SALIDA,$ESTADO_ENVIO ){
		$this->ID_USUARIO = $ID_USUARIO;
		$this->ID_RESTAURANTE = $ID_RESTAURANTE;
		$this->FECHA_HORA_LLEGADA = $FECHA_HORA_LLEGADA;
		$this->FECHA_HORA_SALIDA = $FECHA_HORA_SALIDA;
		$this->ESTADO_ENVIO = $ESTADO_ENVIO;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from tbl_envio where ID_ENVIO = \"$key_row\" ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->ID_ENVIO = $row["ID_ENVIO"];
			$this->ID_USUARIO = $row["ID_USUARIO"];
			$this->ID_RESTAURANTE = $row["ID_RESTAURANTE"];
			$this->FECHA_HORA_LLEGADA = $row["FECHA_HORA_LLEGADA"];
			$this->FECHA_HORA_SALIDA = $row["FECHA_HORA_SALIDA"];
            $this->ESTADO_ENVIO = $row["ESTADO_ENVIO"];
		}
	}

    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$this->connection->RunQuery("DELETE FROM tbl_envio WHERE ID_ENVIO = $key_row");
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT ID_ENVIO from tbl_envio order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["ID_ENVIO"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return ID_ENVIO - int(11)
	 */
	public function getID_ENVIO(){
		return $this->ID_ENVIO;
	}

	/**
	 * @return ID_USUARIO - int(11)
	 */
	public function getID_USUARIO(){
		return $this->ID_USUARIO;
	}

	/**
	 * @return ID_RESTAURANTE - int(11)
	 */
	public function getID_RESTAURANTE(){
		return $this->ID_RESTAURANTE;
	}

	/**
	 * @return FECHA_HORA_LLEGADA - date
	 */
	public function getFECHA_HORA_LLEGADA(){
		return $this->FECHA_HORA_LLEGADA;
	}

	/**
	 * @return FECHA_HORA_SALIDA - date
	 */
	public function getFECHA_HORA_SALIDA(){
		return $this->FECHA_HORA_SALIDA;
	}
    public function getESTADO_ENVIO(){
        return $this->ESTADO_ENVIO;
    }

	/**
	 * @param Type: int(11)
	 */
	public function setID_ENVIO($ID_ENVIO){
		$this->ID_ENVIO = $ID_ENVIO;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setID_USUARIO($ID_USUARIO){
		$this->ID_USUARIO = $ID_USUARIO;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setID_RESTAURANTE($ID_RESTAURANTE){
		$this->ID_RESTAURANTE = $ID_RESTAURANTE;
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

    public function setESTADO_ENVIO($ESTADO_ENVIO){
        $this->ESTADO_ENVIO = $ESTADO_ENVIO;
    }

    /**
     * Close mysql connection
     */
	public function endtbl_envio(){
		$this->connection->CloseMysql();
	}
    public function Save_Active_Row_as_New(){
        $this->connection->RunQuery("INSERT INTO randys.tbl_envio
                                                            (ID_USUARIO,
                                                            ID_RESTAURANTE,
                                                            FECHA_HORA_LLEGADA,
                                                            FECHA_HORA_SALIDA,
                                                            ESTADO_ENVIO)
                                                            VALUES
                                                            ('$this->ID_USUARIO ' ,
                                                            '$this->ID_RESTAURANTE' ,
                                                            '$this->FECHA_HORA_LLEGADA' ,
                                                            '$this->FECHA_HORA_SALIDA', 
                                                            '$this->ESTADO_ENVIO')");
    }

    public function Save_Active_Row()
    {
            $this->connection->RunQuery("UPDATE tbl_envio set ID_USUARIO = '$this->ID_USUARIO', ID_RESTAURANTE = '$this->ID_RESTAURANTE', 
            FECHA_HORA_LLEGADA = '$this->FECHA_HORA_LLEGADA', FECHA_HORA_SALIDA = '$this->FECHA_HORA_SALIDA', ESTADO_ENVIO = '$this->ESTADO_ENVIO' WHERE ID_ENVIO = '$this->ID_ENVIO'");
    }


    public function ultimaidenvio()
    {
        $result1 = $this->connection->RunQuery("select max(ID_ENVIO) from randys.tbl_envio");
        $result2=mysqli_fetch_row($result1);
        $result = $result2[0];
        return $result;

    }
    public function idultimoenviodomi($a)
    {
        $result1 = $this->connection->RunQuery("select ID_ENVIO from tbl_envio where ID_USUARIO = '$a' order by ID_ENVIO desc limit 1 ");
        $result2=mysqli_fetch_row($result1);
        $result = $result2[0];
        return $result;

    }
    public function listarenviospordomiciliariodesdedomi($codigobarra, $fecha1, $fecha2, $idrestau) //  fecha 	hora_salida 	hora_llegada 	ID_ENVIO
    {
        $result = $this->connection->RunQuery("select 
                                                        DATE_FORMAT(envio.FECHA_HORA_SALIDA,'%d-%m-%Y') fecha,
                                                        DATE_FORMAT(envio.FECHA_HORA_SALIDA,'%h-%i-%s') hora_salida,
                                                        DATE_FORMAT(envio.FECHA_HORA_LLEGADA,'%h-%i-%s') hora_llegada,
                                                        envio.ID_ENVIO
                                                        from randys.tbl_restaurante     rest,
                                                             randys.tbl_envio		     envio,
                                                             randys.tbl_usuario         usuario
                                                        Where rest.ID_RESTAURANTE  			 = envio.ID_RESTAURANTE
                                                        and   envio.ID_USUARIO    			 = usuario.ID_USUARIO
                                                        and usuario.CODIGO_DE_BARRAS = '$codigobarra'
                                                        and  DATE_FORMAT(envio.fecha_hora_llegada,'%Y-%m-%d') between  '$fecha1' and '$fecha2'
                                                        
                                                        and    rest.ID_RESTAURANTE = '$idrestau'
                                                        group by 
                                                        envio.FECHA_HORA_SALIDA,
                                                        envio.FECHA_HORA_LLEGADA,
                                                        envio.ID_ENVIO;");
        return $result;

    }
    public function listarenviosactivosporreestaurante($idrestau, $fecha) //  fecha 	hora_salida 	hora_llegada 	ID_ENVIO
    {
        $result = $this->connection->RunQuery("select 
                                                            envio.ID_ENVIO,
                                                            concat(usuario.NOMBRE,' ', usuario.apellido) NOMBRE,
                                                            envio.FECHA_HORA_SALIDA,
                                                            SEC_TO_TIME((TIMESTAMPDIFF(MINUTE , envio.FECHA_HORA_SALIDA, NOW() ))*60) AS tiempo_transcurrido
                                                            from randys.tbl_restaurante     rest,
                                                                 randys.tbl_envio 		     envio,
                                                                 randys.tbl_usuario        usuario
                                                            Where rest.ID_RESTAURANTE  			 = envio.ID_RESTAURANTE
                                                            and   envio.ID_USUARIO     			 = usuario.ID_USUARIO
                                                            and    rest.ID_RESTAURANTE = '$idrestau'
                                                            and   envio.ESTADO_ENVIO =  1
                                                            and   DATE_FORMAT(envio.FECHA_HORA_SALIDA,'%Y-%m-%d') =  '$fecha' 
                                                            group by 
                                                            envio.FECHA_HORA_SALIDA,
                                                            envio.FECHA_HORA_LLEGADA,
                                                            envio.ID_ENVIO,
                                                            rest.ID_RESTAURANTE");
        return $result;

    }


}

