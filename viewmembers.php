<? 
	include_once("./session.php");
	$studentObject = unserialize($_SESSION['MAMA']);
	$society = $studentObject->getSocietyName();
	
	$host = $_SESSION['host'];
    $user = $_SESSION['user']; 
    $pass = $_SESSION['pass']; 
    $dbname = $_SESSION['dbname'];
    $con = mysqli_connect($host, $user, $pass, $dbname);
    
	$result = $con->query("select * from Student where society = '$society'");
	while($row = mysqli_fetch_row($result))
	{
?>
<img src= "<? echo $row[5]; ?>" width='200' height='200'>
<h1>Name: <? echo $row[0]; ?></h1>
Batch : <? echo $row[1]; ?><br>
Phone : <? echo $row[2]; ?><br>
mail id : <? echo $row[3]; ?><br>
Branch : <? echo $row[4]; ?><br>
Roll : <? echo $row[6]; ?><br>
<hr>
<?	}

mysqli_close($con); ?>
