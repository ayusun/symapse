<?php 
 include_once("./session.php");
 include_once("./top_bar.php");
 include_once("./menubaradmin.php");
 $target1 = "./events/coding/problem/"; 
 $target11 = $target1 . $_POST['qid'].".txt" ; 
 $target1 = $target1 . basename( $_FILES['uploaded1']['name']); 
 $target2 = "./events/coding/actualsolutions/"; 
 $target22 = $target2;
 $target2 = $target2 . basename( $_FILES['uploaded2']['name']) ; 
 $target3 = "./events/coding/userinput/"; 
 $target33 = $target3;
 $target3 = $target3 . basename( $_FILES['uploaded3']['name']) ; 
 move_uploaded_file($_FILES['uploaded1']['tmp_name'], $target1);
 move_uploaded_file($_FILES['uploaded2']['tmp_name'], $target2);
 move_uploaded_file($_FILES['uploaded3']['tmp_name'], $target3);
 rename($target1,$target11);
 $host = $_SESSION['host'];
 $user = $_SESSION['user']; 
 $pass = $_SESSION['pass']; 
 $dbname = $_SESSION['dbname'];
 $con = mysqli_connect($host, $user, $pass, $dbname);
 $result = $con->query("select * from Coding");
 while($row = mysqli_fetch_row($result))
	{
		$x=$row[0];
	}
 mysqli_close($con);
 $target22 = $target22.$x."_".$_POST['qid'];
 rename($target2,$target22);
 $target33 = $target33.$x."_".$_POST['qid'];
 rename($target3,$target33);
 $qid = $_POST['qid'];
 $marks=$_POST['marks'];
 $target111= "./problem/".$_POST['qid'].".txt";
 $con1 = mysqli_connect($host, $user, $pass, $dbname);
 mysqli_query($con1,"insert into code_ques values (" .$x. ",'" .$qid. "','".$target111."','".$marks."')");
 mysqli_close($con1);
 echo "Updated Successfully";
?>
