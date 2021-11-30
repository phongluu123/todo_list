$(document).ready(function() {
    var calendar = $('#calendar').fullCalendar({
        editable:true,
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
        },
        events: 'index.php?controller=work&action=load-calendar',
        selectable:true,
    });
});