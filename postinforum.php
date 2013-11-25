<?php
include("./lib/Student.class.php");
session_start();

if($_SESSION['MAMA'] && isset($_POST['docomment'])) {
	$host = $_SESSION['host'];
	$user = $_SESSION['user']; 
	$pass = $_SESSION['pass']; 
	$dbname = $_SESSION['dbname'];
	$studentObject = unserialize($_SESSION['MAMA']);
	$con = mysqli_connect($host, $user, $pass, $dbname);
    $studentId = $studentObject->getRollNo();
    $studentName = $studentObject->getName();
    $postid = $_POST['postid'];
    $commentText = $_POST['multi_comment'];
    $commentInsert = "insert into comments values (NULL,'$commentText',$postid, $studentId,CURRENT_TIMESTAMP)";
    $con->query($commentInsert);
    $affectedRows = mysqli_affected_rows($con);
    $html = "";
    if ($affectedRows == 1) {
		$html .= "<div class = commentpost>";
		$html .= $commentText . " by " . $studentName;
		$html .= "</div>";		
        $html .= "<div class = commentpost>";
		$html .= "<form name=commentForm$postid method=post action=forum.php>";
		$html .= "<input type=hidden value=$postid name=postid>";
		$html .= "<input type=text placeholder='comment on post' name = 'multi_comment'>";
		$html .= "<input type = submit value = comment>";
	    $html .= "</form></div>";
	    echo $html;
	}
	return;
}



$studentObject = unserialize($_SESSION['MAMA']);
$rollNo = $studentObject->getRollNo();
$societyName = $studentObject->getSocietyName();
$postedItem = $_POST['dopost'];
$studentName = $studentObject->getName();
$host = $_SESSION['host'];
$user = $_SESSION['user']; 
$pass = $_SESSION['pass']; 
$dbname = $_SESSION['dbname'];
$con = mysqli_connect($host, $user, $pass, $dbname);

$insertsql = "INSERT INTO  Forum  VALUES (NULL ,  '$postedItem',  $rollNo, CURRENT_TIMESTAMP ,  '$societyName')";
$queryResult = $con->query($insertsql);
$res = mysqli_affected_rows($con);
$postid = mysqli_insert_id($con);
$html = "";
if($res == 1) {
	    $html .= "<div class = forumpost>";
	    $html .= "<div class = userpost>";
	    $html .= "<b>".$postedItem."</b> by <b>$studentName</b></div>";
	    $html .= "</div></div>";
	    
	    $html .= "<div class = commentpost>";
		$html .= "<form name=commentForm$postid method=post action=forum.php>";
		$html .= "<input type=hidden value=$postid name=postid>";
		$html .= "<input type=text placeholder='comment on post' name = 'multi_comment'>";
		$html .= "<input type = submit value = comment>";
	    $html .= "</form></div>";
	    echo $html;
}
?>
