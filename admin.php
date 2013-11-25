<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="./css/fullcalendar.css" rel="stylesheet" type="text/css" />
<script src="./js/jquery.js"></script>
<script type='text/javascript' src='./js/fullcalendar.js'></script>
</head>

<body>
<?php
include("./top_bar.php");
include("./menubaradmin.php");
?>


<div id="content">
<div id=left>
<?php
/* To count number of files in folder */
$fileCount = 0; 
    $dir = 'slideshow/';
    if ($handle = opendir($dir)) {
        while (($file = readdir($handle)) !== false){
            if (!in_array($file, array('.', '..')) && !is_dir($dir.$file)) 
                $fileCount++;
        }
    }
?>


<p><img src="slideshow/4.jpg" width="500" height="300" name="slide" /></p>
<script type="text/javascript">

/*Slide show*/
var i=0;
var images = new Array();
for(i=0;i<<?php echo $fileCount ?>;i++)
{
    
	images[i] = new Image();
	images[i].src = "slideshow/"+i+".jpg";
	
}
        var step=0;
        function slideit()
        {
		    
            document.images.slide.src = eval("images[" + step + "].src");
			
            step++;
            if(step==<?php echo $fileCount ?>)
                step=0;
            setTimeout("slideit()",1000);
        }
		
        slideit();

</script>

</div>
<div id=right>
<div id="right_top">
<div id="calendar">
	<input id=plancal type = button value="plan calendar">
</div>
</div>
<div id=right_bottom>
What new tutorial you want to be included<br>
<input type="radio" value=android>Android<br>
<input type="radio" value=windows>Windows<br>
<input type=submit value=POLL>
</div>

</div>

</div>
<script src="./js/calendarShow.js"></script>
<script src = "./js/ajaxhome.js"></script>
</body>
</html>
