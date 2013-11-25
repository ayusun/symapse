<?php
include("../../lib/quiz.class.php");
include("../../lib/Student.class.php");
session_start();
$comptid = $_POST['comptid'];

$host = $_SESSION['host'];
$user = $_SESSION['user']; 
$pass = $_SESSION['pass']; 
$dbname = $_SESSION['dbname'];
$con = mysqli_connect($host, $user, $pass, $dbname);
$studentObj = unserialize($_SESSION['MAMA']);
$rollno = $studentObj->getRollNo();

$quizResult = Quiz :: getAnswers($comptid, $con);
$score = 0;
$step = 0;

foreach($_POST as $key => $value) {
	if($step!=0) {
	    $qnid = substr($key, 6);
	    $useranswer = $value;
	    $row = mysqli_fetch_array($quizResult);
	    $correctanswer = $row['correctans'];
	    if($correctanswer == $useranswer) {
	        $score++;
	    }
    }
    $step++;
}

$quizusertrack = "insert into Quiz_user values($comptid, $rollno, $score)";
$con->query($quizusertrack);
$affectedRows = mysqli_affected_rows($con);
if($affectedRows == 1)
	 echo "Thank you for Taking the Quiz";
else
    echo "Sorry it seems like you have already taken the quiz";

?>
