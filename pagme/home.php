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
    $email = $userRow['email'];
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
<title>Bem-vind<? echo $sexo; ?> ao PAGME - Pagamento de Agenciados Magneto Elenco</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
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
<div class="gradient ">
	<div class="container">
    <div class='page-header'>
      <h2>Sistema PAGME</h2>
      <p>Pagamento de Agenciados Magneto Elenco (versão ßeta)</p>
    </div>
    <div class='row'>
      <div class='col-lg-12'>
      <p>O PAGME é o novo sistema de pagamentos da Magneto Elenco. Ainda em sua primeira versão de teste, o PAGME vai substituir o pagamento de cachês em cheques nominais e cruzados por tranferências para a conta bancária de cada agenciado.</p>
      <p>Cada pedido de transferência levará até 3 dias úteis para ser concluído e terá um custo de R$ 10,00 por transferência, descontado do saldo a ser transferido. É possível transferir mais de um cachê na mesma transferência e pagar a taxa apenas uma vez.</p>
      <p>As transferências apenas poderão ser feitas para contas bancárias vinculadas ao CPF do agenciado ou, no caso de menores de idade, para contas vinculadas ao CPF do responsável.</p>
      <p>Os pagamentos em cheque continuarão a ser feitos na nova sede da agência até o dia 31/03/2017, quando serão completamente substituídos pelo PAGME.</p>
      <p>Como estamos em fase de testes, pedimos desculpas antecipadas por qualquer erro e colocamos um número para suporte via whatsapp: 61 99311-0767.</p>
      <p>Obrigado e sucesso!</p>
      </div>
    </div>
  </div>
