<?php
include_once 'controllers/userController.php';
include_once 'controllers/pqrController.php';
session_start();

if (!$_SESSION) {
	if (isset($_GET['signup'])) {
		include_once(__DIR__.'/views/signup.php');
	}else{
		include_once(__DIR__.'/views/login.php');
	}
}else{
	include_once(__DIR__.'/views/home.php');

}

?>
