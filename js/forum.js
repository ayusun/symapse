$(".forumposter").submit(function(e) {
	e.preventDefault();
	$.post("./postinforum.php",$(this).serialize(), function(data) {
	//alert(data);
         if(data != 0) {
			 $(".forumpost").first().before(data);			 
    }
    else
        alert("Couldn't insert the data");
    });
});

$(document).on('submit', "form[name ^= 'commentForm']", function(e) { 

	e.preventDefault();
	var thisForm = $(this);
	$.post('./postinforum.php',$(this).serialize()+"&docomment=1",function(data){
		var prevParent = thisForm.parent();
		prevParent.before(data);
		prevParent.remove();
				
	});
});
