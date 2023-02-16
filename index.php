<?php 
	session_start();
	require_once "dbconnection.php"; 

	// Contador de visitas por sessão

	if (!isset($_SESSION['visited'])) {
		$_SESSION['visited'] = true;
		
		$sql = "SELECT contador FROM viewcounter;";
		$result = $conn->query($sql);

		if ($result) {
			while ($counter = $result->fetch_assoc()) {
				$newCounter = $counter["contador"] + 1;
	
				$sql = "UPDATE viewcounter SET contador = $newCounter;";
				$result2 = $conn->query($sql);
			}			
		}
	}
?>

<!DOCTYPE html>

<html lang="pt">

<head>
	<title>Pureaura</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Página Inicial | Pureaura">
	<meta name="keywords" content="Estética, Esteticismo, Beleza, Unhas, Maquilhagem, Massagens">
	<meta name="author" content="João Onofre, Nuno Frazão, Pedro Clemente, Rúben Gaspar">
	<link rel="stylesheet" href="assets/bootstrap-4.4.1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.8/fullpage.min.css">
	<link rel="stylesheet" href="assets/css/navbar.css">
	<link rel="stylesheet" href="assets/css/sidenav.css">
	<link rel="stylesheet" href="assets/css/bodys.css">
	<link rel="stylesheet" href="assets/css/lang.css">
	<link rel="stylesheet" href="assets/css/selection.css">
	<link rel="stylesheet" href="assets/css/preloader.css">

	<!-- JOAO -->
	<link rel="stylesheet" href="assets/css/joao/estilos_alterar_perfil_utilizador.css">
	<link rel="stylesheet" href="assets/css/joao/estilos_contactos.css">
	<link rel="stylesheet" href="assets/css/joao/estilos_FAQ.css">
	<link rel="stylesheet" href="assets/css/joao/estilos_form_contactos.css">
	<link rel="stylesheet" href="assets/css/joao/estilos_maquilhagem.css">
	<link rel="stylesheet" href="assets/css/joao/estilos_mensagens_FaQ.css">
	<link rel="stylesheet" href="assets/css/joao/estilos_perfil_utilizador.css">

	<!-- NUNO -->
	<link rel="stylesheet" href="assets/css/nuno/unhas.css">
	<link rel="stylesheet" href="assets/css/nuno/galeria.css">
	<link rel="stylesheet" href="assets/css/nuno/galeriaUnhas.css">
	
	<!-- PEDRO -->
	<link rel="stylesheet" href="assets/css/pedro/login.css">
	<link rel="stylesheet" href="assets/css/pedro/registar.css">
	<link rel="stylesheet" href="assets/css/pedro/recuperar.css">
	<link rel="stylesheet" href="assets/css/pedro/inicial.css">

	<!-- RUBEN -->
	<link rel="stylesheet" href="assets/css/ruben/massagens.css">
	<link rel="stylesheet" href="assets/css/ruben/corpoInteiro.css">
	<link rel="stylesheet" href="assets/css/ruben/costas.css">
	<link rel="stylesheet" href="assets/css/ruben/listaProdutos.css">
	<link rel="stylesheet" href="assets/css/ruben/dashboard.css">
	<link rel="stylesheet" href="assets/css/ruben/marcacao.css">
	<link rel="stylesheet" href="assets/css/ruben/loja.css">
	<link rel="stylesheet" href="assets/css/ruben/produto.css">

	<!-- SCRIPTS -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
	<!-- MAIN CONTENT -->
	<h1 class="sr-only">Index</h1>

	<?php		
		# PAGE SYSTEM
		if (isset($_GET["pagina"])) {
			$pag = $_GET["pagina"];
			# NAVBAR	
			include "navbar.php";
			include($pag);
		}
		else {
			include "preloader.php"; 
			# NAVBAR	
			include "navbar.php";
			include "pPages/inicial.php";
			echo "<script src='assets/js/preloader.js'></script>";
		}
	?>

	<!-- SCRIPTS -->
	<script src="assets/anime-master/lib/anime.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.8/fullpage.min.js"></script>
	<script src="assets/js/sidenav.js"></script>
	<script src="assets/js/bodys.js"></script>
	<script src="assets/js/navbar.js"></script>
	<script src="assets/js/searchNavbar.js"></script>
	<script src='assets/js/tagTitle.js'></script>


	<!-- JOAO -->
	<script src="assets/js/joao/maquilhagem.js"></script>
	<script src="assets/js/joao/form_contactos.js"></script>

	<!-- NUNO -->
	<script src="assets/js/nuno/animar.js"></script>
	<script src="assets/js/nuno/cartas.js"></script>
	<script src="assets/js/nuno/fullPageScroll.js"></script>
	<script src="assets/js/nuno/bar_nav.js"></script>
	<script src="assets/js/nuno/infoUnhas.js"></script>
	<script src="assets/js/nuno/fundoUnhas.js"></script>
	<script src="assets/js/nuno/searchUnhas.js"></script>
	
	<!-- RUBEN -->
	<script src="assets/js/ruben/massagens.js"></script>
	<script src="assets/js/ruben/marcacao.js"></script>
	<script src="assets/js/ruben/produto.js"></script>
	<script src="assets/js/ruben/listaProdutos.js"></script>
	<script src="assets/js/ruben/filtrosProdutos.js"></script>
</body>
</html>