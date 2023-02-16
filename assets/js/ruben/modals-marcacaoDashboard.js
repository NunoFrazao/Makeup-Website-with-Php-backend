$(document).ready(() => {
    /**
     * Modal confirmar pedido de marcação
     */

    $('#confirmarMarcacao').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botão que dá trigger à modal
        // Buscar informação dos atrivutos data-*
        var idMarcacao = button.data('idmarcacao');
        var modal = $(this);
        // Alterar informações na modal
        modal.find('#idMarcacaoHidden').val(idMarcacao); // Colocar o idMarcacao no input escondido
    });
    
    /**
     * Modal ver mais informação do pedido
     */

    $('#informacaoMarcacao').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botão que dá trigger à modal

        // Buscar informação dos atrivutos data-*

        var fotoPerfil = button.data('fotoperfil');
        var cliente = button.data('cliente');
        var idMarcacao = button.data('idmarcacao');
        var estado = button.data('estado');
        var dataPedido = button.data('datapedido');
        var dataPretendida = button.data('datapretendida');
        var horaPretendida = button.data('horapretendida');
        var dataConfirmada = button.data('dataconfirmada');
        var horaConfirmada = button.data('horaconfirmada');
        var funcionario = button.data('funcionario');
        var mensagem = button.data('mensagem');
        var servicosEscolhidos = button.data('servicos');
        var valor = new Intl.NumberFormat('pt-PT', { style: 'currency', currency: 'EUR' }).format(button.data('valor')); 
        var telefone = button.data('telefone');

        var modal = $(this);

        // Alterar informações na modal
        
        modal.find('#fotoPerfil').attr("src", fotoPerfil); // Alterar a foto de perfil
        modal.find('#nomeUtilizador').text(cliente); // Alterar o nome do cliente
        modal.find('#idMarcacao').text(idMarcacao); // Alterar o número da marcacao

        // Alterar o número da marcacao
        if (estado == "Pendente") {
            modal.find('#estado').text(estado).removeClass("text-success").addClass("text-danger");
            modal.find("#dataPedidoRow").show();
            modal.find("#dataPedido").text(dataPedido);
            modal.find("#dataTitle").text("Data Pretendida");
            modal.find("#data").text(dataPretendida);
            modal.find("#horaTitle").text("Hora Pretendida");
            modal.find("#hora").text(horaPretendida);
        }
        else if (estado == "Confirmada") {
            modal.find('#estado').text(estado).removeClass("text-danger").addClass("text-success");
            modal.find("#dataPedidoRow").hide();
            modal.find("#dataTitle").text("Data Marcação");
            modal.find("#data").text(dataConfirmada);
            modal.find("#horaTitle").text("Hora Marcação");
            modal.find("#hora").text(horaConfirmada);
        }
        
        modal.find('#dataPedido').text(dataPedido); // Alterar a data deo pedido
        modal.find('#funcionario').text(funcionario); // Alterar o nome do funcionario
        modal.find('#telefone').text(telefone); // Alterar o numero de telefone do cliente
        modal.find('#mensagem').text(mensagem); // Alterar a mensagem do cliente
        modal.find('#valor').text(valor); // Alterar o valor total da marcação
        modal.find('#listaServicos').html(servicosEscolhidos); // Alterar a lista de serviços escolhidos
    });

    /**
     * Modal eliminar marcação
     */

    $('#eliminarMarcacao').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botão que dá trigger à modal
        // Buscar informação dos atrivutos data-*
        var idMarcacao = button.data('idmarcacao');
        var modal = $(this);
        // Alterar informações na modal
        modal.find('#idMarcacaoEliminarHidden').val(idMarcacao); // Colocar o idMarcacao no input escondido
    });
});