<!-- MAIN CONTENT -->
<main>
    <h1 class="sr-only">Massagens</h1>
    <div id="massagensMain" class="container mt-sm-4 mt-md-0">
        <div class="row">

            <!-- CORPO INTEIRO -->
            <div id="corpoInteiro" class="col-md-6 mt-1 mt-md-0 colunas">
                <div class="massagemContainer">
                        <h2 class="tituloMobile d-block d-sm-none">Corpo Inteiro</h2>
                        <?php
                            // Criar a query
                            $sql = "SELECT imagem FROM subservico WHERE id_subservico = 8;";
                            $result = $conn->query($sql);

                            if (!$result) {
                                $code = $conn->errno;
                                $message = $conn->error;
                                printf("<p>SQL Error %d %s:</p>", $code, $message);
                            }
                            else {
                                // Buscar resultados
                                while ($row = $result->fetch_assoc()) {
                                    echo "<img src='" . $row["imagem"] . "' alt='Massagem Corpo Inteiro' id='corpoInteiroImg' class='massagemImagem'>";
                                }
                                $result->free();
                            }
                        ?>	
                    <section class="massagemInformacao d-flex align-items-stretch flex-column h-90">
                        <h2 class="d-none d-sm-block my-0 my-sm-2 mt-md-5 mb-md-3">Corpo Inteiro</h2>
                        <!-- Buscar a descrição da massagem de Corpo Inteiro à base de dados -->
                        <?php
                            $sql = "SELECT descricao FROM subservico_descricao WHERE id_subservico = 8 AND id_descricao = 8;";
                            $result = $conn->query($sql);

                            if (!$result) {
                                $code = $conn->errno;
                                $message = $conn->error;
                                printf("<p>SQL Error %d %s:</p>", $code, $message);
                            }
                            else {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<p>" . $row["descricao"] . "</p>";
                                }
                                $result->free();
                            }
                        ?>	
                    </section>
                    <a href="?pagina=rPages/corpoInteiro.php" class="btn massagemVerMais rounded-pill mt-0 mt-md-4">
                        Ver mais <i class="fal fa-chevron-right"></i>
                    </a>
                </div>
            </div>
            
            <!-- COSTAS -->
            <div id="costas" class="col-md-6 mt-2 mt-md-0  colunas">
                <div class="massagemContainer">
                        <h2 class="tituloMobile d-block d-sm-none">Costas</h2>
                        <!-- Buscar o caminho da imagem à base de dados -->
                        <?php
                            // Criar a query
                            $sql = "SELECT imagem FROM subservico WHERE id_subservico = 9;";
                            $result = $conn->query($sql);

                            if (!$result) {
                                $code = $conn->errno;
                                $message = $conn->error;
                                printf("<p>SQL Error %d %s:</p>", $code, $message);
                            }
                            else {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<img src='" . $row["imagem"] . "' alt='Massagem Costas' id='costasImg' class='massagemImagem'>";
                                }
                                $result->free();
                            }
                        ?>	
                    <section class="massagemInformacao d-flex align-items-stretch flex-column h-90">
                        <h2 class="d-none d-sm-block my-0 my-sm-2 mt-md-5 mb-md-3">Costas</h2>
                        <!-- Buscar a descrição da massagem de Corpo Inteiro à base de dados -->
                        <?php
                            // Criar a query
                            $sql = "SELECT descricao FROM subservico_descricao WHERE id_subservico = 9 AND id_descricao = 11;";
                            $result = $conn->query($sql);

                            if (!$result) {
                                $code = $conn->errno;
                                $message = $conn->error;
                                printf("<p>SQL Error %d %s:</p>", $code, $message);
                            }
                            else {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<p>" . $row["descricao"] . "</p>";
                                }
                                $result->free();
                            }
                            $conn->close();
                        ?>	
                    </section>
                    <a href="?pagina=rPages/costas.php" class="btn massagemVerMais rounded-pill mt-0 mt-md-4">
                        Ver mais <i class="fal fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>