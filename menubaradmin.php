<?php
include_once("./session.php");
$studentObject = unserialize($_SESSION['MAMA']);
$society = $studentObject->getSocietyName();
if($society == "Konnexions") {
?>
<div id="horizontal_menu">
<ul id="nav">
	<li><a href="./admin.php">Home</a></li>
	<li><a class = "contentloader" href="#" onclick= "loadcontent('./viewmembers.php')">View Members</a>
	<li><a href="#">Events</a>
		<ul>
			<li><a class = "contentloader" href="#" onclick= "loadcontent('./createcoding.php')">Create Coding Competition</a>
			<li><a class = "contentloader" href="#" onclick= "loadcontent('./createquiz.php')">Create Quiz Competition</a>
		</ul>
	</li>
	<li><a class = "contentloader" href="#" onclick= "loadcontent('./uploaddocs.php')">Upload Stuffs</a></li>
	<li><a class = "contentloader" href="#" onclick= "loadcontent('./alumniadmin.php')">Alumni</a></li>
	<li><a class = "contentloader" href="#" onclick=loadcontent('./forum.php')>Forum</a></li>
</ul>
</div>
<?php
}
else {
?>
<div id="horizontal_menu">
<ul id="nav">
	<li><a href="./admin.php">Home</a></li>
	<li><a class = "contentloader" href="#" onclick= "loadcontent('./viewmembers.php')">View Members</a>
	<li><a href="#">Events</a>
		<ul>
			<li><a class = "contentloader" href="#" onclick= "loadcontent('./createquiz.php')">Create Quiz Competition</a>
		</ul>
	</li>
	<li><a class = "contentloader" href="#" onclick= "loadcontent('./uploaddocs.php')">Upload Stuffs</a></li>
	<li><a class = "contentloader" href="#" onclick= "loadcontent('./alumniadmin.php')">Alumni</a></li>
	<li><a class = "contentloader" href="#" onclick=loadcontent('./forum.php')>Forum</a></li>
</ul>
</div>
<?php
}
?>
