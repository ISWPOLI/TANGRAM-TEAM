<?php

require_once 'databasemysql_class.php';

Class tbl_usuario {

	private $ID_USUARIO; //int(11)
	private $NOMBRE; //varchar(20)
	private $APELLIDO; //varchar(20)
	private $IDENTIFICACION; //int(11)
	private $PASSWORD; //varchar(20)
	private $CELULAR; //int(11)
	private $CORREO_ELECTRONICO; //varchar(33)
	private $CODIGO_DE_BARRAS; //varchar(45)
	private $ID_ROL; //int(11)
	private $ID_ALIADOS; //int(11)
	private $connection;

	public function __construct()
    {
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_tbl_usuario($NOMBRE,$APELLIDO,$IDENTIFICACION,$PASSWORD,$CELULAR,$CORREO_ELECTRONICO,$CODIGO_DE_BARRAS,$ID_ROL,$ID_ALIADOS){
		$this->NOMBRE = $NOMBRE;
		$this->APELLIDO = $APELLIDO;
		$this->IDENTIFICACION = $IDENTIFICACION;
		$this->PASSWORD = $PASSWORD;
		$this->CELULAR = $CELULAR;
		$this->CORREO_ELECTRONICO = $CORREO_ELECTRONICO;
		$this->CODIGO_DE_BARRAS = $CODIGO_DE_BARRAS;
		$this->ID_ROL = $ID_ROL;
		$this->ID_ALIADOS = $ID_ALIADOS;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from tbl_usuario where ID_USUARIO = \"$key_row\" ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->ID_USUARIO = $row["ID_USUARIO"];
			$this->NOMBRE = $row["NOMBRE"];
			$this->APELLIDO = $row["APELLIDO"];
			$this->IDENTIFICACION = $row["IDENTIFICACION"];
			$this->PASSWORD = $row["PASSWORD"];
			$this->CELULAR = $row["CELULAR"];
			$this->CORREO_ELECTRONICO = $row["CORREO_ELECTRONICO"];
			$this->CODIGO_DE_BARRAS = $row["CODIGO_DE_BARRAS"];
			$this->ID_ROL = $row["ID_ROL"];
			$this->ID_ALIADOS = $row["ID_ALIADOS"];
		}
	}

    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$this->connection->RunQuery("DELETE FROM tbl_usuario WHERE ID_USUARIO = $key_row");
	}

    /**
     * Update the active row table on table
     */
	public function Save_Active_Row(){
		$this->connection->RunQuery("UPDATE tbl_usuario set NOMBRE = \"$this->NOMBRE\", APELLIDO = \"$this->APELLIDO\", IDENTIFICACION = \"$this->IDENTIFICACION\", PASSWORD = \"$this->PASSWORD\", CELULAR = \"$this->CELULAR\", CORREO_ELECTRONICO = \"$this->CORREO_ELECTRONICO\", CODIGO_DE_BARRAS = \"$this->CODIGO_DE_BARRAS\", ID_ROL = \"$this->ID_ROL\", ID_ALIADOS = \"$this->ID_ALIADOS\" where ID_USUARIO = \"$this->ID_USUARIO\"");
	}

    /**
     * Save the active var class as a new row on table
     */
	public function Save_Active_Row_as_New(){
		$this->connection->RunQuery("Insert into tbl_usuario (NOMBRE, APELLIDO, IDENTIFICACION, PASSWORD, CELULAR, CORREO_ELECTRONICO, CODIGO_DE_BARRAS, ID_ROL, ID_ALIADOS) values (\"$this->NOMBRE\", \"$this->APELLIDO\", \"$this->IDENTIFICACION\", \"$this->PASSWORD\", \"$this->CELULAR\", \"$this->CORREO_ELECTRONICO\", \"$this->CODIGO_DE_BARRAS\", \"$this->ID_ROL\", \"$this->ID_ALIADOS\")");
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT ID_USUARIO from tbl_usuario order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["ID_USUARIO"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return ID_USUARIO - int(11)
	 */
	public function getID_USUARIO(){
		return $this->ID_USUARIO;
	}

	/**
	 * @return NOMBRE - varchar(20)
	 */
	public function getNOMBRE(){
		return $this->NOMBRE;
	}

	/**
	 * @return APELLIDO - varchar(20)
	 */
	public function getAPELLIDO(){
		return $this->APELLIDO;
	}

	/**
	 * @return IDENTIFICACION - int(11)
	 */
	public function getIDENTIFICACION(){
		return $this->IDENTIFICACION;
	}

	/**
	 * @return PASSWORD - varchar(20)
	 */
	public function getPASSWORD(){
		return $this->PASSWORD;
	}

	/**
	 * @return CELULAR - int(11)
	 */
	public function getCELULAR(){
		return $this->CELULAR;
	}

	/**
	 * @return CORREO_ELECTRONICO - varchar(33)
	 */
	public function getCORREO_ELECTRONICO(){
		return $this->CORREO_ELECTRONICO;
	}

	/**
	 * @return CODIGO_DE_BARRAS - varchar(45)
	 */
	public function getCODIGO_DE_BARRAS(){
		return $this->CODIGO_DE_BARRAS;
	}

	/**
	 * @return ID_ROL - int(11)
	 */
	public function getID_ROL(){
		return $this->ID_ROL;
	}

	/**
	 * @return ID_ALIADOS - int(11)
	 */
	public function getID_ALIADOS(){
		return $this->ID_ALIADOS;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setID_USUARIO($ID_USUARIO){
		$this->ID_USUARIO = $ID_USUARIO;
	}

	/**
	 * @param Type: varchar(20)
	 */
	public function setNOMBRE($NOMBRE){
		$this->NOMBRE = $NOMBRE;
	}

	/**
	 * @param Type: varchar(20)
	 */
	public function setAPELLIDO($APELLIDO){
		$this->APELLIDO = $APELLIDO;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setIDENTIFICACION($IDENTIFICACION){
		$this->IDENTIFICACION = $IDENTIFICACION;
	}

	/**
	 * @param Type: varchar(20)
	 */
	public function setPASSWORD($PASSWORD){
		$this->PASSWORD = $PASSWORD;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setCELULAR($CELULAR){
		$this->CELULAR = $CELULAR;
	}

	/**
	 * @param Type: varchar(33)
	 */
	public function setCORREO_ELECTRONICO($CORREO_ELECTRONICO){
		$this->CORREO_ELECTRONICO = $CORREO_ELECTRONICO;
	}

	/**
	 * @param Type: varchar(45)
	 */
	public function setCODIGO_DE_BARRAS($CODIGO_DE_BARRAS){
		$this->CODIGO_DE_BARRAS = $CODIGO_DE_BARRAS;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setID_ROL($ID_ROL){
		$this->ID_ROL = $ID_ROL;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setID_ALIADOS($ID_ALIADOS){
		$this->ID_ALIADOS = $ID_ALIADOS;
	}

    /**
     * Close mysql connection
     */
	public function endtbl_usuario(){
		$this->connection->CloseMysql();
	}

	public  function validarusuariologin($a, $b)
    {
        $result = $this->connection->RunQuery("SELECT COUNT(ID_USUARIO) FROM tbl_usuario WHERE CORREO_ELECTRONICO = '$a' and PASSWORD = '$b'");
        return $result;

    }
    public  function tomaridfromemail($a)
    {
        $result = $this->connection->RunQuery("SELECT ID_USUARIO FROM tbl_usuario WHERE CORREO_ELECTRONICO = '$a'");
        return $result;

    }

    public function listardomiciliarios()
    {
        $result = $this->connection->RunQuery("SELECT * FROM randys.tbl_usuario where ID_ROL = '4'");
        return $result;

    }
    public function listardespachadores()
    {
        $result = $this->connection->RunQuery("SELECT * FROM randys.tbl_usuario where ID_ROL = '3'");
        return $result;

    }
    public function listarsupervisores()
    {
        $result = $this->connection->RunQuery("SELECT * FROM randys.tbl_usuario where ID_ROL = '2'");
        return $result;

    }

    public function ultimo_codigo()
    {
        $result1 = $this->connection->RunQuery("SELECT CODIGO_DE_BARRAS FROM randys.tbl_usuario ORDER BY CODIGO_DE_BARRAS desc");
        $result2=mysqli_fetch_row($result1);
        $result = $result2[0];
        return $result;

    }
    public function idusuariofromcodigobarras($codigobarra)
    {
        $result1 = $this->connection->RunQuery("SELECT ID_USUARIO FROM randys.tbl_usuario WHERE CODIGO_DE_BARRAS = '$codigobarra' AND ID_ROL = '4'");
        $result2=mysqli_fetch_row($result1);
        $result = $result2[0];
        return $result;

    }
    public function listardomiciliariosconaliado()
    {
        $result = $this->connection->RunQuery("SELECT ID_USUARIO, nombre, APELLIDO, IDENTIFICACION, CELULAR, (select tbl_aliados.NOMBRE from tbl_aliados where tbl_aliados.ID_ALIADOS = tbl_usuario.ID_ALIADOS),CODIGO_DE_BARRAS FROM randys.tbl_usuario  where ID_ROL = '4'");
        return $result;

    }
    public function listardomiciliariosactivosdeldia($fecha, $idrestau)
    {
        $result = $this->connection->RunQuery("select distinct envio.id_envio,usuariop.NOMBRE, usuariop.APELLIDO,
                                                               DATE_FORMAT(registro.FECHA_HORA_LLEGADA,'%r') hora_llegada,
                                                              (select count(*) as cantidad_de_domicilios
                                                                    from randys.tbl_restaurante     rest1,
                                                                         randys.tbl_envio 		     envio1,
                                                                         randys.tbl_usuario         usuario
                                                                    Where rest1.ID_RESTAURANTE  			 = envio.ID_RESTAURANTE
                                                                    and   envio1.ID_USUARIO     			 = usuariop.ID_USUARIO
                                                                    and usuario.ID_USUARIO 				 = usuariop.ID_USUARIO
                                                                    and envio1.ID_ENVIO                  = envio.ID_ENVIO			
                                                                    and DATE_FORMAT(envio.FECHA_HORA_LLEGADA,'%Y-%m-%d') = '$fecha') cantidad_domicilios,
                                                                    estado.DESCRIPCION_ESTADO
                                                        from randys.tbl_restaurante          rest,
                                                             randys.tbl_envio 		         envio,
                                                             randys.tbl_usuario         	 usuariop,
                                                             randys.tbl_estado_domiciliarios estado,
                                                             randys.tbl_registro_laboral     registro
                                                        Where rest.ID_RESTAURANTE  			 = envio.ID_RESTAURANTE
                                                        and   envio.ID_USUARIO     			 = usuariop.ID_USUARIO
                                                        and  ( usuariop.ID_USUARIO			 = estado.ID_USUARIO 
                                                                                                and estado.ID_ESTADO_DOMICILIARIOS in 
                                                                                                (select max(ID_ESTADO_DOMICILIARIOS) 
                                                                                                from tbl_estado_domiciliarios c  where c.ID_USUARIO = estado.ID_USUARIO) )
                                                        and   registro.ID_USUARIO            = usuariop.ID_USUARIO
                                                        and   envio.ESTADO_ENVIO            = 1
                                                        and   rest.ID_RESTAURANTE = '$idrestau';
                                                        and   DATE_FORMAT(envio.FECHA_HORA_LLEGADA,'%Y-%m-%d') = '$fecha'
                                                        and   DATE_FORMAT(registro.FECHA_HORA_LLEGADA,'%Y-%m-%d') = '$fecha'");
        return $result;

    }
    public function listardomiciliariosdisponibles()
    {
        $result = $this->connection->RunQuery("SELECT ID_USUARIO, nombre, APELLIDO, IDENTIFICACION, CELULAR, (select tbl_aliados.NOMBRE from tbl_aliados where tbl_aliados.ID_ALIADOS = tbl_usuario.ID_ALIADOS),CODIGO_DE_BARRAS FROM randys.tbl_usuario  where ID_ROL = '4'");
        return $result;

    }

    public  function validarsiemailexiste($a)
    {
        $result = $this->connection->RunQuery("SELECT COUNT(CORREO_ELECTRONICO) FROM tbl_usuario WHERE CORREO_ELECTRONICO = '$a'");
        $retorno = mysqli_fetch_row($result);

        $result = $retorno[0];
            return $result;

    }

    public function listarenviospordomienrangofecha($idodmi, $fecha1, $fecha2)//
    {
        $result = $this->connection->RunQuery("select
                                                DATE_FORMAT(envio.FECHA_HORA_SALIDA,'%d-%i-%Y') fecha,
                                                DATE_FORMAT(envio.FECHA_HORA_SALIDA,'%h-%i-%s') hora_salida,
                                                DATE_FORMAT(envio.FECHA_HORA_LLEGADA,'%h-%i-%s') hora_llegada,
                                                envio.ID_ENVIO,
                                                (SELECT NOMBRE_SEDE FROM tbl_restaurante where ID_RESTAURANTE = rest.ID_RESTAURANTE),
                                                SEC_TO_TIME((TIMESTAMPDIFF(MINUTE , envio.FECHA_HORA_SALIDA, envio.FECHA_HORA_LLEGADA ))*60) AS tiempo_transcurrido
                                                from randys.tbl_restaurante   rest,
                                                randys.tbl_envio 		     envio,
                                                randys.tbl_usuario         usuario
                                                Where rest.ID_RESTAURANTE  			 = envio.ID_RESTAURANTE
                                                and   envio.ID_USUARIO     			 = usuario.ID_USUARIO
                                                and usuario.ID_USUARIO = '$idodmi'
                                                and  DATE_FORMAT(envio.FECHA_HORA_LLEGADA,'%Y-%m-%d') between  '$fecha1' and '$fecha2'
                                                group by
                                                envio.FECHA_HORA_SALIDA,
                                                envio.FECHA_HORA_LLEGADA,
                                                envio.ID_ENVIO,
                                                rest.ID_RESTAURANTE");
        return $result;

    }

    public function reporteeficienciadomi($idodmi, $fecha1, $fecha2)//
    {
        $result = $this->connection->RunQuery("select
                                                min(SEC_TO_TIME((TIMESTAMPDIFF(MINUTE , envio.FECHA_HORA_SALIDA, envio.FECHA_HORA_LLEGADA ))*60)) AS tiempo_minimo_hh_min_ss, 
                                                max(SEC_TO_TIME((TIMESTAMPDIFF(MINUTE , envio.FECHA_HORA_SALIDA, envio.FECHA_HORA_LLEGADA ))*60)) AS tiempo_maximo_hh_min_ss,
                                                SEC_TO_TIME(((min(TIMESTAMPDIFF(MINUTE , envio.FECHA_HORA_SALIDA, envio.FECHA_HORA_LLEGADA ))+max(TIMESTAMPDIFF(MINUTE , envio.FECHA_HORA_SALIDA, envio.FECHA_HORA_LLEGADA )))/2)*60) tiempo_promedio_hh_min_ss,
                                                 (select count(*) as cantidad_de_domicilios
                                                            from randys.tbl_restaurante     rest1,
                                                                 randys.tbl_envio 		     envio1,
                                                                 randys.tbl_usuario         usuario
                                                            Where rest1.ID_RESTAURANTE 			 = envio.ID_RESTAURANTE
                                                            and   envio1.ID_USUARIO   			 = usuariop.ID_USUARIO
                                                            and usuario.ID_USUARIO			 = usuariop.ID_USUARIO
                                                            and DATE_FORMAT(envio1.FECHA_HORA_LLEGADA,'%Y-%m-%d') between '$fecha1' and '$fecha2') cantidad_domicilios
                                                from randys.tbl_restaurante    rest,
                                                     randys.tbl_envio 		     envio,
                                                     randys.tbl_usuario         usuariop
                                                Where rest.ID_RESTAURANTE  		 = envio.ID_RESTAURANTE
                                                and   envio.ID_USUARIO       	     = usuariop.ID_USUARIO  
                                                and   envio.ESTADO_ENVIO         = 0
                                                and DATE_FORMAT(envio.FECHA_HORA_LLEGADA,'%Y-%m-%d') between '$fecha1' and '$fecha2'
                                                group by
                                                usuariop.ID_USUARIO
                                                having usuariop.ID_USUARIO = '$idodmi'");
        return $result;

    }






}