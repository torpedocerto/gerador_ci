function alerta_ajax(cli_id) {
  $.ajax({
    url: '../controll/alerta_ajax.php',
    type: 'POST',
    dataType: "json",
    data: {
      cli_id:  cli_id,
      method:  "pega_alertas_ajax"
    },
    success: function(json) {
      $('#conteudo_MO').html(json['msg']);
      $('#entradas_contador').html(json['total']);
//      window.location.href = window.location.href;
    }
  });
}


/**
 * Testa a conexão com o Banco de dados. 
 */
function checar_conexao_db() {
    $('#error_table').hide();
    $.ajax({
        url: '../controll/ajax.php',
        type: 'POST',
        dataType: "json",
        data: {
            host:     $('#host').val(),
            port:     $('#port').val(),
            userid:   $('#userid').val(),
            passwd:   $('#passwd').val(),
            method:  "checar_conexao_db"
        },
        beforeSend: function() {
            $('#carregando_1').show();
        },
        success: function(json) {
            $('#carregando_1').hide();
            if (json) {
                $('#error_db').hide();
                var options = '<option value="" selected>Selecione</option>';
                for (var i = 0; i < json.length; i++) {
                    options += '<option value="' + json[i] + '">' + json[i] + '</option>';
                }
                $("select#select_db").html(options);
                $('#conexao_db').hide('slow');
                $('#div_db').show('slow');
            }
            else {
                $('#div_db').hide();
                $('#error_db').show();
            }
        }
    });
}


function mostrar_tabelas(db) {
    $('#botao_gerar').hide();
    $('#error_table').hide();
    if (db != "") {
        $.ajax({
            url: '../controll/ajax.php',
            type: 'POST',
            dataType: "html",
            data: {
                db:      db,
                method:  "mostrar_tabelas"
            },
            beforeSend: function() {
                $('#carregando_2').show();
            },
            success: function(html) {
               $('#carregando_2').hide();
               $('#selecao_db').hide('slow');
               $('#div_tables').show('slow'); 
               $('#selecao_tabelas').html(html);
               carregar_janelas_flutuantes();
               $('#botao_gerar').show();
            }
        });
    }
}


/**
 * Pega as tabelas selecionadas
 */
function pegar_tabelas_selecionadas() {
    var i     = 0;
    var lista = new Array();
    $("input:checkbox[name=chk_tabela]:checked").each(function(){
        lista[i] = $(this).val();
        i++;
    });
    
    if (lista.length < 1) {
        $('#error_table').show('slow');
    }
    else {
        $('#tables_list').val(lista);
        $('#frm_table').submit();
    }
    
}