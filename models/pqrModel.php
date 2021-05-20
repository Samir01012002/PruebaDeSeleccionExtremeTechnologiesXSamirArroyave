<?php 
require_once dirname(__DIR__).'/config/conexion/conexionToMysql.php';

class PqrModel{
	private $pqrId;
	private $type;
	private $subject;
	private $userToken;
	private $userName;
	private $status;
	private $creationDate;
	private $deadline;
	private $expired;
	private $conexion;

	function __construct(){
		$c = new Conexion();
		$this->conexion = $c->conexion;
	}

	public function getPqrId(){
		return $this->pqrId;
	}

	public function setPqrId($pqrId){
		$this->pqrId = $pqrId;
	}

	public function getType(){
		return $this->type;
	}

	public function setType($type){
		$this->type = $type;
	}

	public function getSubject(){
		return $this->subject;
	}

	public function setSubject($subject){
		$this->subject = $subject;
	}

	public function getUserToken(){
		return $this->userToken;
	}

	public function setUserToken($userToken){
		$this->userToken = $userToken;
	}

	public function getUserName(){
		return $this->userName;
	}

	public function setUserName($userName){
		$this->userName = $userName;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
	}

	public function getCreationDate(){
		return $this->creationDate;
	}

	public function setCreationDate($creationDate){
		$this->creationDate = $creationDate;
	}

	public function getDeadline(){
		return $this->deadline;
	}

	public function setDeadline($deadline){
		$this->deadline = $deadline;
	}

	public function getExpired(){
		return $this->expired;
	}

	public function setExpired($expired){
		$this->expired = $expired;
	}

	private function convertirUTF8($array){
		array_walk_recursive($array,function(&$item,$key){
			if(!mb_detect_encoding($item,'utf-8',true)){
				$item = utf8_encode($item);
			}
		});
		return $array;
	}

	public function createPQR(){
		$sqlstr = "INSERT INTO pqr (type, subject, userToken, userName, status, creationDate, deadLine, expired) VALUES ('".$this->getType()."', '".$this->getSubject()."','".$this->getUserToken()."','".$this->getUserName()."', '".$this->getStatus()."','".$this->getCreationDate()."','".$this->getDeadline()."','false')";
		$result = $this->conexion->query($sqlstr);
		if ($result != false) {
			return 'created';
		}
		return $result;
	}

	public function listPqrByUserToken(){
		$sqlstr = "SELECT * FROM pqr WHERE userToken = '".$this->getUserToken()."'";
		$results = $this->conexion->query($sqlstr);
		$resultArray = array();
		foreach ($results as $key) {
			$resultArray[] = $key;
		}
		return json_encode($this->convertirUTF8($resultArray));
	}

	public function listPqrByAdmin(){
		$sqlstr = "SELECT * FROM pqr";
		$results = $this->conexion->query($sqlstr);
		$resultArray = array();
		foreach ($results as $key) {
			$resultArray[] = $key;
		}
		return json_encode($this->convertirUTF8($resultArray));
	}

	public function startPQRById(){
		$sqlstr = "UPDATE pqr SET status = 'En progreso' WHERE id = ".$this->getPqrId();
		$result = $this->conexion->query($sqlstr);
		if ($result != false) {
			return 'Started';
		}
		return $result;
	}

	public function closePQRById(){
		$sqlstr = "UPDATE pqr SET status = 'Cerrado' WHERE id = ".$this->getPqrId();
		$result = $this->conexion->query($sqlstr);
		if ($result != false) {
			return 'Closed';
		}
		return $result;
	}

	public function deletePQRById(){
		$sqlstr = "DELETE FROM pqr WHERE id = ".$this->getPqrId();
		$result = $this->conexion->query($sqlstr);
		if ($result != false) {
			return 'Deleted';
		}
		return $result;
	}

}

?>