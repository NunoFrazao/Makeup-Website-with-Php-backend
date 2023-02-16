$(document).ready(() => {
    /**
     * Filtro marca
     */
    $("#filtroMarcaButton").click(() => {
        // Se o dropdown o filtro de ordenar por tiver a classe .rodar, retirar a class
        if ($("#filtroOrdenarPorButton i").hasClass("rodar")) {
            $("#filtroOrdenarPorButton i").removeClass("rodar");
        }
        // Toggle na class .rodar
        $("#filtroMarcaButton i").toggleClass("rodar");
    });

    /**
     * Filtro ordenar por
     */

    $("#filtroOrdenarPorButton").click(() => {
        // Se o dropdown o filtro de marca tiver a classe .rodar, retirar a class
        if ($("#filtroMarcaButton i").hasClass("rodar")) {
            $("#filtroMarcaButton i").removeClass("rodar");
        }
        // Toggle na class .rodar
        $("#filtroOrdenarPorButton i").toggleClass("rodar");
    });

    // Ao clicar em alguma parte da pagina, retirar a class .rodar se estiver em algum dropdown
    $(document).click(() => {
        if ($("#filtroMarcaButton i").hasClass("rodar") || $("#filtroOrdenarPorButton i").hasClass("rodar")) {
            $("#filtroMarcaButton i").removeClass("rodar");
            $("#filtroOrdenarPorButton i").removeClass("rodar");
        }
    })
    
    /**
     * Botao filtros Mobile
     */
    
    $("#expandirFiltrosButton").click(() => {
        if ($("#expandirFiltrosButton span i").hasClass("far")) {
            $("#expandirFiltrosButton span i").removeClass("far").addClass("fas");
            // Alterar cor do texto
            $("#expandirFiltrosButton span").css("color", "#bb3838");
        }
        else if ($("#expandirFiltrosButton span i").hasClass("fas")) {
            $("#expandirFiltrosButton span i").removeClass("fas").addClass("far");
            // Alterar cor do texto
            $("#expandirFiltrosButton span").css("color", "#6c757d");
        }
        

    });

    /*var timeline = anime.timeline({
        easing: "easeOutExpo",
        duration: 1500,
        loop: false
    });
    
    timeline.add({
        targets: "div.card",
        translateY: [50, 0],
        opacity: [0, 1],
        delay: anime.stagger(100)
    });*/
});