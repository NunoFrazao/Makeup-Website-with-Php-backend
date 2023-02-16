    <div class="container">
      <div class="ladoInfo" id="ladoInfo">
        <div class="col-md-6 mt-5 divInfo" id="divInfo1">
          <?php
            // Select para chamar texto de maquilhagem de noiva
            $selectTextoMaq = "SELECT subservico_descricao.descricao, subservico.nome FROM subservico_descricao INNER JOIN subservico ON subservico_descricao.id_subservico = subservico.id_subservico WHERE subservico_descricao.id_subservico = 6";
            $result = $conn->query($selectTextoMaq);
            if ($result->num_rows > 0){
              while($row = $result->fetch_assoc())
              {
          ?>
          <h1><?php echo $row["nome"];?></h1>
          <br>
          <p><?php echo $row["descricao"];?></p>
          <hr><br>
          <p><?php echo $row["descricao"]; ?></p>
          <?php
              }
            }
          ?>
        </div>
        <div class="col-md-6 mt-5 divInfo " id="divInfo2" hidden>
          <?php
            $selectTextoMaq = "SELECT subservico_descricao.descricao, subservico.nome FROM subservico_descricao INNER JOIN subservico ON subservico_descricao.id_subservico = subservico.id_subservico WHERE subservico_descricao.id_subservico = 7";
            $result = $conn->query($selectTextoMaq);
            if ($result->num_rows > 0){
              while($row = $result->fetch_assoc())
              {
          ?>
          <h1><?php echo $row["nome"];?></h1>
          <br>
          <p><?php echo $row["descricao"];?></p>
          <hr><br>
          <p><?php echo $row["descricao"]; ?></p>
          <?php
              }
            }
          ?>
        </div>
        <div class="col-md-6 mt-5 divInfo " id="divInfo3" hidden>
          <?php
            $selectTextoMaq = "SELECT subservico_descricao.descricao, subservico.nome FROM subservico_descricao INNER JOIN subservico ON subservico_descricao.id_subservico = subservico.id_subservico WHERE subservico_descricao.id_subservico = 7";
            $result = $conn->query($selectTextoMaq);
            if ($result->num_rows > 0){
              while($row = $result->fetch_assoc())
              {
          ?>
          <h1><?php echo $row["nome"];?></h1>
          <br>
          <p><?php echo $row["descricao"];?></p>
          <hr><br>
          <p><?php echo $row["descricao"]; ?></p>
          <?php
              }
            }
          ?>
        </div>
      </div>

      <div class="ladoImagem" id="ladoImagem">
        <div class="col-md-5 mt-3" id="divImagem">
          <img src="assets/img/joao/maq_casamentos.jpg" alt="maquilhagemCasamentos" id="maqCasamento" class="imgCasamento">
          <img src="assets/img/joao/maq_convidada.jpg" alt="maquilhagemConvidadas" id="maqConvidada" class="imgCasamento" hidden>
        </div>
      </div>
      <div class="col-md-7 mt-3" id="divButton">
        <div class="row">
          <button name="btnAnterior" class="navBtns" id="btnAnterior"><i class="fal fa-minus"></i></button>
          <button name="btnSeguinte" class="navBtns" id="btnSeguinte"><i class="fal fa-plus"></i></button>
         <form action=?pagina=rPages/marcacao.php method="post">
                <button type="submit" name="btnMarcacoes" class="navBtns" id="btnMarcacoes">Marcações</button>
          </form>
        </div>
      </div>
    </div>
