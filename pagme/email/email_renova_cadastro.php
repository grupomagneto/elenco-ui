<?php
require_once "../dbconnect.php";
require_once "../functions.php";
$forma_pagamento = $_GET['pagamento'];

$id_usuario = $_SESSION['id_usuario'];
$nome = $_SESSION['nome'];
$pieces = explode(" ", $nome);
$primeiro_nome = $pieces[0];
$email = $_SESSION['email'];
$endereco = $_SESSION['endereco'];
$numero = $_SESSION['numero'];
$complemento = $_SESSION['complemento'];
$cidade = $_SESSION['cidade'];
$bairro = $_SESSION['bairro'];
$uf = $_SESSION['uf'];
$cep = $_SESSION['cep'];
$tel = $_SESSION['tel'];

if ($forma_pagamento == "gratuito") {
    $validade = date('d/m/Y', strtotime('+1 years'));
    $subject = "[CADASTRO RENOVADO] Obrigada pela confiança!";
    $msg = "
    <!DOCTYPE html PUBLIC>
    <html lang='pt-BR'>
    <head>
    <meta http-equiv='Content-type' content='text/html; charset=utf-8' />
    <meta name='viewport' content='width=device-width, user-scalable=no'>
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Roboto:400' />
      <style type='text/css'>
        h1 { font-family: 'Roboto', sans-serif; font-weight: 400; }
      </style>
    </head>
    <body>
    <p>Oi $primeiro_nome,</p>
    <BR />
    <p>Estamos muito felizes com seu voto de confiança e torcendo para que surjam muitos trabalhos para você. Guarde este e-mail para seu controle pois aqui vão as informações que recebemos na sua renovação:</p>
    <p><strong>Cadastro:</strong> Gratuito</p>
    <p><strong>Validade:</strong> $validade</p>
    <p><strong>Nome:</strong> $nome</p>
    <p><strong>Telefone:</strong> $tel</p>
    <p><strong>Endereço:</strong></p>
    <p>$endereco $complemento, $numero<BR />
    $bairro - $cidade, $uf<BR />
    $cep</p>
    <BR />
    <p>Qualquer dúvida é só entrar em contato, ok?</p>
    <BR />
    <p>Abração,</p>
    <p>Equipe Magneto Elenco</p>
    </body>
    </html>";
}
elseif ($forma_pagamento == "saldo") {
    $produto = $_SESSION['produto'];
    if ($produto == "Premium") {
        $validade = date('d/m/Y', strtotime('+1 years'));
    }
    elseif ($produto == "Profissional") {
        $validade = date('d/m/Y', strtotime('+2 years'));
    }
    $valor = $_SESSION['valor'];
    $subject = "[CADASTRO RENOVADO] Obrigada pela confiança!";
    $msg = "
    <!DOCTYPE html PUBLIC>
    <html lang='pt-BR'>
    <head>
    <meta http-equiv='Content-type' content='text/html; charset=utf-8' />
    <meta name='viewport' content='width=device-width, user-scalable=no'>
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Roboto:400' />
      <style type='text/css'>
        h1 { font-family: 'Roboto', sans-serif; font-weight: 400; }
      </style>
    </head>
    <body>
    <p>Oi $primeiro_nome,</p>
    <BR />
    <p>Estamos muito felizes com seu voto de confiança e torcendo para que surjam muitos trabalhos para você. Guarde este e-mail para seu controle pois aqui vão as informações que recebemos na sua renovação:</p>
    <p><strong>Cadastro:</strong> $produto</p>
    <p><strong>Validade:</strong> $validade</p>
    <p><strong>Valor:</strong> R$ $valor</p>
    <p><strong>Forma de Pagamento:</strong> Saldo de Cachês</p>
    <p><strong>Nome:</strong> $nome</p>
    <p><strong>Telefone:</strong> $tel</p>
    <p><strong>Endereço:</strong></p>
    <p>$endereco $complemento, $numero<BR />
    $bairro - $cidade, $uf<BR />
    $cep</p>
    <BR />
    <p>Qualquer dúvida é só entrar em contato, ok?</p>
    <BR />
    <p>Abração,</p>
    <p>Equipe Magneto Elenco</p>
    </body>
    </html>";
}
elseif ($forma_pagamento == "cartao") {
    $produto = $_SESSION['produto'];
    if ($produto == "Premium") {
        $validade = date('d/m/Y', strtotime('+1 years'));
    }
    elseif ($produto == "Profissional") {
        $validade = date('d/m/Y', strtotime('+2 years'));
    }
    $valor = $_SESSION['valor'];
    $subject = "[CADASTRO RENOVADO] Obrigada pela confiança!";
    $msg = "
    <!DOCTYPE html PUBLIC>
    <html lang='pt-BR'>
    <head>
    <meta http-equiv='Content-type' content='text/html; charset=utf-8' />
    <meta name='viewport' content='width=device-width, user-scalable=no'>
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Roboto:400' />
      <style type='text/css'>
        h1 { font-family: 'Roboto', sans-serif; font-weight: 400; }
      </style>
    </head>
    <body>
    <p>Oi $primeiro_nome,</p>
    <BR />
    <p>Estamos muito felizes com seu voto de confiança e torcendo para que surjam muitos trabalhos para você. Guarde este e-mail para seu controle pois aqui vão as informações que recebemos na sua renovação:</p>
    <p><strong>Cadastro:</strong> $produto</p>
    <p><strong>Validade:</strong> $validade</p>
    <p><strong>Valor:</strong> R$ $valor</p>
    <p><strong>Forma de Pagamento:</strong> Cartão de Crédito</p>
    <p><strong>Nome:</strong> $nome</p>
    <p><strong>Telefone:</strong> $tel</p>
    <p><strong>Endereço:</strong></p>
    <p>$endereco $complemento, $numero<BR />
    $bairro - $cidade, $uf<BR />
    $cep</p>
    <BR />
    <p>Qualquer dúvida é só entrar em contato, ok?</p>
    <BR />
    <p>Abração,</p>
    <p>Equipe Magneto Elenco</p>
    </body>
    </html>";
}
elseif ($forma_pagamento == "boleto") {
    $produto = $_SESSION['produto'];
    if ($produto == "Premium") {
        $validade = "12 meses após a data de pagamento do boleto";
    }
    elseif ($produto == "Profissional") {
        $validade = "24 meses após a data de pagamento do boleto";
    }
    $valor = $_SESSION['valor'];
    $url_boleto = $_SESSION['url_boleto'];
    $subject = "[CADASTRO EM RENOVAÇÃO] Obrigada pela confiança!";
    $msg = "
    <!DOCTYPE html PUBLIC>
    <html lang='pt-BR'>
    <head>
    <meta http-equiv='Content-type' content='text/html; charset=utf-8' />
    <meta name='viewport' content='width=device-width, user-scalable=no'>
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Roboto:400' />
      <style type='text/css'>
        h1 { font-family: 'Roboto', sans-serif; font-weight: 400; }
      </style>
    </head>
    <body>
    <p>Oi $primeiro_nome,</p>
    <BR />
    <p>Estamos muito felizes com seu voto de confiança e torcendo para que surjam muitos trabalhos para você. Seu cadastro será automaticamente marcado como renovado assim que detectarmos o pagamento do Boleto Bancário. Guarde este e-mail para seu controle pois aqui vão as informações que recebemos na sua renovação:</p>
    <p><strong>Cadastro:</strong> $produto</p>
    <p><strong>Validade:</strong> $validade</p>
    <p><strong>Valor:</strong> R$ $valor</p>
    <p><strong>Forma de Pagamento:</strong> Boleto Bancário</p>
    <p><strong>Nome:</strong> $nome</p>
    <p><strong>Telefone:</strong> $tel</p>
    <p><strong>Endereço:</strong></p>
    <p>$endereco $complemento, $numero<BR />
    $bairro - $cidade, $uf<BR />
    $cep</p>
    <BR />
    <p><strong><a href='$url_boleto'>Clique aqui para reimprimir o seu boleto.</a></strong></p>
    <BR />
    <p>Qualquer dúvida é só entrar em contato, ok?</p>
    <BR />
    <p>Abração,</p>
    <p>Equipe Magneto Elenco</p>
    </body>
    </html>";
}

if (empty($_SESSION["email_renovacao_sent"])) {
    define("GUSER", "inteligencia@magnetoelenco.com.br"); // <-- Insira aqui o seu GMail
    define("GPWD", "rom54808285");    // <-- Insira aqui a senha do seu GMail
    require_once "phpmailer/class.phpmailer.php";
    smtpmailer($email, "inteligencia@magnetoelenco.com.br", "Magneto Elenco", $subject, $msg);
    $_SESSION["email_renovacao_sent"] = "yes";
}
ob_end_flush();
mysqli_close($link);
?>