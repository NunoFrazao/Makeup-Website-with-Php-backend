<div id="galeriaCont" class="container-fluid">
	<div class="row">
		<div class="col-12 mb-5">
			<!-- TITLE -->
			<div id="relative">
				<h1 id="title">Galeria Imagens</h1>

				<!-- REDIRECT TO REGISTER PAGE -->
				<a id="anc" class="rounded-pill" type="button" data-toggle="modal" data-target="#modal-add-foto">Adicionar Imagem <i class="fal fa-plus"></i></a>
			</div>
		</div>
		
		<!-- ALL 3 CATEGORIES TABS -->
		<ul id="tabs" class="nav nav-tabs" role="tablist">
			<li class="nav-item text-center">
				<a data-toggle="tab" href="#menu1" class="nav-link <?php if ($_GET["type"] == "unhas") echo "active"; ?>">Unhas</a>
			</li>
			<li class="nav-item text-center">
				<a data-toggle="tab" href="#menu2" class="nav-link <?php if ($_GET["type"] == "maquilhagem") echo "active"; ?>">Maquilhagem</a>
			</li>
			<li class="nav-item text-center">
				<a data-toggle="tab" href="#menu3" class="nav-link <?php if ($_GET["type"] == "massagem") echo "active"; ?>">Massagem</a>
			</li>
		</ul>
		
		<!-- TABS CONTENT -->
		<div id="content-tab" class="tab-content">

			<!-- TAB UNHAS -->
			<div id="menu1" class="tab-pane fade show active">
				<?php require("galeriaUnhasDashboard.php"); ?>
			</div>

			<!-- TAB MAQUILHAGEM -->
			<div id="menu2" class="tab-pane fade">
				<?php require("galeriaMaquilhagemDashboard.php"); ?>
			</div>

			<!-- TAB MASSAGEM -->
			<div id="menu3" class="tab-pane fade">
				<?php require("galeriaMassagemDashboard.php"); ?>
			</div>

		</div>

	</div>
	
</div>

<?php include("modal_add_imgGaleria.php"); ?>
<?php include("modal_delete_img.php"); ?>