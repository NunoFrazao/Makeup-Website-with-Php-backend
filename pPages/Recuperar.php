
<br>
<div id="div_Back" style="margin-left: -70%">
        <a href="?pagina=pPages/Login.php" id="btnVoltar_index"><i class="fas fa-arrow-left"></i></a>
    </div>
<h1 id="titulo_1">Recuperar a palavra-passe</h1>
<br>
<form action="<?php $_SERVER["PHP_SELF"] ?>" class="form_recuperar" id="form1" class="container" method="post">


            <label for="idPerguntaSafe" class="col-sm-3 col-form-label">*Pergunta de Segurança:</label>
            <select name="idPerguntaSafe" id="perguntaSafe" class="preen">
            <option id="opcao0" value="" hidden >Pergunta de Segurança</option>
            <?php
                // Ir buscar todos os funcionários registados à base de dados

                // Criar query
                $sql = "SELECT distinct pergunta_seguranca FROM utilizador;";
                $result = $conn->query($sql);

                if (!$result) {
                    $code = $conn->errno;
                    $message = $conn->error;
                    printf("<p>Query error: %d %s</p>", $code, $message);
                }
                else {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["pergunta_seguranca"] . "'>" . utf8_encode($row["pergunta_seguranca"]) . "</option>";
                    }
                    $result->free();
                }
            ?>
        </select>
        <small class="erro"><?php if(isset($_SESSION["seg_erro"]["emptypergunta_safe"]))echo $_SESSION["seg_erro"]["emptypergunta_safe"];?></small>
                <br>
            <label for="idRespostaSafe" class="col-sm-3 col-form-label">*Resposta de Segurança:</label>
            <input type="password" value="<?php if (isset($_SESSION["seguranca"]["resposta"])) echo htmlentities($_SESSION["seguranca"]["resposta"]); ?>" name="respostaSafe" id="idRespostaSafe" class="preen" placeholder="Introduza a sua resposta">
                <small class="erro"><?php if(isset($_SESSION["seg_erro"]["resposta"]))echo $_SESSION["seg_erro"]["resposta"];?></small>     
       
            <label for="idEmail" class="col-sm-3 col-form-label">*Email:</label>
            <input type="text" value="<?php if (isset($_SESSION["seguranca"]["email"])) echo htmlentities($_SESSION["seguranca"]["email"]); ?>" name="email" id="idEmail" class="preen" minlength="6" pattern="^[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+(?:[a-zA-Z]{2}|aero|asia|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel)$" title="Verifique o seu email" placeholder="Introduza seu email">
                <small class="erro"><?php if(isset($_SESSION["seg_erro"]["email"]))echo $_SESSION["seg_erro"]["email"];?></small>
         <br>
    <button id="Continuar1" type="submit" name="Continuar">Continuar</button>
</form>

    <br><br> 
<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" class="form_recuperar" id="form3" class="container" style="display:<?php echo $_SESSION["display"]?>">
    <div class="form-group row">
       <div class="col-sm-4"></div>
       <div class="col-sm-1">
           <label for="idPass" class="col-sm-3 col-form-label">Nova Password:</label>
       </div>
          
           <div class="col-sm-3"> 
               <input type="password" value="<?php if (isset($_SESSION["seguranca"]["pass"])) echo htmlentities($_SESSION["seguranca"]["pass"]); ?>" name="password" id="idPass" class="preen" minlenght="6" pattern="(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{6,15})$" title="Necessita de ter 6 caracteres (numeros e letras) "  placeholder="Introduza sua password">
               <small class="erro"><?php if(isset($_SESSION["seg_erro"]["pass"]))echo $_SESSION["seg_erro"]["pass"];?></small>
           </div>
       <div class="col-sm-4"></div>
   </div>
   <div class="form-group row">
       <div class="col-sm-4"></div>
       <div class="col-sm-1">
           <label id="label_Conf" for="idPassConf" class="col-sm-3 col-form-label">Confimar-Pass:</label>
        </div>
                   <div class="col-sm-3"> 
               <input type="password" name="passwordConf" id="idPassConf" class="preen" minlenght="6" placeholder="Introduza sua password">
               <small class="erro"><?php if(isset($_SESSION["seg_erro"]["confpass"]))echo $_SESSION["seg_erro"]["confpass"];?></small>
           </div>
       <div class="col-sm-6"></div>
   </div>
   <button id="Alterar_pass" type="submit" name="Alterar">Alterar</button>

</form>

<?php 

