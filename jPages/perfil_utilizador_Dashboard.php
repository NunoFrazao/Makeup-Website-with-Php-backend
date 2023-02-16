<div class="container-fluid mt-5" id="areaTabelaMaquilhagem">
  <div class="row">
    <div class="col-md-4 areaPerfil">
      <?php
        $idFuncionario = $_SESSION['id_funcionario'];
        $estatuto = $_SESSION["estatuto"];
        echo $estatuto;
        echo $idFuncionario;
        $sqlBuscarNome = "SELECT nome FROM funcionario WHERE id_funcionario = '$idFuncionario'";
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
  </div>
</div>
</div>
