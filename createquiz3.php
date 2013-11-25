<?php
 include_once("./session.php");
 $y=0;
 $host = $_SESSION['host'];
 $user = $_SESSION['user']; 
 $pass = $_SESSION['pass']; 
 $dbname = $_SESSION['dbname'];
 
 $con = mysqli_connect($host, $user, $pass, $dbname);
 $result = $con->query("select * from Quiz");
 $type=$_POST['qtype'];
 while($row = mysqli_fetch_row($result))
	{
		$x=$row[0];
	}
 if($type==2 || $type==3)
 {
	$target = "./events/quiz/image/"; 
	$target = $target . basename( $_FILES['uploaded1']['name']) ; 
	if(move_uploaded_file($_FILES['uploaded1']['tmp_name'], $target)) 
	{
		echo "The file ". basename( $_FILES['uploaded1']['name']). " has been uploaded";
	} 
	else {
		echo "Sorry, there was a problem uploading your file.";
	}
	$ques = $target;
 }
 else
 {
	$ques=$_POST['question'];
 }
 $ans=$_POST['ans'];
 $opt1=$_POST['opt1'];
 $opt2=$_POST['opt2'];
 $opt3=$_POST['opt3'];
 $opt4=$_POST['opt4'];
 mysqli_query($con,"insert into Quiz_question values (" .$y. "," .$x. ",'" .$ques. "','".$type."','".$ans."')");
 $result = $con->query("select * from Quiz_question");
 while($row = mysqli_fetch_row($result))
	{
		$y=$row[0];
	}
 if($type==0 || $type==2)
 {
	mysqli_query($con,"insert into Quiz_question_option values ( " .$y. ",'" .$opt1. "')");
	mysqli_query($con,"insert into Quiz_question_option values ( " .$y. ",'" .$opt2. "')");
	mysqli_query($con,"insert into Quiz_question_option values ( " .$y. ",'" .$opt3. "')");
	mysqli_query($con,"insert into Quiz_question_option values ( " .$y. ",'" .$opt4. "')");
 }
 mysqli_close($con);
header("Location: createquiz2.php");

//print_r($_POST);
 ?>
