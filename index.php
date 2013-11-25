<?php
include_once("./lib/Student.class.php");
include_once("./session.php");
if(!isset($_SESSION['MAMA'])) {
    include "./login.php";
}
else
{	$studentObject = unserialize($_SESSION['MAMA']);
	$role = $studentObject->getRole();
	if($role == 'admin')
		include "./admin.php";
	else
		include "./home.php";
}
?>
