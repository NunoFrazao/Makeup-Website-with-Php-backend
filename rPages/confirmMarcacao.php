<?php
    if (isset($_POST["confirmMarcacaoSubmit"])) {
        $idMarcacao = $_POST["idMarcacaoHidden"];
        $dataMarcacao = date_format(new DateTime($conn->real_escape_string($_POST["dataMarcacao"])), "Y-m-d H:i:s");
        
        $sql = "UPDATE marcacao SET data_marcacao_confirmada = (?) WHERE id_marcacao = $idMarcacao;";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            $code = $conn->errno;
            $message = $conn->error;
            printf("SQL Error %d %s", $code, $message);
        }
        else {
            $stmt->bind_param("s", $dataMarcacao);

            if (!$stmt->execute()) {
                $code = $conn->errno;
                $message = $conn->error;
                printf("SQL Error %d %s", $code, $message);
            }
            else {
                $sql2 = "UPDATE marcacao SET estado = 'Confirmada' WHERE id_marcacao = $idMarcacao;";
                $result2 = $conn->query($sql2);

                if (!$result2) {
                    $code = $conn->errno;
                    $message = $conn->error;
                    printf("SQL Error %d %s", $code, $message);
                }
                else {
                    $_SESSION["marcacaoConfirmada"] = true;
                    echo "<script>window.location.assign('?pagina=rPages/marcacaoDashboard.php&estado=pendente&page=1')</script";
                }
            }
        }
    }
?>