<?php
require_once dirname(__DIR__).'/models/pqrModel.php';

class PqrController{
	private $response =  array("success"  => false, "data" => null);

	public function createPQKController($dataObj){
    if ($this->validateCreatePQRData($dataObj)) {
      $pqrModel = new PqrModel();
      $pqrModel->setType($dataObj['type']);
      $pqrModel->setSubject($dataObj['subject']);
      $pqrModel->setUserToken($dataObj['userToken']);
      $pqrModel->setUserName($dataObj['userName']);
      $pqrModel->setStatus($dataObj['status']);
      $pqrModel->setCreationDate($dataObj['creationDate']);
      $pqrModel->setDeadline($dataObj['deadLine']);
      $pqrModel->setExpired($dataObj['expired']);
      $createPqrDataResponse = $pqrModel->createPQR();
      if ($createPqrDataResponse != null) {
        $this->response['success'] = true;
        $this->response['data'] = json_encode($createPqrDataResponse);
        return $this->response;
      }
    }
    return $this->response;
  }

  public function listPqrByUserToken($dataObj){
    $pqrModel = new PqrModel();
    $pqrModel->setUserToken($dataObj['userToken']);
    $listPqrByUserTokenDataResponse = $pqrModel->listPqrByUserToken();
    if ($listPqrByUserTokenDataResponse != null) {
      $this->response['success'] = true;
      $this->response['data'] = json_encode($listPqrByUserTokenDataResponse);
      return $this->response;
    }
  }

  public function listPqrByAdmin(){
    $pqrModel = new PqrModel();
    $listPqrByAdminDataResponse = $pqrModel->listPqrByAdmin();
    if ($listPqrByAdminDataResponse != null) {
      $this->response['success'] = true;
      $this->response['data'] = json_encode($listPqrByAdminDataResponse);
      return $this->response;
    }
  }

  public function startPQRById($dataObj){
    if ($this->checkIfIsAdmin()) {
      $pqrModel = new PqrModel();
      $pqrModel->setPqrId($dataObj['PQRId']);
      $createPqrDataResponse = $pqrModel->startPQRById();
      if ($createPqrDataResponse != null) {
        $this->response['success'] = true;
        $this->response['data'] = json_encode($createPqrDataResponse);
        return $this->response;
      }
    }
    return $this->response;
  }

  public function closePQRById($dataObj){
    if ($this->checkIfIsAdmin()) {
      $pqrModel = new PqrModel();
      $pqrModel->setPqrId($dataObj['PQRId']);
      $createPqrDataResponse = $pqrModel->closePQRById();
      if ($createPqrDataResponse != null) {
        $this->response['success'] = true;
        $this->response['data'] = json_encode($createPqrDataResponse);
        return $this->response;
      }
    }
    return $this->response;
  }

  public function deletePQRById($dataObj){
    if ($this->checkIfIsNotAdmin()) {
      $pqrModel = new PqrModel();
      $pqrModel->setPqrId($dataObj['PQRId']);
      $createPqrDataResponse = $pqrModel->deletePQRById();
      if ($createPqrDataResponse != null) {
        $this->response['success'] = true;
        $this->response['data'] = json_encode($createPqrDataResponse);
        return $this->response;
      }
    }
    return $this->response;
  }

  public function checkIfIsAdmin(){
    if($_SESSION['rol'] == 'ADMIN'){
      return true;
    }
    return false;
  }

  public function checkIfIsNotAdmin(){
    if($_SESSION['rol'] == 'USER'){
      return true;
    }
    return false;
  }

  private function validateCreatePQRData($data){
  	return true;
  }
}
?>