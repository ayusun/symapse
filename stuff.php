
<h1>
Files
</h1>
<?php
	include_once("./session.php");
	$studentObject = unserialize($_SESSION['MAMA']);
	$society = $studentObject->getSocietyName();
	$host = $_SESSION['host'];
    $user = $_SESSION['user']; 
	$pass = $_SESSION['pass']; 
	$dbname = $_SESSION['dbname'];
	$con = mysqli_connect($host, $user, $pass, $dbname);
	$result = $con->query("select * from files where society = '$society'");
	while($row = mysqli_fetch_row($result))
	{
	?>
	<a href= "<? echo $row[1]; ?>">Download</a>
	<? echo $row[2]; ?><br>
	<hr>
<?	} ?>
