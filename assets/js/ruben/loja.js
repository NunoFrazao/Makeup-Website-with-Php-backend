$(document).ready(() => {
    var timeline = anime.timeline({
        easing: "easeOutExpo",
        duration: 2000,
        loop: false
    });
    
    timeline.add({
        targets: "div.categoria",
        translateY: [100, 0],
        opacity: [0, 1],
        delay: anime.stagger(200)
    });
})