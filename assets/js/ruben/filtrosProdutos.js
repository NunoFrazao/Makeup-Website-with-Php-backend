$(document).ready(() => {
    // Não deixar que o dropdown feche quando se clica numa checkbox ou radio
    $('.dropdown-menu').click(function(e) {
        e.stopPropagation();
    })

    /**
     *  FILTRO MARCA
     */

    $("#filtroMarca input").click(function() {
        // Guardar o numero de checkboxes selecionado
        var numChecked = $("#filtroMarca input:checked").length;

        // Esconder todos os produtos
        $(".filtrarProduto").hide();

        // Se nenhuma checkbox estiver selecionada, mostrar todos os produtos
        if (numChecked == 0) {
            $(".filtrarProduto").show();
        }

        // Para cada checkbox, é retirado o seu valor que será correspondente à marca e mostrar os produtos que tenham a marca como classe 
        $("#filtroMarca input:checked").each(function() {
            $("." + $(this).val()).show();
        });
    });

    /**
     * FILTRO ORDENAR POR
     */

     $("#filtroOrdenarPor input").click(function() {
        $("#filtroOrdenarPor input:checked").each(function() {
            var produtos = $(".filtrarProduto");
            var value = $(this).val();

            switch (value) {
                case "recentes":
                    ordenarRecentes(produtos);
                    break;
                case "precoAsc":
                    ordenarPrecoAsc(produtos);
                    break;
                case "precoDesc":
                    ordenarPrecoDesc(produtos);
                    break;
                case "marcaAsc":
                    ordenarMarcaAsc(produtos);
                    break;
                case "marcaDesc":
                    ordenarMarcaDesc(produtos);
                    break;
            }

            $("#products-grid").html(produtos);
        });
     });

     function ordenarRecentes(produtosArray) {
        produtosArray.sort(function(a, b) {
            return $(b).data("idproduto") - $(a).data("idproduto");
        });  
     }

     function ordenarPrecoAsc(produtosArray) {
         produtosArray.sort(function(a, b) {
             return $(a).data("preco") - $(b).data("preco");
         }); 
     }

     function ordenarPrecoDesc(produtosArray) {
         produtosArray.sort(function(a, b) {
             return $(b).data("preco") - $(a).data("preco");
         });
     }

     function ordenarMarcaAsc(produtosArray) {
         produtosArray.sort(function(a, b) {
             if ($(a).data("marca") < $(b).data("marca")) { return -1; }
             if ($(a).data("marca") > $(b).data("marca")) { return 1 }
             return 0;
         });
     }

     function ordenarMarcaDesc(produtosArray) {
        produtosArray.sort(function(a, b) {
            if ($(b).data("marca") < $(a).data("marca")) { return -1; }
            if ($(b).data("marca") > $(a).data("marca")) { return 1 }
            return 0;
        });
     }
});