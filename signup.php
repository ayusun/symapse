<?php

// Initialize session

include_once("./session.php");

?>

<html>
<head>
<title>Sign Up.!!! </title>
</head>
<body>
<h3>New User Signup</h3>

<table border="0">
<form method="POST" action="signupproc.php" enctype='multipart/form-data'>
<tr><td>Roll no.</td><td>:</td><td><input type="text" name="roll" size="20"></td></tr>
<tr><td>Name</td><td>:</td><td><input type="text" name="name" size="20"></td></tr>
<tr><td>Password</td><td>:</td><td><input type="password" name="password" size="20"></td></tr>
<tr><td>Confirm Password</td><td>:</td><td><input type="password" name="cpassword" size="20"></td></tr>
<tr><td>Batch</td><td>:</td><td><input type="text" name="batch" size="20"></td></tr>
<tr><td>Phone</td><td>:</td><td><input type="text" name="phone" size="20"></td></tr>
<tr><td>Mail Id</td><td>:</td><td><input type="text" name="mail" size="20"></td></tr>
<tr><td>Branch</td><td>:</td><td><input type="text" name="branch" size="20"></td></tr>
<tr><td>Upload photo:</td><td>:</td><td><input type="file" name="uploaded" size="20"></td></tr>
<select name="society" id = "society">
<option value="konnexions">Konnexions</option>
<option value="qutopia">Qutopia</option>
</select>
<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" value="Sign Up!!"></td></tr>
</form>
</table>

<h3><a href=login.php>Back to home!</a></h3>
</body>

</html>

