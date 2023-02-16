$(document).ready(() => {
    // Guardar a altura da section com maior altura e aplicar às sections   
    function sectionHeight() {
        var sections = $(".massagemContainer section");
        var sectionHeights = [sections.eq(0).height(), sections.eq(1).height()];
        if (window.innerWidth >= 768) {
            sections.css("height", Math.max(...sectionHeights));
        }
        else {
            sections.css("height", "fit-content");
        }
    }

    // Chamar funcao quando há resize
    window.addEventListener('resize', sectionHeight);
    // Chamar uma vez para definir a altura correta de inicio 
    sectionHeight();

    // Animar as divs das massagens
    var timeline = anime.timeline({
        easing: "easeOutExpo",
        duration: 1200,
        loop: false
    });
    
    timeline.add({
        targets: "img#corpoInteiroImg",
        translateX: [-150, 0],
        opacity: [0, 1],
    });

    timeline.add({
        targets: "img#costasImg",
        translateX: [150, 0],
        opacity: [0, 1],
    }, "-=1200");

    timeline.add({
        targets: "section.massagemInformacao",
        translateY: [-150, 0],
        opacity: [0, 1]
    }, "-=900");

    timeline.add({
        targets: "a.massagemVerMais",
        opacity: [0, 1]
    });
});