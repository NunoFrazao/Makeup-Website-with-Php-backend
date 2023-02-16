<div class="container-fluid" id="areaTabelaMaquilhagem">
  <h1>Apoio ao Cliente</h1>
  <div class="row">
    <table class="table mt-3" id="tabelaMaquilhagem">
        <thead>
            <tr>
                <th>ID</th>
                <th>Assunto</th>
                <th>Mensagem</th>
                <th>Data</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sqlMostrarMaquilhagem = "SELECT mensagem.id_mensagem, mensagem.assunto, mensagem.mensagem, mensagem.data_msg, utilizador.nome, utilizador.email FROM mensagem INNER JOIN mensagem_utilizador ON mensagem.id_mensagem = mensagem_utilizador.id_mensagem INNER JOIN utilizador ON utilizador.id_utilizador = mensagem_utilizador.id_utilizador";
                $result = $conn->query($sqlMostrarMaquilhagem);

                if ($result) {
                  while ($row = $result->fetch_assoc()) {
                      $idMensagem = $row["id_mensagem"];
                      $assunto = $row["assunto"];
                      $mensagem = $row["mensagem"];
                      $dtMensagem = $row["data_msg"];
                      $nome = $row["nome"];
                      $email = $row["email"];

                      echo "
                      <tr>
                        <td>$idMensagem</td>
                        <td>$assunto</td>
                        <td>$mensagem</td>
                        <td>$dtMensagem</td>
                        <td>$nome</td>
                        <td>$email</td>

                        <td>
                          <div data-toggle='modal' data-target='#exampleModal' class='botoesTabMaquilhagem'>
                            <a onclick=\"document.getElementById('idMensagemHidden').value='".$idMensagem."';document.getElementById('editarMensagem').value='".$mensagem."';\"><i class='far fa-edit opcoes'></i></a>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" id="conteudoModal">
          <div class="modal-header" id="tituloModal">
            <h3 class="modal-title" id="exampleModalLabel">Alterar descrição de Serviço</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="?pagina=jPages/mensagens_FaQ.php" method="post">
            <div class='modal-body'>
            <textarea name="editarMensagem" class="form-control" id="editarMensagem" rows="10"></textarea>
            </div>
           <div class='modal-footer border-0'>
              <input type="hidden" name="idMensagemHidden" value="" id="idMensagemHidden">
              <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
              <button type='submit' name="btnAlterarMensagemFAQ" class='btn btn-primary'>Alterar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>

<?php
if (isset($_POST["btnAlterarMensagemFAQ"])) {
  $txtHidden = $_POST["idMensagemHidden"];
  $txtAlterarTexto = $_POST["editarMensagem"];
  $sqlAlterarMensagem = "UPDATE mensagem SET mensagem = '$txtAlterarTexto' WHERE mensagem.id_mensagem = '$txtHidden'";
  $result = $conn->query($sqlAlterarMensagem);
  if ($result) {
    echo "o texto foi alterado com sucesso";
  }else {
    echo "não deu para alterar";
  }
}
?>
