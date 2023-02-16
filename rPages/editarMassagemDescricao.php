<?php
    if (!isset($_SESSION["authenticated"])) {
        echo "<script>window.location.assign('?pagina=pPages/Login.php')</script>";
        exit();
    }
    else {
        if (isset($_POST["confirmEditarMassagemDescricao"])) {
            if (isset($_POST["idSubservicoDescricaoHidden"])) {
                $idDescricao = $conn->real_escape_string($_POST["idSubservicoDescricaoHidden"]);
                $descricao = $conn->real_escape_string($_POST["massagemDescricaoEditar"]);

                $sql = "UPDATE subservico_descricao SET descricao = ? WHERE id_descricao = ?;";
                $stmt = $conn->prepare($sql);

                if (!$stmt) {
                    $code = $conn->errno;
                    $message = $conn->error;
                    printf("SQL Error %d %s", $code, $message);
                }
                else {
                    $stmt->bind_param("si", $descricao, $idDescricao);
                }

                if (!$stmt->execute()) {
                    $code = $conn->errno;
                    $message = $conn->error;
                    printf("SQL Error %d %s", $code, $message);
                }
                else {
                    $_SESSION["descricaoMarcacaoAlterada"] = true;
                    echo "<script>window.location.assign('?pagina=rPages/massagensDashboard.php')</script>";
                    exit();
                }
            }
        }
    }
?>