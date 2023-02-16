<?php include "modals-marcacaoDashboard.php" ?>

<div class="container-fluid px-4" id="div-marcacoes">
    <div class="row">
        <div class="col">
            <h1 class="pt-4 pb-2">Marcações</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <ul class="nav nav-tabs" id="tabs" role="tablist">
                <li class="nav-item w-50 text-center">
                    <a class="nav-link <?php if ($_GET["estado"] == "pendente") echo "active"; ?>" id="marcacoesPendentes" data-toggle="tab" href="#marcacaoPendente" role="tab" aria-controls="marcacaoPendente" aria-selected="true">
                        Pendentes
                        <?php
                            $sql = "SELECT * FROM v_completa_marcacao WHERE estado = 'Pendente';";
                            $result = $conn->query($sql);
                            echo "($result->num_rows)";
                        ?>
                    </a>
                </li>
                <li class="nav-item w-50 text-center">
                    <a class="nav-link <?php if ($_GET["estado"] == "confirmada") echo "active" ?>" id="marcacoesConfirmadas" data-toggle="tab" href="#marcacaoConfirmada" role="tab" aria-controls="marcacaoConfirmada" aria-selected="false">
                        Confirmadas
                        <?php
                            $sql = "SELECT * FROM v_completa_marcacao WHERE estado = 'Confirmada';";
                            $result = $conn->query($sql);
                            echo "($result->num_rows)";
                        ?>
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show <?php if ($_GET["estado"] == "pendente") echo "active"; ?>" id="marcacaoPendente" role="tabpanel" aria-labelledby="marcacoesPendentes">
                <div class="row mt-3">
                    <div class="col">
                        <input type="search" name="searchMarcacaoPendente" class="form-control" id="searchMarcacaoPendente" placeholder="Pesquise aqui...">
                    </div>
                </div>
                    <div class="row mt-3">
                        <div class="col">
                            <table class="table table-hover" id="tabela-marcacaoPendente">
                                <thead>
                                    <tr>
                                        <th>Cliente</th>
                                        <th>Pedido</th>
                                        <th>Servico</th>
                                        <th>Valor</th>
                                        <th>Data Pretendida</th>
                                        <th>Hora Pretendida</th>
                                        <th>Data Pedido</th>
                                        <th>Funcionário</th>
                                        <th>Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    <?php
                                        // Sistema de numeração de páginas

                                        if (isset($_GET["page"])) {
                                            $pageNumber = $_GET["page"];
                                        }
                                        else {
                                            $pageNumber = 1;
                                        }

                                        // Número de registos por página
                                        $registosPagina = 6;
                                        $offset = ($pageNumber - 1) * $registosPagina;

                                        // Contar o número de registos
                                        $sqlNumRegistos = "SELECT COUNT(*) FROM marcacao WHERE estado = 'Pendente';";
                                        $result = $conn->query($sqlNumRegistos);
                                        $totalRows = $result->fetch_array()[0];
                                        $totalPaginas = ceil($totalRows / $registosPagina);
 
                                        $sql = "SELECT * FROM v_completa_marcacao WHERE estado = 'Pendente' LIMIT $offset, $registosPagina;";
                                        $result2 = $conn->query($sql);

                                        if (!$result2) {
                                            $code = $conn->errno;
                                            $message = $conn->error;
                                            printf("<p>Query error: %d %s</p>", $code, $message);
                                        }
                                        else {
                                            while ($row = $result2->fetch_assoc()) {                               
                                                $idmarcacao = $row["n_marcacao"]; 
                                                $valor = $row["valor"];
                                                $datapedido = date("d-m-Y", strtotime($row["data_pedido"]));
                                                $dataPretendida = date("d-m-Y", strtotime($row["dataHora_pretendida"]));
                                                $horaPretendida = date("H:i", strtotime($row["dataHora_pretendida"]));
                                                $funcionario = $row["funcionario"];
                                                $cliente = $row["cliente"];
                                                $photo = $row["foto_perfil"];
                                                $mensagem = $row["mensagem"];
                                                // Se o utilizador não escreveu uma mensagem
                                                if ($mensagem == null) {
                                                    $mensagem = "Sem mensagem";
                                                }
                                                $telefone = $row["telefone"];
                                                $estado = $row["estado"];

                                                if ($cliente == null)
                                                    $cliente = "Cliente";

                                                if ($photo == null)
                                                    $photo = "assets/img/users/default-user.jpg";

                                                echo "<tr>
                                                        <td class='align-middle'>
                                                            <img src='$photo' alt='Fotografia de perfil' class='mr-3 rounded-circle fotoPerfil' height='55' width='55'>
                                                            <span>$cliente</span>
                                                        </td>
                                                        <td class='align-middle'>$idmarcacao</td>
                                                        <td class='align-middle'>";

                                                            // Buscar os serviços escolhidos em cada marcação
                                                            $sql2 = "SELECT nome, valor FROM servicos_marcacao WHERE id_marcacao = '$idmarcacao';";
                                                            $result3 = $conn->query($sql2);
                                                            if ($result3) {
                                                                // Variavel
                                                                $servicosEscolhidos = "";
                                                                $servicosEscolhidosList = "";
                                                                while($servicos = $result3->fetch_assoc()) {
                                                                    $servicosEscolhidos .= $servicos["nome"] . "<br>";
                                                                    $servicosEscolhidosList .= "<li>" . $servicos["nome"] . "</li>";
                                                                }
                                                                echo $servicosEscolhidos;
                                                            }

                                                echo "</td>
                                                        <td class='align-middle'>" . number_format($valor, 2, ",", " ") . " &euro;</td>
                                                        <td class='align-middle'>$dataPretendida</td>
                                                        <td class='align-middle'>$horaPretendida</td>
                                                        <td class='align-middle'>$datapedido</td>
                                                        <td class='align-middle'>$funcionario</td>
                                                        <td class='align-middle text-danger'>$estado</td>
                                                        <td class='text-center align-middle'>
                                                            <div class='modalTrigger' data-toggle='modal' data-target='#confirmarMarcacao' data-idmarcacao='$idmarcacao' data-backdrop=true>
                                                                <i class='far fa-check-circle confirmar' data-toggle='tooltip' data-placement='top' title='Confirmar marcação'></i>
                                                            </div>
                                                            <div class='modalTrigger' data-toggle='modal' data-target='#informacaoMarcacao' data-fotoperfil='$photo' data-cliente='$cliente' data-idmarcacao='$idmarcacao' data-servicos='$servicosEscolhidosList' data-valor='$valor' data-datapedido='$datapedido' data-datapretendida='$dataPretendida' data-horapretendida='$horaPretendida' data-funcionario='$funcionario' data-mensagem='$mensagem' data-telefone='$telefone' data-estado='$estado'>
                                                                <i class='far fa-eye verMais' data-toggle='tooltip' data-placement='top' title='Ver mais'></i>
                                                            </div>";

                                                            // Mostrar o opção de eliminar apenas ao administrador
                                                            
                                                            if ($_SESSION['estatuto'] == "Administrador") {
                                                                echo "<div class='modalTrigger' data-toggle='modal' data-target='#eliminarMarcacao' data-idmarcacao='$idmarcacao'>
                                                                    <i class='far fa-trash eliminar' data-toggle='tooltip' data-placement='top' title='Eliminar'></i>
                                                                </div>";
                                                            }

                                                    echo "</td>
                                                    </tr>";
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <!-- Paginação -->
                            <nav class="table-pagination" aria-label="Navegação de páginas">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item <?php if($pageNumber <= 1){ echo 'disabled'; } ?>">
                                        <a href="<?php if($pageNumber <= 1){ echo '#'; } else { echo "?pagina=rPages/marcacaoDashboard.php&estado=pendente&page=".($pageNumber - 1); } ?>" class="page-link">Anterior</a>
                                    </li>
                                        <?php 
                                            $i = 1;
                                            while ($i <= $totalPaginas) {
                                                // Escreve a paginacao e, se $i for igual ao número da pagina, adicionar a class .active 
                                                echo "<li class='page-item "; if ($i == $_GET["page"]) echo 'active'; echo "'><a class='page-link' href='?pagina=rPages/marcacaoDashboard.php&estado=pendente&page=$i'>$i</a></li>";
                                                $i++;
                                            }
                                        ?>
                                    <li class="page-item <?php if($pageNumber >= $totalPaginas){ echo 'disabled'; } ?>">
                                        <a href="<?php if($pageNumber >= $totalPaginas){ echo '#'; } else { echo "?pagina=rPages/marcacaoDashboard.php&estado=pendente&page=".($pageNumber + 1); } ?>" class="page-link">Próxima</a>
                                    </li>   
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade <?php if ($_GET["estado"] == "confirmada") echo "show active" ?>" id="marcacaoConfirmada" role="tabpanel" aria-labelledby="marcacoesConfirmadas">
                    <div class="row mt-3">
                        <div class="col">
                            <input type="search" name="searchMarcacaoConfirmada" class="form-control" id="searchMarcacaoConfirmada" placeholder="Pesquise aqui...">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <table class="table table-hover" id="tabela-marcacaoConfirmada">
                                <thead>
                                    <tr>
                                        <th>Cliente</th>
                                        <th>Pedido</th>
                                        <th>Servico</th>
                                        <th>Valor</th>
                                        <th>Data Marcação</th>
                                        <th>Hora</th>
                                        <th>Funcionário</th>
                                        <th>Estado</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    <?php
                                        // Sistema de numeração de páginas

                                        if (isset($_GET["page"])) {
                                            $pageNumber = $_GET["page"];
                                        }
                                        else {
                                            $pageNumber = 1;
                                        }

                                        // Número de registos por página
                                        $registosPagina = 6;
                                        $offset = ($pageNumber - 1) * $registosPagina;

                                        // Contar o número de registos
                                        $sqlNumRegistos = "SELECT COUNT(*) FROM marcacao WHERE estado = 'Confirmada';";
                                        $result = $conn->query($sqlNumRegistos);
                                        $totalRows = $result->fetch_array()[0];
                                        $totalPaginas = ceil($totalRows / $registosPagina);

                                        $sql = "SELECT * FROM v_completa_marcacao WHERE estado = 'Confirmada' ORDER BY dataHora_confirmada LIMIT $offset, $registosPagina;";
                                        $result = $conn->query($sql);
        
                                        if (!$result) {
                                            $code = $conn->errno;
                                            $message = $conn->error;
                                            printf("<p>Query error: %d %s</p>", $code, $message);
                                        }
                                        else {
                                            while ($row = $result->fetch_assoc()) {                               
                                                $idmarcacao = $row["n_marcacao"];
                                                $valor = $row["valor"];
                                                $dataPedido = date("d-m-Y", strtotime($row["data_pedido"]));
                                                $dataConfirmada = date("d-m-Y", strtotime($row["dataHora_confirmada"]));
                                                $horaConfirmada = date("H:i", strtotime($row["dataHora_confirmada"]));
                                                $funcionario = $row["funcionario"];
                                                $cliente = $row["cliente"];
                                                $photo = $row["foto_perfil"];
                                                $mensagem = $row["mensagem"];
                                                // Se o utilizador não escreveu uma mensagem
                                                if ($mensagem == null) {
                                                    $mensagem = "Sem mensagem";
                                                }
                                                $telefone = $row["telefone"];
                                                $estado = $row["estado"];
        
                                                if ($cliente == null)
                                                    $cliente = "Cliente";
        
                                                if ($photo == null)
                                                    $photo = "assets/img/users/default-user.jpg";
        
                                                echo "<tr>
                                                        <td class='align-middle'>
                                                            <img src='$photo' alt='Fotografia de perfil' class='mr-3 rounded-circle fotoPerfil' height='55' width='55'>
                                                            <span>$cliente</span>
                                                        </td>
                                                        <td class='align-middle'>$idmarcacao</td>
                                                        <td class='align-middle'>";
        
                                                            // Buscar os serviços escolhidos em cada marcação
                                                            $sql2 = "SELECT nome, valor FROM servicos_marcacao WHERE id_marcacao = '$idmarcacao';";
                                                            $result2 = $conn->query($sql2);
                                                            if ($result2) {
                                                                // Variavel
                                                                $servicosEscolhidos = "";
                                                                $servicosEscolhidosList = "";
                                                                while($servicos = $result2->fetch_assoc()) {
                                                                    $servicosEscolhidos .= $servicos["nome"] . "<br>";
                                                                    $servicosEscolhidosList .= "<li>" . $servicos["nome"] . "</li>";
                                                                }
                                                                echo $servicosEscolhidos;
                                                            }
        
                                                echo "</td>
                                                        <td class='align-middle'>" . number_format($valor, 2, ",", " ") . " &euro;</td>
                                                        <td class='align-middle'>$dataConfirmada</td>
                                                        <td class='align-middle'>$horaConfirmada</td>
                                                        <td class='align-middle'>$funcionario</td>
                                                        <td class='align-middle text-success'>$estado</td>
                                                        <td></td>
                                                        <td class='text-center align-middle'>
                                                            <div class='modalTrigger' data-toggle='modal' data-target='#informacaoMarcacao' data-fotoperfil='$photo' data-cliente='$cliente' data-idmarcacao='$idmarcacao' data-servicos='$servicosEscolhidosList' data-valor='$valor' data-datapedido='$dataPedido' data-dataconfirmada='$dataConfirmada' data-horaconfirmada='$horaConfirmada' data-funcionario='$funcionario' data-mensagem='$mensagem' data-telefone='$telefone' data-estado='$estado'>
                                                                <i class='far fa-eye' data-toggle='tooltip' data-placement='top' title='Ver mais'></i>
                                                            </div>";

                                                            // Mostrar o opção de eliminar apenas ao administrador
                                                            
                                                            if ($_SESSION['estatuto'] == "Administrador") {
                                                                echo "<div class='modalTrigger' data-toggle='modal' data-target='#eliminarMarcacao' data-idmarcacao='$idmarcacao'>
                                                                    <i class='far fa-trash eliminar' data-toggle='tooltip' data-placement='top' title='Eliminar'></i>
                                                                </div>";
                                                            }
                                                    echo "</td>
                                                    </tr>";
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <!-- Paginação -->
                            <nav class="table-pagination" aria-label="Navegação de páginas">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item <?php if($pageNumber <= 1){ echo 'disabled'; } ?>">
                                        <a href="<?php if($pageNumber <= 1){ echo '#'; } else { echo "?pagina=rPages/marcacaoDashboard.php&estado=confirmada&page=".($pageNumber - 1); } ?>" class="page-link">Anterior</a>
                                    </li>
                                        <?php 
                                            $i = 1;
                                            while ($i <= $totalPaginas) {
                                                // Escreve a paginacao e, se $i for igual ao número da pagina, adicionar a class .active 
                                                echo "<li class='page-item "; if ($i == $_GET["page"]) echo 'active'; echo "'><a class='page-link' href='?pagina=rPages/marcacaoDashboard.php&estado=confirmada&page=$i'>$i</a></li>";
                                                $i++;
                                            }
                                        ?>
                                    <li class="page-item <?php if($pageNumber >= $totalPaginas){ echo 'disabled'; } ?>">
                                        <a href="<?php if($pageNumber >= $totalPaginas){ echo '#'; } else { echo "?pagina=rPages/marcacaoDashboard.php&estado=confirmada&page=".($pageNumber + 1); } ?>" class="page-link">Próxima</a>
                                    </li>   
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>