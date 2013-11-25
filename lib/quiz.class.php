<?php
class Quiz {
	var $quizId;
	var $quizName;
	var $quizSociety;
	var $questionRecords;
	var $tracker;
	var $totalCount;
	var $lastCorrectAns;
	function getTotalCount() {
		return $this->totalCount;
	}
	function getTracker() {
		return $this->tracker;
	}
	
	function getAllQuestion($con) {
	    $quizid =  $this->quizId;
	    $queryQnNo = "select count(*) as totQn from Quiz_question where quizid = $quizid";
	    $result = $con->query($queryQnNo);
	    $row = mysqli_fetch_array($result);
	    $this->totalCount = $row['totQn'];
	    $query_for_question = "select * from Quiz_question where quizid = $quizid";
	    return $con->query($query_for_question);	
	}
	
	function generateQuiz($todayDate, $society, $con) {
		$genquizUrl = "select *,count(*) as count from Quiz where society='$society' and '$todayDate' between startdate and enddate ";
		$result = $con->query($genquizUrl) or die("cant query");
		
		$row = mysqli_fetch_array($result);
		$count = $row['count'];
		if($count == 1) {
			$this->quizId = $row['quizid'];
			$this->quizName = $row['Name'];
			$this->quizSociety = $society;
		    $this->questionRecords = $this->getAllQuestion($con);
		    $this->tracker = 0;
		    return true;
		}
		return false;
	}
	public function getQuizName() {
		return $this->quizName;
	}
	function getQuizId() {
		return $this->quizId;
	}
	function getNextQuestion() {
		$row = mysqli_fetch_array($this->questionRecords);
		$questionText = $row['questionText'];
		$qnid = $row['qnid'];
		$type = $row['type'];
		$this->lastCorrectAns = $row['correctans'];
		return array($questionText, $qnid, $type, $this->lastCorrectAns);
	}
	function getOptions($qnid, $con) {
		$queryForOptions = "select options from Quiz_question_option where qnid = $qnid";
		$result = $con->query($queryForOptions);
		$option = array();
		$i = 0;
		while($row = mysqli_fetch_array($result)) {
			$option[$i++] = $row['options'];
		}
		return $option;
	}
	static function getAnswers($comptid, $con) {
	    $checkans = "select correctans from Quiz_question where quizid = $comptid";
	    $result = $con->query($checkans);
	    return $result;
	    $row = mysqli_fetch_array($result);
	    echo $row['correctans'];
	}
}
