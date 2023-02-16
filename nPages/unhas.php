<!-- MAIN CONTENT -->

<!-- SVG BAR DIV -->
<?php include("bar_Info.php"); ?>

<div id="fullpage">
	
	<!-- DIV CONTAINER WITH MARCACOES -->
	<div id="section1" class="section active">
		<div id="unhas-first-content" class="container-fluid">
			<div class="row">
				<!-- DIV IMAGEM -->
				<div id="background-unhas"></div>

				<!-- DIV MARCACOES -->
				<div id="div-marc-unhas" class="col-md-4 div-info-unhas">
					<div id="inside-info-unhas">
						<h1 id="marc-h1" class="inicio">Faça já a sua marcação</h1>
						<p id="marc-paragraph" class="text-justify inicio">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae cumque iste doloremque quisquam!</p>
						<form action="?pagina=rPages/marcacao.php" method="post">
							<button id="btn-unhas-marcacoes" class="inicio">Marcações <i class="fal fa-chevron-right"></i></button>
						</form>
					</div>
				</div>

				<div class="col-md-8"></div>

			</div>
		</div>
	</div>

	<hr>


	<!-- DIV UNHAS GEL -->
	<div id="section2" class="section">
		<div id="unhas-tipo-info" class="container">
			<div class="row">
				<div id="title-gel">
					<h1 id="principal-gel-h1">Onde os pequenos detalhes importam...</h1>
				</div>

				<!-- DIV INFORMATIVE PARAGRAPH -->
				<div id="text-side-unhas" class="col-xl-6 text-justify gel-info">
					<h2 id="verniz-gel-h2">Unhas gel</h2>
					<p>
						<?php
						$sql = "SELECT * FROM subservico_descricao WHERE id_descricao = 1;";

						$result = $conn->query($sql);

						if ($result) {
							while ($row = mysqli_fetch_array($result)) {
								echo $row['descricao'];
							}
						}

						?>
					</p>
					<br>
					<p>
						<?php
						$sql = "SELECT * FROM subservico_descricao WHERE id_descricao = 2;";

						$result = $conn->query($sql);

						if ($result) {
							while ($row = mysqli_fetch_array($result)) {
								echo $row['descricao'];
							}
						}

						?>

						<!-- ANCORA REDIRECT TO GALERY -->
						<a href="?pagina=nPages/galeria.php" id="anc-gal">Ver galeria <span><i class="fal fa-chevron-right"></i></span></a>
					</p>
				</div>

				<!-- DIV NAILS IMAGE -->
				<div id="unhas-img" class="col-xl-6 gel-info">
					<img src="assets/img/nuno/2.jpg" alt="Imagem unhas Gel">
				</div>
			</div>
		</div>
	</div>

	<hr id="hr3">


	<!-- DIV UNHAS GEL COM EXTENSAO -->
	<div id="section3" class="section">
		<div id="unhas-gel-ext" class="container-fluid">
			<div id="title-others">
				<h1 id="verniz-gel-h2">Tipos de verniz</h1>
			</div>

			<div class="row">

				<!-- FIRST -->
				<div class="col-lg-4 bordas">
					<div class="first-border">
						<img src="assets/img/nuno/unhas/12.jpg" alt="Imagem Unhas Verniz Normal">
						<h1>Unhas Gel</h1>
						<p id="paragraph1">
							<?php
							$sql = "SELECT * FROM subservico_descricao WHERE id_descricao = 3;";

							$result = $conn->query($sql);

							if ($result) {
								while ($row = mysqli_fetch_array($result)) {
									echo $row['descricao'];
								}
							}

							?>
						</p>
						<span>Preço: 
							<?php
							$sql = "SELECT * FROM subservico WHERE id_subservico = 1;";

							$result = $conn->query($sql);

							if ($result) {
								while ($row = mysqli_fetch_array($result)) {
									echo number_format ( $row['preco'], 2, ",", "" ) . " €";
								}
							}

							?>
						</span>
					</div>
				</div>

				<!-- SECOND -->
				<div class="col-lg-4 bordas">
					<div class="first-border">
						<img src="assets/img/nuno/unhas/3.jpg" alt="Imagem Unhas Verniz Gel">
						<h1>Verniz Gel</h1>
						<p id="paragraph2">
							<?php
							$sql = "SELECT * FROM subservico_descricao WHERE id_descricao = 4;";

							$result = $conn->query($sql);

							if ($result) {
								while ($row = mysqli_fetch_array($result)) {
									echo $row['descricao'];
								}
							}

							?>
						</p>
						<span>Preço: 
							<?php
							$sql = "SELECT * FROM subservico WHERE id_subservico = 3;";

							$result = $conn->query($sql);

							if ($result) {
								while ($row = mysqli_fetch_array($result)) {
									echo number_format ( $row['preco'], 2, ",", "" ) . " &euro;";
								}
							}

							?>

						</span>
					</div>
				</div>

				<!-- THIRD -->
				<div class="col-lg-4">
					<div class="first-border">
						<img src="assets/img/nuno/unhas/7.jpg" alt="Imagem Unhas Gel">
						<h1>Verniz Normal</h1>
						<p id="paragraph3">
							<?php
							$sql = "SELECT * FROM subservico_descricao WHERE id_descricao = 5;";

							$result = $conn->query($sql);

							if ($result) {
								while ($row = mysqli_fetch_array($result)) {
									echo $row['descricao'];
								}
							}

							?>
						</p>
						<span>Preço: 
							<?php
							$sql = "SELECT * FROM subservico WHERE id_subservico = 4;";

							$result = $conn->query($sql);

							if ($result) {
								while ($row = mysqli_fetch_array($result)) {
									echo number_format ( $row['preco'], 2, ",", "" ) . " &euro;";
								}
							}

							?>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>