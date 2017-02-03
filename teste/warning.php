<?php 

$cpf = "03484087145";

?>

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

    </style>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.js"></script>
    <script src="jquery.bipbop.js"></script>
</head>

<body>
    <form method="post" action="result-test.php">
      <p>
        <input type="text" value="<?php echo $cpf; ?>" name="cpf" id="cpf" placeholder="CPF" />
      </p>
      <p>
        <input type="text" name="nome" id="nome" placeholder="Nome" />
      </p>

    </form>

    <script>

$(document).ready(function () {

    var cpf = $("#cpf").val();

     $().bipbop("SELECT FROM 'BIPBOPJS'.'CPFCNPJ'", null, {
      // passando o CPF digitado
      data: {
        "documento": cpf,
      },

      success: function(data) {
        // define a variável "nome" com
        // o nome da pessoa física associada ao CPF
        var nome = $(data).find("body nome").text();

        // muda o campo "nome" para o nome do dono do CPF
        $("#nome").val(nome);
      }
    });
});

    </script>

</body>
</html>
