$(document).ready(() => {
    // Selecionar todas as indicadores e atribuir a class .active ao primeiro
    $(".carousel-indicators li").eq(0).addClass("active");
    // Selecionar todas as divs de img do slideshow e atribuir a classe .active à primeira div
    $(".carousel-item").eq(0).addClass("active");
});