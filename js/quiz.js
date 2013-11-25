$("#quizform").submit(function(e) {
	e.preventDefault();
	$.post("./events/quiz/quizprocessor.php",$(this).serialize(),function(data) {
	//alert(data);
	$("#quizform").hide();
	$("#quizcontent").html(data);
	});
});
$("#imageupload").hide();
$("#qtype").change(function(e) {
     var optval = parseInt($(this).val());
	 if(optval == 0) {
	     $("#imageupload").hide();
		 $("#question").show();
		 $(".alloptions").show();
	}
	else if(optval == 1) {
	    $("#imageupload").hide();
		$(".alloptions").hide();
		$("#question").show();
	}
	else if(optval == 2) {
	    $("#question").hide();
		$("#imageupload").show();
		$(".alloptions").show();
		
	}
	else if(optval == 3) {
	    $("#question").hide();
		$(".alloptions").hide();
		$("#imageupload").show();
	}
});