if(isset($_POST["Continuar"])){

    if(empty($_POST["idPerguntaSafe"])){
        $_SESSION["seg_erro"]["emptypergunta_safe"]="Por favor selecione uma opção";
    }
    if (empty($_POST["respostaSafe"])) {
        $_SESSION["seg_erro"]["resposta"] = "Por favor introduza uma resposta";
        $_SESSION["seguranca"]["email"] = $_POST["email"];
        unset($_SESSION["seguranca"]["resposta"]);
       
    }
    if (empty($_POST["email"])) {
        $_SESSION["seg_erro"]["email"] = "Por favor introduza um email";
        $_SESSION["seguranca"]["resposta"] = $_POST["respostaSafe"];
        unset($_SESSION["seguranca"]["email"]);
        echo "<script>window.location.replace('?pagina=pPages/Recuperar.php')</script>";
        exit(0);
    }
   
   
    $email=$_POST["email"];
    $_SESSION["email_alterar"]=$email;
    $respostanormal=$_POST["respostaSafe"];
    $perguntaSafe=$_POST["idPerguntaSafe"];
    $respostaSafe=hash('sha512',$_POST["respostaSafe"]);

    $sql="SELECT * from utilizador Where email='$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows) {
        while ($row = $result->fetch_assoc()) {
            $bdpergunta=  utf8_encode($row["pergunta_seguranca"]);
            $bdresposta=$row["resposta_pergunta"];
           
        if($bdpergunta==$perguntaSafe && $bdresposta==$respostaSafe){
            $_SESSION["display"]="block";
            $_SESSION["seguranca"]["email"]=$email;
            $_SESSION["seguranca"]["resposta"]=$respostanormal;
            unset( $_SESSION["seg_erro"]["resposta"]);
            unset($_SESSION["seg_erro"]["emptypergunta_safe"]);
            unset($_SESSION["seg_erro"]["email"]);

            echo "<script>window.location.replace('?pagina=pPages/Recuperar.php')</script>";
            exit(0);
        }else{
            $_SESSION["seg_erro"]["resposta"] = "A resposta inserida pode estar errada";
            $_SESSION["seg_erro"]["emptypergunta_safe"]="A pergunta selecionada pode estar errada";
            unset($_SESSION["seguranca"]["resposta"]);
            echo "<script>window.location.replace('?pagina=pPages/Recuperar.php')</script>";
            exit(0);
        }
    }
    }else{
        $_SESSION["seg_erro"]["email"]="O email introduzido não se encontra registado";
        echo "<script>window.location.replace('?pagina=pPages/Recuperar.php')</script>";
        exit(0);
    }

}



if(isset($_POST["Alterar"])){
    $a=0;
    if (empty($_POST["password"])) {
        $_SESSION["seg_erro"]["pass"] = "Por favor introduza uma password";
        $a++;
    }
    if(empty($_POST["passwordConf"])){
        $_SESSION["seg_erro"]["confpass"] = "Por favor introduza uma password";
        $a++;
    }

    if($a>=1){
        echo "<script>window.location.replace('?pagina=pPages/Recuperar.php')</script>";
        exit(0);
    }else{
        $novapass=hash('sha512',$_POST["password"]);
        $confnova=hash('sha512',$_POST["passwordConf"]);
        
        if($novapass==$confnova){
            $alterarEmail = $_SESSION["email_alterar"];
            $sql="UPDATE utilizador set palavra_chave=(?) where email='$alterarEmail'";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("s", $novapass);
                if (!$stmt->execute()) {
                    $code = $conn->errno;
                    $message = $conn->error;
                    printf("<p>SQL Error: %d %s</p>", $code, $message);
                }
                else {
                    
                    unset($_SESSION["seg_erro"]);
                    unset( $_SESSION["seguranca"]);
                    $_SESSION["display"]="none";
                    echo " <div class='modal fade show' id='alterarPassSuccessModal' tabindex='-1' role='dialog' aria-labelledby='alterarPassSuccessModal' aria-hidden='true'>
                                                <div class='modal-dialog modal-dialog-centered' role='document'>
                                                    <div class='modal-content border-success'>
                                                        <div class='modal-header border-0'>
                                                        <h5 class='modal-title text-success' id='alterarPassSuccessModal'>Sucesso</h5>
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                            <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            Palavra-passe alterada com sucesso
                                                        </div>
                                                        <div class='modal-footer border-0'>
                                                        <button type='button' class='btn btn-success rounded-pill' data-dismiss='modal' onclick=''>Fechar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>";
                                    echo " <script> 
                                                $('#alterarPassSuccessModal').on('hidden.bs.modal', function (e) {
                                                    window.location.replace('?pagina=pPages/Login.php');
                                                })   

                                    
                                                $('#alterarPassSuccessModal').modal('show');
                                            </script>";
                                                
                }

            }
        }else{
            $_SESSION["seg_erro"]["confpass"]="Verifique a palavra-passe";
            echo "<script>window.location.replace('?pagina=pPages/Recuperar.php')</script>";
            exit(0);
        }
    }
}
?>