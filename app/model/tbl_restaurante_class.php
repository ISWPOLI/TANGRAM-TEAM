<?php

require_once 'databasemysql_class.php';

Class tbl_restaurante {

	private $ID_RESTAURANTE; //int(11)
	private $NOMBRE_SEDE; //varchar(30)
    private $activo; //int
	private $connection;

    public function __CONSTRUCT()
    {
		$this->connection = new DataBaseMysql();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New(); 
     *
     */
	public function New_tbl_restaurante($NOMBRE_SEDE){
		$this->NOMBRE_SEDE = $NOMBRE_SEDE;
		$this->activo = 1;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name; 
     *
     * @param key_table_type $key_row
     * 
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from tbl_restaurante where ID_RESTAURANTE = \"$key_row\" ");
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$this->ID_RESTAURANTE = $row["ID_RESTAURANTE"];
			$this->NOMBRE_SEDE = $row["NOMBRE_SEDE"];
            $this->activo = $row["activo"];
		}
	}

    public function Save_Active_Row_as_New()
    {
        $this->connection->RunQuery("Insert into tbl_restaurante (NOMBRE_SEDE, activo) values ('$this->NOMBRE_SEDE', '$this->activo')");
    }


	public function Save_Active_Row(){
        $this->connection->RunQuery("UPDATE tbl_restaurante set NOMBRE_SEDE = '$this->NOMBRE_SEDE', activo = '$this->activo' where ID_RESTAURANTE = '$this->ID_RESTAURANTE'");
    }


    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$this->connection->RunQuery("DELETE FROM tbl_restaurante WHERE ID_RESTAURANTE = $key_row");
	}

	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT ID_RESTAURANTE from tbl_restaurante order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["ID_RESTAURANTE"];
				$i++;
			}
	return $keys;
	}

    public function listarrestaurantes()
    {

        $result = $this->connection->RunQuery("SELECT ID_RESTAURANTE, NOMBRE_SEDE, activo from tbl_restaurante where activo = 1");
        return $result;
    }
    public function nombrerestaurante($a)
    {

        $result = $this->connection->RunQuery("SELECT  NOMBRE_SEDE from tbl_restaurante WHERE ID_RESTAURANTE = '$a'");
        return $result;
    }





	/**
	 * @return ID_RESTAURANTE - int(11)
	 */
	public function getID_RESTAURANTE(){
		return $this->ID_RESTAURANTE;
	}

	/**
	 * @return NOMBRE_SEDE - varchar(30)
	 */
	public function getNOMBRE_SEDE(){
		return $this->NOMBRE_SEDE;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setID_RESTAURANTE($ID_RESTAURANTE){
		$this->ID_RESTAURANTE = $ID_RESTAURANTE;
	}

	/**
	 * @param Type: varchar(30)
	 */
	public function setNOMBRE_SEDE($NOMBRE_SEDE){
		$this->NOMBRE_SEDE = $NOMBRE_SEDE;
	}
    public function setactivo($activa){
        $this->activo = $activa;
    }



    /**
     * Close mysql connection
     */
	public function endtbl_restaurante(){
		$this->connection->CloseMysql();
	}

    public function listarcantidadenviospordomi()
    {
        $result = $this->connection->RunQuery("select usuario.NOMBRE,usuario.APELLIDO, rest.NOMBRE_SEDE,count(*) as cantidad_de_domicilios
                                                        from randys.tbl_restaurante     rest,
                                                             randys.tbl_envio 		     envio,
                                                             randys.tbl_usuario         usuario
                                                        Where rest.ID_RESTAURANTE  			 = envio.ID_RESTAURANTE
                                                        and   envio.ID_USUARIO    			 = usuario.ID_USUARIO
                                                        group by usuario.ID_USUARIO,usuario.NOMBRE,usuario.APELLIDO");
        return $result;

    }

    public function listarcantidadenviosporrestaurante($a)
    {
        $result = $this->connection->RunQuery("select rest.NOMBRE_SEDE,usuario.NOMBRE,usuario.APELLIDO,envio.FECHA_HORA_SALIDA,envio.FECHA_HORA_LLEGADA,fact.NUMERO_FACTURA,fact.ZONA
                                                        from randys.tbl_restaurante     rest,
                                                             randys.tbl_envio 		     envio,
                                                             randys.tbl_factura         fact,
                                                             randys.tbl_envios_factura  envios_fac,
                                                             randys.tbl_usuario        usuario
                                                        Where rest.ID_RESTAURANTE  			 = envio.ID_RESTAURANTE
                                                        and   envio.ID_USUARIO     			 = usuario.ID_USUARIO
                                                        and   envio.ID_ENVIO       			 = envios_fac.ID_ENVIO
                                                        and   envios_fac.ID_FACTURA 		 = fact.ID_FACTURA
                                                        and rest.ID_RESTAURANTE = '$a'");
        return $result;

    }

    public function listardomiciliariosactivosporrestaurante($fecha, $idresta)
    {
        $result = $this->connection->RunQuery("select distinct usuariop.NOMBRE, usuariop.APELLIDO,
                                                               DATE_FORMAT(registro.FECHA_HORA_LLEGADA,'%r') hora_llegada,
                                                              (select count(*) as cantidad_de_domicilios
                                                                    from randys.tbl_restaurante     rest1,
                                                                         randys.tbl_envio 		     envio1,
                                                                         randys.tbl_usuario         usuario
                                                                    Where rest1.ID_RESTAURANTE  			 = envio.ID_RESTAURANTE
                                                                    and   envio1.ID_USUARIO     			 = usuariop.ID_USUARIO
                                                                    and usuario.ID_USUARIO 				 = usuariop.ID_USUARIO
                                                                    and DATE_FORMAT(envio.FECHA_HORA_SALIDA,'%Y-%m-%d') = '$fecha') cantidad_domicilios,
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
                                                        and   rest.ID_RESTAURANTE = '$idresta'
                                                        and   DATE_FORMAT(envio.FECHA_HORA_SALIDA,'%Y-%m-%d') = '$fecha'
                                                        and   DATE_FORMAT(registro.FECHA_HORA_LLEGADA,'%Y-%m-%d') = '$fecha'");
        return $result;

    }

    public function listardomiciliariosactivosporrestauranteconenvioactivo($fecha, $idresta)
    {
        $result = $this->connection->RunQuery("select distinct usuariop.celular ,usuariop.NOMBRE, usuariop.APELLIDO,
                                                       DATE_FORMAT(registro.FECHA_HORA_LLEGADA,'%r') hora_llegada,
                                                      (select count(*) as cantidad_de_domicilios
                                                            from randys.tbl_restaurante     rest1,
                                                                 randys.tbl_envio 		     envio1,
                                                                 randys.tbl_usuario         usuario
                                                            Where rest1.ID_RESTAURANTE  			 = envio.ID_RESTAURANTE
                                                and   envio1.ID_USUARIO     			 = usuariop.ID_USUARIO
                                                and usuario.ID_USUARIO 				 = usuariop.ID_USUARIO
                                                and DATE_FORMAT(envio1.FECHA_HORA_SALIDA,'%Y-%m-%d') = '$fecha') cantidad_domicilios,
                                                           estado.DESCRIPCION_ESTADO
                                                from randys.tbl_restaurante          rest,
                                                     randys.tbl_envio 		         envio,
                                                     randys.tbl_usuario         	 usuariop,
                                                     randys.tbl_estado_domiciliarios estado,
                                                     randys.tbl_registro_laboral     registro
                                                Where rest.ID_RESTAURANTE  			 = envio.ID_RESTAURANTE
                                                and  ( usuariop.ID_USUARIO			 = estado.ID_USUARIO
                                                    and estado.ID_ESTADO_DOMICILIARIOS in
                                                (select max(ID_ESTADO_DOMICILIARIOS)
                                                                                        from tbl_estado_domiciliarios c  where c.ID_USUARIO = estado.ID_USUARIO) )
                                                and   registro.ID_USUARIO            = usuariop.ID_USUARIO
                                                and   rest.ID_RESTAURANTE = '$idresta'
                                                and   DATE_FORMAT(envio.FECHA_HORA_SALIDA,'%Y-%m-%d') = '$fecha'
                                                and   DATE_FORMAT(registro.FECHA_HORA_LLEGADA,'%Y-%m-%d') = '$fecha'
                                                and   DATE_FORMAT(registro.FECHA_HORA_LLEGADA,'%Y-%m-%d') = '0000-00-00'");
        return $result;

    }
    public function listarenviosporrestauranterangofecha($idresta, $fecha1, $fecha2 )
    {
        $result = $this->connection->RunQuery("select
                                                DATE_FORMAT(envio.FECHA_HORA_SALIDA,'%d-%m-%y') fecha,
                                                DATE_FORMAT(envio.FECHA_HORA_SALIDA,'%h-%i-%s') hora_salida,
                                                DATE_FORMAT(envio.FECHA_HORA_LLEGADA,'%h-%i-%s') hora_llegada,
                                                envio.ID_ENVIO,
                                                (SELECT NOMBRE FROM tbl_usuario WHERE ID_USUARIO = envio.ID_USUARIO),
                                                (SELECT APELLIDO FROM tbl_usuario WHERE ID_USUARIO = envio.ID_USUARIO),
                                                count(*) as cantidad_de_domicilios
                                                from randys.tbl_restaurante     rest,
                                                randys.tbl_envio 		     envio,
                                                randys.tbl_usuario         usuario
                                                Where rest.ID_RESTAURANTE  			 = envio.ID_RESTAURANTE
                                                and   envio.ID_USUARIO     			 = usuario.ID_USUARIO
                                                and  DATE_FORMAT(envio.FECHA_HORA_LLEGADA,'%Y-%m-%d') between  '$fecha1' and '$fecha2'
                                                and    rest.ID_RESTAURANTE = '$idresta'
                                                group by
                                                envio.FECHA_HORA_SALIDA,
                                                envio.FECHA_HORA_LLEGADA,
                                                envio.ID_ENVIO,
                                                usuario.ID_USUARIO;");
        return $result;

    }





}








