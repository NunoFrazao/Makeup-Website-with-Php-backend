<!-- MODAL DELETE DESCRICAO -->

<div class="modal fade" id="modal-delete-desc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- MODAL HEADER -->
            <div class="modal-header">
                <h5 class="modal-title" id="h5-title">Informação da descrição</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- MODAL BODY -->
            <div class="modal-body">
                <div id="body-ver">

                    <!-- FORM SEE DATA FROM DESCRICAO -->
                    <form action="?pagina=nPages/deleteDescricao.php" method="post" id="form-see">
                        <input type="hidden" name="id_recebido" id="inp-id-see" class="form-control">
                        
                        <p>Tem a certeza que pretende eliminar esta descrição?</p>
                        <button name="eliminar" class="btn btn-danger">Apagar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>