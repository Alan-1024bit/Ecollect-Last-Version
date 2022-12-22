$("#cadastrar_Desc").validate({
  rules: {
    email:{
      required: true,
      email: true,
      maxlength: 35
    },
    senha:{
      required: true,
      minlength: 8,
      maxlength: 128
    },
    confirmarSenha:{
      equalTo: "senha",
      required: true
    },  
    nome:{
      required: true,
      minlength: 3,
      maxlength: 15
    },
    sbrnome:{
      required: true,
      minlength: 4,
      maxlength: 15
    },
    tel:{
      required: true,
      minlength: 14,
      maxlength: 15
    },
    ruaCasa:{
      required: true,
      maxlength: 50
    },              
    nmrCasa:{
        required: true,
        min: 1,
        digits: true
    }
  },
  messages:{
    email:{
        required: "E-mail é obrigatório.",
        email: "Digite um E-mail válido.",
        maxlength: "E-mail deve ter, no máximo, 35 caracteres."
      },
    senha:{
      required: "Senha é obrigatório.",
      minlength: "a Senha deve conter, no mínimo, 8 caracteres.",
      maxlength: "Senha excedeu o limite de 128 caracteres."
    },
    confirmarSenha:{
      equalTo: "Senhas não coincidem",
      required: "Confirme a senha",
    },  
    nome:{
      required: "Nome é obrigatório",
      minlength: "Nome deve ter, no mínimo, 3 caracteres.",
      maxlength: "Nome deve ter, no maximo, 15 caracteres."
    },
    sbrnome:{
      required: "Sobrenome é obrigatório.",
      minlength: "Sobrenome deve ter, no mínimo, 4 caracteres.",
      maxlength: "Sobrenome deve ter, no maximo, 15 caracteres."
    },
    tel:{
      required: "Telefone é obrigatório.",
      minlength: "Telefone deve ter, no mínimo, 14 caracteres",
      maxlength: "Telefone deve ter, no maximo, 15 caracteres"
    },
    ruaCasa:{
      required: "Nome da Rua é obrigatório",
      maxlength: "Nome da Rua deve ter, no máximo, 50 caracteres."
    },              
    nmrCasa:{
        required: "Número da Casa é obrigatório",
        min: "Só são aceitos números maiores ou iguais a 1",
        digits: "Só são permitidos números"
    }
  },
  submitHandler: function(form) {
    $("#id_tel").unmask();
    form.submit();
  }  
});

$("#id_tel").keypress(function() {
  $('#id_tel').mask('(00) 00000-0009');
});

$("#id_tel").blur(function() {
  if($(this).val().length == 15) { 
    $("#id_tel").mask("(00) 00000-0000");
  } else {
    $("#id_tel").mask("(00) 0000-0000");
  }
});

$(window).bind("pageshow", function() {
  $("#id_tel").val("");
});