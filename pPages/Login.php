<br>
<?php 
unset($_SESSION["fields"]);
unset($_SESSION["errors"]);
$_SESSION["display"]="none"; 
unset($_SESSION["seguranca"]);
unset( $_SESSION["seg_erro"]);
?>
<br>
<br>
<h1 id="titulo_1">Entrar</h1>
<br>
<form action="?pagina=pPages/Login.php" id="form_login" class="container" method="post">
    <input type="email" name="email" value="<?php if (isset($_SESSION["inputs"]["email"])) echo htmlentities($_SESSION["inputs"]["email"]); ?>" id="idEmail" class="preen" placeholder="Introduza o seu email" >
    <small class="erro"><?php if(isset($_SESSION["error"]["emptyemail"]))echo $_SESSION["error"]["emptyemail"];?></small>
    <br>         
    <input type="password" name="password" value="<?php if (isset($_SESSION["inputs"]["password"])) echo htmlentities($_SESSION["inputs"]["password"]); ?>" id="idPass" class="preen" minlenght="6" placeholder="Introduza sua password" >
    <small class="erro"><?php if(isset($_SESSION["error"]["emptypass"]))echo $_SESSION["error"]["emptypass"];?></small>
    <br>
    <small class="erro"><?php if(isset($_SESSION["error"]["verificar"]))echo $_SESSION["error"]["verificar"];?></small>
    <h2 id="titulo_2"><a href="?pagina=pPages/Recuperar.php">Esqueci-me da palavra-passe</a></h2>
    <button type="submit" id="Entrar" name="Entrar">Entrar</button>
    <br><br>
    <h2 id="titulo_3">Não têm conta? Crie uma agora</h2>
    <a href="?pagina=pPages/Registar.php" id="Registar">Registar</a>
</form>


<?php 

        if (isset($_POST["Entrar"])) {
             if (empty($_POST["password"]) || empty($_POST["email"])){
                if (empty($_POST["password"]) && empty($_POST["email"])){
                    $_SESSION["error"]["emptypass"] = "Por favor preencha a password";
                    $_SESSION["error"]["emptyemail"] = "Por favor preencha o email";
                    $_SESSION["inputs"]=array();
                }
             else{
                    if (empty($_POST["email"])) {
                        $_SESSION["error"]["emptyemail"] = "Por favor preencha o email";
                        unset($_SESSION["inputs"]["email"]);
                        $_SESSION["inputs"]["password"] = $_POST["password"];
                        unset($_SESSION["error"]["emptypass"]);
                        unset($_SESSION["error"]["verificar"]);
                    }
                    if (empty($_POST["password"])) {
                        $_SESSION["error"]["emptypass"] = "Por favor preencha a password";
                        unset($_SESSION["inputs"]["password"]);
                        $_SESSION["inputs"]["email"] = $_POST["email"];
                        unset($_SESSION["error"]["emptyemail"]);
                        unset($_SESSION["error"]["verificar"]);
                    }
                echo "<script>window.location.replace('?pagina=pPages/Login.php')</script>";
                exit(0);
             }
            }
            else{
                if(isset($_POST["Entrar"])){
                    $email = $_POST["email"];
                    $password = hash('sha512', $_POST["password"]);
                    $verification = "SELECT * FROM utilizador WHERE email = '$email' AND palavra_chave = '$password'";
                    $resultado = $conn->query($verification);
                    $li = $resultado->num_rows;
                
                if($li == 0){
                    $verificar_admin = "SELECT * FROM funcionario Where email = '$email' AND palavra_chave = '$password'";
                    $resultado_admin = $conn->query($verificar_admin);
                    $li2 = $resultado_admin->num_rows;
                        if($li2 == 0){
                            $_SESSION["error"]["verificar"] = "Por favor verifique o email/password";
                            $_SESSION["inputs"]["email"] = $_POST["email"];
                            $_SESSION["inputs"]["password"] = $_POST["password"];
                            unset($_SESSION["error"]["emptyemail"]);
                            unset($_SESSION["error"]["emptypass"]);
                            echo "<script>window.location.replace('?pagina=pPages/Login.php')</script>";
                            exit(0);
                        }else{
                            while($row = $resultado_admin->fetch_assoc())
                                {
                                    $utilizador = $row['nome'];
                                    $_SESSION['id_funcionario']=$row['id_funcionario'];
                                    $_SESSION['estatuto']=$row['estatuto'];
                                    $_SESSION['user'] = $row['id_utilizador'];
                                    $_SESSION["telefone"] = $row["telefone"];
                                    $_SESSION['authenticated'] = true;
                                    echo "<script>window.location.replace('index.php')</script>";
                                }
                        }
                }else {
                    while($row = $resultado->fetch_assoc())
                    {
                        $utilizador = $row['nome'];
                        unset($_SESSION['estatuto']);
                        $_SESSION['user'] = $row['id_utilizador'];
                        $_SESSION["telefone"] = $row["telefone"];
                        $_SESSION['authenticated'] = true;
                        echo "<script>window.location.replace('index.php')</script>";
                    }
                }
                }
            }
        }

?>