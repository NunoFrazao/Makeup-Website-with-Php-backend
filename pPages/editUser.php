    <div class="container-lg mt-5" id="editUser">
        <div class="row">
            <div class="col"></div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col text-center my-5">
                        <h1 id="titulo_edit" class="text-info">Editar Dados</h1>
                    </div>
                </div>
               <?php $sql = "SELECT * FROM utilizador where id_utilizador = '".$_GET['id']."'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();   
                ?>
                <div class="row">
                    <div class="col">
                        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
                            <div class="form-group">
                                <label for="nomeUtilizador" class="label_edit">Nome de Utilizador <span class="text-danger">&#42;</span></label>
                                <input type="text" name="nomeUtilizador" value="<?php echo $row["nome"] ?>" id="nomeUtilizador" class="form-control" minlength="3" required>
                            </div>    
                            <div class="form-group">
                                <label for="user" class="label_edit">Email de Utilizador <span class="text-danger">&#42;</span></label>
                                <input type="email" name="email" value="<?php echo $row["email"] ?>" id="email" class="form-control" minlength="6" pattern="^[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+(?:[a-zA-Z]{2}|aero|asia|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel)$" title="Verifique o seu email" required>
                                <p class="erro"><?php if(isset($_SESSION["backoffice_error"]["email"]))echo $_SESSION["backoffice_error"]["email"];?></p>
                            </div>   
                            <div class="form-group">
                                <label for="telefone" class="label_edit">Telefone <span class="text-danger">&#42;</span></label>
                                <input type="text" name="telefone" value="<?php echo $row["telefone"] ?>" id="telefone" class="form-control" minlength="9" maxlength="9" pattern="^([9]{1})+(6|3|2|1{1})+([0-9]{7})$" title="Verifique o numero" required>
                                <p class="erro"><?php if(isset($_SESSION["backoffice_error"]["telefone"]))echo $_SESSION["backoffice_error"]["telefone"];?></p>
                            </div>
                            <div class="form-group">
                                <label for="palavra_chave" class="label_edit">Password<span class="text-danger"></label>
                                <input type="text" name="palavra_chave" value="" id="palavra_chave" class="form-control" minlength="6"  pattern="(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{6,15})$" title="Necessita de ter 6 caracteres (numeros e letras)">
                            </div>  
                            <div class="form-row">
                                <div class="col">
                                    <input type="submit" name="editUser" value="Alterar" class="btn btn-primary form-control mt-3">
                                </div>
                                <div class="col">
                                    <a href="?pagina=pPages/users.php" class="btn btn-danger form-control mt-3">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col mt-5"></div>
        </div>   
    </div> 
    
    <?php
        if (isset($_POST["editUser"])) {
            $_SESSION["backoffice_error"] = array();

            $emailOld = $row["email"];
            $newTelefone = $conn->real_escape_string($_POST["telefone"]);
            $newEmail = $conn->real_escape_string($_POST["email"]);
            $newNomeUtilizador = $conn->real_escape_string($_POST["nomeUtilizador"]);
            

            $sql = "SELECT email FROM utilizador WHERE email = '$newEmail';";
            $result = $conn->query($sql);
                if ($result && $result->num_rows) {
                    $_SESSION["backoffice_error"]["email"] = "O email introduzido ja existe";
                }    
            $sql = "SELECT telefone FROM utilizador WHERE telefone = '$newTelefone';";
            $result2 = $conn->query($sql);
                if($result2 && $result2->num_rows){
                    $_SESSION["backoffice_error"]["telefone"] = "O número de telefone introduzido ja existe";      
                }      
                
                
                if(isset($_SESSION["backoffice_error"]["email"]) && isset($_SESSION["backoffice_error"]["telefone"])){
                        echo "<script>window.location.replace('?pagina=pPages/editUser.php&id=". $row["id_utilizador"] ."')</script>";
                        exit(0);
                }else{
                    if(empty($_POST["palavra_chave"]) && isset($_SESSION["backoffice_error"]["email"])){
                        $sql = "UPDATE utilizador SET nome = ?, telefone=? WHERE email = ?;";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("sss", $newNomeUtilizador, $newTelefone, $emailOld);
                        $_SESSION["backoffice_error"] = array(); 
                        $_SESSION["backoffice_error"]["email"] = "O email introduzido ja existe";
                    }else{
                        if(empty($_POST["palavra_chave"]) && isset($_SESSION["backoffice_error"]["telefone"])){
                            $sql = "UPDATE utilizador SET nome = ?, email=? WHERE email = ?;";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("sss", $newNomeUtilizador, $newEmail, $emailOld);
                            $_SESSION["backoffice_error"] = array(); 
                            $_SESSION["backoffice_error"]["telefone"] = "O número de telefone introduzido ja existe"; 
                        }else{
                            if(empty($_POST["palavra_chave"])){
                                $sql = "UPDATE utilizador SET nome = ?, email=?, telefone=? WHERE email = ?;";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("ssss", $newNomeUtilizador, $newEmail, $newTelefone, $emailOld);
                                $_SESSION["backoffice_error"] = array(); 
                            }else{
                                $newPass = hash("sha512", $conn->real_escape_string($_POST["palavra_chave"]));
                                $sql = "UPDATE utilizador SET nome = ?, email = ? , telefone=? , palavra_chave = ? WHERE email = ?;";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("sssss", $newNomeUtilizador, $newEmail, $newTelefone, $newPass ,$emailOld);
                                $_SESSION["backoffice_error"] = array(); 
                            }
                        }
                    }
                }
                if (!$stmt->execute()) {
                    $code = $conn->errno;
                    $message = $conn->error;
                    printf("<p>SQL Error: %d %s</p>", $code, $message);
                }else{
                    echo "<script>window.location.replace('?pagina=pPages/editUser.php&id=". $row["id_utilizador"] ."')</script>";
                    exit(0);
                }             
        }
        
?>