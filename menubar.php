<?php
include_once("./session.php");
$studentObject = unserialize($_SESSION['MAMA']);
$society = $studentObject->getSocietyName();
if($society == "Konnexions") {
?>
<div id="horizontal_menu">
<ul id="nav">
	<li><a href="./home.php">Home</a></li>
	<li><a href="./profile.php">Profile</a>
	<li><a href="#">Events</a>
		<ul>
			<li><a class = "contentloader" href="#" onclick= "loadcontent('./events/coding')">Coding Competition</a>
			<li><a class = "contentloader" href="#" onclick= "loadcontent('./events/quiz')">Quiz Competition</a>
		</ul>
	</li>
	<li><a class = "contentloader" href="#" onclick=loadcontent('./stuff.php')>Stuffs</a>	
	<li><a class = "contentloader" href="#" onclick=loadcontent('./alumni.php')>Alumni</a></li>
	<li><a class = "contentloader" href="#" onclick=loadcontent('./forum.php')>Forum</a></li>
</ul>
</div>
<?php
}
else {
?>
	<div id="horizontal_menu">
<ul id="nav">
	<li><a href="./home.php">Home</a></li>
	<li><a href="./profile.php">Profile</a>
	<li><a href="#">Events</a>
		<ul>
			<li><a class = "contentloader" href="#" onclick= "loadcontent('./events/quiz')">Quiz Competition</a>
		</ul>
	</li>
	<li><a class = "contentloader" href="#" onclick=loadcontent('./stuff.php')>Stuffs</a>	
	<li><a class = "contentloader" href="#" onclick=loadcontent('./alumni.php')>Alumni</a></li>
	<li><a class = "contentloader" href="#" onclick=loadcontent('./forum.php')>Forum</a></li>
</ul>
</div>
<?php
}
?>
