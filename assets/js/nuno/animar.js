// CREATE TIMELINE
var tl = anime.timeline({
	easing: 'easeOutExpo',
	duration: 2000,
	loop: false
});

// ADD CHILDRENS TO TIMELINE
tl.add({
	targets: '.cartas',
	translateY: [250,0],
	opacity: [0,1],
	delay: function(el, i) {return i * 500;}
});