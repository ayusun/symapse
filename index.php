<?php
include_once("./lib/Student.class.php");
session_start();
if(!isset($_SESSION['MAMA'])) {
    include "./login.php";
}
else
    include "./home.php";
?>
