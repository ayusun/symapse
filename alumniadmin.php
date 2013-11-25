<?php

$html = "";
$html .= "<form action='addalumni.php' method='post' enctype='multipart/form-data'>";
$html .= "<label for='file'>Filename:</label>";
$html .= "<input type='file' name='uploaded'><br>";
$html .= "<label for='name'>Name:</label>";
$html .= "<input type='text' name='sname'><br>";
$html .= "<label for='batch'>Batch:</label>";
$html .= "<input type='text' name='batch'><br>";
$html .= "<label for='desc'>Description:</label><br>";
$html .= "<textarea rows='4' cols='50' name='desc'></textarea><br>";
$html .= "<input type='submit' name='submit' value='Submit' onclick=alert('Uploaded Successfully')>";
$html .= "</form>";
echo $html;
?>