<?php
//print_r($GLOBALS);
$questionid = $_GET['qnid'];
$comptid = $_GET['comptid'];
session_start();
//echo $questionid;
$host = $_SESSION['host'];
$user = $_SESSION['user']; 
$pass = $_SESSION['pass']; 
$dbname = $_SESSION['dbname'];
//echo $host."---".$user."---".$pass."----".$dbname;
$con = $con = mysqli_connect($host, $user, $pass, $dbname);
$result = $con->query("select * from code_ques where ques_id = '$questionid'") or die("died");
$row = mysqli_fetch_array($result);
$questionPath = $row['ques_url'];
$f = fopen($questionPath,"r");
$questionText = "";
$questionText .= "<div id=questiontext>";


while($charac = fread($f,500))
   $questionText .= $charac;

$questionText .= "</div>";
echo $questionText;
$html = "";
$html .= "<form name = code-submission method = POST id = code-submission>";
$html .= "<input type = hidden name = questionid value = $questionid>";
$html .= "<input type = hidden name = comptid value = $comptid>";
$html .= "<input type = radio name = lang[] id = lang value = c checked> C";
$html .= "<input type = radio name = lang[] id = lang value = c++> C++";
$html .= "<input type = radio name = lang[] id = lang value = java> JAVA<br>";
$html .= "<textarea rows=20 cols=75 id=user-solution name=user-solution></textarea><br>";
$html .= "<input type = submit id = submit-button></form>";
echo $html;
include_once("../../lib/Coding.class.php");
echo Coding :: showLeaderBoard($comptid);
echo "<link href=./css/coding.css rel=stylesheet>";
echo "<script src=./js/jquery.js></script>"; 
echo "<script src=./js/problem.js></script>";
 
?>

