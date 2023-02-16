<!-- DIV AGENDA -->
<div id="div-agenda" class="container-fluid">
	<div class="row">
	</div>
	<div class="row">
		<!-- Esconder a criação de eventos a funcionários -->
		<?php if ($_SESSION['estatuto'] == "Administrador") { ?>
			<div class="col-3 border-right">
				<h1 id="title-agenda">Agendar evento</h1>
				<div id="div-form">

					<!-- FORM CREATE EVENT -->
					<form action="#" method="post" id="form-agenda">
						<label for="inp-date-inicio">Data evento</label>
						<input type="datetime-local" id="inp-date-inicio" class="form-control" name="dataInicio">

						<label for="inp-date-fim">Descrição</label>
						<textarea name="mensagem" cols="30" rows="10" id="textarea-agenda" class="form-control" placeholder="Escreva aqui"></textarea>

						<span id="span-info" class="small">campos obrigatórios</span>

						<div class="d-flex mt-4">
							<button type="submit" id="btn-criar" class="btn w-50">Criar</button>
							<button type="reset" id="btn-limpar" class="btn w-50">Limpar</button>
						</div>
					</form>
				</div>
			</div>
		<?php } ?>
		
		<div class="<?php echo (($_SESSION['estatuto'] == "Administrador") ? "col-9" : "col") ?>">
			<?php if ($_SESSION['estatuto'] != "Administrador")
				echo "<h1 id='title-agenda'>Agenda</h1>"; ?>
			<div id="calendar"></div>
		</div>
	</div>
</div>

<!-- INCLUDE AGENDADB -->
<?php include("nPages/agendadb.php"); ?>

<!-- MODALS -->
<?php include("nPages/modal_ver_evento.php"); ?>