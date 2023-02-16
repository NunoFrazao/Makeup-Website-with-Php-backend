<!-- MODAL EDITAR DESCRICAO -->

<div class="modal fade" id="modal-editar-desc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- MODAL HEADER -->
            <div class="modal-header">
                <h5 class="modal-title" id="h5-title-edit">Editar descrição</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- MODAL BODY -->
            <div class="modal-body">
                <div id="body-edit">

                    <!-- FORM SEE DATA FROM DESCRICAO -->
                    <form action="deleteDescricao.php" method="post" id="form-see">

                        <input type="text" name="id_recebido" value="" id="edit-id" class="form-control" disabled>

                        <label for="inp-nome-see">Serviço</label>
                        <input type="text" name="nome_descricao" value="" id="edit-nome" class="form-control">

                        <label for="inp-nome-see">Descrição</label>
                        <textarea name="descr_descricao" cols="30" rows="10" id="edit-desc" class="form-control"></textarea>

                    </div>
                </div>

                <!-- MODAL FOOTER -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Atualizar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_POST["submit"])) {

    echo "<script>window.location.replace('?pagina=nPages/unhasDashboard.php&sucesso');script>";
}

?>