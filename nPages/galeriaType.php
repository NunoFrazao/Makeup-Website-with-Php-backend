<!-- GALERIA UNHAS -->
<div id="unhasGal" class="container unhasGal">
	<div class="row">

		<!-- GALLERY -->
		<div class="col-12 div-img-unhas">

			<div class="row rows">

				<?php

				# QUERY
				$unhas = $conn->query("SELECT id_fotografia, descricao, caminho, id_servico FROM fotogaleria WHERE id_servico = 1 ORDER BY id_fotografia DESC;");

				# LOOP THROUGH ALL ROWS
				while ($row = mysqli_fetch_array($unhas)) {
					echo "<div class='col-6 col-md-5 col-lg-3 columns-unhas'>";

					if (!file_exists($row['caminho'])) {
						echo "<img src='assets/img/users/default-user.jpg'>";
					}else{
						echo "<a href='".$row['caminho']."' data-lightbox='roadtrip' data-title='".$row['descricao']."'><img src='".$row['caminho']."'></a>";
					}

					echo "</div>";
					
				}

				?>

			</div>

		</div>
	</div>
</div>

<!-- GALERIA MAQUILHAGEM -->
<div id="maquiGal" class="container unhasGal">
	<div class="row">

		<!-- GALLERY -->
		<div class="col-12 div-img-unhas">

			<div class="row rows">

				<?php

				# QUERY
				$maqui = $conn->query("SELECT id_fotografia, descricao, caminho, id_servico FROM fotogaleria WHERE id_servico = 2 ORDER BY id_fotografia DESC;");

				# LOOP THROUGH ALL ROWS
				while ($row = mysqli_fetch_array($maqui)) {
					echo "<div class='col-6 col-md-5 col-lg-3 columns-unhas'>";

					if (!file_exists($row['caminho'])) {
						echo "<img src='assets/img/users/default-user.jpg'>";
					}else{
						echo "<a href='".$row['caminho']."' data-lightbox='roadtrip' data-title='".$row['descricao']."'><img src='".$row['caminho']."'></a>";
					}

					echo "</div>";
					
				}

				?>

			</div>

		</div>
	</div>
</div>

<!-- GALERIA MASSAGEM -->
<div id="massaGal" class="container unhasGal">
	<div class="row">

		<!-- GALLERY -->
		<div class="col-12 div-img-unhas">

			<div class="row rows">

				<?php

				# QUERY
				$massa = $conn->query("SELECT id_fotografia, descricao, caminho, id_servico FROM fotogaleria WHERE id_servico = 3 ORDER BY id_fotografia DESC;");

				# LOOP THROUGH ALL ROWS
				while ($row = mysqli_fetch_array($massa)) {
					echo "<div class='col-6 col-md-5 col-lg-3 columns-unhas'>";

					if (!file_exists($row['caminho'])) {
						echo "<img src='assets/img/users/default-user.jpg'>";
					}else{
						echo "<a href='".$row['caminho']."' data-lightbox='roadtrip' data-title='".$row['descricao']."'><img src='".$row['caminho']."'></a>";
					}

					echo "</div>";
					
				}

				?>

			</div>

		</div>
	</div>
</div>