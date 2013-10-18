$(document).ready(function(){
    var top = $("#username").position().top;
    $(".user-icon").css('top',top+'px');
    top = $("#password").position().top;
    $(".pass-icon").css('top',top+'px');
    top = $("#society").position().top;
    $(".society-icon").css('top',top+'px');
});

