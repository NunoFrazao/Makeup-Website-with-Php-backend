$(document).ready(() => {
    var listaResumoLi = $("#listaResumo li");
    var spanTotal = $("span#total");
    var divErrors = $("#errorsLog");
    var total = 0;

    divErrors.hide();
    // Mostrar que nao há servicos selecionados no inicio da pagina
    listaResumoLi[0].style.display = "block";


    // Quando clicar num input, adicionar ao resumo
    $("#listaServicos input").on("click", function () {
        var servicosChecked = $("input:checked");
        listaResumoLi[0].style.display = "none";
        if ($(this).prop("checked") == true) {
            listaResumoLi[$(this)[0].dataset.idservico].style.display = "block";
            total += Number($(this)[0].dataset.preco);
        }
        else {
            listaResumoLi[$(this)[0].dataset.idservico].style.display = "none";
            total -= Number($(this)[0].dataset.preco);
        }
        spanTotal.text(new Intl.NumberFormat("pt-PT", { style: "currency",currency: "EUR" }).format(total));

        // Se O número de checks for 0 aprensentar que não há serviços selecionados
        if (servicosChecked.length == 0) {
            listaResumoLi[0].style.display = "block";
        }
    });


    // Validar o formulário antes de submeter
    
    function validateForm() {
        var phone = $("#phoneNumber").val().trim();
        var dataMarcacao = $("div#inputInfo input#dataHoraMarcacao").val();
        var servicosChecked = $("input:checked");
        var errorsCount = 0;
        var errorsLog = "";

        if (phone.length == 0) {
            errorsLog += "<p>Por favor introduza o número de telefone</p>";
            errorsCount++;
        }

        if (dataMarcacao.length == 0) {
            errorsLog += "<p>Por favor selecione um dia e uma hora</p>";
            errorsCount++;
        }

        if (servicosChecked.length == 0) {
            divErrors.show().html("<p>Nenhum serviço selecionado</p>")
            errorsLog += "<p>Por favor selecione pelo menos um serviço</p>";
            errorsCount++;
        }

        if (errorsCount == 0)
            return true;
        else
            divErrors.show().html(errorsLog);
            return false;
    }

    $("form#marcacaoForm").submit(() => {
        return validateForm();
    });
});
    


    
    