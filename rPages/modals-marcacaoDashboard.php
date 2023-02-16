<?php
    // Definirdata mínima para o input datetime-local

    // Obter data atual
    $dataMin = new DateTime(date("Y-m-d", time()));
    $dataMin = $dataMin->format("Y-m-d");
?>

<!-- Modal confirmar marcação -->

<div class='modal fade' id='confirmarMarcacao' tabindex='-1' role='dialog' aria-labelledby='confirmarMarcacaoTitle' aria-hidden='true'>
  <div class='modal-dialog modal modal-dialog-centered text-center' role='document'>
    <div class='modal-content '>
      <div class='modal-header border-0'>
        <h5 class='modal-title text-uppercase' id='confirmarMarcacaoTitle'>Confirmar pedido</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <form action="?pagina=rPages/confirmMarcacao.php" method="post" class="needs-validation" novalidate>
        <div class='modal-body'>
          <p>Pretende confirmar a marcação?</p>
          <small>Antes de confirmar introduza a data da marcação</small>
          <input type="datetime-local" name="dataMarcacao" class="mt-3" id="inputDataMarcacao" min="<?php echo $dataMin ?>T00:00" required>
          <div class="invalid-feedback mt-2">
            Por favor introduza a data de marcação
          </div>
        </div>
       <div class='modal-footer border-0'>
          <input type="hidden" name="idMarcacaoHidden" value="" id="idMarcacaoHidden">
          <button type='submit' name="confirmMarcacaoSubmit" class='btn rounded-pill modalBtn'>Confirmar</button>
          <button type='button' class='btn rounded-pill dismissBtn' data-dismiss='modal'>Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal informação da marcação -->

<div class="modal fade modal-marcacao-info" id="informacaoMarcacao" tabindex="-1" role="dialog" aria-labelledby="informacaoMarcacaoTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document" id="modalMarcacaoMain">
    <div class="modal-content pt-3">
      <div class="modal-header border-0">
        <h5 class="modal-title text-uppercase ml-4" id="informacaoMarcacaoTitle">Informação do pedido</h5>
      </div>
      <div class="modal-body">
          <div class="container-fluid pt-3">
              <div class="row">
                  <div class="col-4 border-right px-4 infoCliente">
                      <div class="row">
                          <div class="col">
                                <img src="assets/img/users/default-user.jpg" alt="Foto de perfil" class="rounded-circle mr-4" id="fotoPerfil" height=70 width=70>
                                <span id="nomeUtilizador"></span>
                          </div>
                      </div>
                      <div class="row pb-4 mt-5">
                          <div class="col-5 font-weight-bold">Pedido nº</div>
                          <div class="col-7" id="idMarcacao"></div>
                      </div>
                      <div class="row pb-4">
                          <div class="col-5 font-weight-bold">Estado</div>
                          <div class="col-7" id="estado"></div>
                      </div>
                      <div class="row pb-4">
                          <div class="col-5 font-weight-bold" id="dataTitle"></div>
                          <div class="col-7" id="data"></div>
                      </div>
                      <div class="row pb-4">
                          <div class="col-5 font-weight-bold" id="horaTitle"></div>
                          <div class="col-7" id="hora"></div>
                      </div>
                      <div class="row pb-4" id="dataPedidoRow">
                          <div class="col-5 font-weight-bold">Data Pedido</div>
                          <div class="col-7" id="dataPedido"></div>
                      </div>
                      <div class="row pb-4">
                          <div class="col-5 font-weight-bold">Funcionário</div>
                          <div class="col-7" id="funcionario"></div>
                      </div>
                      <div class="row pb-4 mb-4">
                          <div class="col-5 font-weight-bold">Telefone</div>
                          <div class="col-7" id="telefone"></div>
                      </div>
                
                  </div>
                  <div class="col border-left border-right px-4 resumo">
                      <h2 class="subTitle">Servi&ccedil;os Pretendidos</h2>
                      <ul id="listaServicos" class="list-unstyled mt-5"></ul>
                      <p id="valorTotal">Total:&nbsp;<span id="valor" class="font-weight-bold"></span></p>
                  </div>
                  <div class="col px-4 border-left">
                      <h2 class="subTitle">Mensagem</h2>
                      <div id="mensagem" class="mt-5"></div>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal-footer border-0">
          <button type="button" class="btn rounded-pill modalBtn" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal confirmar marcação -->

<div class='modal fade' id='eliminarMarcacao' tabindex='-1' role='dialog' aria-labelledby='eliminarMarcacaoTitle' aria-hidden='true'>
  <div class='modal-dialog modal modal-dialog-centered text-center' role='document'>
    <div class='modal-content '>
      <div class='modal-header border-0'>
        <h5 class='modal-title text-uppercase' id='eliminarMarcacaoTitle'>Eliminar Marcação</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <form action="?pagina=rPages/eliminarMarcacao.php" method="post">
        <div class='modal-body'>
          <p>Tem a certeza que pretende eliminar a marcação?</p>
        </div>
       <div class='modal-footer border-0'>
          <input type="hidden" name="idMarcacaoEliminarHidden" value="" id="idMarcacaoEliminarHidden">
          <button type='submit' name="confirmEliminarMarcacao" class='btn rounded-pill modalBtn'>Confirmar</button>
          <button type='button' class='btn rounded-pill dismissBtn' data-dismiss='modal'>Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>