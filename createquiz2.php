<?php 
 include_once("./session.php");
 include_once("./top_bar.php");
 include_once("./menubaradmin.php");
?>

<form action="createquiz3.php" method="post" enctype='multipart/form-data'>
<table>
<tr>
<td>select the type of question: </td>
<td><select name="qtype" id = "qtype">
<option value="0">Type 0</option>
<option value="1">Type 1</option>
<option value="2">Type 2</option>
<option value="3">Type 3</option>
</select></td>
</tr>
<tr  id = "imageupload">
<td>Picture file : </td>
 <td><input type="file" name="uploaded1"></td>
</tr>
<tr id = "question">
<td>Enter ques : </td>
<td><textarea rows="4" cols="25" name="question"></textarea></td>
</tr>

<tr class = "alloptions"><td><u>Options:</u></td></tr>
<tr class = "alloptions">
<td>Option1:</td>
<td><input type="text" name="opt1"></td>
</tr>
<tr class = "alloptions">
<td>Option2:</td>
<td><input type="text" name="opt2"></td>
</tr>
<tr class = "alloptions">
<td>Option3:</td>
<td><input type="text" name="opt3"></td>
</tr>
<tr class = "alloptions">
<td>Option4:</td>
<td><input type="text" name="opt4"></td>
</tr>
<tr><td><u>Answer:</u></td>
<td><input type="text" name="ans"></td>
</tr>
<tr><td><input type="submit" value="Next-->"></td></tr>
</table>
</form>
<script src="./js/jquery.js"></script>
<script src="./js/quiz.js"></script>
