<!-- Modal ver mais descricao massagem -->

<div class='modal fade' id='verMaisMassagemDescricao' tabindex='-1' role='dialog' aria-labelledby='verMaisMassagemDescricaoTitle' aria-hidden='true'>
  <div class='modal-dialog modal-lg modal-dialog-centered text-center' role='document'>
    <div class='modal-content '>
      <div class='modal-header border-0'>
        <h5 class='modal-title text-uppercase' id='verMaisMassagemDescricaoTitle'>Informação Descrição</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <form action="?pagina=rPages/deleteProduct.php" method="post">
        <div class='modal-body'>
          <textarea name="massagemDescricaoVerMais" class="form-control" id="massagemDescricaoVerMais" cols="30" rows="10" disabled></textarea>
        </div>
       <div class='modal-footer border-0'>
          <button type='button' class='btn rounded-pill modalBtn' data-dismiss='modal'>Fechar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal editar descricaao massagem -->

<div class='modal fade' id='editarMassagemDescricao' tabindex='-1' role='dialog' aria-labelledby='editarMassagemDescricaoTitle' aria-hidden='true'>
  <div class='modal-dialog modal-lg modal-dialog-centered text-center' role='document'>
    <div class='modal-content '>
      <div class='modal-header border-0'>
        <h5 class='modal-title text-uppercase' id='editarMassagemDescricaoTitle'>Editar Descrição</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <form action="?pagina=rPages/editarMassagemDescricao.php" method="post">
        <div class='modal-body'>
        <textarea name="massagemDescricaoEditar" class="form-control" id="massagemDescricaoEditar" cols="30" rows="10"></textarea>
        </div>
       <div class='modal-footer border-0'>
          <input type="hidden" name="idSubservicoDescricaoHidden" value="" id="idSubservicoDescricaoHidden"> 
          <button type='submit' name="confirmEditarMassagemDescricao" class='btn rounded-pill modalBtn'>Editar</button>
          <button type='button' class='btn rounded-pill dismissBtn' data-dismiss='modal'>Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>