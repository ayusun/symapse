<?php
    include_once("./lib/Student.class.php");
    include_once("./session.php");
    $studentObject = unserialize($_SESSION['MAMA']);
    $societyName = $studentObject->getSocietyName();
    $configFile = $_SESSION['configFile'];
    $grpURL = $configFile[strtolower($societyName)];
    $html  = "<link href='./css/style.css' rel='stylesheet' type='text/css' />";
    $html  .= "<div id='cover-image'>";
    $html .= "<img src=$grpURL width='900' height='150' id='grp-image'>";
    $html .= "</div>";
    $html .= "<div id=welcomebar>";
    $photoURL = $studentObject->getPhoto();
    $html .= "<img src = $photoURL width=20 height=20>";
    $html .= "Welcome ".$studentObject->getName();
    $html .= "<div id=logout align='right'><a href='logout.php'>Logout </a></div>";
    $html .= "</div>";
    echo $html;
?>
