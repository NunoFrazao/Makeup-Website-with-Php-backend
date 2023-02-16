$(document).ready(() => {
    $("#sidebar_btn").click(() => {
        if ($("#infoUser").hasClass("alinhamento")) {
            $("#infoUser").removeClass("alinhamento");
            $("#conteudoPrincipal").removeClass("conteudoPrincipalClass");
        }else{
            $("#infoUser").addClass("alinhamento");
            $("#conteudoPrincipal").addClass("conteudoPrincipalClass");
        }
    });

    /* ICON SERVICOS */
    $("#serv-anc").click(() => {
        $("#icon-arrow-down i").toggleClass("icon-transform");
    });

    /* OPÇÃO DA NAVBAR ATIVA */
    $("a.anc-side").click(function() {
        $(this).addClass("active").$("a.anc-side").removeClass("active");
    });
});