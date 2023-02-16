<!-- SEARCH BAR -->
<div class="search-div">
	<span><i class="fal fa-search"></i></span>
	<input id="search-unhas" class="search-bar" onkeyup="searchUnhas()" type="text" placeholder="Pesquise aqui..." title="Pesquise aqui...">
</div>

<!-- TABLE UNHAS -->
<table id="table-unhas" class="table table-galeria">
	<caption>Imagens galeria unhas</caption>
	<thead>
		<tr>
			<th class="text-center" scope="col">Imagem</th>
			<th class="text-left" scope="col">ID</th>
			<th class="text-left" scope="col">Descricao</th>
			<th class="text-left" scope="col">Data Criação</th>
			<th class="text-center" scope="col" colspan="2"> </th>
		</tr>
	</thead>
	<tbody id="tbody-unhas">

		<?php

		# PAGINATION SYSTEM
		if (isset($_GET["page"])) {
			$pageNum = $_GET["page"];
		}
		else {
			$pageNum = 1;
		}

		# ROWS PER PAGE
		$rowsPerPage = 6;
		$offset = ($pageNum - 1) * $rowsPerPage;

		# COUNT ALL ROWS
		$sqlNumRegistos = $conn->query("SELECT COUNT(*) FROM fotogaleria WHERE id_servico = 1;");
		$totalRows = $sqlNumRegistos->fetch_array()[0];
		$totalPages = ceil($totalRows / $rowsPerPage);


		# QUERY
		$users = $conn->query("SELECT id_fotografia, descricao, data_publicacao, caminho, id_servico FROM fotogaleria WHERE id_servico = 1 ORDER BY id_fotografia DESC LIMIT $offset, $rowsPerPage;");

		while ($row = mysqli_fetch_array($users)) {
			echo "<tr>";
			echo "<td class='text-center'>";

			if (!file_exists($row['caminho'])) {
				echo "<img src='assets/img/users/default-user.jpg'>";
			}else{
				echo "<a href='".$row['caminho']."' data-lightbox='".$row['caminho']."' data-title='".$row['descricao']."'><img src='".$row['caminho']."'></a>";
			}

			echo "</td>";
			echo "<td>".$row['id_fotografia']."</td>";
			echo "<td class='descr-foto'>".$row['descricao']."</td>";
			echo "<td>".date("d-m-Y", strtotime($row['data_publicacao']))."</td>";

			echo "<td class='text-center'><a class='btn btn-sm w-100' href='#'><i class='fal fa-edit'></i></a></td>";

			echo "<td class='text-center'><a href='#' class='btn btn-sm w-100 apagar-btn' data-toggle='modal' data-target='#modal-del-foto' onclick=\"document.getElementById('inp-id-see').value='".$row['id_fotografia']."';\"><i class='fas fa-trash'></i></a></td>";

			echo "</tr>";
		}

		?>

	</tbody>
</table>

<p class="w-100 text-center no-results">0 resultados encontrados!</p>

<!-- PAGINATION -->
<nav class="table-pagination" aria-label="Navegação de páginas">
	<ul class="pagination justify-content-end">
		<li class="page-item <?php if($pageNum <= 1){ echo 'disabled'; } ?>">
			<a href="<?php if($pageNum <= 1){ echo '#'; } else { echo "?pagina=nPages/galeriaDashboard.php&type=unhas&page=".($pageNum - 1); } ?>" class="page-link">Anterior</a>
		</li>
		<?php 

		$i = 1;

		while ($i <= $totalPages) {
			# SHOWS PAGINATION AND ADD CLASS .ACTIVE TO THE NUMBER EQUAL TO $I
			echo "<li class='page-item "; if ($i == $_GET["page"]) echo 'active'; echo "'><a class='page-link' href='?pagina=nPages/galeriaDashboard.php&type=unhas&page=$i'>$i</a></li>";
			$i++;
		}

		?>
		<li class="page-item <?php if($pageNum >= $totalPages){ echo 'disabled'; } ?>">
			<a href="<?php if($pageNum >= $totalPages){ echo '#'; } else { echo "?pagina=nPages/galeriaDashboard.php&type=unhas&page=".($pageNum + 1); } ?>" class="page-link">Próxima</a>
		</li>   
	</ul>
</nav>