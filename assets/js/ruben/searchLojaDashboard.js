$(document).ready(() => {
    $("#searchLoja").keyup(() => {
        var text, tr, td, txtValue;
        text = $("#searchLoja").val().trim().toUpperCase();
        tr = $("#listaProdutos tbody tr");

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