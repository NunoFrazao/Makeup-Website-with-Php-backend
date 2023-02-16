$(document).ready(() => {

    /**
     * Modal adicionar produto
     */

    // Trocar o nome do label do input:file para o nome do ficheiro introduzido
    $("#insertPhotos").change(function(e){
        var nomeFicheiro = e.target.files[0].name;
        $("#insertPhotosInputLabel").text(nomeFicheiro);
    });
    
    /**
     * Modal editar produto
     */

    $('#editProduct').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botão que dá trigger à modal

        // Buscar informação dos atrivutos data-*

        var marca = button.data('marcaproduto');
        var idProduto = button.data('idproduto');
        var produto = button.data('nomeproduto');
        var preco = button.data('precoproduto');
        var categoria = button.data('idcategoriaproduto');
        var stock = button.data('stockproduto');
        var descricao = button.data('descricaoproduto');

        var modal = $(this);

        // Alterar informações na modal
        
        modal.find('#marcaProdutoEdit').val(marca); // Alterar o a marca do produto
        modal.find('#nomeProdutoEdit').val(produto); // Alterar o nome do produto        
        modal.find('#precoProdutoEdit').val(preco); // Alterar a o preco
        modal.find('#categoriaProdutoEdit').val(categoria); // Alterar a categoria do produto
        modal.find('#qtdStockEdit').val(stock); // Alterar a quantidade em stock
        modal.find('#descricaoProdutoEdit').val(descricao); // Alterar a descricao do produto
        modal.find('#idProdutoEditarHidden').val(idProduto); // Colocar o idProduto no input escondido

        // Trocar o nome do label do input:file para o nome do ficheiro introduzido
        $("#insertPhotosEdit").change(function(e){
            var nomeFicheiro = e.target.files[0].name;
            $("#insertPhotosInputLabelEdit").text(nomeFicheiro);
        });
    });

    /**
     * Modal eliminar produto
     */

    $('#eliminarProduto').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botão que dá trigger à modal
        // Buscar informação dos atrivutos data-*
        var idProduto = button.data('idproduto');
        var modal = $(this);
        // Alterar informações na modal
        modal.find('#idProdutoEliminarHidden').val(idProduto); // Colocar o idProduto no input escondido
    });
});