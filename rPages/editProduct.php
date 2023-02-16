<?php
    if (!isset($_SESSION["authenticated"])) {
        echo "<script>window.location.assign('?pagina=pPages/Login.php')</script>";
        exit();
    }
    else {
        if (isset($_POST["editarProduto"])) {
            if (isset($_POST["idProdutoEditarHidden"])) {
                $marca = $conn->real_escape_string($_POST["marcaProdutoEdit"]);
                $nome = $conn->real_escape_string($_POST["nomeProdutoEdit"]);
                $idProduto = $conn->real_escape_string($_POST["idProdutoEditarHidden"]);
                $preco = str_replace(',', '.', $conn->real_escape_string($_POST["precoProdutoEdit"]));
                $categoria = $conn->real_escape_string($_POST["categoriaProdutoEdit"]);
                $stock = $conn->real_escape_string($_POST["qtdStockEdit"]);
                $descricao = $conn->real_escape_string($_POST["descricaoProdutoEdit"]);
                $imagem = array_key_exists("insertPhotos", $_FILES) ? $_FILES["insertPhotos"]["name"] : "";

                $sql = "UPDATE produto SET nome = ?, marca = ?, descricao = ?, preco = ?, qtd_stock = ?, id_categoria = ? WHERE id_produto = ?;";

                // Verificar se foi introduzida uma imagem e se não é fale
                if ($imagem != "") {
                    if ($categoria == 1)
                        $dir = "assets/img/ruben/loja/cremes/";
                    else if ($categoria == 2) 
                        $dir = "assets/img/ruben/loja/batons/";
                    else if ($categoria == 3) 
                        $dir = "assets/img/ruben/loja/vernizes/";
                    else if ($categoria == 4) 
                        $dir = "assets/img/ruben/loja/maquilhagem/";
                    else if ($categoria == 5) 
                        $dir = "assets/img/ruben/loja/rimel/";
                    else if ($categoria == 6) 
                        $dir = "assets/img/ruben/loja/oleos/";
                    else if ($categoria == 7) 
                        $dir = "assets/img/ruben/loja/eyeliners/";
                    else if ($categoria == 8) 
                        $dir = "assets/img/ruben/loja/Bases/"; 

                    $extension = pathinfo($imagem, PATHINFO_EXTENSION);
                    $newPhoto = $dir . microtime() . "." . $extension;
                    $check = getimagesize($_FILES["insertPhotos"]["tmp_name"]);

                    if (!$check) {
                        echo "O ficheiro introduzido não é uma imagem";
                        exit();
                    }
                    else {
                        move_uploaded_file($_FILES["insertPhotos"]["tmp_name"], $newPhoto);
            
                        // Eliminar a foto antiga
                        $sql2 = "SELECT imagem FROM produto WHERE id_produto = $idProduto;";
                        $result = $conn->query($sql2);
                        
                        if (!$result) {
                            $code = $conn->errno;
                            $message = $conn->error;
                            printf("SQL Error %d %s", $code, $message);
                        }
                        else {
                            while ($row = $result->fetch_assoc()) {
                                unlink($row["imagem"]);
                            }

                            $sql3 = "UPDATE produto SET imagem = ? WHERE id_produto = ?;";
                            $stmt2 = $conn->prepare($sql3);

                            if (!$stmt2) {
                                $code = $conn->errno;
                                $message = $conn->error;
                                printf("SQL Error %d %s", $code, $message);
                            }
                            else {
                                $stmt2->bind_param("si", $newPhoto, $idProduto);
                                
                                if (!$stmt2->execute()) {
                                    $code = $conn->errno;
                                    $message = $conn->error;
                                    printf("SQL Error %d %s", $code, $message);
                                }
                            }
                        }
                    }
                }

                $stmt = $conn->prepare($sql);

                if (!$stmt) {
                    $code = $conn->errno;
                    $message = $conn->error;
                    printf("SQL Error %d %s", $code, $message);
                }
                else {
                    $stmt->bind_param("sssdiii", $marca, $nome, $descricao, $preco, $stock, $categoria, $idProduto);

                    if (!$stmt->execute()) {
                        $code = $conn->errno;
                        $message = $conn->error;
                        printf("SQL Error %d %s", $code, $message);
                    }
                    else {
                        $_SESSION["produtoAtualizado"] = true;
                        echo "<script>window.location.assign('?pagina=rPages/lojaDashboard.php&page=1')</script>"; 
                        exit();
                    }
                }
            }
        }
    }
?>