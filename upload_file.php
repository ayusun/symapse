<?php 
 include_once("./session.php");
 $target = "./files/"; 
 $target = $target . basename( $_FILES['uploaded']['name']) ; 
 $ok=1; 
 if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
 {
 echo "The file ". basename( $_FILES['uploaded']['name']). " has been uploaded";
 } 
 else {
 echo "Sorry, there was a problem uploading your file.";
 }
 $filename="./files/". basename( $_FILES['uploaded']['name']);
 $desc = $_POST["desc"];
 $x=0;
 $studentObject = unserialize($_SESSION['MAMA']);
 $society = $studentObject->getSocietyName();
$host = $_SESSION['host'];
 $user = $_SESSION['user']; 
 $pass = $_SESSION['pass']; 
 $dbname = $_SESSION['dbname'];
 $con1 = mysqli_connect($host, $user, $pass, $dbname);
 mysqli_query($con1,"insert into files values (" .$x. ",'" .$filename. "','".$desc."','".$society."')");
 mysqli_close($con1);
 ?> 
 
 
