/*
 * Mudar o conteúdo da tag <title> consoante a página
 */

$(document).ready(() => {
    // index.php
    if (window.location.href.includes("index.php")) {
        $("title").text("Página Inicial | Pureaura");
    }

    // unhas.php
    if (window.location.href.includes("unhas.php")) {
        $("title").text("Unhas | Pureaura");
    }

    // maquilhagem.php
    if (window.location.href.includes("maquilhagem.php")) {
        $("title").text("Massagens | Pureaura");
    }

    // massagens.php
    if (window.location.href.includes("massagens.php")) {
        $("title").text("Massagens | Pureaura");
    }

    // corpoInteiro.php
    if (window.location.href.includes("corpoInteiro.php")) {
        $("title").text("Massagem Corpo Inteiro | Pureaura");
    }

    // costas.php
    if (window.location.href.includes("costas.php")) {
        $("title").text("Massagem Costas | Pureaura");
    }

    // marcacao.php
    if (window.location.href.includes("marcacao.php")) {
        $("title").text("Marcação | Pureaura");
    }

    // Loja.php
    if (window.location.href.includes("loja.php")) {
        $("title").text("Loja | Pureaura");
    }

    // Login.php
    if (window.location.href.includes("marcacao.php")) {
        $("title").text("Marcação | Pureaura");
    }
    
});