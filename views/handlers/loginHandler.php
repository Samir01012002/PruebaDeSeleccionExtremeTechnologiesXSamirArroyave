<?php
session_start();
require_once '../../controllers/userController.php';

//bad response
$response =  array("success"  => false, "data" => null);

//login
if (isset($_POST['user']) && isset($_POST['password'])) {
	$obj = array(
		"userName"  => $_POST['user'],
		"password"  => $_POST['password']
	);
	if (checkDataLogin($obj)) {
		$userController = new UserController();
		$response = $userController->loginController($obj);
		echo json_encode($response);	
	}else{
		echo json_encode($response);
	}
}

//signup
if (isset($_GET['signup']) && isset($_POST['userName'])  && isset($_POST['rol']) && isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['name'])) {
	$obj = array(
		"userName"  => $_POST['userName'],
		"name"  => $_POST['name'],
		"phone"  => $_POST['phone'],
		"password"  => $_POST['password'],
		"rol"  => $_POST['rol']
	);

	if (checkDataSignup($obj)) {
		$userController = new UserController();
		$response = $userController->signupController($obj);
		echo json_encode($response);
	}else{
		echo json_encode($response);
	};
}

//logout
if (isset($_GET['logout'])) {
	session_destroy();
	echo json_encode("success:true");
}

//validations
function checkDataLogin($obj){
	if($obj['userName'] != '' && $obj['password'] != ''){
		return true;
	}
	return false;
}

function checkDataSignup($obj){
	if($obj['userName'] != '' && $obj['password'] != '' && $obj['rol'] != '' && $obj['phone'] != '' && $obj['name'] != ''){
		return true;
	}
	return false;
}


?>