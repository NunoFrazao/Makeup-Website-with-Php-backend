<div class="container-fluid px-4" id="div-dashboard">
    <div class="row">
        <div class="col">
            <h1 class="pt-2">Dashboard</h1>
        </div>
    </div>
    <!-- LINHA DE CIMA -->
    <div class="row">

        <!-- 1 COLUNA - BALANCO -->

        <!-- Esconder a coluna do lucro dos funcionários -->

        <?php if ($_SESSION['estatuto'] == "Administrador") { ?>
            <div class="col-2 px-3 mr-2 border rounded">
                <div class="row">
                    <div class="col">
                        <h5 class="text-uppercase pt-2">Balanço</h5>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col mainInfo">
                        <?php
                        $sql = "SELECT Lucro_Total FROM lucro_marcacoes;";
                        $result = $conn->query($sql);

                        if (!$result) {
                            $code = $conn->errno;
                            $message = $conn->error;
                            printf("SQL Error %d %s", $code, $message);
                        }
                        else {
                            while ($row = $result->fetch_assoc()) {
                                $lucro = number_format($row["Lucro_Total"], 2, ",", " ");
                                echo $lucro . " &euro;";
                            }
                            $result->free();
                        }
                        ?>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        <p class="text-muted">Lucro Marcações</p>
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- COLUNA MARCAÇÕES -->
        <div class="col-3 mx-2 border rounded">
            <div class="row">
                <div class="col">
                    <h5 class="text-uppercase pt-2">Marcações</h5>
                </div>
            </div>
            <div class="row text-center">
                <!-- COLUNA PENDENTES -->
                <div class="col border-right">
                    <div class="row">
                        <div class="col mainInfo">
                            <?php
                            $sql = "SELECT * FROM marcacao WHERE estado = 'Pendente';";
                            $result = $conn->query($sql);
                            echo $result->num_rows;
                            $result->free();
                            ?>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col text-muted">
                            Pendentes
                        </div>
                    </div>
                </div>
                <!-- COLUNA CONFIRMADAS -->
                <div class="col border-left">
                    <div class="row text-center">
                        <div class="col mainInfo">
                            <?php
                            $sql = "SELECT * FROM marcacao WHERE estado = 'Confirmada';";
                            $result = $conn->query($sql);
                            echo $result->num_rows;
                            $result->free();
                            ?>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col text-muted">
                            Confirmadas
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- COLUNA NUMERO DE UTILIZADORES -->
        <div class="col border mx-2 rounded">
            <div class="row">
                <div class="col">
                    <h5 class="text-uppercase pt-2">Utilizadores</h5>
                </div>
            </div>
            <div class="row text-center">
                <div class="col mainInfo">
                    <?php
                    $sql = "SELECT * FROM utilizador;";
                    $result = $conn->query($sql);
                    echo $result->num_rows;
                    ?>
                </div>
            </div>
            <div class="row text-center">
                <div class="col text-muted">
                    Registados
                </div>
            </div>
        </div>
        <!-- COLUNA NUMETO DE PRODUTOS NA LOJA -->
        <div class="col border mx-2 rounded">
            <div class="row">
                <div class="col">
                    <h5 class="text-uppercase pt-2">Loja</h5>
                </div>
            </div>  
            <div class="row text-center">
                <div class="col mainInfo">
                    <?php
                    $sql = "SELECT * FROM produto;";
                    $result = $conn->query($sql);
                    echo $result->num_rows;
                    ?>
                </div>
            </div>
            <div class="row text-center">
                <div class="col text-muted">
                    Produtos
                </div>
            </div>
        </div>
        <!-- COLUNA NUMETO DE FOTOGRAFIAS NA GALERIA -->
        <div class="col border mx-2 rounded">
            <div class="row">
                <div class="col">
                    <h5 class="text-uppercase pt-2">Galeria</h5>
                </div>
            </div>  
            <div class="row text-center">
                <div class="col mainInfo">
                    <?php
                    $sql = "SELECT * FROM fotogaleria;";
                    $result = $conn->query($sql);
                    echo $result->num_rows;
                    ?>
                </div>
            </div>
            <div class="row text-center">
                <div class="col text-muted">
                    Fotografias
                </div>
            </div>
        </div>
        <!-- COLUNA NUMERO DE VISITAS -->
        <div class="col border ml-2 rounded">
            <div class="row">
                <div class="col">
                    <h5 class="text-uppercase pt-2">Visitas</h5>
                </div>
            </div>
            <div class="row text-center">
                <div class="col mainInfo">
                    <?php
                    $sql = "SELECT contador FROM viewcounter;";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) 
                        echo $row["contador"];
                    ?>
                </div>
            </div>
            <div class="row text-center">
                <div class="col text-muted">
                    Visitas
                </div>
            </div>
        </div>
    </div>
    
    <!-- LINHA DE BAIXO -->
    <div class="row mt-3">
        <div class="col-7 border rounded">
            <div class="row">
                <div class="col">
                    <h5 class="text-uppercase py-3">Pedidos de Marcação Recentes</h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Cliente</th>
                                <th>Pedido</th>
                                <th>Serviços</th>
                                <th>Data Pedido</th>
                                <th>Funcionário</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM v_completa_marcacao WHERE estado = 'Pendente' ORDER BY data_pedido DESC LIMIT 6;";
                            $result = $conn->query($sql);

                            if (!$result) {
                                $code = $conn->errno;
                                $message = $conn->error;
                                printf("SQL Error %d %s", $code, $message);
                            }
                            else {
                                while ($row = $result->fetch_assoc()) {
                                    $idMarcacao = $row["n_marcacao"];
                                    $cliente = $row["cliente"];
                                    $dataPedido = date("d-m-Y", strtotime($row["data_pedido"]));
                                    $funcionario = $row["funcionario"];
                                    $photo = $row["foto_perfil"];

                                    if ($cliente == null)
                                        $cliente = "Cliente";

                                    if ($photo == null)
                                        $photo = "assets/img/users/default-user.jpg";

                                    echo "<tr>
                                    <td class='align-middle'>
                                    <img src='$photo' alt='Fotografia de Perfil' class='rounded-circle mr-2 fotoPerfil' height='50' width='50'>
                                    <span>$cliente</span>
                                    </td>
                                    <td class='align-middle'>$idMarcacao</td>
                                    <td class='align-middle'>";
                                                    // Buscar os serviços escolhidos em cada marcação
                                    $sql2 = "SELECT nome FROM servicos_marcacao WHERE id_marcacao = '$idMarcacao';";
                                    $result2 = $conn->query($sql2);
                                    if ($result2) {
                                        // Variavel
                                        $servicosEscolhidos = "";
                                        while($servicos = $result2->fetch_assoc()) {
                                            $servicosEscolhidos .= $servicos["nome"] . "<br>";
                                        }
                                        echo $servicosEscolhidos;
                                    }
                                    echo "</td>
                                    <td class='align-middle'>$dataPedido</td>
                                    <td class='align-middle'>$funcionario</td>
                                    </tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-5 border rounded pb-3">
            <div class="row">
                <div class="col">
                    <h5 class="text-uppercase pt-2">Agenda</h5>
                </div>
            </div>
            <div class="row">
                <div class="col pl-4" id="to-do-list">
                    <div id="dashboardCalendar">
                        <?php include "dashboardCalendar.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODALS -->
<?php include("nPages/modal_ver_evento.php"); ?>