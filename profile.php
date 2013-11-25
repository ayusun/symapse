<?php
include_once("./session.php");
include_once("./top_bar.php");
include_once("./menubar.php");

$studentObject = unserialize($_SESSION['MAMA']);
$name = $studentObject->getName();
$rollNo = $studentObject->getRollNo();
$photoURL = $studentObject->getPhoto();
$branch = $studentObject->getBranch();
$batch = $studentObject->getBatch();
$phoneno = $studentObject->getPhoneNo();
$mailid = $studentObject->getMailId();

$html = "";
$html .= "<div id=profilearea>";
$html .= "<div id=imagearea>";
$html .= "<img id=dp src=$photoURL width=200 height=200>";
$html .= "</div>";
$html .= "<div id=textarea>";
$html .= "<table id=texttable>";
$html .= "<tr><td>Name</td><td>$name</td></tr>";
$html .= "<tr><td>RollNo</td><td>$rollNo</td></tr>";
$html .= "<tr><td>MailId</td><td>$mailid</td></tr>";
$html .= "<tr><td>Branch</td><td>$branch</td></tr>";
$html .= "<tr><td>Batch</td><td>$batch</td></tr>";
$html .= "<tr><td>Contact</td><td>$phoneno</td></tr>";
echo $html;
echo "<link href=./css/profile.css rel=stylesheet>";
?>
