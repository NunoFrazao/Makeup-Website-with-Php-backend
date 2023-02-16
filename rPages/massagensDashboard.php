<?php include "modals-massagensDashboard.php"; ?>

<div class="container-fluid px-4" id="div-massagensDashboard">
    <div class="row pt-3">
        <div class="col">
            <h1>Descrições Massagens</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-hover">
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
                        $sql = "SELECT * FROM v_completa_subservico_descricao WHERE id_subservico IN(8, 9);";
                        $result = $conn->query($sql);

                        if (!$result) {
                            $code = $conn->errno;
                            $message = $conn->error;
                            printf("SQL Error %d %s", $code, $message);
                        }
                        else {
                            while ($row = $result->fetch_assoc()) {
                                $idDescricao = $row["id_descricao"];
                                $nome = $row["nome"];
                                $descricao = $row["descricao"];

                                echo "<tr>
                                        <td class='align-middle'>$idDescricao</td>
                                        <td class='align-middle nomeSubservico'>$nome</td>
                                        <td class='align-middle'>$descricao</td>
                                        <td class='align-middle'>
                                            <div class='modalTrigger tableButtons' data-toggle='modal' data-target='#verMaisMassagemDescricao' data-descricao='$descricao'>
                                                <i class='far fa-eye verMais' data-toggle='tooltip' data-placement='top' title='Ver Descição'></i>
                                            </div>
                                            <div class='modalTrigger tableButtons' data-toggle='modal' data-target='#editarMassagemDescricao' data-iddescricao='$idDescricao' data-descricao='$descricao'>
                                                <i class='far fa-edit editar' data-toggle='tooltip' data-placement='top' title='Editar Descrição'></i>
                                            </div>
                                        </td>
                                    </tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>