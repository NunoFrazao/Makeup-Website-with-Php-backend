<div class="container-fluid px-1 px-lg-5 mt-lg-2" id="infoProdutoMain">
    <div class="row">
        <div class="col pl-4 pl-lg-5" id="voltar">
            <a href="#" id="voltarAtras" class="button rounded-circle" aria-label="Voltar atrás" data-toggle="tooltip" data-placement="right" title="Voltar atrás" onclick="history.back()">
                <i class="fas fa-arrow-circle-left"></i>
            </a>
        </div>
    </div>
    <div class="row mt-2 mt-lg-4">
        <!-- Fotografias do produto -->
        <div class="col-lg-5 px-4 px-lg-5 m-auto w-100" id="fotosProduto">
                <?php
                    $sql = "SELECT nome, marca, imagem FROM produto WHERE id_produto = '" . $_GET["idproduto"] . "';";
                    $result = $conn->query($sql);

                    if (!$result) {
                        $code = $conn->errno;
                        $message = $conn->error;
                        printf("SQL Error: %d %s", $code, $message);
                    }
                    else {
                        while ($row = $result->fetch_assoc()) {
                            $marca = $row["marca"];
                            $nome = $row["nome"];
                            $imagem = $row["imagem"];
                        }
                        echo "<img src='$imagem' alt='$marca - $nome' class='imagemProduto w-100 h-100'>";
                    }
                ?> 
        </div>
        <!-- Informação do produto -->
        <div class="col-lg-7 px-5 px-lg-5" id="infoProduto">
            <!-- Marca -->
            <div class="row mt-4 pt-2 pt-lg-0">
                <div class="col">
                    <h3 id="marcaProduto">
                        <?php
                            $sql = "SELECT marca FROM v_completa_produto WHERE id_produto=" . $_GET["idproduto"] . ";";
                            $result = $conn->query($sql);
                            if (!$result) {
                                $code = $conn->errno;
                                $message = $conn->error;
                                printf("<p>SQL Error: %d %s</p>, $code, $message");
                            }
                            else {
                                while ($row = $result->fetch_assoc()) {
                                    echo $row["marca"];
                                }
                                $result->free();
                            }
                        ?>
                    </h3>
                </div>
            </div>
            <!-- Nome -->
            <div class="row mt-2">
                <div class="col">
                    <h2 id="nomeProduto" class="font-weight-bold">
                        <?php
                            $sql = "SELECT produto FROM v_completa_produto WHERE id_produto=" . $_GET["idproduto"] . ";";
                            $result = $conn->query($sql);
                            if (!$result) {
                                $code = $conn->errno;
                                $message = $conn->error;
                                printf("<p>SQL Error: %d %s</p>, $code, $message");
                            }
                            else {
                                while ($row = $result->fetch_assoc()) {
                                    echo $row["produto"];
                                }
                                $result->free();
                            }
                        ?>
                    </h2>
                </div>
            </div>
            <!-- Preço -->
            <div class="row my-2 mb-lg-0 mt-lg-3">
                <div class="col">
                    <p id="preco">
                        <?php
                            $sql = "SELECT preco FROM v_completa_produto WHERE id_produto=" . $_GET["idproduto"] . ";";
                            $result = $conn->query($sql);
                            if (!$result) {
                                $code = $conn->errno;
                                $message = $conn->error;
                                printf("<p>SQL Error: %d %s</p>, $code, $message");
                            }
                            else {
                                while ($row = $result->fetch_assoc()) {
                                    echo number_format($row["preco"], 2, ",", " ") . " &euro;";
                                }
                                $result->free();
                            }
                        ?>
                    </p>  
                </div>
            </div>

            <!-- Se o stock for igual a 0, criar uma mensagem a dizer que o produto está indisponível -->
            <?php
                $sql = "SELECT qtd_stock FROM v_completa_produto WHERE id_produto=" . $_GET["idproduto"] . ";";
                $result = $conn->query($sql);
                if (!$result) {
                    $code = $conn->errno;
                    $message = $conn->error;
                    printf("<p>SQL Error: %d %s</p>, $code, $message");
                }
                else {
                    while ($row = $result->fetch_assoc()) {
                        $stock = $row["qtd_stock"];

                        if ($stock == 0) {
                            echo " <div class='row mt-0 mt-lg-2'>
                                        <div class='col'>
                                            <p class='text-danger' id='artigoIndisponivel'>Artigo indísponível</p>
                                        </div>
                                </div>";
                        }

                    }
                    $result->free();
                }
            ?>

            <!-- Descrição -->
            <div class="row mt-lg-3">
                <div class="col">
                    <p id="descricaoProduto">
                        <?php
                            $sql = "SELECT descricao FROM v_completa_produto WHERE id_produto=" . $_GET["idproduto"] . ";";
                            $result = $conn->query($sql);
                            if (!$result) {
                                $code = $conn->errno;
                                $message = $conn->error;
                                printf("<p>SQL Error: %d %s</p>, $code, $message");
                            }
                            else {
                                while ($row = $result->fetch_assoc()) {
                                    echo $row["descricao"];
                                }
                                $result->free();
                            }
                            $conn->close();
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>