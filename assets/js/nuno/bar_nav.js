// CREATE TIMELINE
var bar = anime.timeline({
	easing: 'easeOutExpo',
	loop: false
});

// ADD CHILDRENS TO TIMELINE
bar.add({
	targets: '.lines',
	duration: 1500,
	scaleY: [0,1],
	delay: function(el, i) {return i * 300;}	// DELAY OF 300 MS AFTER EACH ELEMENT
});
bar.add({
	targets: '.textos-svg',
	duration: 1000,
	opacity: [0,1],
	delay: function(el, i) {return i * 100;}	// DELAY OF 300 MS AFTER EACH ELEMENT
});



// CHANGES TEXT BEING SHOWN WHILE CHANGING DIVS
$(document).ready(() => {
	$(window).scroll(() => {

		// GETTING TEXTS AND LINES
		var texts = [$('#svg-text1'), $('#svg-text2'), $('#svg-text3')];
		var bars = [$('#lin1'), $('#lin2'), $('#lin3')];
		var nums = [$('#num1'), $('#num2'), $('#num3')];

		// LOOP THROUGH ALL TEXTS
		for (var i=0; i<texts.length; i++) {

			// IF SCROLL IS LOWER OR EQUAL TO 90VH
			if ($(this).scrollTop() < vhTOpx(80)) {
				if (texts[i] != texts[0]) {
					texts[i].css("font-weight", "normal");
					texts[i].css("fill", "#bbbbbb");
					nums[i].css("font-weight", "normal");
					nums[i].css("fill", "#bbbbbb");
					texts[0].css("font-weight", "bold");
					texts[0].css("fill", "rgba(187, 56, 56, .65)");
					nums[0].css("font-weight", "bold");
					nums[0].css("fill", "rgba(187, 56, 56, .65)");

					bars[i].attr("x2", "57");	// SETS ATRR X2 TO DEFAULT
					bars[0].attr("x2", "47");	// SETS ATRR X2 BIGGER THAN DEFAULT

					bars[i].attr("stroke-width", "1");	// SETS ATRR STROKE WIDTH TO DEFAULT
					bars[0].attr("stroke-width", "2");	// SETS ATRR STROKE WIDTH TO 2 PX

					bars[i].css("stroke", "#bbbbbb");
					bars[0].css("stroke", "rgba(187, 56, 56, .65)");
				}
			}

			// IF SCROLL IS BIGGER THAN 90VH AND LOWER THAN 190VH
			else if ($(this).scrollTop() >= vhTOpx(80) && $(this).scrollTop() < vhTOpx(180)) {
				if (texts[i] != texts[1]) {
					texts[i].css("font-weight", "normal");
					texts[i].css("fill", "#bbbbbb");
					nums[i].css("font-weight", "normal");
					nums[i].css("fill", "#bbbbbb");
					texts[1].css("font-weight", "bold");
					texts[1].css("fill", "rgba(187, 56, 56, .65)");
					nums[1].css("font-weight", "bold");
					nums[1].css("fill", "rgba(187, 56, 56, .65)");

					bars[i].attr("x2", "57");
					bars[1].attr("x2", "47");

					bars[i].attr("stroke-width", "1");
					bars[1].attr("stroke-width", "2");

					bars[i].css("stroke", "#bbbbbb");
					bars[1].css("stroke", "rgba(187, 56, 56, .65)");
				}
			}

			// IF SCROLL IS BIGGER THAN 190VH
			else if ($(this).scrollTop() >= vhTOpx(180)) {
				if (texts[i] != texts[2]) {
					texts[i].css("font-weight", "normal");
					texts[i].css("fill", "#bbbbbb");
					nums[i].css("font-weight", "normal");
					nums[i].css("fill", "#bbbbbb");
					texts[2].css("font-weight", "bold");
					texts[2].css("fill", "rgba(187, 56, 56, .65)");
					nums[2].css("font-weight", "bold");
					nums[2].css("fill", "rgba(187, 56, 56, .65)");

					bars[i].attr("x2", "57");
					bars[2].attr("x2", "47");

					bars[i].attr("stroke-width", "1");
					bars[2].attr("stroke-width", "2");

					bars[i].css("stroke", "#bbbbbb");
					bars[2].css("stroke", "rgba(187, 56, 56, .65)");
				}
			}
		}

	});

	// CHANGING VH TO PX
	function vhTOpx(value) {
		var w = window;
		var d = document;
		var e = d.documentElement;
		var g = d.getElementsByTagName('body')[0];
		var y = w.innerHeight|| e.clientHeight|| g.clientHeight;

		var result = (y*value)/100;
		return result;
	}
});