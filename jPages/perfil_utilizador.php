<a href="index.php"><i class="fal fa-arrow-left mt-5"></i></a>
<div class="container mt-5" id="perfilContainer">

  <div class="row">
    <div class="col-md-4 areaPerfil">
      <img src="assets/img/joao/placeholder.jpg" alt="maquilhagemCasamentos" id="avatarPerfil" class="avatarPerfil">
      <?php
        $idUtilizador = $_SESSION["user"];
        $sqlBuscarNome = "SELECT nome FROM utilizador WHERE id_utilizador = '$idUtilizador'";
        $result = $conn->query($sqlBuscarNome);
        if ($result) {
          while ($row = $result->fetch_assoc()) {
      ?>
      <h5 id="displayNome"><?php echo $row["nome"]?></h5>
      <?php
        }
      }
      ?>

    <div class="col-md-6 mt-3 areaOpcoes">
      <p><a href="?pagina=jPages/alterar_perfil_utilizador.php" id="opcaoAlterar" class="cenas">Alterar Perfil</a></p>
    </div>
    <div class="col-md-6 mt-3 areaOpcoes">
      <p><a data-toggle='modal' data-target='#exampleModal' id="opcaoEliminar" class="cenas">Eliminar Conta</a></p>
    </div>
    <?php
    $idUtilizador = $_SESSION["user"];
    $sqlSelectPerfil = "SELECT nome, email, telefone, rua, cod_postal FROM utilizador WHERE id_utilizador = '$idUtilizador'";
    $result = $conn->query($sqlSelectPerfil);
    if ($result) {
      while ($row = $result->fetch_assoc()) {?>

    <div class="row">
      <div class="col-md-10 areaPerfil1">
        <h5><b>Email:</b>          <?php echo $row["email"]?></h5>
        <h5><b>Contacto:</b>       <?php echo $row["telefone"]?></h5>
        <h5><b>Rua:</b>            <?php echo $row["rua"]?></h5>
        <h5><b>Código Postal:</b>  <?php echo $row["cod_postal"]?></h5>
      </div>
    </div>

    <?php
      }
    }
    ?>
  </div>


  <div class="col-md-8 areaTabela">

    <div class="container-fluid" id="areaTabelaMarcacoes">
      <h1>Marcações</h1>

      <div class="row">
        <table class="table mt-3" id="tabelaMarcacoes">
            <thead>
                <tr>
                    <th>Serviço</th>
                    <th>Data Pedido</th>
                    <th>Mensagem</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $idUtilizador = $_SESSION["user"];
                    $sqlMostrarMaquilhagem = "SELECT * FROM v_completa_marcacao WHERE id_utilizador = '$idUtilizador'";
                    $result = $conn->query($sqlMostrarMaquilhagem);

                    if ($result) {
                      while ($row = $result->fetch_assoc()) {
                          $numMarcacao = $row["n_marcacao"];
                          $servico = $row["servico"];
                          $estado = $row["estado"];
                          $dtPedido = $row["data_pedido"];
                          $dtMarcacao = ["data_marcacao"];
                          $funcionario = ["funcionario"];
                          $mensagem = $row["mensagem"];

                          echo "
                          <tr>
                            <td>$servico</td>
                            <td>$dtPedido</td>
                            <td>$mensagem</td>
                            <td>$estado</td>
                          </tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
      </div>
    </div>

  </div>
</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="conteudoModal">
      <div class="modal-header" id="tituloModal">
        <h3 class="modal-title" id="exampleModalLabel">Alterar descrição de Serviço</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="?pagina=jPages/perfil_utilizador.php" method="post">
        <div class='modal-body'>
          <h5>Tem a certeza que quer eliminar a sua conta?</h5>

        </div>
       <div class='modal-footer border-0'>
          <input type="hidden" name="idUtilizadorHidden" value="" id="idUtilizadorHidden">
          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
          <button type='submit' name="btnEliminarUtilizador" class='btn btn-primary'>Eliminar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
  if (isset($_POST["btnEliminarUtilizador"])) {
    $idUtilizador = $_POST["idUtilizadorHidden"];
    $sqlEliminarUtilizador = "DELETE FROM utilizador WHERE id_utilizador = '$idUtilizador'";
    $result = $conn->query($sqlEliminarUtilizador);
  }
?>
