$("#submit-button").on("click",function(e) {
e.preventDefault();
var solution = $("#user-solution").val();

if(solution.length != 0) {
    $.post( './events/coding/judge.php', $('#code-submission').serialize(), function(data) {
         alert(data);
       });    

} 
});
