<?php
	require_once 'dbconnect.php';
  $hoje = date('Y-m-d', time());
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
  if (isset($_GET['new_id'])) {
    $_SESSION['user'] = $_GET['new_id'];
  }
  $user_id = $_SESSION['user'];
	// select loggedin users detail
  $sql = "SELECT * FROM tb_elenco WHERE id_elenco='$user_id'";
	$res=mysqli_query($link, $sql) or die (mysqli_error($link));
	if ($userRow = mysqli_fetch_array($res)) {
    if (!empty($userRow['nome_responsavel'])) {
       $_SESSION['nome_responsavel'] = $userRow['nome_responsavel'];
    }
    $cpf = $userRow['cpf'];
    $_SESSION['cpf'] = $cpf;
    $full_name = $userRow['nome'];
    $email = $userRow['email'];
    $cep = $userRow['cep'];
    $cel = $userRow['tl_celular'];
    if (strpos($cel, '5561') !== false) {
      $cel = str_replace('5561','',$cel);
      $ddd = '61';
    }
    if ($userRow['sexo'] == 'F') {
      $sexo = 'a';
    }
    elseif ($userRow['sexo'] == 'M') {
      $sexo = 'o';
    }
  }
  // cria o menu de nome artístico se existirem mais de um agenciado no mesmo cpf e email
  $result = mysqli_query($link, "SELECT nome_artistico, id_elenco FROM tb_elenco WHERE email='$email' AND cpf='$cpf' ORDER BY dt_nascimento ASC");
  $count = mysqli_num_rows($result);
  $n = 1;
  if ($n <= $count) {
    while ($row = mysqli_fetch_array($result)) {
      $id_temp = $row['id_elenco'];
      if ($id_temp != $_SESSION['user']) {
        ${'nome_artistico_dependente'.$n} = $row['nome_artistico'];
        $n++;
      }
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=no">
<title>Bem-vind<? echo $sexo; ?> ao PAGME - Pagamento de Agenciados Magneto Elenco</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src='assets/js/gradient.js'></script>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-22229864-1', 'auto');
ga('send', 'pageview');
</script>
<!-- <script src="https://assets.pagar.me/checkout/checkout.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://www.magnetoelenco.com.br"><img src="images/logo.svg"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="home.php">Como funciona</a></li>
            <li><a href="trabalhos.php">Meus trabalhos</a></li>
            <li><a href="dbancarios.php">Meus dados bancários</a></li>
            <li><a href="meu_perfil.php">Meu perfil</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $userRow['nome_artistico']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
              <?php
              $result = mysqli_query($link, "SELECT nome_artistico, id_elenco FROM tb_elenco WHERE email='$email' AND cpf='$cpf'");
                $n = 1;
                if ($n <= $count) {
                  while ($row = mysqli_fetch_array($result)) {
                    $id_temp = $row['id_elenco'];
                    if ($id_temp != $_SESSION['user']) {
                        echo "<li><a href='home.php?new_id=$id_temp'><span class='glyphicon glyphicon-user'></span>&nbsp;";
                        echo ${'nome_artistico_dependente'.$n};
                        echo "&nbsp;</a></li>";
                      $n++;
                    }
                  }
                }
              ?>
                <li><a href='mailto:vini@grupomagneto.com.br'><span class='glyphicon glyphicon-envelope'></span>&nbsp;Contato</a></li>
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sair</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<div id="wrapper">
<div class="gradient inicio_login">
	<div class="container">
        <div class='row'>
      <div class='col-md-12'>
    <div class='page-header'>
      <h2>Sistema PAGME</h2>
      <p>Pagamento de Agenciados Magneto Elenco</p>
    </div>

      <p>O PAGME é o novo sistema de pagamentos da Magneto Elenco. Ainda em versão de testes, o PAGME substituiu o pagamento de cachês em cheques nominais e cruzados por tranferências para a conta bancária de cada agenciado.</p>
      <p>Cada pedido de transferência leva até 3 dias úteis para ser concluído e tem um custo de R$ 10,00 por transferência, descontado do saldo a ser transferido. É possível transferir mais de um cachê na mesma operação e pagar a taxa apenas uma vez.</p>
      <p>As transferências apenas poderão ser feitas para contas bancárias vinculadas ao CPF do agenciado ou, no caso de menores de idade, para contas vinculadas ao CPF do responsável.</p>
      <p>Os pagamentos em cheque foram completamente substituídos pelo PAGME a partir de 02/04/2017.</p>
      <p>Como estamos em fase de testes, pedimos desculpas antecipadas por qualquer erro e colocamos um número para suporte via whatsapp: 61 99311-0767.</p>
      <p>Obrigada e sucesso!</p>
      </div>
    </div>
  </div>
</div>
</div>
<?php
$cadastro = $userRow['tipo_cadastro_vigente'];
// Verifica se o contrato do agenciado está vencido
if ($cadastro != "Ator" && $hoje > date('Y-m-d', strtotime($userRow['data_contrato_vigente']."+2 years"))){
  // Verifica quanto o agenciado tem de caches a receber
  $id_usuario = $_SESSION['user'];
  $result_recebivel = mysqli_query($link, "SELECT (SUM(cache_liquido) - ifnull(SUM(abatimento_cache), 0) - ifnull(SUM(valor_pago), 0)) as receber FROM financeiro WHERE id_elenco_financeiro='$id_usuario' AND tipo_entrada='cache' AND status_pagamento<>'1'");
  $row_recebivel = mysqli_fetch_array($result_recebivel);
  $recebivel = $row_recebivel['receber'];
  $recebivel_java = intval($recebivel);
  $recebivel = number_format($recebivel,2,",",".");
  $recebivel_pieces = explode(",", $recebivel);
  $recebivel = $recebivel_pieces[0];
  $recebivel_cents = $recebivel_pieces[1];
  // Modal
  if ($cadastro == 'Gratuito') {
    $descricao_cadastro = "Mudamos os termos do nosso contrato e você precisa renová-lo para continuar trabalhando";
  }
  if ($cadastro == 'Premium') {
    $descricao_cadastro = "Seu cadastro foi temporariamente rebaixado de Premium para Gratuito até você renová-lo";
  }
  if ($cadastro == 'Profissional') {
    $descricao_cadastro = "Seu cadastro foi temporariamente rebaixado de Profissional para Gratuito até você renová-lo";
  }
?>
<div id='myModal' class='modal'>
  <div class='modal-content'>
    <div class='renova_01'>
        <div class='conteiner'>
          <div class='navegacao'>
            <img src='images/fechar.svg' class='fechar botoes_navegacao' />
          </div>
          <div class='titulo'>
            Nosso contrato expirou!
          </div>
          <div class='descricao'>
            <? echo $descricao_cadastro; ?>
          </div>
          <div class='botoes'>
            <button class='botao' id='botao_renovar-contrato'>Renovar meu contrato</button>
            <button class='botao' id='botao_apagar-perfil'>Cancelar meu contrato</button>
          </div>
        </div>
    </div>
    <div class='renova_02-1'>
        <div class='conteiner'>
            <div class='navegacao'>
                <img src='images/voltar.svg' class='voltar_1 botoes_navegacao' />
                <span class='progresso'></span>
                <img src='images/fechar.svg' class='fechar botoes_navegacao' />
            </div>
            <div class='titulo'>
                Confiança renovada :)
            </div>
            <div class='descricao'>
                Qual cadastro é o ideal pra você? Clique nos botões abaixo para conhecer nossas modalidades:
            </div>
            <div class='botoes_modalidades'>
                <button class='gratuito'><img src='images/botao-gratuito.svg' /></button>
                <button class='premium'><img src='images/botao-premium.svg' /></button>
                <button class='profissional'><img src='images/botao-profissional.svg' /></button>
            </div>
        </div>
    </div>
    <div class='renova_02-2'>
        <div class='conteiner'>
            <div class='navegacao'>
                <img src='images/voltar.svg' class='voltar_1-2 botoes_navegacao' />
                <img src='images/fechar.svg' class='fechar botoes_navegacao' />
            </div>
            <div class='titulo'>
                Você tem certeza?
            </div>
            <div class='descricao'>
                Essa ação removerá o seu perfil, fotos e vídeos de nosso sistema de buscas e revogará seu acesso ao sistema PAGME
            </div>
            <div class='botoes'>
              <form class='forms' name='apaga_cadastro' id='apaga_cadastro' action='#' method='post'>
                  <button class='botao' id='botao_confirma_apagar'>
                    <input type='hidden' name='apagar_id_usuario' id='apagar_id_usuario' value='<? echo $id_usuario; ?>' />
                    Sim, encerrar contrato
                  </button>
                </form>
                <button class='botao voltar_1-2'>Não, cliquei errado</button>
            </div>
        </div>
    </div>
    <div class='renova_02-3'>
        <div class='conteiner'>
            <div class='navegacao'>
                <img src='images/fechar.svg' class='fechar botoes_navegacao' />
            </div>
            <div class='titulo'>
                Contrato encerrado ;(
            </div>
            <div class='descricao'>
                Sentimos muito pela sua partida e esperamos poder te servir novamente no futuro
            </div>
            <div class='timer'>
            <span class='small' id="timer">Sua sessão será encerrada em 10 segundos</span>
            </div>
        </div>
    </div>
    <div class='renova_03-gratuito'>
        <div class='conteiner'>
            <div class='navegacao'>
                <img src='images/voltar.svg' class='voltar_2 botoes_navegacao' />
                <span class='progresso'></span>
                <img src='images/fechar.svg' class='fechar botoes_navegacao' />
            </div>
            <div class='titulo'>
                Perfeito para você começar
            </div>
            <div class='descricao'>
                Nosso cadastro mais popular e que já deu oportunidade a mais de 15.000 pessoas desde 2009
            </div>
            <div class='quadro-gratuito'>
                <div class='icon'>
                    <img src='images/gratuito_icon.svg' style='width:100%' />
                </div>
                <div class='texto'>
                    <img src='images/gratuito_title.svg' style='width:100%' />
                    <ul class='medium lista_cadastro'>
                        <li class='itens'>Você faz suas fotos pelo celular e nos envia para cadastro e atualizações;</li>
                        <li class='itens'>Cadastro sem custos;</li>
                        <li class='itens'>Receba 60% do cachê líquido em todos os trabalhos;</li>
                        <li class='itens'>Nunca expira;</li>
                    </ul>
                </div>
                <form class='forms' name='renova_cadastro' id='escolhe_gratuito' action='#' method='post'>
                  <button id='btn_renova-cadastro-gratuito' class='botao'>
                    <input type='hidden' name='id_usuario' value='<? echo $id_usuario; ?>' />
                    <input type='hidden' name='cadastro' value='gratuito' />
                    Escolher
                  </button>
                </form>
            </div>
            <div class='aviso'>
              <div class='checkbox'>
                <input type='checkbox' id='terms-1' class='checado' />
                <img src='images/campo_obrigatorio.svg' class='requerido' />
              </div>
              <div class='declaro x-small'>
                <label for='terms'>Li e estou de acordo com os <a href='#'>Termos do Contrato</a> para renovação de minha assinatura como Cadastro Gratuito</label>
              </div>
            </div>
        </div>
    </div>
    <div class='renova_03-premium'>
    <div class='conteiner'>
            <div class='navegacao'>
                <img src='images/voltar.svg' class='voltar_2 botoes_navegacao' />
                <span class='progresso'>2 de 4</span>
                <img src='images/fechar.svg' class='fechar botoes_navegacao' />
            </div>
            <div class='titulo'>
                Mais chances de trabalhar
            </div>
            <div class='descricao'>
                Melhor custo benefício e que te deixa em vantagem na hora de ser escolhid<? echo $sexo; ?> para trabalhos
            </div>
            <div class='quadro-premium'>
                <div class='icon'>
                    <img src='images/premium_icon.svg' style='width:100%' />
                </div>
                <div class='texto'>
                    <img src='images/premium_title.svg' style='width:100%' />
                    <ul class='medium lista_cadastro'>
                        <li class='itens'>Cadastro com fotos e vídeos profissionais feitos em nosso estúdio;</li>
                        <li class='itens'>Seu perfil tem destaque nas buscas por atores/modelos;</li>
                        <li class='itens'>Receba 80% do cachê líquido em todos os trabalhos;</li>
                        <li class='itens'>Assinatura anual;</li>
                    </ul>
                </div>
                <div class='preco'><img src='images/preco_premium.svg' /></div>
                  <button id='btn_renova-cadastro-premium' class='botao'>Escolher</button>
            </div>
            <div class='aviso'>
              <div class='checkbox'>
                <input type='checkbox' id='terms-2' class='checado' />
                <img src='images/campo_obrigatorio.svg' class='requerido' />
              </div>
              <div class='declaro x-small'>
                <label for='terms'>Li e estou de acordo com os <a href='#'>Termos do Contrato</a> para renovação de minha assinatura como Cadastro Premium</label>
              </div>
            </div>
        </div>
    </div>
    <div class='renova_03-profissional'>
    <div class='conteiner'>
            <div class='navegacao'>
                <img src='images/voltar.svg' class='voltar_2 botoes_navegacao' />
                <span class='progresso'>2 de 4</span>
                <img src='images/fechar.svg' class='fechar botoes_navegacao' />
            </div>
            <div class='titulo'>
                Para quem trabalha muito
            </div>
            <div class='descricao'>
                Ensaio completo, menores taxas, super destaque nas buscas e transferências automáticas de cachês
            </div>
            <div class='quadro-profissional'>
                <div class='icon'>
                    <img src='images/profissional_icon.svg' style='width:100%' />
                </div>
                <div class='texto'>
                    <img src='images/profissional_title.svg' style='width:100%' />
                    <ul class='medium lista_cadastro'>
                        <li class='itens'>Ensaio fotográfico completo com 30 fotos tratadas entregues em DVD;</li>
                        <li class='itens'>Cadastro e atualizações com fotos e vídeos profissionais feitos em nosso estúdio;</li>
                        <li class='itens'>Você recebe 90% do cachê líquido em todos os trabalhos;</li>
                        <li class='itens'>Seu perfil aparece primeiro nas buscas por atores/modelos;</li>
                        <li class='itens'>Cachês disponíveis transferidos automaticamente para sua conta bancária;</li>
                        <li class='itens'>Assinatura bienal;</li>
                    </ul>
                </div>
                <div class='preco'><img src='images/preco_profissional.svg' /></div>
                  <button id='btn_renova-cadastro-profissional' class='botao'>Escolher</button>
            </div>
            <div class='aviso'>
              <div class='checkbox'>
                <input type='checkbox' id='terms-3' class='checado' />
                <img src='images/campo_obrigatorio.svg' class='requerido' />
              </div>
              <div class='declaro x-small'>
                <label for='terms'>Li e estou de acordo com os <a href='#'>Termos do Contrato</a> para renovação de minha assinatura como Cadastro Profissional</label>
              </div>
            </div>
            </div>
        </div>
      <div class='atualiza-dados'>
        <div class='conteiner'>
          <div class='navegacao'>
            <img src='images/voltar.svg' class='voltar_atualiza-dados botoes_navegacao' />
            <div class="barra_progresso">
              <span style="width: 60%"></span>
            </div>
            <img src='images/fechar.svg' class='fechar botoes_navegacao' />
          </div>
          <div class='titulo'>
            Confira e atualize seus dados
          </div>
          <div class='descricao'>
            Clique sobre os campos para alterar seus dados e renovar seu contrato
          </div>
          <div class='campos'>
            <span class='texto_input'>DDD:</span>
            <input type='text' name='DDD' id='DDD' value='<?php echo $ddd; ?>' placeholder='DDD' />
            <span class='texto_input'>TELEFONE:</span>
            <input type='text' name='cel' id='cel' value='<?php echo $cel; ?>' placeholder='Telefone' /><BR />
            <span class='texto_input'>E-MAIL:</span>
            <input type='text' name='email' id='email' value='<?php echo $email; ?>' placeholder='E-mail' /><BR />
            <span class='texto_input'>CEP:</span>
            <input type='text' name='cep' id='cep' value='<?php echo $cep; ?>' placeholder='CEP' /><BR />
            <span class='texto_input'>ENDEREÇO:</span>
            <input type='text' name='endereco' id='endereco' value='<?php echo $endereco; ?>' placeholder='Endereço' />
            <span class='texto_input'>NÚMERO:</span>
            <input type='text' name='numero' id='numero' value='<?php echo $numero; ?>' placeholder='Nº' /><BR />
            <span class='texto_input'>COMPLEMENTO:</span>
            <input type='text' name='complemento' id='complemento' value='<?php echo $complemento; ?>' placeholder='Complemento' />
            <span class='texto_input'>BAIRRO:</span>
            <input type='text' name='bairro' id='bairro' value='<?php echo $bairro; ?>' placeholder='Bairro' />
            <BR />
            <span class='texto_input'>CIDADE:</span>
            <input type='text' name='cidade' id='cidade' value='<?php echo $cidade; ?>' placeholder='Cidade' />
            <span class='texto_input'>UF:</span>
            <input type='text' name='uf' id='uf' value='<?php echo $uf; ?>' placeholder='UF' />
          </div>
          <div class='botoes'>
            <button class='botao' id='botao_atualizar-dados'>Continuar</button>
          </div>
        </div>
    </div>
    <div class='renova_04'>
      <div class='conteiner'>
        <div class='navegacao'>
          <img src='images/voltar.svg' class='voltar_3 botoes_navegacao' />
          <span class='progresso'>3 de 4</span>
              <img src='images/fechar.svg' class='fechar botoes_navegacao' />
        </div>
        <div class='titulo'>
          Como você gostaria de pagar?
        </div>
        <div class='descricao' id='descricao-pagamento'></div>
        <div class='botoes'>
          <button class='botao botao_saldo' id='botao_saldo-1'>Saldo de Cachês</button>
          <button class='botao botao_saldo' id='botao_saldo-2'>Saldo de Cachês</button>
            <form method='POST' action='/comprar' class='checkout_form'>
              <script type='text/javascript'
                  src='https://assets.pagar.me/checkout/checkout.js'
                  data-button-text='Cartão ou Boleto'
                  data-button-class='botao botao_gateway'
                  data-encryption-key='ek_test_Ec8KhxISQ1tug1b8bCGxC2nXfxqRmk'
                  data-max-installments='10'
                  data-free-installments='10'
                  data-default-installment='1'
                  data-credit-card-helper-text='Parcele em até 10x sem juros'
                  data-customer-data='true'
                  data-create-token='true'
                  data-postback-url='pagamento_confirmado.php'
                  data-customer-name='<?php echo $full_name; ?>'
                  data-customer-document-number='<?php echo $cpf; ?>'
                  data-disable-zero-document-number='true'
                  data-customer-email='<?php echo $email; ?>'
                  data-customer-phone-ddd='<?php echo $ddd; ?>'
                  data-customer-phone-number='<?php echo $cel; ?>'
                  data-customer-address-zipcode='<?php echo $cep; ?>'
                  data-ui-color='#441160'
                  data-amount='19900'>
              </script>
            </form>
        </div>
      </div>
    </div>
    <div class='renova_05'>
      <div class='conteiner'>
        <div class='navegacao'>
          <img src='images/voltar.svg' class='voltar_4 botoes_navegacao' />
          <span class='progresso'>4 de 4</span>
              <img src='images/fechar.svg' class='fechar botoes_navegacao' />
        </div>
        <div class='titulo'>
          Renovar contrato
        </div>
        <div class='subtracao'>
          <div class='operacoes'>
            <div class='menos'><img src='images/menos.svg' /></div>
            <div class='igual'><img src='images/igual.svg' /></div>
          </div>
          <div class='valores'>
            <div class='utilizando small'>utilizando meus cachês</div>
            <div class='valor'>
              <div class='small'>saldo disponível</div>
              <div class='texto_valor'>
                <span class='small'>R$ </span>
                <span class='large' id='recebivel'><?php echo $recebivel_java; ?></span>
                <span class='small centavos'>,<?php echo $recebivel_cents; ?></span>
              </div>
            </div>
            <div class='valor valor-cadastro'>
              <div class='small'>Cadastro <span id='cadastro'></span></div>
              <div class='texto_valor'>
                <span class='small'>R$ </span>
                <span class='large' id='valor'></span>
                <span class='small centavos'>,00</span>
              </div>
            </div>
            <div class='valor'>
              <div class='small'>saldo remanescente</div>
              <div class='texto_valor'>
                <span class='small'>R$ </span>
                <span class='large' id='remanescente'></span>
                <span class='small centavos'>,<? echo $recebivel_cents; ?></span>
              </div>
            </div>
          </div>
        </div>
        <div class='botoes'>
          <form class='forms' name='renova_cadastro' id='confirma_cadastro' action='#' method='post'>
            <button id='confirmar-saldo' class='botao confirmar-saldo'>
              <input type='hidden' name='id_usuario' value='<? echo $id_usuario; ?>' />
              <input type='hidden' name='cadastro' id='input_saldo' value='' />
              <input type='hidden' name='valor_cadastro' id='valor_cadastro' value='' />
              Confirmar
            </button>
          </form>
        </div>
      </div>
    </div>
    <div class='renova_05-2'>
      <div class='conteiner'>
        <div class='navegacao'>
          <img src='images/voltar.svg' class='voltar_4 botoes_navegacao' />
          <span class='progresso'>4 de 4</span>
              <img src='images/fechar.svg' class='fechar botoes_navegacao' />
        </div>
        <div class='titulo'>
          Renovar contrato
        </div>
        <div class='subtracao'>
          <div class='valores'>
            <div class='utilizando small'>Pagamento em Cartão ou Boleto</div>
            <div class='valor valor-cadastro'>
              <div class='small'>Cadastro <span id='cadastro'></span></div>
              <div class='texto_valor'>
                <span class='small'>R$ </span>
                <span class='large' id='valor'></span>
                <span class='small centavos'>,00</span>
              </div>
            </div>
          </div>
        </div>
        <div class='botoes'>
          <button class='botao botao-gateway'></button>
        </div>
      </div>
    </div>
    <div class='renova_06'>
      <div class='conteiner'>
        <div class='navegacao'>
          <img src='images/fechar.svg' class='fechar botoes_navegacao' />
        </div>
        <div class='titulo'>
          Contrato renovado!
        </div>
        <div class='descricao'>
          Nosso contrato foi renovado e enviado, junto com todas as informações, para o seu e-mail cadastrado. Obrigada!
        </div>
        <div class='botoes'>
            <button class='botao' id='revisar-dados'>Revisar dados pessoais</button>
        </div>
      </div>
    </div>
  </div>
</div>
<? } ?>
<script src='assets/js/modal.js'></script>
</body>
</html>
<?php
ob_end_flush();
mysqli_close($link);
?>
