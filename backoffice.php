<?php 
	session_start();
	
	if (!isset($_SESSION["authenticated"]) || (!isset($_SESSION["estatuto"]))) {
		header("Location: index.php");
		exit();
	}
	require_once "dbconnection.php";
?>

<!DOCTYPE html>

<html lang="pt">

<head>
	<title>Pureaura - Dashboard</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Pureaura Página Massagens">
	<meta name="keywords" content="Estética, Esteticismo, Beleza, Unhas, Maquilhagem, Massagens">
	<meta name="author" content="João Onofre, Nuno Frazão, Pedro Clemente, Rúben Gaspar">
	<link rel="stylesheet" href="assets/bootstrap-4.4.1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/summernote/summernote-bs4.min.css">
	<link rel="stylesheet" href="assets/fullcalendar/packages/core/main.min.css">
    <link rel="stylesheet" href="assets/fullcalendar/packages/daygrid/main.min.css">
    <link rel="stylesheet" href="assets/fullcalendar/packages/list/main.min.css">
    <link rel="stylesheet" href="assets/fullcalendar/packages/timegrid/main.min.css">
	<link rel="stylesheet" href="assets/css/backoffice.css">
	<link rel="stylesheet" href="assets/css/navbar_dashboard.css">
	<link rel="stylesheet" href="assets/css/lang.css">
	<link rel="stylesheet" href="assets/css/selection.css">
	<link rel="stylesheet" href="assets/css/alerts-backoffice.css">
	<link rel="stylesheet" href="assets/css/dashboard.css">
	<link rel="stylesheet" href="assets/css/dashboardCalendar.css">
	
	<!-- JOAO -->
	<link rel="stylesheet" href="assets/css/joao/estilos_maquilhagemDashboard.css">
	<link rel="stylesheet" href="assets/css/joao/estilos_perfil_utilizador_Dashboard.css">

	<!-- PEDRO -->
	<link rel="stylesheet" href="assets/css/pedro/users.css">
	<link rel="stylesheet" href="assets/css/pedro/homeDashboard.css">

	<!-- NUNO -->
	<link rel="stylesheet" href="assets/css/nuno/unhasDashboard.css">
	<link rel="stylesheet" href="assets/css/nuno/modals.css">
	<link rel="stylesheet" href="assets/css/nuno/agenda.css">
	<link rel="stylesheet" href="assets/css/nuno/galeriaDashboard.css">

	<!-- RUBEN -->

	<link rel="stylesheet" href="assets/css/ruben/dashboard.css">
	<link rel="stylesheet" href="assets/css/ruben/marcacaoDashboard.css">
	<link rel="stylesheet" href="assets/css/ruben/modals-marcacaoDashboard.css">
	<link rel="stylesheet" href="assets/css/ruben/lojaDashboard.css">
	<link rel="stylesheet" href="assets/css/ruben/modals-lojaDashboard.css">
	<link rel="stylesheet" href="assets/css/ruben/massagensDashboard.css">
	<link rel="stylesheet" href="assets/css/ruben/modals-massagensDashboard.css">

	<!-- SCRIPTS -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
	<!-- MAIN CONTENT -->
	<h1 class="sr-only">Backoffice</h1>
	<a href="#teste" class=""></a>

	<!-- DIV NAVBAR -->
	<div id="nav">
		<?php require("navbar_dashboard.php"); ?>
	</div>
	
	<!-- DIV CONTENT -->
	<div id="conteudoPrincipal">
		<?php

			# PAGE SYSTEM
		if (isset($_GET["pagina"])) {
			$pag = $_GET["pagina"];
			include($pag);
		}else{
			include("dashboard.php");
		}

		?>
	</div>

	<!-- SCRIPTS -->
	<script src="assets/anime-master/lib/anime.min.js"></script>
	<script src="assets/summernote/summernote-bs4.min.js"></script>
	<script src="assets/fullcalendar/packages/core/main.min.js"></script>
    <script src="assets/fullcalendar/packages/interaction/main.min.js"></script>
    <script src="assets/fullcalendar/packages/daygrid/main.min.js"></script>
    <script src="assets/fullcalendar/packages/list/main.min.js"></script>
    <script src="assets/fullcalendar/packages/timegrid/main.min.js"></script>
	<script src="assets/js/navbarDashboard.js"></script>
	<script src="assets/js/validation-formsDashboard.js"></script>
	<script src="assets/js/tableIconsDashboard.js"></script>

	<!-- NUNO -->
	<script src="assets/js/nuno/summernote.js"></script>
	<script src="assets/js/nuno/unhasDasboard.js"></script>
	<script src="assets/js/nuno/searchUnhasDashboard.js"></script>
	<script src="assets/js/nuno/sortingUnhas.js"></script>
	<script src="assets/js/nuno/summernote.js"></script>
	<script src="assets/js/nuno/countRowsGaleria.js"></script>
	<script src="assets/js/nuno/triggerClick.js"></script>

	<!-- RUBEN -->
	<script src="assets/js/ruben/modals-marcacaoDashboard.js"></script>
	<script src="assets/js/ruben/searchLojaDashboard.js"></script>
	<script src="assets/js/ruben/searchMarcacaoDashboard.js"></script>
	<script src="assets/js/ruben/modals-lojaDashboard.js"></script>
	<script src="assets/js/ruben/modals-MassagensDashboard.js"></script>
</body>
</html>