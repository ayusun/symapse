<?php

/**
 * This class handles student data
 */
class Student {
	/**
	 * @var String Student name
	 * @access Protected
	 */
	var $name;
	/**
	 * @var String Student photo url
	 * @access Protected
	 */
	var $photo_url;
	/**
	 * @var String Student's branch
	 * @access Protected
	 */
	var $branch;
	/**
	 * @var String Student roll no
	 * @access Protected
	 */
	var $rollno;  // This probably needs to be checked if it can be converted to integer or not
	/**
	 * @var String Student mail Id
	 * @access Protected
	 */
	var $mailid;
	/**
	 * @var Integer Student phone no
	 * @access Protected
	 */
	var $phoneno;
	/**
	 * @var String Student Society name
	 * @access Protected
	 */
	var $society_name;
	/**
	 * @var Integer Student batch
	 * @access Protected
	 */
	var $batch;
	/**
	 * @var String Role of the student
	 * @access Protected
	 */
	var $role;
	
	function __construct($name, $photo_url, $branch, $rollno, $mailid, $phoneno, $society, $batch,$role) {
		$this->name = $name;
		$this->photo_url = $photo_url;
		$this->branch = $branch;
		$this->rollno = $rollno;
		$this->mailid = $mailid;
		$this->phoneno = $phoneno;
		$this->society_name = $society;
		$this->batch = $batch;
		$this->role = $role;
	}
	
	function getName() {
        return $this->name;
    }
    
    function getPhoto() {
		return $this->photo_url;
    }
    
    function getBranch() {
		return $this->branch;
    }
    
    function getRollNo() {
		return $this->rollno;
    }
    
    function getMailId() {
        return $this->mailid;
    }
    
    function getPhoneNo() {
        return $this->phoneno;
    }
    
    function getSocietyName() {
        return $this->society_name;
    }
    
    function getBatch() {
		return $this->batch;
    }
    function getRole() {
		return $this->role;
	}
    static function getSelectedStudentName($con, $studentId) {
        //$con = mysqli_connect($host, $user, $pass, $dbname);
	    $res = $con->query("select name from Student where rollno = $studentId");
	    $row = mysqli_fetch_array($res);
	    return $row['name'];
    }
}
