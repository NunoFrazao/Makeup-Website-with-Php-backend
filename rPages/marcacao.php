<?php
    // Definir datas para o input datatime-local

    // Obter data atual e adicionar mais um dia
    $dataMin = new DateTime(date("Y-m-d", time()));
    $dataMin->add(new DateInterval("P1D"));
    $dataMin = $dataMin->format("Y-m-d");
?>

<?php
    if (isset($_POST["marcar"])) {
        $funcionario = $_POST["funcionario"];
        // Se a opcao de funcionario escolhida for "Qualquer funcionario", mudar o id para 1
        if ($funcionario == "any")
            $funcionario = 1;
        $dataHora = date_format(new DateTime($conn->real_escape_string($_POST["dataHoraMarcacao"])), "Y-m-d H:i:s");
        $phone = $conn->real_escape_string($_POST["phone"]);
        $message = $conn->real_escape_string($_POST["msg"]);
        $servicos = $_POST["servico"];
        // Se o utilizador estiver logged in, guardar o seu id_utilizador
        if (isset($_SESSION["user"])) {
            $idUtilizador = $_SESSION["user"];
        }

        /*
            * INSERIR DADOS NA TABELA MARCACAO 
        */

        // Se o utilizador estiver logged in
        if (isset($_SESSION["authenticated"])) {
            if (empty($message))
                $sql = "INSERT INTO marcacao (dataHora_marcacao, telefone, id_utilizador, id_funcionario) VALUES (?, ?, ?, ?);";   
            else
                $sql = "INSERT INTO marcacao (mensagem, dataHora_marcacao, telefone, id_utilizador, id_funcionario) VALUES (?, ?, ?, ?, ?);";
        }
        // Se o utilizador não estiver logged in
        else {
            if (empty($message))
                $sql = "INSERT INTO marcacao (dataHora_marcacao, telefone, id_funcionario) VALUES (?, ?, ?);";
            else
                $sql = "INSERT INTO marcacao (mensagem, dataHora_marcacao, telefone, id_funcionario) VALUES (?, ?, ?, ?);";
        }
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            $code = $conn->errno;
            $message = $conn->error;
            printf("<p>SQL Error: %d %s</p>", $code, $message);
        }
        else {
            // Se o utilizador estiver logged in
            if (isset($_SESSION["authenticated"])) {
                if (empty($message))
                    $stmt->bind_param("ssii", $dataHora, $phone, $idUtilizador, $funcionario);
                else
                    $stmt->bind_param("sssii", $message, $dataHora, $phone, $idUtilizador, $funcionario);
            }
            // Se o utilizador não estiver logged in
            else {
                if (empty($message))
                    $stmt->bind_param("ssi", $dataHora, $phone, $funcionario);
                else 
                    $stmt->bind_param("sssi", $message, $dataHora, $phone, $funcionario);
            }
            if (!$stmt->execute()) {
                $code = $conn->errno;
                $message = $conn->error;
                printf("<p>SQL Error: %d %s</p>", $code, $message);
            }
            else {
                // Determinar o id desta marcacao para poder inserir e associar os serviços
                $sql = "SELECT MAX(id_marcacao) FROM marcacao;";
                $result = $conn->query($sql);
                if (!$result) {
                    $code = $conn->errno;
                    $message = $conn->error;
                    printf("<p>SQL Error: %d %s</p>", $code, $message);
                }
                else {
                    $row = $result->fetch_row();
                    $idMarcacao = $row[0];

                    /*
                    * INSERIR DADOS NA TABELA MARCACAO_SUBSERVICO
                    */
                    
                    $values = "";
                    
                    for ($i = 0; $i < count($servicos); $i++) {
                        if (($i + 1) == count($servicos))
                            $values .= "($idMarcacao," . $servicos[$i] . ")";
                        else
                            $values .= "($idMarcacao," . $servicos[$i] . "),";
                    }
                    
                    $sql = "INSERT INTO marcacao_subservico (id_marcacao, id_subservico) VALUES $values;"; 
                    $result = $conn->query($sql);
                    if (!$result) {
                        $code = $conn->errno;
                        $message = $conn->error;
                        printf("<p>SQL Error: %d %s</p>", $code, $message);
                    }
                    else {
                        include "modal-marcacaoSucesso.php";
                        echo "<script>$('#marcacaoSucessoModal').modal('show');</script>";
                    }
                }
            }
        }
    }
?>

