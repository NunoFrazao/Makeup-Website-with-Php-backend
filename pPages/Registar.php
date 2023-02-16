<br>
    <div id="div_Back" style="margin-left: -70%">
        <a href="?pagina=pPages/Login.php" id="btnVoltar_index"><i class="fas fa-arrow-left"></i></a>
    </div>
<br>
<h1 id="titulo_1">Registar</h1>
<br>
<form action="<?php $_SERVER["PHP_SELF"] ?>" id="form_registar" class="container" method="post">
    <label for="idNome" class="col-sm-2 col-form-label">*Nome:</label>
        <input type="text" value="<?php if (isset($_SESSION["fields"]["nomeUtilizador"])) echo htmlentities($_SESSION["fields"]["nomeUtilizador"]); ?>" name="nomeUtilizador" id="idNome" class="preen" minlength="3" placeholder="Introduza seu nome">
            <small class="erro"><?php if(isset($_SESSION["errors"]["emptyname"])) echo $_SESSION["errors"]["emptyname"];?> </small>
    
    <label for="idEmail" class="col-sm-2 col-form-label">*Email:</label>
        <input type="text" value="<?php if (isset($_SESSION["fields"]["email"])) echo htmlentities($_SESSION["fields"]["email"]); ?>" name="email" id="idEmail" class="preen" minlength="6" pattern="^[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+(?:[a-zA-Z]{2}|aero|asia|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel)$" title="Verifique o seu email" placeholder="Introduza seu email">
            <small class="erro"><?php if(isset($_SESSION["errors"]["emptyemail"]))echo $_SESSION["errors"]["emptyemail"];?></small>
    
    <label for="idTelefone" class="col-sm-2 col-form-label">*Telefone:</label>
        <input type="text" value="<?php if (isset($_SESSION["fields"]["telefone"])) echo htmlentities($_SESSION["fields"]["telefone"]); ?>" name="telefone" id="idTelefone" class="preen" minlength="9" maxlength="9" pattern="^([9]{1})+(6|3|2|1{1})+([0-9]{7})$" title="Verifique o numero" placeholder="Introduza seu telefone">
            <small class="erro"><?php if(isset($_SESSION["errors"]["emptytele"]))echo $_SESSION["errors"]["emptytele"];?></small>
    
    <label for="idMorada" class="col-sm-2 col-form-label">*Morada:</label>
        <input type="text" value="<?php if (isset($_SESSION["fields"]["morada"])) echo htmlentities($_SESSION["fields"]["morada"]); ?>" name="morada" id="idMorada" class="preen" minlength="6" placeholder="Introduza sua morada">
            <small class="erro"><?php if(isset($_SESSION["errors"]["emptymorada"]))echo $_SESSION["errors"]["emptymorada"];?></small>
    
    <label for="idCodigo" class="col-sm-2 col-form-label">*Código-Postal:</label>
        <input type="text" value="<?php if (isset($_SESSION["fields"]["codigo_postal"])) echo htmlentities($_SESSION["fields"]["codigo_postal"]); ?>" name="codigo_postal" id="idCodigo" class="preen" minlength="8"  placeholder="Introduza seu código-postal">
            <small class="erro"><?php if(isset($_SESSION["errors"]["emptycodigo_postal"]))echo $_SESSION["errors"]["emptycodigo_postal"];?></small>
    
    <label for="idPass" class="col-sm-2 col-form-label">*Password:</label>
        <input type="password" value="<?php if (isset($_SESSION["fields"]["password"])) echo htmlentities($_SESSION["fields"]["password"]); ?>" name="password" id="idPass" class="preen" minlength="6"  pattern="(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{6,15})$" title="Necessita de ter 6 caracteres (numeros e letras) " placeholder="Introduza sua password" >
            <small class="erro"><?php if(isset($_SESSION["errors"]["emptypass"]))echo $_SESSION["errors"]["emptypass"];?></small>
    
    <label for="idPassConf" class="col-sm-2 col-form-label">*Confirmar-Pass:</label>
        <input type="password" value="<?php if (isset($_SESSION["fields"]["conf_password"])) echo htmlentities($_SESSION["fields"]["conf_password"]); ?>" name="conf_password" id="idPassConf" class="preen" minlength="6" placeholder="Introduza sua password">
            <small class="erro"><?php if(isset($_SESSION["errors"]["emptyconf_password"]))echo $_SESSION["errors"]["emptyconf_password"];?></small>     
    
            
    <label for="idPerguntaSafe" class="col-sm-3 col-form-label">*Pergunta-Segura:</label>
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
                        echo "<option value='" . $row["pergunta_seguranca"] . "'>" . $row["pergunta_seguranca"] . "</option>";
                    }
                    $result->free();
                }
            ?>
        </select>
        <small class="erro"><?php if(isset($_SESSION["errors"]["emptypergunta_safe"]))echo $_SESSION["errors"]["emptypergunta_safe"];?></small>


    

    <label for="idRespostaSafe" class="col-sm-2 col-form-label">*Resposta-Safe:</label>
        <input type="text"  value="<?php if (isset($_SESSION["fields"]["respostaSafe"])) echo htmlentities($_SESSION["fields"]["respostaSafe"]); ?>" name="respostaSafe" id="idRespostaSafe" class="preen" minlength="6" placeholder="Introduza a sua resposta">
        <small class="erro"><?php if(isset($_SESSION["errors"]["emptyresposta_safe"]))echo $_SESSION["errors"]["emptyresposta_safe"];?></small>

            <p id="obrigatoriedade">Os campos com * são obrigatorios</p>
    <button id="Registar" type="submit" name="Registar">Registar</button>
