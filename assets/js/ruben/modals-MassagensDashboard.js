$(document).ready(() => {
    /**
     * Modal ver mais descricao massagem
     */
    
    $('#verMaisMassagemDescricao').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Botão que dá trigger à modal

        // Buscar informação dos atrivutos data-*
        var descricao = button.data('descricao');

        var modal = $(this);
        // Alterar informações na modal
        
        modal.find('#massagemDescricaoVerMais').val(descricao); // Alterar o a marca do produto
    });

    /**
     * Modal editar descricao massagem
     */

    $('#editarMassagemDescricao').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Botão que dá trigger à modal

        // Buscar informação dos atrivutos data-*
        var idDescricao = button.data('iddescricao');
        var descricao = button.data('descricao');

        var modal = $(this);

        // Alterar informações na modal 
        modal.find('#idSubservicoDescricaoHidden').val(idDescricao); // Colocar o idDescricao no input escondido
        modal.find('#massagemDescricaoEditar').val(descricao); // Alterar o a marca do produto
    });
});