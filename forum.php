<?php
include_once("./session.php");

//include_once("./top_bar.php");
//include_once("./menubar.php");

if($_SESSION['MAMA']) {
	$host = $_SESSION['host'];
	$user = $_SESSION['user']; 
	$pass = $_SESSION['pass']; 
	$dbname = $_SESSION['dbname'];
	$studentObject = unserialize($_SESSION['MAMA']);
	$societyName = $studentObject->getSocietyName();	
	$con = mysqli_connect($host, $user, $pass, $dbname);
	$postRetrieval = "select * from Forum where society = '$societyName' order by timestamp desc";
	
	$post = $con->query($postRetrieval);
	// start of body
	// start by creating a form for posting in forum
	
	$html = "";
	$html .= "<link href = ./css/forum.css rel='stylesheet' type='text/css'>";
	$html .= "<h1 class=forumheading>$societyName Forums</h1>";
	$html .= "<div class = bottom_content>";
	$html .= "<div class = forumpostarea>";
	$html .= "<form method=post action=postinforum.php class=forumposter>";
	$html .= "<textarea class = postarea name = dopost rows=4 cols=70></textarea><input id=submit type=submit value=Post><br>";
	$html .= "</form></div>";
	
	// retrieve all posts
	while($row = mysqli_fetch_array($post)) {
		$postid = $row['postid'];
	    $postdesc = $row['postdesc'];
	    $userid = $row['userid'];
	    $ts_post = $row['timestamp'];
	    $posterName = Student :: getSelectedStudentName($con,$userid);
	    $html .= "<div class = forumpost>";
	    $html .= "<div class = userpost>";
	    $html .= "<b>".$postdesc."</b> by <b>$posterName</b></div>";
	    
	    //start retirieving comments
	    $cmntRetrieval = "select * from comments where postid = $postid";
	    $cmnt = $con->query($cmntRetrieval);
	    while($row2 = mysqli_fetch_array($cmnt)) {
			$html .= "<div class = commentpost>";
		    $cmntid = $row2['commentid'];
		    $cmntdesc = $row2['commentdesc'];
		    $userid_cmnt = $row2['userid'];
		    $username_cmnt = Student :: getSelectedStudentName($con, $userid_cmnt);
		    $ts_cmnt = $row2['timestamp'];
		    $html .= $cmntdesc." by ".$username_cmnt;
		    $html .= "</div>";
		}
		$html .= "<div class = commentpost>";
		$html .= "<form name=commentForm$postid method=post action=forum.php>";
		$html .= "<input type=hidden value=$postid name=postid>";
		$html .= "<input type=text placeholder='comment on post' name = 'multi_comment'>";
		$html .= "<input type = submit value = comment>";
	    $html .= "</form></div>";
		$html .= "</div>";
	
	}
	$html .= "</div>";
	echo $html;
	
}
echo "<script src = ./js/jquery.js></script>";
echo "<script src = ./js/forum.js></script>";
?>
