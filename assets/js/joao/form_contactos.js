$(document)
    .one('focus.autoExpand', 'textarea.autoExpand', function(){
        var savedValue = this.value;
        this.value = '';
        this.baseScrollHeight = this.scrollHeight;
        this.value = savedValue;
    })
    .on('input.autoExpand', 'textarea.autoExpand', function(){
        var minRows = this.getAttribute('data-min-rows')|3, rows;
        this.rows = minRows;
        rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 29);
        this.rows = minRows + rows;
    });

    $(document).ready(function(){
      $("#pergunta1").click(function(){
        $("#iconCollapse1").toggleClass("fal fa-minus fal fa-plus");
        $("#iconCollapse2").attr('class', "fal fa-plus");
        $("#iconCollapse3").attr('class', "fal fa-plus");
      });
      $("#pergunta2").click(function(){
        $("#iconCollapse1").attr('class', "fal fa-plus");
        $("#iconCollapse2").toggleClass("fal fa-plus fal fa-minus");
        $("#iconCollapse3").attr('class', "fal fa-plus");
      });
      $("#pergunta3").click(function(){
        $("#iconCollapse1").attr('class', "fal fa-plus");
        $("#iconCollapse2").attr('class', "fal fa-plus");
        $("#iconCollapse3").toggleClass("fal fa-plus fal fa-minus");
      });
    });
