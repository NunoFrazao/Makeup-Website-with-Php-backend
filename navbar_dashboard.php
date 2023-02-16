<?php
	// Definir variáveis
	$idFuncionario = $_SESSION["id_funcionario"];
	$estatuto = $_SESSION["estatuto"];
?>

<!-- NAVBAR DASHBOARD -->
<div id="mySidenav" class="sidenav">
	<input type="checkbox" id="check">

	<header id="headerNav">
		<div class="left_area">
			<a href="index.php" target="_blank"><h3>Pureaura</h3></a>
		</div>
		<!-- Alert marcação confirmada com sucesso -->
		<?php
			if (isset($_SESSION["marcacaoConfirmada"])) {
				echo "<div class='alert alert-success fade show' role='alert' id='marcacaoConfirmadaAlert'>
						Marcação confirmada com sucesso
					</div>
					
					<script>
						(function () {
							setTimeout(() => {
								$('#marcacaoConfirmadaAlert').alert('close');  
							}, 3000);
						})();
					</script>";

				unset($_SESSION["marcacaoConfirmada"]);
			}

			if (isset($_SESSION["produtoAdicionadoSucesso"])) {
				echo "<div class='alert alert-success fade show' role='alert' id='marcacaoConfirmadaAlert'>
						Produto adicionado com sucesso
					</div>
					
					<script>
						(function () {
							setTimeout(() => {
								$('#marcacaoConfirmadaAlert').alert('close');  
							}, 3000);
						})();
					</script>";

				unset($_SESSION["produtoAdicionadoSucesso"]);
			}

			if (isset($_SESSION["marcacaoEliminada"])) {
				echo "<div class='alert alert-success fade show' role='alert' id='marcacaoConfirmadaAlert'>
						Marcação eliminada com sucesso
					</div>
					
					<script>
						(function () {
							setTimeout(() => {
								$('#marcacaoConfirmadaAlert').alert('close');  
							}, 3000);
						})();
					</script>";

				unset($_SESSION["marcacaoEliminada"]);
			}

			if (isset($_SESSION["produtoEliminado"])) {
				echo "<div class='alert alert-success fade show' role='alert' id='marcacaoConfirmadaAlert'>
						Produto eliminado com sucesso
					</div>
					
					<script>
						(function () {
							setTimeout(() => {
								$('#marcacaoConfirmadaAlert').alert('close');  
							}, 3000);
						})();
					</script>";

				unset($_SESSION["produtoEliminado"]);
			}

			if (isset($_SESSION["produtoAtualizado"])) {
				echo "<div class='alert alert-success fade show' role='alert' id='marcacaoConfirmadaAlert'>
						Produto atualizado com sucesso
					</div>
					
					<script>
						(function () {
							setTimeout(() => {
								$('#marcacaoConfirmadaAlert').alert('close');  
							}, 3000);
						})();
					</script>";

				unset($_SESSION["produtoAtualizado"]);
			}
		?>
		<div class="right_area">
			<a href="index.php" class="logout_btn">Sair</a>
		</div>
	</header>
	
	<div class="sidebar">
		<label id="labelLogo" for="check">
			<i class="fas fa-bars" id="sidebar_btn"></i>
		</label>
		<div id="infoUser">
			<?php
				$sql = "SELECT foto_perfil FROM funcionario WHERE id_funcionario = $idFuncionario;";
				$result = $conn->query($sql);

				if ($result) {
					while ($row = $result->fetch_assoc()) {
						$foto = $row["foto_perfil"];
						
						if ($foto == null) 
							$foto = "assets/img/26763.png";

						echo "<img src='$foto' class='profile_image' alt='Foto de perfil'>";
					}
				}
			?>
			<h4 class="mt-2">
				<?php
					$sql = "SELECT nome FROM funcionario WHERE id_funcionario = $idFuncionario;";
					$result = $conn->query($sql);

					if ($result) {
						while ($row = $result->fetch_assoc()) {
							if ($idFuncionario == 1)
								echo "Administrador";
							else 
								echo $row["nome"];
						}
					}
				?>
			</h4>
		</div>

		<a href="?pagina=dashboard.php" class="anc-side"><i class="fas fa-desktop"></i><span>Dashboard</span></a>

		<!-- Esconder opções aos funcionários -->

		<?php
			if ($_SESSION['estatuto'] == "Administrador") { ?>
				<a id="serv-anc" class="anc-side" data-toggle="collapse" href="#collapseServicos" role="button" aria-expanded="false" aria-controls="collapseServicos"><i class="fas fa-th"></i><span>Serviços </span><span id="icon-arrow-down"><i class="fal fa-chevron-down"></i></span></a>

				<div class="collapse" id="collapseServicos">
					<div class="card card-body">
						<a href="?pagina=pPages/homeDashboard.php" class="anc-side"><span>Home</span></a>
						<a href="?pagina=nPages/unhasDashboard.php" class="anc-side"><span>Unhas</span></a>
						<a href="?pagina=jPages/maquilhagemDashboard.php" class="anc-side"><span>Maquilhagem</span></a>
						<a href="?pagina=rPages/massagensDashboard.php" class="anc-side"><span>Massagens</span></a>
					</div>
				</div>
		<?php } ?>

		<a href="?pagina=rPages/marcacaoDashboard.php&estado=pendente&page=1" class="anc-side"><i class="fas fa-calendar-check"></i><span>Marcações</span></a>
		<a href="?pagina=rPages/lojaDashboard.php&page=1" class="anc-side"><i class="fas fa-store-alt"></i><span>Loja</span></a>
		
		<?php if ($_SESSION['estatuto'] == "Administrador") { ?>
			<a href="?pagina=nPages/galeriaDashboard.php&type=unhas&page=1" class="anc-side"><i class="far fa-image"></i><span>Galeria</span></a>
		<?php } ?>

		<a href="?pagina=nPages/agenda.php" class="anc-side"><i class="far fa-calendar-alt"></i><span>Agenda</span></a>

		<?php if ($_SESSION['estatuto'] == "Administrador") { ?>
			<a href="?pagina=jPages/mensagens_FaQ.php" class="anc-side"><i class="fas fa-envelope"></i><span>Apoio ao Cliente</span></a>
			<a href="?pagina=pPages/users.php" class="anc-side"><i class="fas fa-user"></i><span>Utilizadores</span></a>
		<?php } ?>
	</div>
</div>