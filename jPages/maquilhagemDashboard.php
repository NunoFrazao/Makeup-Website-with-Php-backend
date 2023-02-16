<?php// include "modals-massagensDashboard.php"; ?>

<div class="container-fluid" id="areaTabelaMaquilhagem">
  <h1>Descrição Maquilhagem</h1>

  <div class="row">
    <table class="table mt-3" id="tabelaMaquilhagem">
        <thead>
            <tr>
                <th>ID</th>
                <th>Serviço</th>
                <th>Descrição</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sqlMostrarMaquilhagem = "SELECT * FROM v_completa_subservico_descricao WHERE id_subservico IN(6, 7)";
                $result = $conn->query($sqlMostrarMaquilhagem);

                if ($result) {
                  while ($row = $result->fetch_assoc()) {
                      $idDescricao = $row["id_descricao"];
                      $nome = $row["nome"];
                      $descricao = $row["descricao"];

                      echo "
                      <tr>
                        <td>$idDescricao</td>
                        <td class='nomeSubservico'>$nome</td>
                        <td>$descricao</td>
                        <td>
                          <div data-toggle='modal' data-target='#exampleModal' class='botoesTabMaquilhagem'>
                            <a onclick=\"document.getElementById('idSubservicoDescricaoHidden').value='".$idDescricao."';document.getElementById('editarDescricaoMaquilhagem').value='".$descricao."';\"><i class='far fa-edit opcoes'></i></a>
                          </div>

                          <div class='botoesTabMaquilhagem'>
                            <a onclick='location.reload();'><i class='far fa-sync-alt opcoes'></i></a>
                          </div>
                        </td>
                      </tr>";
                    }
                }
            ?>
        </tbody>
    </table>

  <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" id="conteudoModal">
          <div class="modal-header" id="tituloModal">
            <h3 class="modal-title" id="exampleModalLabel">Alterar descrição de Serviço</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="?pagina=jPages/maquilhagemDashboard.php" method="post">
            <div class='modal-body'>
            <textarea name="editarDescricaoMaquilhagem" class="form-control" id="editarDescricaoMaquilhagem" rows="10"></textarea>
            </div>
           <div class='modal-footer border-0'>
              <input type="hidden" name="idSubservicoDescricaoHidden" value="" id="idSubservicoDescricaoHidden">
              <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
              <button type='submit' name="btnAlterarDescricaoMaquilhagem" class='btn btn-primary'>Alterar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>




<?php
if (isset($_POST["btnAlterarDescricaoMaquilhagem"])) {
  $txtHidden = $_POST["idSubservicoDescricaoHidden"];
  $txtAlterarTexto = $_POST["editarDescricaoMaquilhagem"];
  $sqlAlterarMaquilhagem = "UPDATE subservico_descricao SET descricao = '$txtAlterarTexto' WHERE subservico_descricao.id_subservico = '$txtHidden' AND subservico_descricao.id_descricao = '$txtHidden'";
  $result = $conn->query($sqlAlterarMaquilhagem);
  if ($result) {
    echo "o texto foi alterado com sucesso";
  }else {
    echo "não deu para alterar";
  }
}
?>