<!-- Main -->
<div class="container-fluid" id="mainContainer">
    <div class="row px-4 px-md-0 my-3 pb-3 my-sm-0" id="title">
        <div class="col ml-0 ml-md-4 ml-lg-5 d-xl-flex align-items-center">
            <a href="#" id="voltarAtras" class="button rounded-circle d-none d-lg-inline-block" aria-label="Ir para Massagem Corpo Inteiro" data-toggle="tooltip" data-placement="right" title="Voltar atrás" onclick="history.back()">
                <i class="fas fa-arrow-circle-left"></i>
            </a>
            <h1 class="d-inline-block pl-0 pl-md-4 mb-0">Marcação</h1>
        </div>
    </div>
    <div class="row mt-4 px-4 px-md-0" id="marcacaoMain">
        <div class="col">
            <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" id="marcacaoForm">
                <div class="row">

                    <!-- INNFORMAÇÃO -->

                    <div class="col-xl-4 mainColumn pb-4 pb-xl-0 px-0 px-md-5" id="inputInfo">
                        <h2 class="pb-4 subTitle">Informação</h2>

                        <!-- SELECT FUNCIONÁRIO -->

                        <div class="form-group">
                            <label for="funcionarioDropdown" class="w-100">Funcionário</label>
                            <i class="fas fa-info-circle information" data-toggle="tooltip" data-placement="top" title="Se preferir um funcionário em específico poderá selecioná-lo"></i>
                            <!-- Select para os funcionários -->
                            <select name="funcionario" id="funcionarioDropdown" class="form-control">
                                <option value="any" selected>Qualquer funcionário</option>
                                <?php
                                    // Ir buscar todos os funcionários registados à base de dados

                                    // Criar query
                                    $sql = "SELECT id_funcionario, nome FROM funcionario;";
                                    $result = $conn->query($sql);
            
                                    if (!$result) {
                                        $code = $conn->errno;
                                        $message = $conn->error;
                                        printf("<p>Query error: %d %s</p>", $code, $message);
                                    }
                                    else {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value='" . $row["id_funcionario"] . "'>" . $row["nome"] . "</option>";
                                        }
                                        $result->free();
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-row">

                            <!-- DATA E HORA -->
                            
                            <div class="form-group col-12 col-sm-6">
                                <label for="dataHoraMarcacao" class="w-100">
                                    Dia e Hora&nbsp;<span class="text-danger requiredSymbol">*</span>
                                </label>
                                <i class="fas fa-info-circle information mr-1" data-toggle="tooltip" data-placement="top" title="Selecione o dia e hora que pretende efetuar a marcação"></i>
                                <input type="datetime-local" name="dataHoraMarcacao" id="dataHoraMarcacao" class="form-control" min="<?php echo $dataMin ?>T07:00">
                            </div>

                            <!-- TELEFONE -->

                            <div class="form-group col-12 col-sm-6">
                                <label for="phoneNumber" class="w-100">
                                    Telefone&nbsp;<span class="text-danger requiredSymbol">*</span>
                                </label>
                                <i class="fas fa-info-circle information mr-1" data-toggle="tooltip" data-placement="top" title="Introduza o seu contacto para ser notificado da confirmação da marcação"></i>
                                <input type="text" name="phone" value="<?php if (isset($_SESSION["telefone"])) echo htmlentities(($_SESSION["telefone"])) ?>" id="phoneNumber" class="form-control" minlength="9" maxlength="9" pattern="^(9|2{1})+([1-9]{1})+([0-9]{7})$" oninvalid="this.setCustomValidity('Por favor insira um número de telefone válido em Portugal')">
                            </div>
                        </div>
                        
                        <!-- MENSAGEM -->

                        <div class="form-group">
                            <label for="mensagem" class="w-100">Mensagem</label>
                            <i class="fas fa-info-circle information" data-toggle="tooltip" data-placement="top" title="Caso pretenda complementar o seu pedido, poderá escrever uma mensagem"></i>
                            <textarea name="msg" id="mensagem" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                        <p id="mensagemCamposObrigatorios">
                            <span class="text-danger requiredSymbol">*</span> Campos de preenchimento obrigatório
                        </p>
                        <!-- Div para mostrar mensagens de erro -->
                        <div id='errorsLog' class='text-danger mt-4 mb-5'></div>
                        <div class="text-muted  mt-4 mt-xl-0" id="duvidas">
                            Caso tenha alguma dúvida pode ligar para 245 923 012   
                        </div>
                    </div>

                    <!-- LISTA SERVIÇOS -->

                    <div class="col-xl-4 mainColumn py-4 py-xl-0 px-0 px-md-5" id="listaServicos">
                        <div class="row">
                            <div class="col" id="listaServicos-subtitle">
                                <h2 class="pb-3 subTitle">Serviços</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" id="listaServicos-lista">
                                <?php
                                    echo "<h3 class='servicoTitle my-3 font-weight-bold'>Unhas</h3>";
    
                                    $sql = "SELECT * FROM subservico WHERE id_servico = 1;";
                                    $result = $conn->query($sql);
    
                                    // Contador para identificar o numero do servico no atributo data-servico (servico1, servico2, ...)
                                    $o = 1;
    
                                    if (!$result) {
                                        $code = $conn->errno;
                                        $message = $conn->error;
                                        printf("<p>Query error: %d %s</p>", $code, $message);
                                    }
                                    else {
                                        // Contador para numerar o atributo id do servico
                                        $i = 1;
                                        while ($row = $result->fetch_assoc()) {
                                                echo " <div class='form-check p-0'>
                                                            <label class='form-check-label label-container' for='unhas" . $i . "'>" . $row["nome"] . ": <span class='font-weight-bold'>" . number_format($row["preco"], 2, ",", " ") . " &euro;</span>
                                                                <input class='form-check-input' type='checkbox' name='servico[]' value='". $o ."' id='unhas" . $i . "' data-idservico='" . $o . "' data-preco='" . $row["preco"] . "'>
                                                                <span class='checkmark'></span>
                                                            </label>
                                                        </div>";
                                                $i++;
                                                $o++;
                                        }
                                        $result->free();
                                    }
    
                                    echo "<h3 class='servicoTitle my-3 font-weight-bold'>Maquilhagem</h3>";
    
                                    $sql = "SELECT * FROM subservico WHERE id_servico = 2;";
                                    $result = $conn->query($sql);
    
                                    if (!$result) {
                                        $code = $conn->errno;
                                        $message = $conn->error;
                                        printf("<p>Query error: %d %s</p>", $code, $message);
                                    }
                                    else {
                                        // Contador para numerar o atributo id do servico
                                        $i = 1;
                                        while ($row = $result->fetch_assoc()) {
                                                echo " <div class='form-check p-0'>
                                                            <label class='form-check-label label-container' for='maquilhagem" . $i . "'>" . $row["nome"] . ": <span class='font-weight-bold'>" . number_format($row["preco"], 2, ",", " ") . " &euro;</span>
                                                                <input class='form-check-input' type='checkbox' name='servico[]' value='". $o ."' id='maquilhagem" . $i . "' data-idservico='" . $o . "' data-preco='" . $row["preco"] . "'>
                                                                <span class='checkmark'></span>
                                                            </label>
                                                        </div>";
                                                $i++;
                                                $o++;
                                        }
                                        $result->free();
                                    }
    
                                    echo "<h3 class='servicoTitle my-3 font-weight-bold'>Massagens</h3>";
    
                                    $sql = "SELECT * FROM subservico WHERE id_servico = 3;";
                                    $result = $conn->query($sql);
    
                                    if (!$result) {
                                        $code = $conn->errno;
                                        $message = $conn->error;
                                        printf("<p>Query error: %d %s</p>", $code, $message);
                                    }
                                    else {
                                        // Contador para numerar o atributo id do servico
                                        $i= 1;
                                        while ($row = $result->fetch_assoc()) {
    
                                                echo " <div class='form-check p-0'>
                                                            <label class='form-check-label label-container' for='massagens" . $i . "'>" . $row["nome"] . ": <span class='font-weight-bold'>" . number_format($row["preco"], 2, ",", " ") . " &euro;</span>
                                                                <input class='form-check-input' type='checkbox' name='servico[]' value='". $o ."' id='massagens" . $i . "' data-idservico='" . $o . "' data-preco='" . $row["preco"] . "'>
                                                                <span class='checkmark'></span>
                                                            </label>
                                                        </div>";
                                                $i++;
                                                $o++;
                                        }
                                        $result->free();
                                    }
                                ?>
                            </div>
                        </div>
                    </div>

                    <!-- RESUMO -->

                    <div class="col-xl-4 mainColumn pt-4 pt-xl-0 px-0 px-md-5" id="resumo">
                        <div class="row">
                            <div class="col" id="resumoMain">
                                <h2 class="pb-xl-4 subTitle">Resumo</h2>
                                <ul id="listaResumo" class="list-unstyled">
                                    <li>Nenhum serviço selecionado</li>
                                    <?php
                                        $sql = "SELECT * FROM subservico;";
                                        $result = $conn->query($sql);
        
                                        if (!$result) {
                                            $code = $conn->errno;
                                            $message = $conn->error;
                                            printf("<p>Query error: %d %s</p>", $code, $message);
                                        }
                                        else {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<li>" . $row["nome"] . ": <span class='font-weight-bold d-inline-block'>" . number_format($row["preco"], 2, ",", " ") . " &euro;</span></li>";
                                            }
                                            $result->free();
                                        }
                                        $conn->close();
                                    ?>
                                </ul>
                                <p id="precoTotal">Total: <span id="total" class="font-weight-bold">00,00 €</span></p>
                            </div>
                            <input type="submit" name="marcar" value="Marcar" id="marcarBtn" class="btn btn-block rounded-pill mt-4 mt-md-3 mb-5 my-xl-0">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>