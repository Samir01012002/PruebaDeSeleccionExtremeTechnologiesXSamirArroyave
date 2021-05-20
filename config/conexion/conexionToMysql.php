<?php
	class Conexion{

		private $server;
		private $user;
		private $password;
		private $database;
		private $part;
		public $conexion;

		function __construct(){
			$dataList = $this->dataConexion();
			foreach ($dataList as $key => $value) {
				$this->server = $value['server'];
				$this->user = $value['user'];
				$this->password = $value['password'];
				$this->database = $value['database'];
				$this->port = $value['port'];
			}
			$this->conexion = new mysqli($this->server, $this->user, $this->password, $this->database, $this->port);
			if ($this->conexion->connect_errno) {
				echo "<b>Conexion ERROR</b>";
				die();
			}
		}

		function dataConexion(){
			$direccion = dirname(__DIR__);
			$jsondata = file_get_contents($direccion . "/utils/" . "dbConfig");
			return json_decode($jsondata, true);
		}
	}
?>
