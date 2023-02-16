/**
 * ADICIONAR DIFERENTES IDS AO BODY CONSOANTE A PÁGINA E ADICIONAR CLAS.ACTIVE NA BARRA DE MENU 
 */

/* GALERIA */
if (window.location.href.includes("galeria.php")) {
	$("body").attr("id", "galeria");
	$(".ul-anc").eq(4).addClass("active");
}

/* UNHAS */
if (window.location.href.includes("unhas.php")) {
	$("body").attr("id", "unhas");
	$(".ul-anc").eq(0).addClass("active");
}

/* MASSAGENS */
if (window.location.href.includes("massagens.php")) {
	$("body").attr("id", "massagens");
	$(".ul-anc").eq(2).addClass("active");
}

/* MASSAGENS CORPO INTEIRO */
if (window.location.href.includes("corpoInteiro.php")) {
	$(".ul-anc").eq(2).addClass("active");
}

/* MASSAGENS COSTAS */
if (window.location.href.includes("costas.php")) {
	$(".ul-anc").eq(2).addClass("active");
}

/* LOGIN */
if (window.location.href.includes("Login.php")) {
	$("body").attr("id", "login");
}

/* REGISTAR */
if (window.location.href.includes("Registar.php")) {
	$("body").attr("id", "registar");
}

/* RECUPERAR */
if (window.location.href.includes("Recuperar.php")) {
	$("body").attr("id", "recuperar");
}

/* LISTA PRODUTOS */
if (window.location.href.includes("listaProdutos.php")) {
	$("body").attr("id", "listaProdutos");
	$(".ul-anc").eq(3).addClass("active");
}

/* LOJA */
if (window.location.href.includes("loja.php")) {
	$(".ul-anc").eq(3).addClass("active");
}

/* PRODUTO */
if (window.location.href.includes("produto.php")) {
	$("body").attr("id", "produto");
	$(".ul-anc").eq(3).addClass("active");
}

/* LISTA MAQUILHAGEM */
if (window.location.href.includes("maquilhagem.php")) {
	$(".ul-anc").eq(1).addClass("active");
}

/* LISTA CONTACTOS */
if (window.location.href.includes("contactos.php")) {
	$(".ul-anc").eq(5).addClass("active");
}

/*Inicial */
if (window.location.href == "http://localhost/pureaura/index.php") {
	$("body").attr("id", "inicial");
}

/* SELF START TOOLTIPS */
$(function () {
	$('[data-toggle="tooltip"]').tooltip();
});