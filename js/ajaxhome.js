function loadcontent(x) {
$.post(x, function(data, e){
            $("#content").html(data);
        });
}
 $(".contentloader").on("click", function(e){
        e.preventDefault();
        return false;
});

$("#plancal").click(function(e) {
    $.get("./eventmaker.php",function(data) {
        $("#content").html(data);
        //alert(data);
    });
});

