$(document).ready(() => {

	var cartas = [$("#carta-unhas"), $("#carta-maquilhagem"), $("#carta-massagem")];

	/* UNHAS AND MAQUILHAGEM ON CLICK */
	cartas.forEach((card) => {
		card.click(() => {
			var unhas = $("#carta-unhas");
			var maquilhagem = $("#carta-maquilhagem");
			var massagem = $("#carta-massagem");
			var h1 = $("#h1-voltar");
			var body = $("body");

			if ($(window).width() > 992) {
				if (massagem.is(".massagem-left")) {
					unhas.removeClass("unhas-left");
					maquilhagem.removeClass("maquilhagem-left");
					massagem.removeClass("massagem-left");
					body.css("overflow", "hidden");
				}else{
					unhas.addClass("unhas-left");
					maquilhagem.addClass("maquilhagem-left");
					massagem.addClass("massagem-left");
					body.css("overflow", "visible");
				}
			}else{
				unhas.removeClass("unhas-left");
				maquilhagem.removeClass("maquilhagem-left");
				massagem.removeClass("massagem-left");

				unhas.addClass("unhas-left-mob");
				maquilhagem.addClass("maquilhagem-left-mob");
				massagem.addClass("massagem-left-mob");
				h1.css("display", "inherit");
			}
		});
	});

	/* CARTA UNHAS ON CLICK LOADS CONTENT */
	cartas[0].click(() => {

		if (cartas[0].hasClass("unhas-left") || cartas[0].hasClass("unhas-left-mob")) {
			setTimeout(() => {
				$("#contentFromOtherPage").empty();
				$("#contentFromOtherPage").hide().load("index.php?pagina=nPages/galeriaType.php #unhasGal").fadeIn('500');
			}, 350);
		}else{
			$("#contentFromOtherPage #unhasGal").remove();
			$("#contentFromOtherPage #maquiGal").remove();
			$("#contentFromOtherPage #massaGal").remove();
		}

	});

	/* CARTA MAQUILHAGEM ON CLICK LOADS CONTENT */
	cartas[1].click(() => {

		if (cartas[1].hasClass("maquilhagem-left") || cartas[1].hasClass("maquilhagem-left-mob")) {
			setTimeout(() => {
				$("#contentFromOtherPage").empty();
				$("#contentFromOtherPage").hide().load("index.php?pagina=nPages/galeriaType.php #maquiGal").fadeIn('500');
			}, 350);
		}else{
			$("#contentFromOtherPage #unhasGal").remove();
			$("#contentFromOtherPage #maquiGal").remove();
			$("#contentFromOtherPage #massaGal").remove();
		}

	});

	/* CARTA MASSAGEM ON CLICK LOADS CONTENT */
	cartas[2].click(() => {

		if (cartas[2].hasClass("massagem-left") || cartas[2].hasClass("massagem-left-mob")) {
			setTimeout(() => {
				$("#contentFromOtherPage").empty();
				$("#contentFromOtherPage").hide().load("index.php?pagina=nPages/galeriaType.php #massaGal").fadeIn('500');
			}, 350);
		}else{
			$("#contentFromOtherPage #unhasGal").remove();
			$("#contentFromOtherPage #maquiGal").remove();
			$("#contentFromOtherPage #massaGal").remove();
		}
	});

	/* TITLE H1 ON CLICK GOES BACK TO MAIN GALLERY PAGE*/
	$("#h1-voltar").click(() => {
		$("#contentFromOtherPage #unhasGal").remove();
		$("#contentFromOtherPage #maquiGal").remove();
		$("#contentFromOtherPage #massaGal").remove();

		cartas[0].removeClass("unhas-left-mob");
		cartas[1].removeClass("maquilhagem-left-mob");
		cartas[2].removeClass("massagem-left-mob");
		$("#h1-voltar").css("display", "none");
		$("body#galeria").css("overflow", "hidden");
	});

});