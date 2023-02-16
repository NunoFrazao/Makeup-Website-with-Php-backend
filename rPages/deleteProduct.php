<?php
    if (!isset($_SESSION["authenticated"])) {
        echo "<script>window.location.assign('?pagina=pPages/Login.php');</script>";
        exit();
    }
    else {
        if (isset($_POST["confirmEliminarProduto"])) {
            if (isset($_POST["idProdutoEliminarHidden"])) {
                $idProduto = $conn->real_escape_string($_POST["idProdutoEliminarHidden"]);

                $sql = "SELECT imagem FROM produto WHERE id_produto = (?);";
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
                            echo "<script>window.location.assign('?pagina=rPages/lojaDashboard.php&page=1')</script>";
                        }
                    }
                }
            }
        }
    }
?>