</form>


<?php
    if (isset($_POST["Registar"])) {
        // erros do array   
        $_SESSION["errors"] = array();   
        if (empty($_POST["nomeUtilizador"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["conf_password"]) || empty($_POST["telefone"]) || empty($_POST["morada"]) || empty($_POST["codigo_postal"]) || empty($_POST["respostaSafe"]) || empty($_POST["idPerguntaSafe"])){
            if (empty($_POST["nomeUtilizador"]) && empty($_POST["email"]) && empty($_POST["password"]) && empty($_POST["conf_password"]) && empty($_POST["telefone"]) && empty($_POST["morada"]) && empty($_POST["codigo_postal"])  && empty($_POST["respostaSafe"]) && empty($_POST["idPerguntaSafe"])) {
                $_SESSION["errors"]["emptyname"] = "Por favor preencha o nome de utilizador";
                $_SESSION["errors"]["emptyemail"] = "Por favor preencha o email de utilizador";
                $_SESSION["errors"]["emptypass"] = "Por favor introduza uma password";
                $_SESSION["errors"]["emptyconf_password"] = "Por favor confirme a password";
                $_SESSION["errors"]["emptytele"] = "Por favor introduza um telefone";   
                $_SESSION["errors"]["emptymorada"] = "Por favor introduza uma morada";
                $_SESSION["errors"]["emptycodigo_postal"] = "Por favor introduza um codigo postal";
                $_SESSION["errors"]["emptyresposta_safe"] = "Por favor introduza uma resposta";
                $_SESSION["errors"]["emptypergunta_safe"] = "Por favor selecione uma opção";
                $_SESSION["fields"]=array();
                
            }
            else {
                if (empty($_POST["nomeUtilizador"])) {
                    $_SESSION["errors"]["emptyname"] = "Por favor preencha o nome de utilizador";
                    $_SESSION["fields"]["email"] = $_POST["email"];
                    $_SESSION["fields"]["password"] = $_POST["password"];
                    $_SESSION["fields"]["telefone"] = $_POST["telefone"];
                    $_SESSION["fields"]["morada"] = $_POST["morada"];
                    $_SESSION["fields"]["codigo_postal"] = $_POST["codigo_postal"];
                    $_SESSION["fields"]["respostaSafe"] = $_POST["respostaSafe"];
                    unset($_SESSION["fields"]["nomeUtilizador"]);
                }
                if (empty($_POST["email"])) {
                    $_SESSION["errors"]["emptyemail"] = "Por favor preencha o email de utilizador";
                    $_SESSION["fields"]["nomeUtilizador"] = $_POST["nomeUtilizador"];
                    $_SESSION["fields"]["password"] = $_POST["password"];
                    $_SESSION["fields"]["telefone"] = $_POST["telefone"];
                    $_SESSION["fields"]["morada"] = $_POST["morada"];
                    $_SESSION["fields"]["codigo_postal"] = $_POST["codigo_postal"];
                    $_SESSION["fields"]["respostaSafe"] = $_POST["respostaSafe"];
                    unset($_SESSION["fields"]["email"]);
                }
                if (empty($_POST["password"])) {
                    $_SESSION["errors"]["emptypass"] = "Por favor introduza uma password";
                    $_SESSION["fields"]["nomeUtilizador"] = $_POST["nomeUtilizador"];
                    $_SESSION["fields"]["email"] = $_POST["email"];
                    $_SESSION["fields"]["telefone"] = $_POST["telefone"];
                    $_SESSION["fields"]["morada"] = $_POST["morada"];
                    $_SESSION["fields"]["codigo_postal"] = $_POST["codigo_postal"];
                    $_SESSION["fields"]["respostaSafe"] = $_POST["respostaSafe"];
                    unset($_SESSION["fields"]["password"]);
                }
                if (empty($_POST["conf_password"])) {
                    $_SESSION["errors"]["emptyconf_password"] = "Por favor confirme a password";                                
                    $_SESSION["fields"]["nomeUtilizador"] = $_POST["nomeUtilizador"];
                    $_SESSION["fields"]["email"] = $_POST["email"];
                    $_SESSION["fields"]["password"] = $_POST["password"];
                    $_SESSION["fields"]["telefone"] = $_POST["telefone"];
                    $_SESSION["fields"]["morada"] = $_POST["morada"];
                    $_SESSION["fields"]["codigo_postal"] = $_POST["codigo_postal"];
                    $_SESSION["fields"]["respostaSafe"] = $_POST["respostaSafe"];
                    unset($_SESSION["fields"]["conf_password"]);
                }
                if (empty($_POST["telefone"])) {
                    $_SESSION["errors"]["emptytele"] = "Por favor introduza um telefone";          
                    $_SESSION["fields"]["nomeUtilizador"] = $_POST["nomeUtilizador"];
                    $_SESSION["fields"]["email"] = $_POST["email"];
                    $_SESSION["fields"]["password"] = $_POST["password"];
                    $_SESSION["fields"]["morada"] = $_POST["morada"];
                    $_SESSION["fields"]["codigo_postal"] = $_POST["codigo_postal"];
                    $_SESSION["fields"]["respostaSafe"] = $_POST["respostaSafe"];
                    unset($_SESSION["fields"]["telefone"]);
                }
                if (empty($_POST["morada"])) {
                    $_SESSION["errors"]["emptymorada"] = "Por favor introduza uma morada";  
                    $_SESSION["fields"]["nomeUtilizador"] = $_POST["nomeUtilizador"];
                    $_SESSION["fields"]["email"] = $_POST["email"];
                    $_SESSION["fields"]["password"] = $_POST["password"];
                    $_SESSION["fields"]["telefone"] = $_POST["telefone"];
                    $_SESSION["fields"]["codigo_postal"] = $_POST["codigo_postal"];
                    $_SESSION["fields"]["respostaSafe"] = $_POST["respostaSafe"];
                    unset($_SESSION["fields"]["morada"]);
                }
                if (empty($_POST["codigo_postal"])) {
                    $_SESSION["errors"]["emptycodigo_postal"] = "Por favor introduza um codigo postal";
                    $_SESSION["fields"]["nomeUtilizador"] = $_POST["nomeUtilizador"];
                    $_SESSION["fields"]["email"] = $_POST["email"];
                    $_SESSION["fields"]["password"] = $_POST["password"];
                    $_SESSION["fields"]["telefone"] = $_POST["telefone"];
                    $_SESSION["fields"]["morada"] = $_POST["morada"];
                    $_SESSION["fields"]["respostaSafe"] = $_POST["respostaSafe"];
                    unset($_SESSION["fields"]["codigo_postal"]);
                }
                if (empty($_POST["respostaSafe"])) {
                    $_SESSION["errors"]["emptyresposta_safe"] = "Por favor introduza uma resposta";
                    $_SESSION["errors"]["emptypergunta_safe"] = "Por favor selecione uma opção";
                    $_SESSION["fields"]["nomeUtilizador"] = $_POST["nomeUtilizador"];
                    $_SESSION["fields"]["email"] = $_POST["email"];
                    $_SESSION["fields"]["password"] = $_POST["password"];
                    $_SESSION["fields"]["telefone"] = $_POST["telefone"];
                    $_SESSION["fields"]["morada"] = $_POST["morada"];
                    $_SESSION["fields"]["codigo_postal"] = $_POST["codigo_postal"];
                    unset($_SESSION["fields"]["respostaSafe"]);
                   
                }
                if(empty($_POST["idPerguntaSafe"])){
                    $_SESSION["errors"]["emptypergunta_safe"] = "Por favor selecione uma opção";
                    $_SESSION["fields"]["nomeUtilizador"] = $_POST["nomeUtilizador"];
                    $_SESSION["fields"]["email"] = $_POST["email"];
                    $_SESSION["fields"]["password"] = $_POST["password"];
                    $_SESSION["fields"]["telefone"] = $_POST["telefone"];
                    $_SESSION["fields"]["morada"] = $_POST["morada"];
                    $_SESSION["fields"]["codigo_postal"] = $_POST["codigo_postal"];
                    unset($_SESSION["fields"]["respostaSafe"]);
                }
            }
                echo "<script>window.location.replace('?pagina=pPages/Registar.php')</script>";
                exit(0);
        }
        else {
            $nomeUtilizador = $conn->real_escape_string(trim($_POST["nomeUtilizador"]));
            $email = $conn->real_escape_string(trim($_POST["email"]));
            $telefone= $conn->real_escape_string(trim($_POST["telefone"]));;
            $morada= $conn->real_escape_string(trim($_POST["morada"]));;
            $codigo_postal= $conn->real_escape_string(trim($_POST["codigo_postal"]));;
            $pass = hash("sha512", $conn->real_escape_string($_POST["password"]));
            $confirmPass = hash("sha512", $conn->real_escape_string($_POST["conf_password"]));
            $perguntaSafe = $conn->real_escape_string(trim($_POST["idPerguntaSafe"]));
            $respostaSafe = hash("sha512", $conn->real_escape_string($_POST["respostaSafe"]));
            
            // email existe?

            $sql = "SELECT email FROM utilizador WHERE email = '$email';";
            $result = $conn->query($sql);
        
            if ($result && $result->num_rows) {
                $_SESSION["errors"]["emptyemail"] = "O email introduzido ja existe";
                $_SESSION["fields"]["nomeUtilizador"] = $_POST["nomeUtilizador"];
                $_SESSION["fields"]["password"] = $_POST["password"];
                $_SESSION["fields"]["telefone"] = $_POST["telefone"];
                $_SESSION["fields"]["morada"] = $_POST["morada"];
                $_SESSION["fields"]["codigo_postal"] = $_POST["codigo_postal"];
                $_SESSION["fields"]["respostaSafe"] = $_POST["respostaSafe"];
                unset($_SESSION["fields"]["email"] );
                echo "<script>window.location.replace('?pagina=pPages/Registar.php')</script>";
                exit(0);
            }
            else {
                $sql = "SELECT telefone FROM utilizador WHERE telefone = '$telefone';";
                $result2 = $conn->query($sql);
                if($result2 && $result2->num_rows){
                    $_SESSION["errors"]["emptytele"] = "O numero de telefone introduzido ja existe";
                    $_SESSION["fields"]["nomeUtilizador"] = $_POST["nomeUtilizador"];
                    $_SESSION["fields"]["password"] = $_POST["password"];
                    $_SESSION["fields"]["email"] = $_POST["email"];
                    $_SESSION["fields"]["morada"] = $_POST["morada"];
                    $_SESSION["fields"]["codigo_postal"] = $_POST["codigo_postal"];
                    $_SESSION["fields"]["respostaSafe"] = $_POST["respostaSafe"];
                    unset($_SESSION["fields"]["telefone"] );
                    echo "<script>window.location.replace('?pagina=pPages/Registar.php')</script>";
                    exit(0);
                }
                else {
                    if ($pass === $confirmPass) {
                        if (count($_SESSION["errors"]) == 0) {
                            $sql = "INSERT INTO utilizador (nome, email, telefone, rua, cod_postal, palavra_chave, pergunta_seguranca, resposta_pergunta) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
                            $stmt = $conn->prepare($sql);
                            if ($stmt) {
                                
                                $stmt->bind_param("ssssssss", $nomeUtilizador, $email, $telefone, $morada, $codigo_postal,  $pass, $perguntaSafe, $respostaSafe);
                                if (!$stmt->execute()) {
                                    $code = $conn->errno;
                                    $message = $conn->error;
                                    printf("<p>SQL Error: %d %s</p>", $code, $message);
                                }
                                else {
                                    echo " <div class='modal fade show' id='registoSuccessModal' tabindex='-1' role='dialog' aria-labelledby='registoSuccessModal' aria-hidden='true'>
                                            <div class='modal-dialog modal-dialog-centered' role='document'>
                                                <div class='modal-content border-success'>
                                                    <div class='modal-header border-0'>
                                                    <h5 class='modal-title text-success' id='registoSuccessModal'>Sucesso</h5>
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        Utilizador criado com sucesso
                                                    </div>
                                                    <div class='modal-footer border-0'>
                                                    <button type='button' class='btn btn-success rounded-pill' data-dismiss='modal' onclick='reload()'>Fechar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
                                   echo "<script>$('#registoSuccessModal').modal('show');</script>";

                                    
                                    unset($_SESSION["errors"]["emptyname"]);
                                    unset($_SESSION["errors"]["emptyemail"]);
                                    unset($_SESSION["errors"]["emptypass"]);
                                    unset($_SESSION["errors"]["emptyconf_password"]);
                                    unset($_SESSION["errors"]["emptytele"]);
                                    unset($_SESSION["errors"]["emptymorada"]);
                                    unset($_SESSION["errors"]["emptycodigo_postal"]);
                                    unset($_SESSION["errors"]["emptyresposta_safe"]);
                                    unset($_SESSION["errors"]["emptypergunta_safe"]);
                                    unset($_SESSION["fields"]["nomeUtilizador"]);
                                    unset($_SESSION["fields"]["email"]) ;
                                    unset($_SESSION["fields"]["password"]);
                                    unset($_SESSION["fields"]["telefone"]) ;
                                    unset($_SESSION["fields"]["morada"]); 
                                    unset($_SESSION["fields"]["codigo_postal"]);
                                    unset($_SESSION["fields"]["conf_password"]);
                                    unset($_SESSION["fields"]["resposta_Safe"]);    
                                    
                                }
                            }
                            else {
                                echo "<p>Não foi possivel criar o utilizador</p>";
                                
                            }
                        }
                    }
                    else {     
                        $_SESSION["errors"]["emptyconf_password"] = "As passwords não coincidem";                                
                        $_SESSION["fields"]["nomeUtilizador"] = $_POST["nomeUtilizador"];
                        $_SESSION["fields"]["email"] = $_POST["email"];
                        $_SESSION["fields"]["password"] = $_POST["password"];
                        $_SESSION["fields"]["telefone"] = $_POST["telefone"];
                        $_SESSION["fields"]["morada"] = $_POST["morada"];
                        $_SESSION["fields"]["codigo_postal"] = $_POST["codigo_postal"];
                        unset($_SESSION["fields"]["conf_password"]);
                        echo "<script>window.location.replace('?pagina=pPages/Registar.php')</script>";
                        header("Refresh:0");
                        exit(0);
                    }
                } 
            }
        }
    }
?>

<script>
    function reload(){
        window.location.replace('?pagina=pPages/Registar.php');
        header("Refresh:0");
    }
    
</script>