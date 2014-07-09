<?php
function rendercalendar($block, $content, $cursor = false, $object = false, $mode = "edit") {
    //we get passed in a cursor to render in a calendar format, it should have the fields we need to populate a calendar widget
    //initially we will display the data in one hit, at some point we need an ajax feed generator so it can render huge collections with responsive performance

    global $mdb;
    $start = getvalue("start", $block);//the fieldname in the object that is the start datetime of the calendar event

//put down the div where the calendar will go
    $html.= "<div id='calendar'></div>";//we need a unique name so that we can have muliple calendars on a page
$html.="
<script>
	$(document).ready(function() {
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: false,
			timezone: 'local',
			events: [
";
    foreach ($cursor as $object){
//				{
//					title: 'Long Event',
//					start: '2014-06-07',
//				}
        $html.= "{";
        $html.= "title:'{$object['subject']}',";
        $html.= "start:'{$object[$start]}'";
        $html.= "},";
    }
    $html.="			]
		});
	});
</script>
";

    return $html;
}
?>

