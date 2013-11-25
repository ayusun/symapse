<?php

$html = "";
$html .= "<form action='./createcoding1.php' method='post'><table>";
$html .= "<tr><td><label for='cname'>Competition Name:</label></td>";
$html .= "<td><input type='text' name='cname'><br></td></tr>";
$html .= "<tr><td><label for='startdate'>Start Date(YYYY-MM-DD): </label></td>";
$html .= "<td><input type='text' name='startdate'><br></td></tr>";
$html .= "<tr><td><label for='starttime'>Start Time(hh:mm:ss) :</label></td>";
$html .= "<td><input type='text' name='starttime'><br></td></tr>";
$html .= "<tr><td><label for='enddate'>End Date(YYYY-MM-DD) : </label></td>";
$html .= "<td><input type='text' name='enddate'><br></td></tr>";
$html .= "<tr><td><label for='endtime'>End Time (hh:mm:ss) :</label></td>";
$html .= "<td><input type='text' name='endtime'><br></td></tr>";
$html .= "<tr><td><input type='submit' name='submit' value='Submit'></td></tr>";
$html .= "</table></form>";
echo $html;
?>