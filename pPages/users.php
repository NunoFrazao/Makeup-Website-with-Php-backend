<div class="container" id="usersList">
    <div class="row">
        <div class="col">
            <h1 class="text-info text-center my-5">Lista de Utilizadores</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped" id="listUsers">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th class="text-center">Editar</th>
                        <th class="text-center">Eliminar</th>
                    </tr>
                </thead>
                <?php
                    $sql = "SELECT * FROM utilizador;";
                    $result = $conn->query($sql);   
                    
                    if ($result) {

                        echo
                            "<tbody>";
                        while ($row = $result->fetch_assoc()) {
                            $foto = $row["foto_perfil"];
                            if ($foto == null)
                                $foto = "assets/img/users/default-user.jpg";

                            echo
                                "<tr>
                                    <td class='align-middle'>" . $row["id_utilizador"]."</td>
                                    <td class='align-middle'><img src='$foto' alt='Fotografia de perfil' class='rounded-circle mr-3 fotoPerfil' height=60 width=60>" . $row["nome"] . "</td>
                                    <td class='align-middle'>" . $row["email"] . "</td>
                                    <td class='align-middle'>" . $row["telefone"] . "</td>
                                    <td class='align-middle'>
                                        <a href='?pagina=pPages/editUser.php&id=" . $row["id_utilizador"] . "' class='btn btn-primary btn-sm form-control rounded-pill' role='button'>Editar</a>
                                    </td>
                                    <td class='align-middle'>
                                        <button type='button' class='btn btn-danger btn-sm form-control rounded-pill' data-toggle='modal' data-target='#ModalDelUser' onclick='document.getElementById(\"hiddenId\").value =\"" . $row["id_utilizador"] . "\";'>Eliminar</button>
                                    </td>
                                </tr>";
                        }
                        echo "</tbody>";
                    }
                ?>
            </table>
        </div>
    </div>
</div>

<!-- Modal confirmar eliminar utilizador -->

<div class='modal fade show' id='ModalDelUser' tabindex='-1' role='dialog' aria-labelledby='ModalDelUser' aria-hidden='true'>
    <div class='modal-dialog modal-dialog-centered' role='document'>
        <div class='modal-content border-danger'>
            <div class='modal-header border-0'>
            <h5 class='modal-title text-danger' id='ModalDelUser'>Eliminar utilizador</h5>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
            </div>
            <div class='modal-body text-center'>
                Tem a certeza que quer eliminar o utilizador?
            </div>
            <div class='modal-footer border-0'>
                <form action="?pagina=pPages/deleteUser.php" method="post">
                    <input type="hidden" name="hiddenId" id="hiddenId">
                    <input type="submit" name="confirmDelete" value="Eliminar" class='btn btn-primary rounded-pill'>
                    <input type="button" class="btn btn-danger rounded-pill" value="Cancelar" data-dismiss="modal">
                </form>
            </div>
        </div>
    </div>
</div>
