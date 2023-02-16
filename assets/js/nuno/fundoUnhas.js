// CREATE TIMELINE
var fundo = anime.timeline({
	easing: 'easeOutExpo',
	duration: 2000,
	loop: false
});

// ADD CHILDRENS TO TIMELINE
fundo.add({
  targets: '#background-unhas',
  opacity: [0, 1],
  scale: [1.3, 1],
  delay: 500
});