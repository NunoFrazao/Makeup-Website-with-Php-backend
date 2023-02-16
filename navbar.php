<div class="opacity"></div>

<!-- SIDE NAVBAR -->
<div id="mySidenav" class="sidenav">
	<a id="close-sidenav" class="closebtn side-nav-anc" href="javascript:void(0)">&times;</a>
	<?php 
	if(isset($_SESSION['authenticated'])){
		?><a class="side-nav-anc" href="?pagina=pPages/logout.php">Logout</a><?php
	}else{
		?><a class="side-nav-anc" href="?pagina=pPages/Login.php">Entrar</a><?php
	}
	?>
	<a class="side-nav-anc" href="?pagina=nPages/unhas.php">Unhas</a>
	<a class="side-nav-anc" href="?pagina=jPages/maquilhagem.php">Maquilhagem</a>
	<a class="side-nav-anc" href="?pagina=rPages/massagens.php">Massagem</a>
	<a class="side-nav-anc" href="?pagina=rPages/loja.php">Loja</a>
	<a class="side-nav-anc" href="?pagina=nPages/galeria.php">Galeria</a>
	<a class="side-nav-anc" href="?pagina=jPages/contactos.php">Contactos</a>

	<ul id="side-nav-redes" class="list-unstyled">
		<a href="https://www.facebook.com/Sarafrazaomakeup/" target="_blank"><i class="fab fa-facebook-square"></i></a>
		<a href="https://www.instagram.com/sarafrazao.makeup/" target="_blank"><i class="fab fa-instagram"></i></a>
		<a href="https://www.youtube.com/channel/UCzx5lo-mjBloJPln_lipn6w" target="_blank"><i class="fab fa-youtube"></i></a>
	</ul>

	<?php require("lang.php"); ?>
</div>

<!-- MAIN NAVBAR -->
<nav id="nav">

	<!-- ICON SIDE MENU -->
	<div class="nav-item side-menu">
		<svg width="231" height="84" viewBox="0 0 231 84" id="icon-menu">
			<g>
				<path fill="rgb(128,32,32)" fill-rule="evenodd" d="M5 0h221c2.75957512 0 5 2.24042488 5 5v8c0 2.75957512-2.24042488 5-5 5H5c-2.75957512 0-5-2.24042488-5-5V5c0-2.75957512 2.24042488-5 5-5z"/>
				<path fill="rgb(128,32,32)" fill-rule="evenodd" d="M5 66h106c2.75957512 0 5 2.24042488 5 5v8c0 2.75957512-2.24042488 5-5 5H5c-2.75957512 0-5-2.24042488-5-5v-8c0-2.75957512 2.24042488-5 5-5z"/>
			</g>
		</svg>
	</div>

	<!-- LOGOTIPO -->
	<div class="nav-item" id="nav-logo">
		<a href="index.php"><img id="imageLogo" src="assets/img/logo.svg" alt="Logotipo"></a>
	</div>

	<!-- LISTA UL -->
	<div class="nav-item" id="nav-list">
		<ul class="list-unstyled" id="anc-list">

			<li><a href="?pagina=nPages/unhas.php" class="ul-anc">Unhas</a></li>
			<li><a href="?pagina=jPages/maquilhagem.php" class="ul-anc">Maquilhagem</a></li>
			<li><a href="?pagina=rPages/massagens.php" class="ul-anc">Massagem</a></li>
			<li><a href="?pagina=rPages/loja.php" class="ul-anc">Loja</a></li>
			<li><a href="?pagina=nPages/galeria.php" class="ul-anc" id="li-galeria">Galeria</a></li>
			<li><a href="?pagina=jPages/contactos.php" class="ul-anc">Contactos</a></li>
		</ul>

		<!-- HIDDEN SEARCH BAR -->
		<div id="hidden-search">
			<div class="relative-search">
				<form action="">
					<!-- HIDDEN SVG SEARCH -->
					<svg id="searchIconHidden" class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
						<path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
						<path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
					</svg>

					<input class="form-control" type="text" placeholder="Pesquisa pureaura">

					<span id="closeIconHidden"><i class="fal fa-times"></i></span>
				</form>
			</div>
		</div>
	</div>

	<!-- MENU -->
	<div class="nav-item" id="nav-menu">
		<ul class="list-unstyled">
			<li>
				<!-- SVG SEARCH -->
				<div id="divSearchIcon">
					<svg id="searchIcon" class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
						<path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
						<path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
					</svg>
				</div>
			</li>

			<!-- DROPDOWN -->
			<li>
				<div class="dropdown">
					<button id="dropdownMenuButton" class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login<span class="ml-2" id="spanMenu"><i class="fal fa-chevron-down"></i></span></button>
					<div id="menu-drop" class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
						<div class="row">
							<!-- LINKS -->
							<div id="links" class="col-6 border-right">								
								<?php 
									if(isset($_SESSION['authenticated'])) {
										?><a class="dropdown-item" href="?#">Perfil</a><?php
										
										if(isset($_SESSION['estatuto'])) {?>
											<a class="dropdown-item" href="backoffice.php">Backoffice</a><?php
										}
										
										?><a class="dropdown-item" href="?pagina=pPages/logout.php">Logout</a><?php
										
									}else{
										?><a class="dropdown-item" href="?pagina=pPages/Login.php">Entrar</a><?php
									}
								?>								
							</div>

							<!-- SOCIAL & LANG -->
							<div id="social" class="col-6">
								<!-- REDES SOCIAIS -->
								<div id="redes">
									<a href="https://www.facebook.com/Sarafrazaomakeup/" target="_blank">
										<i class="fab fa-facebook-square"></i>
									</a>
									<a href="https://www.instagram.com/sarafrazao.makeup/" target="_blank">
										<i class="fab fa-instagram"></i>
									</a>
									<a href="https://www.youtube.com/channel/UCzx5lo-mjBloJPln_lipn6w" target="_blank">
										<i class="fab fa-youtube"></i>
									</a>
								</div>

								<!-- LINGUA -->
								<div id="lang">
									<p>Português <i class="fal fa-chevron-down"></i></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</nav>