</div>
</div>
 
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
<?php
// Verifica se o contrato do agenciado está vencido
if ($userRow['tipo_cadastro_vigente'] != "Ator" && $hoje > date('Y-m-d', strtotime($userRow['data_contrato_vigente']."+2 years"))){
  // Verifica quanto o agenciado tem de caches a receber
  $id_usuario = $_SESSION['user'];
  $recebivel = mysqli_query($link, "SELECT SUM(cache_liquido) as receber FROM financeiro WHERE id_elenco_financeiro='$id_usuario' AND tipo_entrada='cache' AND status_pagamento='0'");
  $row_recebivel = mysqli_fetch_array($recebivel);
  $recebivel = $row_recebivel['receber'];
  $recebivel = number_format($recebivel,2,",",".");
  $recebivel_pieces = explode(",", $recebivel);
  $recebivel = $recebivel_pieces[0];
  $recebivel_cents = $recebivel_pieces[1];
  // Modal
  echo "
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
            Seu cadastro foi temporariamente rebaixado de Premium para Gratuito até 27/07/2017, quando será cancelado.
          </div>
          <div class='botoes'>
            <button class='botao botao_renovar-contrato'>Renovar meu contrato</button>
            <button class='botao botao_apagar-perfil'>Apagar meu perfil</button>
          </div>
        </div>
    </div>
    <div class='renova_02-1'>
        <div class='conteiner'>
            <div class='navegacao'>
                <img src='images/voltar.svg' class='voltar-1 botoes_navegacao' />
                <span class='progresso'>1 de 4</span>
                <img src='images/fechar.svg' class='fechar botoes_navegacao' />
            </div>
            <div class='titulo'>
                Obrigada pela confiança :)
            </div>
            <div class='descricao'>
                Clique nas modalidades de cadastro para conhecê-las e depois escolha a que melhor te atender:
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
                <img src='images/voltar.svg' class='voltar-2 botoes_navegacao' />
                <img src='images/fechar.svg' class='fechar botoes_navegacao' />
            </div>
            <div class='titulo'>
                Você tem certeza?
            </div>
            <div class='descricao'>
                Essa ação excluirá de forma permanente todos os seus dados, fotos e vídeos armazenados em nosso sistema.
            </div>
            <div class='botoes'>
                <button class='botao botao_confirma_apagar'>Sim, adeus ;(</button>
                <button class='botao voltar-2'>Nãão!! Cliquei errado!</button>
            </div>
        </div>
    </div>
    <div class='renova_03-gratuito'>
        <div class='conteiner'>
            <div class='navegacao'>
                <img src='images/voltar.svg' class='voltar-3 botoes_navegacao' />
                <span class='progresso'>2 de 4</span>
                <img src='images/fechar.svg' class='fechar botoes_navegacao' />
            </div>
            <div class='titulo'>
                Perfeito para você começar
            </div>
            <div class='descricao'>
                Nosso cadastro mais popular e que já deu oportunidade a mais de 10.000 pessoas desde 2009.
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
                        <li class='itens'>Assinatura sem vencimento;</li>
                    </ul>
                </div>
                <button id='btn_renova-cadastro-gratuito' class='escolher botao'>Escolher</button>
            </div>
        </div>
    </div>
    <div class='renova_03-premium'>
    <div class='conteiner'>
            <div class='navegacao'>
                <img src='images/voltar.svg' class='voltar-3 botoes_navegacao' />
                <span class='progresso'>2 de 4</span>
                <img src='images/fechar.svg' class='fechar botoes_navegacao' />
            </div>
            <div class='titulo'>
                Mais chances de trabalhar
            </div>
            <div class='descricao'>
                Melhor custo benefício que te deixa em vantagem na hora de ser escolhid$sexo para trabalhos.
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
                <button id='btn_renova-cadastro-premium' class='escolher botao'>Escolher</button>
            </div>
        </div>
    </div>
    <div class='renova_03-profissional'>
    <div class='conteiner'>
            <div class='navegacao'>
                <img src='images/voltar.svg' class='voltar-3 botoes_navegacao' />
                <span class='progresso'>2 de 4</span>
                <img src='images/fechar.svg' class='fechar botoes_navegacao' />
            </div>
            <div class='titulo'>
                Para quem trabalha muito
            </div>
            <div class='descricao'>
                Headshots profissionais, menores taxas, super destaque nas buscas e transferências automáticas de cachês.
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
              <button id='btn_renova-cadastro-profissional' class='escolher botao'>Escolher</button>
            </div>
            </div>
        </div>
    <div class='renova_04'>
      <div class='conteiner'>
        <div class='navegacao'>
          <img src='images/voltar.svg' class='voltar-4 botoes_navegacao' />
          <span class='progresso'>3 de 4</span>
              <img src='images/fechar.svg' class='fechar botoes_navegacao' />
        </div>
        <div class='titulo'>
          Como gostaria de pagar?
        </div>
        <div class='descricao'>
          Parcele em até 10x no cartão ou aproveite as vantagens de utilizar seu Saldo de Cachês a receber.
        </div>
        <div class='botoes'>
          <button class='botao botao_saldo'>Saldo de Cachês</button>
          <button class='botao botao_gateway'>Cartão ou Boleto</button>
        </div>
      </div>
    </div>
    <div class='renova_05'>
      <div class='conteiner'>
        <div class='navegacao'>
          <img src='images/voltar.svg' class='voltar-4 botoes_navegacao' />
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
                <span class='large' id='recebivel'>$recebivel</span>
                <span class='small centavos'>,$recebivel_cents</span>
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
                <span class='small centavos'>,$recebivel_cents</span>
              </div>
            </div>
          </div>
        </div>
        <div class='aviso'>
			<div class='checkbox'>
					<input type='checkbox' id='terms' class='checado' />
                    <img src='images/campo_obrigatorio.svg' class='requerido' />
            </div>
            <div class='declaro x-small'>
                <label for='terms'>Declaro estar ciente dos <a href='#'>Termos do Contrato</a> e concordo em utilizar meu Saldo em Cachês para assinatura do Cadastro <span id='cadastro2'></span>.</label>
            </div>
		</div>
        <div class='botoes'>
          <button class='botao confirmar-saldo'>Confirmar</button>
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
          Nosso contrato foi renovado e enviado, junto com todas as informações, para o seu e-mail cadastrado.
        </div>
      </div>
    </div>
  </div>
</div>";
}
?>
<script src='assets/js/modal.js'></script>
</body>
</html>
<?php
ob_end_flush();
mysqli_close($link);
?>