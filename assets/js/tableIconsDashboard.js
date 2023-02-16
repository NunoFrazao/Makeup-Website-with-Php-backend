$(document).ready(() => {
    // Mudar o icone de confirmar onhover
    $("i.confirmar").hover(
        function () {
            $(this).removeClass("far").addClass("fas");
        },
        function () {
            $(this).removeClass("fas").addClass("far");
        }
    );

    // Mudar o icone do olho (ver mais) on hover
    $("i.verMais").hover(
        function () {
            $(this).removeClass("far").addClass("fas");
        },
        function () {
            $(this).removeClass("fas").addClass("far");
        }
    );

    // Mudar o icone de eliminar on hover
    $("i.eliminar").hover(
        function () {
            $(this).removeClass("far").addClass("fas");
        },
        function () {
            $(this).removeClass("fas").addClass("far");
        }
    );

    // Mudar o icone de editar onhover
    $("i.editar").hover(
        function () {
            $(this).removeClass("far").addClass("fas");
        },
        function () {
            $(this).removeClass("fas").addClass("far");
        }
    );
});