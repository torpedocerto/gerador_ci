$(document).ready(function(){
  $("label").inFieldLabels();
  $("a[rel='janela']").colorbox();
  $("a[rel='contato_footer']").colorbox();
  $("a[rel='contato_header']").colorbox();
  $("a[rel='senha_esqueceu']").colorbox();
  $('#slider').nivoSlider();
  $('#slider2').nivoSlider();
  $('#slider_serv').nivoSlider();
  $("#Informativo").typewriter();
  $('#menuBar li').click(function(){
    var url = $(this).find('a').attr('href');
    document.location.href = url;
  });

  $('#menuBar li').hover(function(){
    $(this).find('.menuInfo').slideDown();
  }, function(){
    $(this).find('.menuInfo').slideUp();
  });


$.validator.setDefaults({
  highlight: function(input) {
    $(input).css("border", "1px solid red");
  },
  unhighlight: function(input) {
    $(input).css("border", "1px solid black");
  }
});


	$("#frm_cliente").validate({
		rules: {
      fisica_input: {
        required: function(element) {
          return $("#cnpj_valido").val().length == 11;
        }
      },
      razao_social: {
        required: function(element) {
          return $("#cnpj_valido").val().length == 14;
        }
      },
      nome_fantasia: {
        required: function(element) {
          return $("#cnpj_valido").val().length == 14;
        }
      },
      cep:          "required",
      estado:       "required",
      endereco_input:     "required",
      bairro:       "required",
      cidade:       "required",
      ddd:          {
                            required: true,
                            digits: true
                    },
      telefone:     "required",
      contato:      "required",
      celular:      "required",
      pseudo:       {
                    required: true,
                    remote: {
                           url: "../controll/pseudo_ajax.php",
                           type: "post",
                           data: {
                              referencia: function() {
                                return $("#pseudo").val();
                              }
                            }
                        }
      },
      email:        {
                    required: true,
                    email:    true,
                    remote: {
                           url: "../controll/email_ajax.php",
                           type: "post",
                           data: {
                              referencia: function() {
                                return $("#email").val();
                              }
                            }
                        }
                    },
      password:     "required",
      password2:    {
                    required: true,
                    equalTo: "#password"
                    },
      confirm_tandc:"required",
      referencia:   {
                    required: false,
                    remote: {
                           url: "../controll/referencia_ajax.php",
                           type: "post",
                           data: {
                              referencia: function() {
                                return $("#referencia").val();
                              }
                            }
                        }
                    }
		},
		messages: {
      fisica_input: "",
      razao_social: "",
      nome_fantasia:"",
      cep:          "",
      estado:       "",
      endereco_input:     "",
      bairro:       "",
      cidade:       "",
      inscr_est:    "",
      ddd:          "",
      telefone:     "",
      contato:      "",
      celular:      "",
      pseudo:       {
                    required: "",
                    remote: ""
      },
      email:        {
                    required: "",
                    email:    "",
                    remote:   ""
                    },
      password:     "",
      password2:    {
                    required: "",
                    equalTo: ""
                    },
      confirm_tandc:"<span style='color:red'>  Favor Confirmar Termos & Condições</span><br/>",
      referencia: "Dados Inválidos"
		}
	});
  
  $("#frm_faleconosco").validate({
    rules: {
      nomecli:      "required",
      emailcli:     {
                    required: true,
                    email:    true
                    },
      telcli:       {
                    required: true,
                    rangelength: [14, 14]
                    },
      text_message: "required"
    },
    messages: {
      nomecli:      "",
      emailcli:     "",
      text_message: "",
      telcli:       ""
    }
  });


});


function mostrar_servicos(div_name) {
  $('#serv1_img').hide();
  $('#serv2_img').hide();
  $('#serv3_img').hide();
  $('#serv4_img').hide();
  $('#serv1_texto').hide();
  $('#serv2_texto').hide();
  $('#serv3_texto').hide();
  $('#serv4_texto').hide();
  $('#'+div_name+'_img').fadeIn(1000);
  $('#'+div_name+'_texto').fadeIn(1000);

}
