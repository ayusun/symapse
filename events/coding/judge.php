<?php
//include_once("./session.php");
$qnid = $_POST['questionid'];
$comptid = $_POST['comptid'];
$langSelected = $_POST['lang'][0];
$usercode = $_POST['user-solution'];
session_start();

$host = $_SESSION['host'];
$user = $_SESSION['user']; 
$pass = $_SESSION['pass']; 
$dbname = $_SESSION['dbname'];
$con = mysqli_connect($host, $user, $pass, $dbname);

include_once("../../lib/Student.class.php");
$studentObj = unserialize($_SESSION['MAMA']);
$studentId = $studentObj->getRollNo();

include_once("../../lib/" . $langSelected . "code.class.php");  // Loading language module
$classname = ucfirst($langSelected) . "code";
$judgeObject = new $classname($studentId, $comptid, $qnid, $usercode);
$result = $judgeObject->evaluateUserCode();
if($result) {
    echo "Congratulations. Right answer";
    // add the details to code_user table
    $queryForRightCode = "insert into code_user values ($comptid, $studentId, $qnid)";
    $con->query($queryForRightCode);
}    
else
    echo $judgeObject->showErrormsg();
?>
