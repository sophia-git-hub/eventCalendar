<!DOCTYPE html>
<html>
    <head>
        <title>Calendar</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    
        <script>
            $(document).ready(function () {
                $('#calendar').fullCalendar({
                	minTime: '09:00',  // calendar start Timing 
        			maxTime: '18:00',  // calendar end Timing
                	editable: true,
                	businessHours:{
                		dow: [ 1, 2, 3, 4, 5 ],
						start: '09:00', 
						end: '18:00',               		
                	},
                	header: {
                		left: 'prev,next,today',
                		right: 'month,agendaWeek,agendaDay',
                		center: 'title'
                	},
                    defaultView: 'month',
                    events:"<?php echo base_url(); ?>event/loadEvents",
		            selectable:true,
		            selectHelper:true,
                    select: function(start,end,allDay){
                    	var title = prompt("Enter Event title");                   	

                    	if(title){
                    		var desc = prompt("Enter Event description");
                    		if(desc){
                    			var start = $.fullCalendar.formatDate(start,"Y-MM-DD HH:mm::ss");
                    			var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH::mm:ss");

	                    		$.ajax({
	                    			url: "<?php echo base_url();?>event/insert",
	                    			type: "POST",
	                    			data: {title:title,desc:desc,start:start,end:end},
	                    			success: function(){
	                    				$('#calendar').fullCalendar('refetchEvents');
	                    				alert('Event has been added successfully');
	                    			}	                    			
	                    		});
                    		}
                    	}
                    },
		            eventResize:function(event)
		            {
		                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
		                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
		                var title = event.title;
		                var desc = event.description;
		                var id = event.id;

		                $.ajax({
		                    url: "<?php echo base_url(); ?>event/updateEvent",
		                    type:"POST",
		                    data:{title:title, start:start, end:end, id:id},
		                    success:function()
		                    {
		                        $('#calendar').fullCalendar('refetchEvents');
		                        alert("Event is updated");
		                    }
		                })
		            },
		            eventDrop:function(event)
		            {
		            	console.log(event);
		                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
		                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
		                var title = event.title;
		                var desc = event.description;
		                var id = event.id;
		                $.ajax({
		                    url:"<?php echo base_url(); ?>event/updateEvent",
		                    type:"POST",
		                    data:{title:title, desc:desc, start:start, end:end, id:id},
		                    success:function(response)
		                    {
		                    	console.log(response);
		                        $('#calendar').fullCalendar('refetchEvents');
		                        alert("Event is updated");
		                    }
		                })
		            },
		            eventClick:function(event)
		            {
		                if(confirm("Are you sure you want to remove it ?"))
		                {
		                    var id = event.id;
		                    $.ajax({
		                        url:"<?php echo base_url(); ?>event/delete?id=1",
		                        data:{id:id},
		                        success:function(response)
		                        {
		                            $('#calendar').fullCalendar('refetchEvents');
		                            alert('Event has been removed');
		                        }
		                    })
		                }
		            }
                });
            });
        </script>
    </head>
    <body>
    	<br>
    	<div align="right">
    		<h6><b>Hello, <?php echo $this->session->userdata('fname').' '.$this->session->userdata('lname');?></b></h6>
    		<a class="btn btn-primary" href="<?php echo base_url();?>LogOut">Sign Out</a>
    	</div>
    	<h2 align="center"> Event Calendar </h2>
        <div class="container">
        	<div id="calendar"></div>
        </div>
        <br>
    </body>
</html>