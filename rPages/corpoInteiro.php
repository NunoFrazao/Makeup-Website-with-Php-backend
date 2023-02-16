<!-- MAIN CONTENT -->
<div id="corpoInteiroMain" class="container-fluid mt-lg-5">
    <div class="row">
        <div id="backBtn"  class="col-0 col-lg-1 d-lg-flex buttonContainer">
            <!-- VOLTAR ATRÁS -->
            <a href="?pagina=rPages/massagens.php" class="button rounded-circle" aria-label="Voltar atrás" data-toggle="tooltip" data-placement="right" title="Voltar atrás">
                <i class="fas fa-arrow-circle-left"></i>
            </a>
        </div>
        <div id="mainContent" class="col-12 col-lg-10">
            <div class="row">
                <div id="corpoInteiroImagem" class="col-12 p-0 px-lg-3 mt-3 mt-lg-0">
                    <!-- Buscar o caminho da imagem à base de dados -->
                    <?php
                        $sql = "SELECT imagem FROM subservico WHERE id_subservico = 8;";
                        $result = $conn->query($sql);

                        if (!$result) {
                            $code = $conn->errno;
                            $message = $conn->error;
                            printf("<p>SQL Error %d %s:</p>", $code, $message);
                        }
                        else {
                            while ($row = $result->fetch_assoc()) {
                                echo "<img src='" . $row["imagem"] . "' alt='Massagem Corpo Inteiro'>";
                            }
                            $result->free();
                        }
                    ?>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg titulo">
                    <h1 class="my-2 my-lg-4 py-2">Massagem Corpo Inteiro</h1>
                </div>
            </div>
            <div class="row">
                <div id="textoEsquerda" class="col-lg-6 corpoInteiroInformacao">
                    <p class="mb-4 m-lg-0">
                        <!-- Buscar descrições da massagem corpo inteiro à base de dados -->
                        <?php
                            $sql = "SELECT descricao FROM subservico_descricao WHERE id_subservico = 8 AND id_descricao = 9;";
                            $result = $conn->query($sql);

                            if (!$result) {
                                $code = $conn->errno;
                                $message = $conn->error;
                                printf("<p>SQL Error: %d %s</p>", $code, $message);
                            }
                            else {
                                while ($row = $result->fetch_assoc()) {
                                    echo $row["descricao"];
                                }
                                $result->free();
                            }
                        ?>
                    </p>
                </div>
                <div id="textoDireita" class="col-lg-6 corpoInteiroInformacao">
                    <p class="mt-4 m-lg-0">  
                        <!-- Buscar descrições da massagem corpo inteiro à base de dados -->
                        <?php
                            $sql = "SELECT descricao FROM subservico_descricao WHERE id_subservico = 8 AND id_descricao = 10;";
                            $result = $conn->query($sql);

                            if (!$result) {
                                $code = $conn->errno;
                                $message = $conn->error;
                                printf("<p>SQL Error: %d %s</p>", $code, $message);
                            }
                            else {
                                while ($row = $result->fetch_assoc()) {
                                    echo $row["descricao"];
                                }
                                $result->free();
                            }
                        ?>
                    </p>
                </div>
            </div>
            <div class="row my-2 my-lg-5">
                <div class="col preco">
                    <!-- Buscar o preço do serviço à base de dados -->
                    <?php
                        $sql = "SELECT preco FROM subservico WHERE id_subservico = 8;";
                        $result = $conn->query($sql);

                        if (!$result) {
                            $code = $conn->errno;
                            $message = $conn->error;
                            printf("<p>SQL Error %d %s:</p>", $code, $message);
                        }
                        else {
                            while ($row = $result->fetch_assoc()) {
                            echo "<p id='precoValor'>" . number_format($row["preco"], 2, ",", "") . " &euro;</p>";
                            }
                            $result->free();
                        }
                        $conn->close();
                    ?>
                </div>
            </div> 
            <div class="row mt-0 mt-lg-1">
                <div id="marcacao" class="col">
                    <a href="?pagina=rPages/marcacao.php" id="marcacaoBtn" class="btn rounded-pill">
                        Marcação <i class="fal fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div id="nextBtn" class="col-0 col-lg-1 d-none d-lg-flex buttonContainer">
            <!-- PRÓXIMA PÁGINA -->
            <a href="?pagina=rPages/costas.php" id="costasBtn" class="button rounded-circle" aria-label="Ir para Massagem Costas" data-toggle="tooltip" data-placement="left" title="Ir para Massagem Costas">
                <i class="fas fa-chevron-circle-right"></i>
            </a>
        </div>
    </div>
</div>