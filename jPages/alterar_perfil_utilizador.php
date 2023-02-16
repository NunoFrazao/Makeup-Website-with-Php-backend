<!-- INICIO FORMULARIO -->

<a href="?pagina=jPages/perfil_utilizador.php"><i class="fal fa-arrow-left mt-5"></i></a>
<div class="container">
  <h1 id="txtTitContacto">Alterar Dados de Conta</h1>

  <div class="container mt-5" id="alterarPerfilContainer">
    <div class="row mt-5 formInteiro">

      <?php
        $idUtilizador = $_SESSION["user"];
        $selectInfoUtilizador = "SELECT * FROM utilizador WHERE id_utilizador = '$idUtilizador'";
        $result = $conn->query($selectInfoUtilizador);
        if ($result) {
          while ($row = $result->fetch_assoc()) { ?>

            <!-- COLUNA ALTERAR DADOS DE CONTA -->
            <div class="col-md-7 colunaFormPerfil">
            <form method="post" action="?pagina=jPages/alterar_perfil_utilizador.php">
              <div class="form-row">
                <div class="form-group col-md-3 txtFormPerfil">
                  <label for="txtID" class="labelAlterar">ID:</label>
                  <input type="text" class="form-control" id="txtID" name="txtID" value="<?php echo $row["id_utilizador"] ?>" readonly>
                </div>
                <div class="form-group col-md-9 txtFormPerfil">
                  <label for="txtNome" class="labelAlterar">Nome:</label>
                  <input type="text" class="form-control" id="txtNome" name="txtNome" value="<?php echo $row["nome"] ?>">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6 txtFormPerfil">
                  <label for="txtEmail" class="labelAlterar">Email:</label>
                  <input type="email" class="form-control" id="txtEmail" name="txtEmail" value="<?php echo $row["email"] ?>">
                </div>
                <div class="form-group col-md-6 txtFormPerfil">
                  <label for="txtContacto" class="labelAlterar">Contacto:</label>
                  <input type="number" class="form-control" id="txtContacto" name="txtContacto" value="<?php echo $row["telefone"] ?>">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-5 txtFormPerfil">
                  <label for="txtLocalidade" class="labelAlterar">Localidade:</label>
                  <input type="text" class="form-control" id="txtLocalidade" name="txtLocalidade" value="<?php echo $row["rua"] ?>">
                </div>
                <div class="form-group col-md-3 txtFormPerfil">
                  <label for="txtCodPostal" class="labelAlterar">Código Postal:</label>
                  <input type="text" class="form-control" id="txtCodPostal" name="txtCodPostal" value="<?php echo $row["cod_postal"] ?>">
                </div>
                <div class="form-group col-md-4 txtFormPerfil">
                  <label for="txtDtRegisto" class="labelAlterar">Data de Registo:</label>
                  <input type="datetime" class="form-control" id="txtDtRegisto" name="txtDtRegisto" value="<?php echo $row["data_registo"] ?>" readonly>
                </div>
              </div>
              <div class="btnFormPerfil">
                <button type="submit" class="btn btn-primary" name="btnAlterarDadosConta" id="btnAlterarDadosConta">Alterar Dados</button>
              </div>
            </form>
          </div>

      <?php
          }
        }
      ?>


    <!-- COLUNA ALTERAR PASSWORD -->
    <div class="col-md-5 colunaFormAlterarPass">
      <form action="?pagina=jPages/alterar_perfil_Utilizador.php" method="post">

        <div class="form-row">
          <div class="form-group col-md-6 txtFormPass">
            <label for="txtPassAtual" class="labelAlterar">Password Atual:</label>
            <input type="password" class="form-control" id="txtPassAtual" name="txtPassAtual">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6 txtFormPass">
            <label for="txtNovaPass" class="labelAlterar">Nova Password:</label>
            <input type="password" class="form-control" id="txtNovaPass" name="txtNovaPass">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6 txtFormPass">
            <label for="txtConfirmarNovaPass" class="labelAlterar">Confirmar Nova Password:</label>
            <input type="password" class="form-control" id="txtConfirmarNovaPass" name="txtConfirmarNovaPass">
          </div>
        </div>

        <div class="btnFormPass">
          <button type="submit" class="btn btn-primary btnAlterarPass" name="btnAlterarPass" id="btnAlterarPass">Alterar Password</button>
        </div>
      </form>
    </div>



    <!-- Button trigger modal -->

<!-- Modal

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        tem a certeza?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form method="post">
          <button type="submit" class="btn btn-primary" name="saveChanges">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>-->

    </div>
  </div>
</div>

<!-- FIM DO HTML -->

<!-- INICIO PHP -->
<?php
if (isset($_POST["btnAlterarDadosConta"])) {
  $txtID = $_POST["txtID"];
  $txtNome = $_POST["txtNome"];
  $txtEmail = $_POST["txtEmail"];
  $txtContacto = $_POST["txtContacto"];
  $txtLocalidade = $_POST["txtLocalidade"];
  $txtCodPostal = $_POST["txtCodPostal"];

  $sqlAlterarPerfil = "UPDATE utilizador SET nome = '$txtNome', email = '$txtEmail', telefone = '$txtContacto', rua = '$txtLocalidade', cod_postal = '$txtCodPostal' WHERE id_utilizador = '$txtID'";
  $result = $conn->query($sqlAlterarPerfil);
  if ($result) {
    echo "Os seus dados foram alterados com sucesso!";
  }else {
    echo "houve um erro";
  }
}

if (isset($_POST["btnAlterarPass"])) {
  $idUtilizador = $_SESSION["user"];

  $txtPassAtual = (array_key_exists("txtPassAtual", $_POST) ? $_POST["txtPassAtual"] : "");
  $txtPassAtual = hash('sha512', $txtPassAtual);

  $passNova = (array_key_exists("txtNovaPass", $_POST) ? $_POST["txtNovaPass"] : "");
  $passNova = hash('sha512', $passNova);

  $confirmarNovaPass = (array_key_exists("txtConfirmarNovaPass", $_POST) ? $_POST["txtConfirmarNovaPass"] : "");
  $confirmarNovaPass = hash('sha512', $confirmarNovaPass);

  $buscarPassword = "SELECT palavra_chave FROM utilizador WHERE id_utilizador = '$idUtilizador'";
  $result = $conn->query($buscarPassword);
  if ($result->num_rows != 0) {
    while ($row = $result->fetch_assoc()) {

      $bdPassAtual = $row["palavra_chave"];
      if ($txtPassAtual == $bdPassAtual) {
        if ($passNova == $confirmarNovaPass) {
          $sqlMudarPassword = "UPDATE utilizador SET palavra_chave = '$passNova' WHERE id_utilizador = '$idUtilizador'";
          $result1 = $conn->query($sqlMudarPassword);
          if ($result1) {
            echo "A sua palavra chave foi alterada com sucesso!";
          }else {
            echo "Não foi possivel alterar a sua palavra chave";
          }
        }else {
          echo "A nova palavra chave não corresponde com a confirmação";
        }

      }else {
        echo "A palavra chave escrita não corresponde com a palavra chave atual!";
      }
    }
  }
}
?>
