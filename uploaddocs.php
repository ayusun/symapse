<?php

$html = "";
$html .= "<form action='upload_file.php' method='post' enctype='multipart/form-data'>";
$html .= "<label for='file'>Filename:</label>";
$html .= "<input type='file' name='uploaded'><br>";
$html .= "<textarea rows='4' cols='50' name='desc'></textarea><br>";
$html .= "<input type='submit' name='submit' value='Submit'>";
$html .= "</form>";
echo $html;

?>