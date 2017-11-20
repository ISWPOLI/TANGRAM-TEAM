<?php

Class DataBaseMysql {

	public $conn;

	public function DataBaseMysql(){
		$this->conn = new mysqli("localhost", "contaconta", "RadR8chad3AD", "randys");
		if($this->conn->connect_error){
			echo "Error connect to mysql";die;
		}
	}
	
	public function RunQuery($query_tag){
		$result = $this->conn->query($query_tag) or die("Erro SQL query-> $query_tag  ". mysql_error());
		return $result;
	}

	public function TotalOfRows($table_name){
		$result = $this->RunQuery("Select * from $table_name");
		return $result->num_rows;
	}

	public function CloseMysql(){
		$this->conn->close();
	}

}

?>