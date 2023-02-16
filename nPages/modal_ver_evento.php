<!-- MODAL CLICK EVENT -->
<div class="modal fade" id="modalClickDay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<!-- MODAL HEADER -->
			<div class="modal-header border-0">
				<h5 class="modal-title" id="title-modal">Informação Evento</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="#" method="post" id="form-see-event">
				<!-- MODAL BODY -->
				<div class="modal-body">
					<div id="body-content" class="row">

						<!-- FORM SEE DATA FROM EVENT -->
						<label for="inp-id">Nº de Marcação</label>
						<input type="text" name="numeromarc" disabled id="inp-id" class="form-control">



						<label for="inp-nome">Nome/Mensagem</label>
						<textarea name="inp-nome" id="inp-nome" cols="30" rows="10" disabled class="form-control"></textarea>


						<label for="inp-data">Data evento</label>
						<input type="text" name="data" value="" id="inp-start" disabled class="form-control">
					</div>
				</div>

				<!-- MODAL FOOTER -->
				<div class="modal-footer border-0">
					<button type="button" id="btn-cancelar" class="btn" data-dismiss="modal">Fechar</button>
				</div>
			</form>

		</div>
	</div>
</div>