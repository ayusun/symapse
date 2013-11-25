<?php
include("./session.php");
unset($_SESSION['MAMA']);
header('Location: ./login.php');

?>
