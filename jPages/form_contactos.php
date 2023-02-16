<!-- INICIO FORMULARIO -->
<a href="?pagina=jPages/contactos.php"><i class="fal fa-arrow-left mt-5"></i></a>
<div class="container mt-5" id="contactosContainer">

  <div class="row">

    <div class="col-md-5 colunaForm">
      <h1 id="txtTitContacto">Entre em Contacto</h1>
      <form method="post" action="?pagina=jPages/form_contactos.php">
        <div class="form-row mt-5">
          <div class="form-group col-md-4">
            <input type="email" class="form-control" id="txtEmail" name="txtContactosEmail" placeholder="Email" maxlength="150" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4 mt-3">
            <input type="text" class="form-control" id="txtAssunto" name="txtContactosAssunto" placeholder="Assunto" maxlength="150" required>
          </div>
        </div>
        <div class="form-group">
          <div class="form-group col-md-4 mt-3">
            <textarea class="form-control autoExpand" id="txtAreaMensagem" name="txtContactosMensagem" rows="3" maxlength="500" required placeholder="Escreva aqui a sua mensagem..."></textarea>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-primary" name="btnEnviarContacto" id="btnEnviar">Enviar</button>
          </div>
        </div>
      </form>
    </div>
    <!-- ORGANIZAR CODIGO PHP (mudar de sitio) -->
    <?php
    if (isset($_POST["btnEnviarContacto"])) {
      $idUtilizador = $_SESSION["user"];
      $txtEmail = $_POST["txtContactosEmail"];
      $txtAssunto = $_POST["txtContactosAssunto"];
      $txtMensagem = $_POST["txtContactosMensagem"];

      $selectUtilizador = "SELECT email FROM utilizador WHERE email = '$txtEmail'";
      $result3 = $conn->query($selectUtilizador);
      $linhas3 = $result3->num_rows;
      if ($linhas3 == 1) {
        while ($linhas3 = $result3->fetch_assoc()) {
          $emailVerificado = $linhas3["email"];

          $inserirMensagem = "INSERT INTO  mensagem (assunto, mensagem, data_msg) VALUES ('$txtAssunto', '$txtMensagem', NOW())";
          $result4 = $conn->query($inserirMensagem);

          $buscarMensagemUtilizador = "SELECT id_mensagem FROM mensagem ORDER BY id_mensagem DESC LIMIT 1";
          $result5 = $conn->query($buscarMensagemUtilizador);

          if ($result5) {
            while ($row = $result5->fetch_assoc()) {
              $idMensagem = $row["id_mensagem"];
              $inserirMensagemUtilizador = "INSERT INTO mensagem_utilizador (id_mensagem, id_utilizador) VALUES ('$idMensagem', '$idUtilizador')";
              $result6 = $conn->query($inserirMensagemUtilizador);
              if ($result6) {
                echo '<script type="text/javascript">alert("A sua questão foi enviada para nós, será contactado brevemente")</script>';
              }else {
                echo '<script type="text/javascript">alert("Certifique-se que preencheu os espaços corretamente")</script>';
              }
            }
          }
        }
      }
    }
    ?>





    <div class="col-md-6  colunaFAQ">
      <h1>Perguntas Frequentes</h1>
      <div id="acordiao" class="mt-5">
      <?php
        $queryFAQ = "SELECT pergunta, resposta FROM faq WHERE id_faq = '1'";
        $result = $conn->query($queryFAQ);
        $linhas = $result->num_rows;
        if ($linhas == 1) {
          while($row = $result->fetch_assoc())
          { ?>
            <div class="card" id="card1">
              <div class="pergunta" id="pergunta1" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                <h5 class="mb-0 areaPerguntas">
                  <button class="btn btn-link btnPerguntas" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                    <?php echo $row["pergunta"]; ?>
                  </button><i class="fal fa-plus" id="iconCollapse1"></i>
                </h5>
              </div>
              <div id="collapse1" class="collapse" aria-labelledby="pergunta1" data-parent="#acordiao">
                <div class="card-body">
                  <?php echo $row["resposta"]; ?>
                </div>
              </div>
            </div>
      <?php
          }
        }
      ?>
      <?php
        $queryFAQ = "SELECT pergunta, resposta FROM faq WHERE id_faq = '2'";
        $result = $conn->query($queryFAQ);
        $linhas = $result->num_rows;
        if ($linhas == 1) {
          while($row = $result->fetch_assoc())
          { ?>
      <div class="card" id="card2">
        <div class="pergunta" id="pergunta2" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
          <h5 class="mb-0 areaPerguntas">
            <button class="btn btn-link btnPerguntas" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
              <?php echo $row["pergunta"]; ?>
            </button><i class="fal fa-plus" id="iconCollapse2"></i>
          </h5>
        </div>
        <div id="collapse2" class="collapse" aria-labelledby="pergunta2" data-parent="#acordiao">
          <div class="card-body">
            <?php echo $row["resposta"]; ?>
          </div>
        </div>
      </div>
      <?php
          }
        }
      ?>
      <?php
        $queryFAQ = "SELECT pergunta, resposta FROM faq WHERE id_faq = '3'";
        $result = $conn->query($queryFAQ);
        $linhas = $result->num_rows;
        if ($linhas == 1) {
          while($row = $result->fetch_assoc())
          { ?>
      <div class="card" id="card3">
        <div class="pergunta" id="pergunta3" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
          <h5 class="mb-0 areaPerguntas">
            <button class="btn btn-link btnPerguntas" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
              <?php echo $row["pergunta"]; ?>
            </button> <i class="fal fa-plus" id="iconCollapse3"></i>
          </h5>
        </div>
        <div id="collapse3" class="collapse" aria-labelledby="pergunta3" data-parent="#acordiao">
          <div class="card-body">
            <?php echo $row["resposta"]; ?>
          </div>
        </div>
      </div>
      <?php
          }
        }
      ?>

    </div>
    </div>
  </div>
</div>
