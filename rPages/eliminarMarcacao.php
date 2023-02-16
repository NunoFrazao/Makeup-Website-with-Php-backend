<?php
    if (!isset($_SESSION["authenticated"])) {
        echo "<script>window.location.assing('?pagina=pPages/Login.php')</script>";
        exit();
    }
    else {
        if (isset($_POST["confirmEliminarMarcacao"])) {
            if (isset($_POST["idMarcacaoEliminarHidden"])) {
                $idMarcacao = $conn->real_escape_string($_POST["idMarcacaoEliminarHidden"]);
    
                $sql = "DELETE FROM marcacao WHERE id_marcacao = (?);";
                $stmt = $conn->prepare($sql);
    
                if (!$stmt) {
                    $code = $conn->errno;
                    $message = $conn->error;
                    printf("SQL Error %d %s", $code, $message);
                }
                 else {
                    $stmt->bind_param("i", $idMarcacao);
    
                    if (!$stmt->execute()) {
                        $code = $conn->errno;
                        $message = $conn->error;
                        printf("SQL Error %d %s", $code, $message);
                    }
                    else {
                        $_SESSION["marcacaoEliminada"] = true;
                        echo "<script>window.location.assign('?pagina=rPages/marcacaoDashboard.php&estado=pendente&page=1')</script>";
                    }
                 }
            }
        }
    }
?>