<?php include "modals-lojaDashboard.php"; ?>
<?php
    if (!isset($_SESSION["authenticated"])) {
        echo "<script>window.location.assign('?pagina=pPages/Login.php');</script>";
        exit();
    }
    else {
        if (isset($_POST["confirmEliminarProduto"])) {
            if (isset($_POST["idProdutoEliminarHidden"])) {
                $idProduto = $conn->real_escape_string($_POST["idProdutoEliminarHidden"]);

                $sql = "SELECT imagem FROM produto_imagem WHERE id_produto = (?);";
                $stmt = $conn->prepare($sql);

                if (!$stmt) {
                    $code = $conn->errno;
                    $message = $conn->error;
                    printf("SQL Error %d %s", $code, $message);
                }
                else {
                    $stmt->bind_param("i", $idProduto);

                    if (!$stmt->execute()) {
                        $code = $conn->errno;
                        $message = $conn->error;
                        printf("SQL Error %d %s", $code, $message);
                    }
                    else {
                        $stmt->bind_result($imagem);
                        while ($stmt->fetch())
                            unlink($imagem);
                        $stmt->free_result();
                    }

                    $stmt->close();
                    
                    $sql = "DELETE FROM produto WHERE id_produto = (?);";
                    $stmt = $conn->prepare($sql);
    
                    if (!$stmt) {
                        $code = $conn->errno;
                        $message = $conn->error;
                        printf("SQL Error %d %s", $code, $message);
                    }
                    else {
                        $stmt->bind_param("i", $idProduto);
    
                        if (!$stmt->execute()) {
                            $code = $conn->errno;
                            $message = $conn->error;
                            printf("SQL Error %d %s", $code, $message);
                        }
                        else {
                            $stmt->free_result();
                            $stmt->close();
                            $_SESSION["produtoEliminado"] = true;
                        }
                    }
                }
            }
        }
    }
?>
<div class="container-fluid px-4" id="div-loja">
    <div class="row pt-3">
        <div class="col">
            <h1 class="d-inline-block">
                Loja
                <?php
                    $sql = "SELECT * FROM produto;";
                    $result = $conn->query($sql);

                    echo "<span id='totalProdutos'>(Total Produtos: $result->num_rows)</span>";
                ?>
            </h1>
        </div>

        <!-- Mostrar o botao de adicionar produto apenas ao utilizador  -->

        <?php if ($_SESSION['estatuto'] == "Administrador") { ?>
            <div class="col" id="addProductBtnContainer">
                <button class="btn rounded-pill px-3" id="addProduto" data-toggle="modal" data-target="#addProduct">
                    Adicionar Produto <span><i class="fal fa-plus"></i></span>
                </button>
            </div>
        <?php } ?>

    </div>
    <div class="row mt-2">
        <div class="col">
            <input type="search" name="searchProduto" class="form-control" id="searchLoja" placeholder="Pesquise aqui...">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <table class="table table-hover" id="listaProdutos">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Imagem</th>
                        <th>Produto</th>
                        <th>Marca</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th>Stock</th>
                        <!-- Remover permissões aos funcionarios para editar ou eliminar produtos -->
                        <?php if ($_SESSION['estatuto'] == "Administrador") { ?>
                            <th class="text-center">Ação</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Sistema de numeração de páginas

                        if (isset($_GET["page"])) {
                            $pageNumber = $_GET["page"];
                        }
                        else {
                            $pageNumber = 1;
                        }

                        // Número de registos por página
                        $registosPagina = 7;
                        $offset = ($pageNumber - 1) * $registosPagina;

                        // Contar o número de registos
                        $sqlNumRegistos = "SELECT COUNT(*) FROM produto;";
                        $result = $conn->query($sqlNumRegistos);
                        $totalRows = $result->fetch_array()[0];
                        $totalPaginas = ceil($totalRows / $registosPagina);

                        $sql = "SELECT * FROM v_completa_produto LIMIT $offset, $registosPagina;";
                        $result = $conn->query($sql);

                        if (!$result) {
                            $code = $conn->errno;
                            $message = $conn->error;
                            printf("SQL Error %d %s", $code, $message);
                        }
                        else {
                            while ($row = $result->fetch_assoc()) {
                                $idProduto = $row["id_produto"];
                                $marca = $row["marca"];
                                $produto = $row["produto"];
                                $preco = $row["preco"];
                                $idCategoria = $row["id_categoria"];
                                $categoria = $row["categoria"];
                                $stock = $row["qtd_stock"];
                                $imagem = $row["imagem"];
                                $descricao = $row["descricao"];

                                echo "<tr>
                                        <td class='align-middle'>$idProduto</td>
                                        <td class='align-middle'><img src='$imagem' alt='$produto' class='rounded-circle' width='55' height='55'></td>
                                        <td class='align-middle'>$produto</td>
                                        <td class='align-middle'>$marca</td>
                                        <td class='align-middle'>" . number_format($preco, 2, ",", " ") . " &euro;</td>
                                        <td class='align-middle'>$categoria</td>
                                        <td class='align-middle"; if ($stock == 0) echo " text-danger font-weight-bold"; echo"'>$stock</td>";

                                        // Remover permissões aos funcionarios para editar ou eliminar produtos 
                                        if ($_SESSION['estatuto'] == "Administrador") {
                                            echo "<td class='align-middle text-center'>
                                                    <div class='modalTrigger tableButtons' data-toggle='modal' data-target='#editProduct' data-marcaproduto='$marca' data-idproduto='$idProduto' data-nomeproduto='$produto' data-precoproduto='" . number_format($preco, 2, ",", " ") . "' data-idcategoriaproduto='$idCategoria' data-stockproduto='$stock' data-descricaoproduto='$descricao'>
                                                        <i class='far fa-edit editar' data-toggle='tooltip' data-placement='top' title='Editar'></i>
                                                    </div>
                                                    <div class='modalTrigger tableButtons' data-toggle='modal' data-target='#eliminarProduto' data-idproduto='$idProduto'>
                                                        <i class='far fa-trash eliminar' data-toggle='tooltip' data-placement='top' title='Eliminar'></i>
                                                    </div>
                                                </td>";
                                        }
                                echo "</tr>";
                            }
                        } 
                    ?>
                </tbody>
            </table>
            <!-- Paginação -->
            <nav class="table-pagination" aria-label="Navegação de páginas">
                <ul class="pagination justify-content-end">
                    <li class="page-item <?php if($pageNumber <= 1){ echo 'disabled'; } ?>">
                        <a href="<?php if($pageNumber <= 1){ echo '#'; } else { echo "?pagina=rPages/lojaDashboard.php&page=".($pageNumber - 1); } ?>" class="page-link">Anterior</a>
                    </li>
                        <?php 
                            $i = 1;
                            while ($i <= $totalPaginas) {
                                // Escreve a paginacao e, se $i for igual ao número da pagina, adicionar a class .active 
                                echo "<li class='page-item "; if ($i == $_GET["page"]) echo 'active'; echo "'><a class='page-link' href='?pagina=rPages/lojaDashboard.php&page=$i'>$i</a></li>";
                                $i++;
                            }
                        ?>
                    <li class="page-item <?php if($pageNumber >= $totalPaginas){ echo 'disabled'; } ?>">
                        <a href="<?php if($pageNumber >= $totalPaginas){ echo '#'; } else { echo "?pagina=rPages/lojaDashboard.php&page=".($pageNumber + 1); } ?>" class="page-link">Próxima</a>
                    </li>   
                </ul>
            </nav>
        </div>
    </div>
</div>