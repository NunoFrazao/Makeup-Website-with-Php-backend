<main>
	<!-- SUMMERNOTE -->
	<div id="div-descr-unhas" class="container-fluid">
		<!-- TITLE -->
		<h1 id="edit-title">Descrições unhas</h1>

		<div id="row-texts" class="row">
			<!-- SEARCH BAR -->
			<input id="search-bar" class="form-control" type="text" onkeyup="searchUsersDashboard()" placeholder="Pesquise aqui..." title="Introduza um titulo">

			<!-- TABLE DESCRICOES UNHAS -->
			<table id="table-unhas" class="table table-striped mt-3">
				<caption class="d-none">Descrições</caption>
				<thead id="head-table">
					<tr>
						<th class="theaders">ID<i class="fas fa-sort sort-icon"></i></th>
						<th class="theaders">Serviço<i class="fas fa-sort sort-icon"></i></th>
						<th class="theaders">Descrição<i class="fas fa-sort sort-icon"></i></th>
						<th class="text-center theaders">Mais informação</th>
					</tr>
				</thead>

				<tbody id="body-descr-unhas">
					<?php

					# QUERY
					$descricoes = $conn->query("SELECT * FROM v_completa_subservico_descricao WHERE id_subservico IN (1,2,3,4);");

					while ($row = mysqli_fetch_array($descricoes)) {
						echo "<tr>";
						echo "<td class='ids tds'>".$row['id_descricao']."</td>";
						echo "<td class='ids tds'>".$row['nome']."</td>";
						echo "<td class='descricoesUnhas tds'>".$row['descricao']."</td>";
						echo "<td class='text-center moreUnhas tds'>"?>
						<span data-toggle="modal" data-target="#modal-ver-desc">
							<button id='buttonEdit' class='btn btn-sm w-40 pl-3 pr-3' data-toggle="tooltip" data-placement="top" title="Ver descrição"><i class='fal fa-eye'></i></button>
						</span>
						<span>
							<button id='buttonEdit' class='btn btn-sm w-40 pl-3 pr-3' data-toggle="tooltip" data-placement="top" title="Editar descrição"><i class='fal fa-edit'></i></button>
						</span>
						<?php
						echo "</td>";
						echo "</tr>";
					}

					?>

				</tbody>
			</table>
			<span id="no-results" class="w-100 text-center">Sem resultados!</span>
		</div>
	</div>
</main>

<!-- MODALS -->
<?php include("modal_ver_descricao.php") ?>