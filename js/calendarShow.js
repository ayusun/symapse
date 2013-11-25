$(document).ready(function() {
    $('#calendar').fullCalendar({
        theme: false,
        eventMouseover: function(event, jsEvent, view) {
            if (view.name !== 'agendaDay') {
                $(jsEvent.target).attr('title', event.title);
            }
        },
        
       events: [{title:'kodathon',start:new Date(2013,10,03),end:new Date(2013,10,04)},{title:'post kodathon',start:new Date(2013,10,10),end:new Date(2013,10,12)},{title:'post post kodathon',start:new Date(2013,10,15),end:new Date(2013,10,20)},{title:'new kodathon',start:new Date(2013,11,01),end:new Date(2013,11,25)}       ]
    });

});