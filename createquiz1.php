<?php 
 include_once("./session.php");
 include_once("./top_bar.php");
 include_once("./menubaradmin.php");

 $name = $_POST["name"];
 $startdate = $_POST["startdate"];
 $starttime = $_POST["starttime"];
 $enddate = $_POST["enddate"];
 $endtime = $_POST["endtime"];
 $start = $startdate." ".$starttime;
 $end = $enddate." ".$endtime;
 $x=0;
 $studentObject = unserialize($_SESSION['MAMA']);
 $society = $studentObject->getSocietyName(); 
 $host = $_SESSION['host'];
 $user = $_SESSION['user']; 
 $pass = $_SESSION['pass']; 
 $dbname = $_SESSION['dbname'];
 $con1 = mysqli_connect($host, $user, $pass, $dbname) or die("cant");
 mysqli_query($con1,"insert into Quiz values (" .$x. ",'" .$name. "','".$start."','".$end."','".$society."')");
 mysqli_close($con1);
 header("Location: createquiz2.php");
?>
