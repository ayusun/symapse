<?php
/**
 * This php file act as a controller.
 * The If part validates the username and password 
 * while the else part shows the form if the username
 * or password is invalid
 */
require_once ("./lib/Student.class.php");
if(!isset($_SESSION['MAMA'])) {
	if(isset($_POST['submit'])) {
	    $user_id = $_POST['username'];
	    $pass = $_POST['password'];
	    $encrypted_pass = sha1($pass);
	    $society = $_POST['society'];
	    
	    $ini_array = parse_ini_file("./config.ini");
	    $host = $ini_array['host'];
	    $username = $ini_array['username'];
	    $password = $ini_array['password'];
	    $dbname = $ini_array['dbname'];
	    $con = mysqli_connect($host, $username, $password, $dbname); // read from config.ini file
	    
	    $result = $con->query("select *,count(*) as rows from Student where rollno = $user_id and password = '$encrypted_pass' and society = '$society'");
	    $row = mysqli_fetch_array($result);
	    $student = NULL;
		if($row['rows'] == 0) {
			$name = $row['name'];
			$batch = $row['batch'];
			$phoneno = $row['phoneno'];
			$mailid = $row['mailid'];
			$branch = $row['branch'];
			$photo = $row['photo'];
			$student = new Student($name,$photo,$branch,$user_id,$mailid,$phoneno,$society,$batch);
			//session_start();
			$_SESSION['MAMA'] = serialize($student);
			include_once("./home.php");
		}
	    
	
	} else {
		$html = '';
		$html = '<head>
	             <link rel="stylesheet" href="./css/login.css">
	             <script src="./js/jquery.js">
	             </script></head><body>';
		$html .= '<div id="wrapper">
	
		<form name="login-form" class="login-form" action="" method="post">
		
			<div class="header">
			<h1>Login</h1>
			</div>
		
			<div class="content">
			<input name="username" id="username" type="text" class="input username" placeholder="Username" />
			<div class="user-icon"></div>
			<input name="password" id="password" type="password" class="input password" placeholder="Password" />
			<div class="pass-icon"></div>
			<select name="society" id="society" class="input society">
			<option value="Konnexions">Konnexions</option>
			<option value="Qutopia">Qutopia</option>
			</select>
			<div class="society-icon"></div>	
			</div>
	
			<div class="footer">
			<input type="submit" name="submit" value="Login" class="button" />
			</div>
		
		</form>
	
	
	</div>
	<div class="gradient"></div>
	<script src="./js/login.js"></script></body>'; 
	echo $html;
	}
}
else
    include_once("./login.php");
?>
