<?php
include("../../lib/quiz.class.php");
include_once("../../lib/Student.class.php");
session_start();

$currdt = date('Y-m-d H:i:s');
$studentObj = unserialize($_SESSION['MAMA']);
$societyName = $studentObj->getSocietyName();

$host = $_SESSION['host'];
$user = $_SESSION['user']; 
$pass = $_SESSION['pass']; 
$dbname = $_SESSION['dbname'];
$con = mysqli_connect($host, $user, $pass, $dbname);

$quiz = new Quiz();
function formGenerator($quiz, $con) {
    // type 0->text questions with option
    // type-1 ->text questions without option
    // type-2 ->image based question with option
    // type-3 ->image based question without option
    $i = 0;
    $questionCount = $quiz->getTotalCount();
    $html = "";
    while($i < $questionCount) { 
        list($questionText, $qnid, $type, $correctans) = $quiz->getNextQuestion();
        $html .= "<div id=questiontext>";
        if($type == 2 || $type == 3)
            $html .= "<img src ='$questionText' width=200 height=200>";
        else
            $html .= "<b>$questionText</b>";
        $html .= "</div>";
        
        if($type == 0 || $type == 2) {
			$optvalue = 'A';
	        $option = $quiz->getOptions($qnid,$con);
	        foreach($option as $opt) {
				$html .=  $optvalue.") ". $opt . "</b><br>";
				$optvalue++;
			}
	    }
	    $html .= "<input type = text name = answer$qnid><br><br>";
	    $i++;
	}
	return $html;
}
if($quiz->generateQuiz($currdt, $societyName, $con)) {
	$quizName = $quiz->getQuizName();
	$quizid = $quiz->getQuizId();
	echo "<h1>$quizName</h1>";
	$html = "";
	$html .= "<div id=quizcontent>";
	$html .= "<form method = post id = quizform>";
	$html .= "<input type=hidden name=comptid value=$quizid>";
	$html .= formGenerator($quiz, $con);
	$html .= "<div><input type = submit id = submit value=submit></div>";
	$html .= "</form></div>";
	echo $html;
}
echo "<script src= ./js/jquery.js></script>";
echo "<script src = ./js/quiz.js></script>";

		
?>
