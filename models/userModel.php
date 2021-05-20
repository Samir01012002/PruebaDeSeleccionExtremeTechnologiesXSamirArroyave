<?php
require_once dirname(__DIR__).'/config/conexion/conexionToMysql.php';

class UserModel{

	private $userId;
	private $nameAndLastname;
	private $userName;
	private $userPassword;
	private $token;
	private $phone;
	private $rol;
	private $conexion;

	function __construct(){
		$c = new Conexion();
		$this->conexion = $c->conexion;

	}

	function getNameAndLastname(){
		return $this->nameAndLastname;
	}

	function setNameAndLastname($nameAndLastname){
		$this->nameAndLastname = $nameAndLastname;
	}

	function getUserId(){
		return $this->userId;
	}

	function setUserId($userId){
		$this->userId = $userId;
	}

	function getUserName(){
		return $this->userName;
	}

	function setUserName($userName){
		$this->userName = $userName;
	}

	function getUserPassword(){
		return $this->userPassword;
	}

	function setUserPassword($userPassword){
		$this->userPassword = $userPassword;
	}

	function getToken(){
		return $this->token;
	}

	function setToken($token){
		$this->token = $token;
	}

	function getPhone(){
		return $this->phone;
	}

	function setPhone($phone){
		$this->phone = $phone;
	}

	function getRol(){
		return $this->rol;
	}

	function setRol($rol){
		$this->rol = $rol;
	}

	function makeToken($userN){
		return md5($userN);
	}

	function encriptPassword($password){
		return md5($password);
	}

	private function convertirUTF8($array){
		array_walk_recursive($array,function(&$item,$key){
			if(!mb_detect_encoding($item,'utf-8',true)){
				$item = utf8_encode($item);
			}
		});
		return $array;
	}

	public function login(){
		$sqlstr = "SELECT name,userName, userToken,phone,rol FROM users WHERE userName = '".$this->getUserName()."' AND password = '".$this->encriptPassword($this->getUserPassword())."'";
		$result = $this->conexion->query($sqlstr);
		$row = $result->fetch_assoc();
		$resultArray = $row;
		return $resultArray;
	}

	public function signup(){
		$sqlstr = "INSERT INTO users (name, userName, phone, password, userToken, rol) VALUES ('".$this->getNameAndLastname()."', '".$this->getUserName()."','".$this->getPhone()."','".$this->encriptPassword($this->getUserPassword())."', '".$this->makeToken($this->getUserName())."','".$this->getRol()."')";
		$result = $this->conexion->query($sqlstr);
		if ($result != false) {
			return 'created';	
		}
		return $result;
	}


}

?>