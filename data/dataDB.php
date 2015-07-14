<?php

	require_once "loginData.php"; 
	
	$loginData = new LoginData(); 

	define('HOST', $loginData->host );
	define('USER', $loginData->user );
	define('PASS', $loginData->pass );
	define('DB', $loginData->db );

	class ClaseBD{
		private $conexion;
		public $error='';
		
		public function ClaseBD(){
		$this->conexion= new mysqli(HOST,USER,PASS,DB);
			if($this->conexion->connect_errno){
				$this->error='Error en acceso a la BD: '
						.$this->conexion->connect_error;
				return false;
			}else{
				$this->conexion->set_charset("utf8");
				return true;
			}
		}
		
		public function executeQuery($SQL){
			//echo "¡Hola!";
			$res=$this->conexion->query($SQL, MYSQL_ASSOC);
			if ($this->conexion->errno!=0) 
				die($this->conexion->error.'('.$this->conexion->errno.')');
			$filas=array();
			while($reg=mysqli_fetch_assoc($res)){
				$filas[]=$reg;//
			}
			return $filas;
		}
		
		public function executeUpdate($SQL){
			if($this->conexion->query($SQL)){
				return $this->conexion->affected_rows;
			}else{
				if ($this->conexion->errno!=0) 
					die($this->conexion->error.'('.$this->conexion->errno.')');
				return false;
			}
		}
		
		public function executeInsert($SQL){
			if($this->conexion->query($SQL)){
				return $this->conexion->insert_id;
			}else{
				if ($this->conexion->errno!=0) 
					die($this->conexion->error.'('.$this->conexion->errno.')');
				return false;
			}
		}

		public function executeDelete($SQL){
			if($this->conexion->query($SQL)){
				return $this->conexion->affected_rows;
			}else{
				if ($this->conexion->errno!=0) 
					die($this->conexion->error.'('.$this->conexion->errno.')');
				return false;
			}
		}
	}

?>
