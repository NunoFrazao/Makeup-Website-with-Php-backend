<!-- BOTAO VOLTAR ATRAS -->

<div id="back" class="d-flex align-items-center mt-2 mt-lg-0">
    <a href="?pagina=rPages/loja.php" id="backBtn" class="button " aria-label="Voltar atrás" data-toggle="tooltip" data-placement="right" title="Voltar atrás">
        <i class="fas fa-arrow-circle-left"></i>
    </a>
    <h1 class="mb-0">
        <?php
            $sql = "SELECT designacao FROM categoriaproduto WHERE id_categoria = '". $_GET["categoria"] . "';";
            $result = $conn->query($sql);

            if (!$result) {
                $code = $conn->errno;
                $message = $conn->error;
                printf("<p>SQL Error: %d %s</p>, $code, $message");
            }
            else {
                while ($row = $result->fetch_assoc()) {
                    echo $row["designacao"];
                }
            }
            $result->free();
        ?>
    </h1>
</div>

<!-- FILTROS DOS PRODUTOS -->

<div class="navbar navbar-expand-sm navbar-light" id="filtrosCollapse">
  <button class="navbar-toggler" id="expandirFiltrosButton" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span>
        Filtros&nbsp;<i class="far fa-filter ml-2"></i>
    </span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div id="filtrosListaProdutos" aria-label="Filtros de pesquisa">
            <p id="filtrarPor-title">Filtrar por</p>
            <div class="dropdown my-5" id="filtroMarcaContainer">
                <button class="btn btn-secondary dropdown-toggle btn-block text-left" type="button" id="filtroMarcaButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Marca <span><i class="fal fa-chevron-down"></i></span>
                </button>

                <!-- Filtro marca -->

                <div class="dropdown-menu" id="filtroMarca" aria-labelledby="filtroMarcaButton">
                    <?php
                        // Create the query
                        $sql = "SELECT DISTINCT Marca FROM v_completa_produto WHERE id_categoria = '" . $_GET["categoria"] . "' ORDER BY 1;";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        if ($resultCheck) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Filtro por marca
                                $marca = $row["Marca"];
                                /* Variáveis para utilizar nos filtros */
                                $filtroMarcaTmp = explode(" ", $marca);
                                $filtroMarca = implode("", $filtroMarcaTmp);
                                
                                echo "<label for='$marca' class='checkboxContainer' data-marca='$marca'>$marca
                                        <input type='checkbox' name='$marca' value='$filtroMarca' id='$marca'>
                                        <span class='checkboxCheckmark'></span>
                                    </label>";
                            }
                        }
                    ?>
                </div>
            </div>
            
            <!-- Filtro ordenar por -->

            <div class="dropdown my-5" id="filtroOrdenarPorContainer">
                <button class="btn btn-secondary dropdown-toggle btn-block text-left" type="button" id="filtroOrdenarPorButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ordenar por <span><i class="fal fa-chevron-down"></i></span>
                </button>
                <div class="dropdown-menu" id="filtroOrdenarPor" aria-labelledby="filtroOrdenarPorButton">
                    <label for="recentes" class="radioContainer">Recentes
                        <input type="radio" name="ordenarPor" value="recentes" id="recentes">
                        <span class="radioCheckmark"></span>
                    </label>
                    <label for="precoAsc" class="radioContainer">Preço <i class="fal fa-arrow-up"></i>
                        <input type="radio" name="ordenarPor" value="precoAsc" id="precoAsc">
                        <span class="radioCheckmark"></span>
                    </label>
                    <label for="precoDesc" class="radioContainer">Preço <i class="fal fa-arrow-down"></i>
                        <input type="radio" name="ordenarPor" value="precoDesc" id="precoDesc">
                        <span class="radioCheckmark"></span>
                    </label>
                    <label for="marcaAsc" class="radioContainer">Marca (A a Z)
                        <input type="radio" name="ordenarPor" value="marcaAsc" id="marcaAsc">
                        <span class="radioCheckmark"></span>
                    </label>
                    <label for="marcaDesc" class="radioContainer">Marca (Z a A)
                        <input type="radio" name="ordenarPor" value="marcaDesc" id="marcaDesc">
                        <span class="radioCheckmark"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- LISTA PRODUTOS -->

<div id="listaProdutosMain" class="container-xl mt-4 mt-lg-5 pt-0 pt-xl-0">
    <div class="row row-cols-2 row-cols-sm-3 row-cols-lg-4" id="products-grid">
        <?php
            // Create the query
            $sql = "SELECT * FROM v_completa_produto WHERE id_categoria = '". $_GET["categoria"] . "';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $idProduto = $row["id_produto"];
                    $imagem = $row["imagem"];
                    $marca = $row["marca"];
                    $produto = $row["produto"];
                    $preco = $row["preco"];

                    /* Variáveis para utilizar nos filtros */
                    $filtroMarcaTmp = explode(" ", $marca);
                    $filtroMarca = implode("", $filtroMarcaTmp);

                    echo "<div class='col mb-4 px-2 px-lg-3 filtrarProduto $filtroMarca $preco' data-idproduto='$idProduto' data-marca='$marca' data-preco='$preco'>
                            <a href='?pagina=rPages/produto.php&idproduto=$idProduto' class='productCard'>            
                                <div class='card h-100 w-100 border-0'>
                                    <img src='$imagem' alt='$marca - $produto' class='card-img-top produtoImagem'>
                                    <div class='card-body pb-2'>
                                        <h5 class='card-title marcaProduto'>$marca</h5>
                                        <p class='card-text font-weight-bold nomeProduto'>$produto</p>
                                    </div>
                                    <div class='card-footer bg-transparent pb-2 pb-md-3 precoProduto'>
                                        <p class='card-text d-inline-block preco'>" .number_format($preco, 2, ",", "") . " &euro;</p>
                                    </div>
                                </div>
                            </a>
                        </div>"; 
                }
            }
        ?>
    </div>
</div>