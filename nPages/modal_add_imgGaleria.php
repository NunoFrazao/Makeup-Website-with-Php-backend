<!-- MODAL EDITAR DESCRICAO -->

<div class="modal fade" id="modal-add-foto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- MODAL HEADER -->
            <div class="modal-header border-0">
                <h5 class="modal-title" id="h5-title">Adicionar Imagem</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <!-- FORM SEE DATA FROM DESCRICAO -->
            <form action="#" method="post" enctype="multipart/form-data" id="form-add">

                <!-- MODAL BODY -->
                <div class="modal-body">
                    <div id="body-add">
                        <div class="row">
                            <!-- DIV IMAGEM -->
                            <div class="col-6">
                                <div id="relative-img" class="relative">
                                    <img id="img-logo" src="assets/img/users/default-user.jpg" alt="Imagem Logo Default" onclick="triggerClick()">
                                    <input id="file" class="form-control inp-file" type="file" name="image" onchange="dImage(this)" hidden>
                                </div>
                            </div>
                            
                            <!-- DIV INPUTS -->
                            <div class="col-6" id="col-inp">
                                <label for="select_descricao" class="w-100">Categoria da imagem</label>
                                <select name="select_descricao" id="select_descricao">
                                    <option value="" selected hidden>Escolha uma opção</option>
                                    <option value="unhas">Unhas</option>
                                    <option value="maquilhagem">Maquilhagem</option>
                                    <option value="massagem">Massagem</option>
                                </select>

                                <label for="inp-nome-see" class="w-100 mt-4">Descrição da imagem</label>
                                <textarea name="descr_descricao" cols="30" rows="2" id="edit-desc" class="form-control"></textarea>

                                <span id="span-campos" class="small">campos obrigatórios</span>
                                
                                <div class="erros">
                                    <span id="hidden-cat" class="small mt-5 text-danger hidden-errors">Escoha uma categoria!</span>
                                    <br>
                                    <span id="hidden-desc" class="small text-danger hidden-errors">Insira uma descrição!</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MODAL FOOTER -->
                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-danger" id="btn-add" name="submit">Adicionar</button>
                    <button type="reset" class="btn btn-secondary" name="cancelar" id="btn-exit">Cancelar</button>
                </div>
            </form>

            <?php

            if (isset($_POST["submit"])) {

                $erros = 0;

                # TO PREVENT SQL INJECTION
                $categoria = $conn->real_escape_string($_POST['select_descricao']);
                $descricao = $conn->real_escape_string($_POST['descr_descricao']);

                # IMAGEM
                $image = $_FILES['image']['name'];
                $target = "";

                # VALIDATION
                if (empty($categoria)) {
                    echo "<script>$('#hidden-cat').show();</script>";
                    echo "<script>$('#anc').click();</script>";
                    $erros++;
                }

                if (empty($descricao)) {
                    echo "<script>$('#hidden-desc').show();</script>";
                    echo "<script>$('#anc').click();</script>";
                    $erros++;
                }

                # IF THERE ARE NO ERRORS
                if ($erros == 0) {
                    if ($categoria == "unhas") {
                        $target = "assets/img/nuno/uploads/unhas/".time().'_'.($_FILES['image']['name']);
                        # ID SERVICO
                        $id = 1;
                        # QUERY
                        $query = "INSERT INTO fotogaleria (descricao, caminho, id_servico) VALUES ('".$descricao."', '".$target."', '".$id."')";
                    }

                    if ($categoria == "maquilhagem") {
                        $target = "assets/img/nuno/uploads/maquilhagem/".time().'_'.($_FILES['image']['name']);
                        # ID SERVICO
                        $id = 2;
                        # QUERY
                        $query = "INSERT INTO fotogaleria (descricao, caminho, id_servico) VALUES ('".$descricao."', '".$target."', '".$id."')";
                    }

                    if ($categoria == "massagem") {
                        $target = "assets/img/nuno/uploads/massagem/".time().'_'.($_FILES['image']['name']);
                        # ID SERVICO
                        $id = 3;
                        # QUERY
                        $query = "INSERT INTO fotogaleria (descricao, caminho, id_servico) VALUES ('".$descricao."', '".$target."', '".$id."')";
                    }

                    move_uploaded_file($_FILES['image']['tmp_name'], $target);

                    $result = $conn->query($query);

                    echo "<script>window.location.replace('?pagina=nPages/galeriaDashboard.php&type=unhas&page=1&sucess');</script>";
                    
                }
            }

            ?>
            
            <!-- BUTTON CANCELAR ON CLICK CLOSE MODAL AND HIDE ERRORS MESSAGES -->
            <script>
                $("#btn-exit").click(() => {
                   $('#hidden-cat').hide();
                   $('#hidden-desc').hide();
                   $('#modal-add-foto').modal('hide');
               });
           </script>

       </div>
   </div>
</div>