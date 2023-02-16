<?php
    if (!isset($_SESSION["authenticated"]))  {
        echo "<script>window.location.assign('?pagina=pPages/Login.php')</script>";
        exit();
    }

    if (isset($_POST["adicionarProduto"])) {
        if (isset($_POST["marcaProduto"]) && isset($_POST["nomeProduto"]) && isset($_POST["precoProduto"]) && isset($_POST["categoriaProduto"]) && isset($_POST["qtdStock"]) && isset($_FILES["insertPhotos"]["name"])  && isset($_POST["descricaoProduto"])) {
            $marca = $conn->real_escape_string($_POST["marcaProduto"]);
            $nome = $conn->real_escape_string($_POST["nomeProduto"]);
            $preco = str_replace(',', '.', $conn->real_escape_string($_POST["precoProduto"]));
            $categoria = $conn->real_escape_string($_POST["categoriaProduto"]);
            $qtdStock = $conn->real_escape_string($_POST["qtdStock"]);
            $descricaoProduto = $conn->real_escape_string($_POST["descricaoProduto"]);
            $imagem = $_FILES['insertPhotos']['name'];

            // Verificar se foi introduzida uma imagem e se não é fake

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
                    $sql = "INSERT INTO produto (nome, marca, descricao, preco, qtd_stock, imagem, id_categoria) VALUES (?, ?, ?, ?, ?, ?, ?);";
                }

            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                $code = $conn->errno;
                $message = $conn->error;
                printf("SQL Error %d %s", $code, $message);
            }
            else {
                $stmt->bind_param("sssdisi", $nome, $marca, $descricaoProduto, $preco, $qtdStock, $newPhoto, $categoria);
            }

            if (!$stmt->execute()) {
                $code = $conn->errno;
                $message = $conn->error;
                printf("SQL Error %d %s", $code, $message);
            }
            else {
                $_SESSION["produtoAdicionadoSucesso"] = true;
                echo "<script>window.location.assign('?pagina=rPages/lojaDashboard.php&page=1')</script>";
                exit();
            }
        }
    }
?>