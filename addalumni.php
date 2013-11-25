<?php 
 include_once("./session.php");
 $target = "./alumni/"; 
 $target = $target . basename( $_FILES['uploaded']['name']) ; 
 $ok=1; 
 if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
 {

	echo "Uploaded successfully";

 } 
 else {
	echo "Upload not successful";
 
 }
 $filename=basename( $_FILES['uploaded']['name']);
 $desc = $_POST["desc"];
 $name = $_POST["sname"];
 $batch = $_POST["batch"];
 $studentObject = unserialize($_SESSION['MAMA']);
 $society = $studentObject->getSocietyName();
 $x=0;
 $host = $_SESSION['host'];
 $user = $_SESSION['user']; 
 $pass = $_SESSION['pass']; 
 $dbname = $_SESSION['dbname'];
 $con1 = mysqli_connect($host, $user, $pass, $dbname);
 mysqli_query($con1,"insert into alumni values (" .$x. ",'" .$name. "','".$batch."','".$filename."','".$desc."','".$society."')");
 mysqli_close($con1);
 
 ?> 
 
