$(document).ready(() => {

	/* ------------------ INFO ------------------ */

	// CREATE TIMELINE
	var info = anime.timeline({
		easing: 'easeOutExpo',
		loop: false
	});

	// ADD CHILDRENS TO TIMELINE
	info.add({
		targets: '#marc-h1',
		duration: 700,
		height: [0,50],
		delay: 500
	});

	info.add({
		targets: '#marc-paragraph',
		duration: 700,
		height: [0,70],
		delay: 0
	});

	info.add({
		targets: '#btn-unhas-marcacoes',
		duration: 400,
		height: [0,35],
		opacity: [0,1],
		delay: 0
	});

	/* ------------------ TITLES ------------------ */

	// ON SCROLL TITLE APPEARS
	$(window).scroll(() => {
		var title = $("#principal-gel-h1");

		if ($(this).scrollTop() > vhChangeToPx(40)) {
			title.css("height", "5rem");
			title.css("transition", "height 1s");
		}
	});

	// CHANGING VH TO PX
	function vhChangeToPx(value) {
		var w = window;
		var d = document;
		var e = d.documentElement;
		var g = d.getElementsByTagName('body')[0];
		var y = w.innerHeight|| e.clientHeight|| g.clientHeight;

		var result = (y*value)/100;
		return result;
	}

});