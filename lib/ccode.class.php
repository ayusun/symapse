<?php
include_once("../../lib/Coding.class.php");
/**
 * The class is an extension to base class Coding. This class is used 
 * for managing Compiling and running C Files.
 */ 
class CCode extends Coding{
	
	/**
	 * @var String Compilation command for C
	 * @access Protected
	 */ 
	var $compileScript;
	/**
	 * @var String Execution command for this file
	 * @access Protected
	 */ 
	var $runScript;
	function __construct($userid, $comptid, $qnid, $userCode) {
		$this->userid = $userid;
		$this->comptid = $comptid;
		$this->qnid = $qnid;
		$this->userCode = $userCode;
		$this->filename = $this->userid . "_" . $this->comptid . "_" . $this->qnid;
		$this->ext = "c";
		$this->saveUserCode();
		$this->runScript = "./solution/" . $this->filename;
		$this->compileScript = "gcc " . "./solution/" . $this->filename . ".c -o solution/" .  $this->filename;
	}
	function getActualSolutionUrl(){
	    return "./actualsolutions/" . $this->comptid . "_" . $this->qnid;
	}
	function getFilename() {
	    return $this->filename;
	}
	
	function getCompileScript() {
		return $this->compileScript;
	}
	
	function getUserCode() {
		return $this->userCode;
	}
	
	function getRunScript() {
		return $this->runScript;
	}
}
?>
