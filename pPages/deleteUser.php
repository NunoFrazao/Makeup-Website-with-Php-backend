<?php
    if (isset($_POST["confirmDelete"])) {
        $id = $_POST["hiddenId"];
        $sql = "DELETE FROM utilizador WHERE id_utilizador = '$id'";
        $result = $conn->query($sql);
        $_SESSION["apagar"]=true;
        echo "<script>window.location.replace('?pagina=pPages/users.php')</script>";
        exit(0);
    }else{
        echo "<script>window.location.replace('?pagina=pPages/users.php')</script>";
        exit(0);
    }
?>


<!--

ALTER TABLE `pureaura`.`marcacao` 
DROP FOREIGN KEY `marcacao_ibfk_1`;
ALTER TABLE `pureaura`.`marcacao` 
ADD CONSTRAINT `marcacao_ibfk_1`
  FOREIGN KEY (`id_utilizador`)
  REFERENCES `pureaura`.`utilizador` (`id_utilizador`)
  ON DELETE CASCADE;


  ALTER TABLE `pureaura`.`marcacao_subservico` 
DROP FOREIGN KEY `marcacao_subservico_ibfk_1`;
ALTER TABLE `pureaura`.`marcacao_subservico` 
ADD CONSTRAINT `marcacao_subservico_ibfk_1`
  FOREIGN KEY (`id_marcacao`)
  REFERENCES `pureaura`.`marcacao` (`id_marcacao`)
  ON DELETE CASCADE; 

-->
