<?php
include_once("../../lib/Database.class.php");
    $currTimeStamp = date('Y-m-d H:i:s');
    $arr = explode(" ",$currTimeStamp);
    $dt = $arr[0];
    $time = $arr[1];
    session_start();
    
    $host = $_SESSION['host'];
	$user = $_SESSION['user']; 
	$pass = $_SESSION['pass']; 
	$dbname = $_SESSION['dbname'];
	
    $con = mysqli_connect($host, $user, $pass, $dbname);
    //echo $currTimeStamp;
    $result = $con->query("select * from Coding where '$currTimeStamp' between start and end");
    $row = mysqli_fetch_array($result);
    if(isset($row)) {
       $comptid = $row['Cid'];
       $comptName = $row['cname'];
       $query_for_question = $con->query("select * from code_ques where cid = $comptid") or die("hello");
       $html = "";
       $html .= "<h1 align=center>$comptName</h1>";
       $html .= "<table id=ques_table>";
       $html .= "<tr><td class=ques><b>Questions</b></td></tr>";
       while($row = mysqli_fetch_assoc($query_for_question)) {
		   $ques_id = $row['ques_id'];
		   $html .= "<tr><td class=ques><a class=contentloader href=# onclick=loadcontent('./events/coding/problem.php?qnid=$ques_id&comptid=$comptid')>$ques_id</a></td></tr>";
	   }
	   $html .= "</table>";
	   echo $html;
	   include_once("../../lib/Coding.class.php");
       echo Coding :: showLeaderBoard($comptid);
       echo "<link href=./css/coding.css rel=stylesheet>";
   }
   else
       echo "<h1>Sorry No coding competition currently going on</h1>"; 
    
    


?>
