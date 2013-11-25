<?php
/**
 * This is the base class for the online judge. To add a language support
 * all we need is to extend this class
 */ 
class Coding {
	/**
	 * @var String Language
	 * @access Protected
	 */
	var $language;
	/**
	 * @var String temporary Filename
	 * @access Protected
	 */ 
	var $tempFileName;
	/**
	 * @var String errormsg
	 * @access Protected
	 */ 
	var $errormsg = null;
	/**
	 * @var integer Student Userid
	 * @access Protected
	 */ 
	var $userid;
	/**
	 * @var integer Competation Id
	 * @access Protected
	 */ 
	var $comptid;
	/**
	 * @var String QuestionId
	 * @access Protected
	 */ 
	var $qnid;
	/**
	 * @var String filename
	 * @access Protected
	 */ 
	var $filename;
	/**
	 * @var String UserCode
	 * @access Protected
	 */ 
	var $userCode;
	/**
	 * @var String file extension
	 * @access Protected
	 */ 
	var $ext;
	
	/**
	 * This function shows all the language that the judge is compatible
	 * with. Add various language to this section
	 * 
	 * @return String array
	 */ 
	static function showAllLanguage(){
		$lang = array("C");
		return $lang;
	}
	/**
	 * The wrapper function which does all the steps
	 * 
	 * @return boolean
	 */ 
	function evaluateUserCode() {
		if($this->compile()) {
		    $output = $this->runCode();
		    if($this->evaluateOutput($output)) {
				$this->delTempFile();
				return true;
			}
		    else {
				$this->delTempFile();
		        return false;
			}
		    
		}
		else
		    return false;
		    
	}

		    
	/**
	 * This function compiles the file and return whether the compilation
	 * was sucessful or not... have to enhance this function
	 * 
	 * @return boolean
	 */ 	
	function compile() { 
		$compileScript = $this->getCompileScript();
		$x;
		passthru($compileScript,$x);
		if($x == 0){
			$this->delUserCode();
		    return true;
		}
		else {
			$this->errormsg = "Compilation failed";
		    return false;
		
	}
}
	/**
	 * This function evaluates the the output generated from the user
	 * with the actual output
	 * 
	 * @param mixed User genarated output
	 * 
	 * @return boolean
	 */ 
	function evaluateOutput($useroutput) {
		$actualSolutionUrl = $this->getActualSolutionUrl();
		$f = fopen($actualSolutionUrl, "r");
		$text="";
		$actualText = "";
		while($text = fread($f, 500)) {
		    $actualText .= $text;
		}
		fclose($f);
		
		$actualText_arr = explode("\n", $actualText);
		$userOutput_arr = explode("\n", $useroutput);
		
		$count = count($actualText_arr) - 1;
		$i = 0;
		while($i < $count && $actualText_arr[$i] == $userOutput_arr[$i]) {
			$i++;
		}
		
		if($i == $count)
		    return true;
		else {
			$this->errormsg = "Wrong ans";
		    return false;
	    }
    }
	/**
	 * This function runs the userCode
	 * 
	 * @return mixed User Output
	 */
	function runCode() {
		$filename = $this->getFilename();
		$runScript = $this->getRunScript();
		$userOutput = "";
		$codeInputs = $this->getCodeInput();
		$descriptorspec = array(
           0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
           1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
           2 => array("file", "/tmp/error-output.txt", "a") // stderr is a file to write to
        );
        $cwd = './';
        $process = proc_open($runScript, $descriptorspec, $pipes);
        if (is_resource($process)) {
            // $pipes now looks like this:
            // 0 => writeable handle connected to child stdin
            // 1 => readable handle connected to child stdout
           // Any error output will be appended to /tmp/error-output.txt
           if($codeInputs) {
	           foreach($codeInputs as $input) {
				   fwrite($pipes[0],$input." ");  //space is use to separate 
			   }
		   }
		   fclose($pipes[0]);
		   
		   $userOutput = stream_get_contents($pipes[1]);
		   fclose($pipes[1]);
		   proc_close($process);
		   return $userOutput;
	    }
    }
	/**
	 * This function extracts the input which is to be fed to the test
	 * program
	 * 
	 * @return mixed Input for test program
	 */ 
	function getCodeInput() {
	    $filename = "./userinput/".$this->comptid."_".$this->qnid;
	    $f = @fopen($filename,"r");
	    if($f){
			$text = "";
	        $actualText = "";
	        while($text = fread($f,500)) {
			$actualText .= $text;
		    }
		    $actualText_arr = explode("\n",$actualText);
		    return $actualText_arr;
		}
		else
		    return null;
		
	}
	
	static function showLeaderBoard($comptid) {
		$queryForLeaderBoard = "select userid,sum(marks) as score from code_ques,code_user where code_user.cid=$comptid and code_ques.ques_id = code_user.questid group by userid order by score desc";
		
		$host = $_SESSION['host'];
		$user = $_SESSION['user']; 
		$pass = $_SESSION['pass']; 
		$dbname = $_SESSION['dbname'];
		$con = mysqli_connect($host, $user, $pass, $dbname);
		
		$leaderboard = $con->query($queryForLeaderBoard);
		$html = "";
		$html .="<div id=leader><h3>LeaderBoard</h3>";
		$html .= "<table id=leader_table>";
		$html .= "<tr><td class=leader_board>Name</td><td class=leader_board>Score</td></tr>";
		while($row = mysqli_fetch_array($leaderboard)) {
			$userid = $row['userid'];
		    $marks = $row['score'];
		    $html .= "<tr><td class=leader_board>$userid</td><td class=leader_board>$marks</td></tr>";
		}
		$html .= "</table></div>";
		return $html;
    }
    /**
     * This function writes the usercode in a temporary file which
     * can later be compiled
     * 
     * @return void
     */ 
    function saveUserCode() {
		$fileName = $this->getFilename();
		$f = fopen("./solution/" . $fileName . "." . $this->ext,"w+");
		$userCode = $this->getUserCode();
		fwrite($f,$userCode);
		fclose($f); 
    }
    /**
     * This function deletes the object file that has been created after
     * compilation
     * 
     * @return void
     */ 
    function delTempFile() {
		unlink("./solution/".$this->getFilename());
    }
    /**
     * This function deletes the code file after the compilation
     * 
     * @return void
     */ 
    function delUserCode() {
		unlink("./solution/". $this->getFilename() . "." . $this->ext);
	}
    /**
     * This function shows the error message which can later be shown
     * to the user
     * 
     * @retun String
     */ 
    function showErrormsg(){
		return $this->errormsg;
    }
}
     
?>
