<?php 
require_once dirname(__DIR__).'/models/userModel.php';
 
 class UserController{

  private $response =  array("success"  => false, "data" => null);
    
  public function loginController($dataObj){
    if ($this->validateLoginDataObj($dataObj)) {
      $userModel = new UserModel();
      $userModel->setUserName($dataObj['userName']);
      $userModel->setUserPassword($dataObj['password']);
      $loginDataResponse = $userModel->login();
      if ($loginDataResponse != null) {
        $this->makeSession($loginDataResponse);
        $this->response['success'] = true;
        $this->response['data'] = json_encode($loginDataResponse);
        return $this->response;
      }
    }
    return $this->response;
  }

  public function makeSession($loginData){
    $_SESSION['name'] = $loginData['name'];
    $_SESSION['userName'] = $loginData['userName'];
    $_SESSION['userToken'] = $loginData['userToken'];
    $_SESSION['rol'] = $loginData['rol'];
  }

  public function signupController($dataObj){
    if ($this->validateLoginDataObj($dataObj)) {
      $userModel = new UserModel();
      $userModel->setUserName($dataObj['userName']);
      $userModel->setUserPassword($dataObj['password']);
      $userModel->setNameAndLastname($dataObj['name']);
      $userModel->setPhone($dataObj['phone']);
      $userModel->setRol($dataObj['rol']);
      $loginDataResponse = $userModel->signup();
      if ($loginDataResponse != '[]') {
        $this->response['success'] = true;
        $this->response['data'] = $loginDataResponse;
        return $this->response;
      }
    }
    return $this->response;
  }

  private function validateLoginDataObj($obj){
    if (isset($obj['userName']) && isset($obj['password'])) {
      return true;
    }
    return false;
  }

 }

?>