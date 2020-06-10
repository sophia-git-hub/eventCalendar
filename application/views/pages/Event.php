<!DOCTY+
PE html>
<html>
    <head>
        <title>Calendar</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link  rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css"/>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

        <script>
            $(document).ready(function () {
                $('#calendar').fullCalendar({
                	editable: true,
                	header: {
                		left: 'prev,next,today',
                		right: 'month,agendaWeek,agendaDay',
                		center: 'title'
                	},
                    defaultView: 'month',
                    events: "<?php echo base_url();?>/Event/get_event",
                    selectable: true,
                    selectHelper: true
                    /*events: function (start, end, timezone, callback) {
                        $.ajax({
                            url: '<?php echo base_url(); ?>Event/get_event',
                            dataType: 'json',
                            data: {
                                start: start.unix(),
                                end: end.unix()
                            },
                            success: function (msg) {
                                var events = [];
                                var data = msg.events;
                                $.each(data, function (e) {
                                    events.push({
                                        title: data[e].title,
                                        start: data[e].start_event
                                    });
                                });
                                callback(events);
                            },
                            error: function () {
                                alert('There was an error while fetching events!');
                            },
                        });

                    }*/

                });
            });
        </script>
    </head>
    <body>
    	<br>
    	<h2 align="center"> Welcome to Event Calendar Page </h2>
        <div class="container">
        	<div id="calendar"></div>
        </div>
        <br>
    </body>
</html>