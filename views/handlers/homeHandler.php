<?php
session_start();
require_once '../../controllers/pqrController.php';

//bad response
$response =  array("success"  => false, "data" => null);


/*  -------------  USER   ------------- */

//createPQR
if (isset($_GET['createPQR']) && isset($_POST['type'])  && isset($_POST['subject'])) {
    $todayDate = date("d-m-Y");
	$obj = array(
		"type"  => $_POST['type'],
		"subject"  => $_POST['subject'],
		"userToken"  => $_SESSION['userToken'],
    "userName"  => $_SESSION['userName'],
		"status"  => 'Nuevo',
    "creationDate"  => $todayDate,
		"deadLine"  => generateDeadLine($todayDate, $_POST['type']),
    "expired" => 'false'
	);

	if (checkDataCreatePQR($obj)) {
		$pqrController = new PqrController();
		$response = $pqrController->createPQKController($obj);
		echo json_encode($response);
	}else{
		echo json_encode($response);
	};
}

//listPQRByUserToken
if (isset($_GET['listPQRByUserToken']) && isset($_GET['userToken'])) {
	$obj = array(
		"userToken"  => $_SESSION['userToken'],
	);

	if (checkDataListPQRByUserToken($obj)) {
		$pqrController = new PqrController();
		$response = $pqrController->listPqrByUserToken($obj);
		echo json_encode($response);
	}else{
		echo json_encode($response);
	};
}

if (isset($_GET['deletePQRById']) && isset($_GET['PQRId'])) {
	if (checkIfIsNotAdmin()) {

		$obj = array(
			"PQRId"  => $_GET['PQRId']
		);
		$pqrController = new PqrController();
		$response = $pqrController->deletePQRById($obj);
		echo json_encode($response);
	}else{
		echo json_encode($response);
	};
}

/*  -------------  USER END   ------------- */

/*  -------------  ADMIN   ------------- */

//listPQRByAdmin
if (isset($_GET['listPQRByAdminRol'])) {

	if (checkIfIsAdmin()) {
		$pqrController = new PqrController();
		$response = $pqrController->listPqrByAdmin();
		echo json_encode($response);
	}else{
		echo json_encode($response);
	};
}

if (isset($_GET['startPQRById']) && isset($_GET['PQRId'])) {
	if (checkIfIsAdmin()) {
		$obj = array(
			"PQRId"  => $_GET['PQRId']
		);
		$pqrController = new PqrController();
		$response = $pqrController->startPQRById($obj);
		echo json_encode($response);
	}else{
		echo json_encode($response);
	};
}

if (isset($_GET['closePQRById']) && isset($_GET['PQRId'])) {
	if (checkIfIsAdmin()) {
		$obj = array(
			"PQRId"  => $_GET['PQRId']
		);
		$pqrController = new PqrController();
		$response = $pqrController->closePQRById($obj);
		echo json_encode($response);
	}else{
		echo json_encode($response);
	};
}

/*  -------------  ADMIN END  ------------- */

//functions extra
function generateDeadLine($today, $type){
	$sumday = '0';
	switch ($type) {
		case 'Petición':
			$sumday = '7';
			break;
		
		case 'Queja':
			$sumday = '3';
			break;

		case 'Reclamo':
			$sumday = '2';
			break;
	}
	$modDate = strtotime($today."+ ". $sumday ." days");
	return date("d-m-Y",$modDate);
}

//validations
function checkDataCreatePQR($obj){
	if($obj['type'] != '' && $obj['subject'] != '' && $obj['userToken'] != '' && $obj['userName'] != '' && $obj['status'] != '' && $obj['expired'] != ''){
		return true;
	}
	return false;
}

function checkDataListPQRByUserToken($obj){
	if($obj['userToken'] != ''){
		return true;
	}
	return false;
}

function checkIfIsAdmin(){
	if($_SESSION['rol'] == 'ADMIN'){
		return true;
	}
	return false;
}

function checkIfIsNotAdmin(){
	if($_SESSION['rol'] == 'USER'){
		return true;
	}
	return false;
}

?>