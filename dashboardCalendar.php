<script>
	/* CREATING SCHEDULE */
	document.addEventListener('DOMContentLoaded', function() {

		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

		var calendarEl = document.getElementById('dashboardCalendar');

		var calendar = new FullCalendar.Calendar(calendarEl, {
			plugins: [ 'dayGrid', 'timeGrid', 'list', 'interaction' ],
			defaultView: 'dayGridMonth',
			locale: 'pt-PT',
			height: 580,
			selectable: true,
			editable: true,
			draggable: false,
			unselectAuto: true,
			nowIndicator: true,
			
			header: {
				left: 'prev,today,next',
				center: 'title',
				right: 'dayGridMonth,timeGridWeek,listWeek'
			},

			minTime: "07:00:00",
			maxTime: "20:00:00",

			events: [
			<?php include("loadEventsDashboard.php"); ?>
			],

			eventLimit: 3,
			eventTextColor: '#fff',
			eventBorderColor: '#ea7d7d',
			eventBackgroundColor: '#ea7d7d',

			eventClick: function(info) {
				var a = $("#inp-id").val(info.event.id);
				$("#inp-nome").val(info.event.title);
				$("#inp-start").val(info.event.start.toLocaleString());
				$("#modalClickDay").modal();
			},

			buttonText: {
				today: 'Hoje',
				month: 'Mensal',
				week: 'Semanal',
				list: 'Lista'
			},

			businessHours: {
				daysOfWeek: [ 1, 2, 4, 5, 6 ],
				startTime: '07:00',
				endTime: '19:00',
			}
		});

		calendar.render();
	});
</script>