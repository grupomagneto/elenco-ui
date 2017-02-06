<?php
ob_start();
if(!session_id()) {
    session_start();
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!empty($_SESSION['cpf'])) {
  $cpf = $_SESSION['cpf'];
  echo "1";
}
// if (!empty($_POST['nome'])) {
  $_SESSION['nome'] = $_POST['nome'];
  echo "2";
  // header("Location: dbancarios.php");
  // exit;
// }
// else {
  echo "3";
  // $nome = $_SESSION['nome'];
  // echo $nome;
  // echo $cpf;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <title></title>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.js"></script>
    <script src="jquery.bipbop.js"></script>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
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
        "documento": cpf
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
<?php
// }
?>
