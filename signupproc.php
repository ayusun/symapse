<?php

include_once("./session.php");
$host = $_SESSION['host'];
 $user = $_SESSION['user']; 
 $pass = $_SESSION['pass']; 
 $dbname = $_SESSION['dbname'];
 $con = mysqli_connect($host, $user, $pass, $dbname)or die("cant connect");

$roll=$_POST['roll'];

$login = $con->query("select * from Student where rollno = '$roll' ");
$row = mysqli_fetch_array($login);
// Check username match
if ($row['rows']==0) 
{
	// Set username session variable
	if($_POST['roll']=='')
	{
		echo "ROll cant be left blank";
	}
	else if($_POST['password']=='')
	{
		echo "Password cant be left blank";
	}
	else if($_POST['password']!=$_POST['cpassword'])
	{
		echo "Passwords donot match";
	}
	else
	{
		$name=$_POST['name'];
		$batch=$_POST['batch'];
		$phone=$_POST['phone'];
		$mail=$_POST['mail'];
		$branch=$_POST['branch'];
		$target = "./img/"; 
		$target = $target . basename( $_FILES['uploaded']['name']) ; 
		move_uploaded_file($_FILES['uploaded']['tmp_name'], $target);
		$society=$_POST['society'];
		$pass=sha1($_POST['password']);
		$signupQuery = "insert into Student values ('". $name . "' ," .$batch ."," .$phone .", '" .$mail . "','" .$branch ."','" .$target."'," .$roll .",'" . $society."','". $pass. "','')";
		//echo $signupQuery;
		mysqli_query($con, $signupQuery) or die("cant");
	}
}
else 
{
	echo "Username already exists";
}
mysqli_close($con);
?>
