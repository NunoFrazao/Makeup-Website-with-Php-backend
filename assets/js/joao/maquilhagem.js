
  $(document).ready(function(){
    $("#btnAnterior").click(function(){
        $("#divInfo2").attr("hidden", false).fadeIn(2000);
        $("#divInfo1").attr("hidden", true).fadeOut(2000);
        $("#maqCasamento").attr("hidden", true);
        $("#maqConvidada").attr("hidden", false);
        /*$("#divInfo1").hide(100);
        $("#divInfo2").show(100);*/

    });

    $("#btnSeguinte").click(function(){
        $("#divInfo2").attr("hidden", true);
        $("#divInfo1").attr("hidden", false);
        $("#maqCasamento").attr("hidden", false);
        $("#maqConvidada").attr("hidden", true);
        /*$("#divInfo1").show(100);
        $("#divInfo2").hide(100);*/
    });
  });
