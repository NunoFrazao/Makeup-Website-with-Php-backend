$(document).ready(() => {
    $("#searchMarcacaoPendente").keyup(() => {
        var text, tr, td, txtValue;
        text = $("#searchMarcacaoPendente").val().trim().toUpperCase();
        tr = $("#tabela-marcacaoPendente tbody tr");

        for (var i = 0; i < tr.length; i++) {
            td = tr[i];
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(text) > -1) {
                tr[i].style.display = "";
            }
            else {
                tr[i].style.display = "none";
            }
        }
    });

    $("#searchMarcacaoConfirmada").keyup(() => {
        var text, tr, td, txtValue;
        text = $("#searchMarcacaoConfirmada").val().trim().toUpperCase();
        tr = $("#tabela-marcacaoConfirmada tbody tr");

        for (var i = 0; i < tr.length; i++) {
            td = tr[i];
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(text) > -1) {
                tr[i].style.display = "";
            }
            else {
                tr[i].style.display = "none";
            }
        }
    });
});