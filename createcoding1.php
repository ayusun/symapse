<?php 
 include_once("./session.php");
 include_once("./top_bar.php");
 include_once("./menubaradmin.php");

 $cname = $_POST["cname"];
 $startdate = $_POST["startdate"];
 $starttime = $_POST["starttime"];
 $enddate = $_POST["enddate"];
 $endtime = $_POST["endtime"];
 $start = $startdate." ".$starttime;
 $end = $enddate." ".$endtime;
 $x=0;
 
$host = $_SESSION['host'];
$user = $_SESSION['user']; 
$pass = $_SESSION['pass']; 
$dbname = $_SESSION['dbname'];
$con1 = mysqli_connect($host, $user, $pass, $dbname);

 mysqli_query($con1,"insert into Coding values (" .$x. ",'" .$cname. "','".$start."','".$end."')");
 mysqli_close($con1);
 
?>
<br>
<form action="./createcoding2.php" method="post" enctype="multipart/form-data"> 
<table>
<tr>
 <td>Question file : </td>
 <td><input type="file" name="uploaded1"></td>
</tr>
<tr>
 <td>Solution File</td>
 <td><input type="file" name="uploaded2"></td>
</tr>
<tr>
 <td>User Input File</td>
 <td><input type="file" name="uploaded3"></td>
</tr>
<tr>
<td>Question Id</td>
<td><input type="text" name="qid"></td>
</tr>
<tr>
<td>Marks</td>
<td><input type="text" name="marks"></td>
</tr>
<tr><td><input type='submit' name='submit' value='Submit'></td></tr>
</table>
</form>
