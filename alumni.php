<? 
	include_once("./session.php");
	$studentObject = unserialize($_SESSION['MAMA']);
	$society = $studentObject->getSocietyName();
	
	$host = $_SESSION['host'];
    $user = $_SESSION['user']; 
    $pass = $_SESSION['pass']; 
    $dbname = $_SESSION['dbname'];
    $con = mysqli_connect($host, $user, $pass, $dbname);
	
	$result = $con->query("select * from alumni where society = '$society'");
	while($row = mysqli_fetch_row($result))
	{
?>
<img src= <? echo $row[3]; ?> width='200' height='200'>
<h1><? echo $row[1]; ?></h1>
<br>
<? echo $row[2]; ?><br>
<? echo $row[4];
?><hr>
<?	} ?>
