
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <title>Consulta</title>
    <style>
      input {
        font-size: 15px;
        width: 300px;
      }
/*
      .robo {
        background-image: url('images/logo.svg');
        height: 79px;
        left: 50%;
        margin-left: -30px;
        margin-top: -40px;
        position: relative;
        top: 50%;
        width: 60px;
        z-index: 2;
      }*/

    </style>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.js"></script>
    <script src="jquery.bipbop.js"></script>
</head>

<body>
    <form method="post" action="result-test.php">
      <p>
        <input type="text" name="cpf" id="cpf" placeholder="CPF" />
      </p>
      <p>
        <input type="text" name="nome" id="nome" placeholder="Nome" />
      </p>

<button type="submit">enviar</button>

      <p id="status"></p>

    </form>
    <script>

// valida a formatação do CPF
function validCPF (cpf) {
  return cpf.match(/^\d{3}\.?\d{3}\.?\d{3}\-?\d{2}$/);
}

// quando o usuário digitar o CPF
$('#cpf').keyup(function(){
  var cpf = this.value;

  $('#cpf').mask('000.000.000-00');
  // se o CPF tiver formatação válida
  if (validCPF(cpf)) {

    $().bipbop("SELECT FROM 'BIPBOPJS'.'CPFCNPJ'", null, {
      // passando o CPF digitado
      data: { documento: cpf },

      success: function(data) {
        // define a variável "nome" com
        // o nome da pessoa física associada ao CPF
        var nome = $(data).find("body nome").text();

        // muda o campo "nome" para o nome do dono do CPF
        $("#nome").val(nome);
      }
    });
  }
});


    </script>

</body>
</html>
