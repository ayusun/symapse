var queuedValue = "";
$("#adder").click(function(e) {

    var title = $("#eventName").val();
    var start_d = $("#start_d").val();
    var start_m = parseInt($("#start_m").val()) - 1;
    var start_y = $("#start_y").val();
    var end_d = $("#end_d").val();
    var end_m = parseInt($("#end_m").val()) - 1;
    var end_y = $("#end_y").val(); 
    
    if(queuedValue != "")
        queuedValue += ",";
    queuedValue += "{";
    queuedValue += "title:"; 
    queuedValue += "\'" + title + "\'" + ",";
    queuedValue += "start:";
    queuedValue += "new Date(" + start_y + "," + start_m + "," + start_d + "),";
    queuedValue += "end:";
    queuedValue += "new Date(" + end_y + "," + end_m + "," + end_d + ")";
    queuedValue +="}";
    alert(queuedValue);
});

$("#submitter").click(function(e) {
    $.post('eventmaker.php',{events : queuedValue},function(data) {
    alert("Calendar Updated");
    });
});
