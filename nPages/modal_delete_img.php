<!-- MODAL DELETE IMAGE -->

<div class="modal fade" id="modal-del-foto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">


            <!-- MODAL BODY -->
            <div class="modal-body">
                <div id="body-ver">

                    <!-- FORM SEE DATA FROM DESCRICAO -->
                    <form action="#" method="post" id="form-see">
                        <input type="hidden" name="id_recebido" id="inp-id-see" class="form-control">
                        
                        <p class="text-center pt-3 pb-3">Tem a certeza que pretende eliminar esta descrição?</p>
                        <button name="eliminar" class="btn btn-danger w-100">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_POST["eliminar"])) {

    if (isset($_POST["id_recebido"])) {
        $id = $_POST["id_recebido"];

        # QUERYS
        $del = $conn->query("DELETE FROM fotogaleria WHERE id_fotografia = '$id';");

        echo "<script>window.location.assign('?pagina=nPages/galeriaDashboard.php&type=unhas&page=1&ImagemEliminada')</script>";
    }
}

?>