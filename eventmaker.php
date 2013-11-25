<?php
function getScriptTemplate($eventjson) {
$html = "$(document).ready(function() {
    $('#calendar').fullCalendar({
        theme: false,
        eventMouseover: function(event, jsEvent, view) {
            if (view.name !== 'agendaDay') {
                $(jsEvent.target).attr('title', event.title);
            }
        },
        
       events: [";
$html .= $eventjson;
$html .= "       ]
    });

});";
return $html;        

}
if(isset($_POST['events'])) {
    $eventjson = $_POST['events'];
    $text =  getScriptTemplate($eventjson);
    $f= fopen("./js/calendarShow.js","w+") or die("can't");
    fwrite($f, $text);
    fclose($f);


}
?>

<form method=post action=eventmaker.php>
<table>
<tr><td>Name Of Event</td><td><input type=text id=eventName></td></tr>
<tr><td>Start Date(y/m/d)</td><td><input type=text id=start_y></td><td><input type=text id=start_m></td><td><input type=text id=start_d></td></tr>
<tr><td>End Date(y/m/d)</td><td><input type=text id=end_y></td><td><input type=text id=end_m></td><td><input type=text id=end_d></td></tr>
<tr></tr>
<tr><td><input type=button value='Add to event Queue' id=adder></td><td><input type=button value='Generate Calendar' id=submitter></td></tr>
</table>
</form>
<script src="./js/jquery.js"></script>
<script src="./js/eventmaker.js"></script>
