<?php
require_once 'dbconnect.php';
require_once 'functions.php';

$cpf = $_SESSION['cpf'];
$cpf = mask($cpf,'###.###.###-##');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}

  if (isset($_GET['new_id'])) {
    $_SESSION['user'] = $_GET['new_id'];
  }
	// select loggedin users detail
	$res=mysqli_query($link, "SELECT * FROM tb_elenco WHERE id_elenco=".$_SESSION['user']);
	$userRow=mysqli_fetch_array($res);
  $cpf = $userRow['cpf'];
  $email = $userRow['email'];
if (!empty($_SESSION['nome_responsavel'])) {
     $name = $_SESSION['nome_responsavel'];
}
else {
  $name = $userRow['nome'];
}
  if ($userRow['sexo'] == 'F') {
    $sexo = 'a';
  }
  elseif ($userRow['sexo'] == 'M') {
    $sexo = 'o';
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
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<meta name="viewport" content="width=device-width, user-scalable=no">
<title>Bem-vind<?php echo $sexo; ?> ao PAGME - Pagamento de Agenciados Magneto Elenco</title>
<link rel='stylesheet' href='assets/css/bootstrap.css' type='text/css'  />
<link rel='stylesheet' href='style.css' type='text/css' />
</head>
<body>

  <nav class='navbar navbar-default navbar-fixed-top'>
      <div class='container'>
        <div class='navbar-header'>
          <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' aria-expanded='false' aria-controls='navbar'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
          </button>
          <a class='navbar-brand' href='http://www.magnetoelenco.com.br'><img src='images/logo.svg'></a>
        </div>
        <div id='navbar' class='navbar-collapse collapse'>
          <ul class='nav navbar-nav'>
            <li><a href='home.php'>Como funciona</a></li>
            <li><a href='trabalhos.php'>Meus trabalhos</a></li>
            <li class='active'><a href='dbancarios.php'>Meus dados bancários</a></li>
          </ul>
          <ul class='nav navbar-nav navbar-right'>

            <li class='dropdown'>
              <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>
        <span class='glyphicon glyphicon-user'></span>&nbsp;<?php echo $userRow['nome_artistico']; ?>&nbsp;<span class='caret'></span></a>
              <ul class='dropdown-menu'>
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
                <li><a href='logout.php?logout'><span class='glyphicon glyphicon-log-out'></span>&nbsp;Sair</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div id='wrapper'>
<div class="gradient inicio_login">
  <div class='container'>
<?php
  $id = $_SESSION['user'];
  $result=mysqli_query($link, "SELECT * FROM bank_accounts WHERE id_elenco_financeiro='$id' AND active='1'");
  $row=mysqli_fetch_array($result);
  if (!empty($row['active']) || $row['active'] == '1') {
        $full_name = $row['full_name'];
        $bank_number = $row['bank_number'];
        $bank_name = $row['bank_name'];
        $bank = $bank_number." - ".$bank_name;
        $bank_agency = $row['bank_agency'];
        $bank_account = $row['bank_account'];
    echo "
      <div id='login-form'>
    <form method='post' action='remove_conta.php' autocomplete='off'>

      <div class='col-md-12'>
          <div class='form-group'>
              <h3>Conta bancária cadastrada:</h3>
            </div>

          <div class='form-group'>
              <hr />
            </div>

        <div class='form-group'>
          <p><h5>Nome:</h5></p>
          <div class='input-group'>
            <span class='input-group-addon'><span class='glyphicon glyphicon-user'></span></span>
            <input type='text' name='nome' class='form-control' value='$full_name' disabled />
            </div>
        </div>

        <div class='form-group'>
          <p><h5>CPF:</h5></p>
          <div class='input-group'>
            <span class='input-group-addon'><span class='glyphicon glyphicon-user'></span></span>
            <input type='text' name='cpf' class='form-control' value='$cpf' disabled />
            </div>
        </div>

        <div class='form-group'>
          <p><h5>Banco:</h5></p>
          <div class='input-group'>
            <span class='input-group-addon'><span class='glyphicon glyphicon-piggy-bank'></span></span>
          <input type='text' name='banco' class='form-control' value='$bank' disabled />
            </div>
        </div>

        <div class='form-group'>
          <p><h5>Agência:</h5></p>
          <div class='input-group'>
            <span class='input-group-addon'><span class='glyphicon glyphicon-piggy-bank'></span></span>
            <input type='number' name='agencia' class='form-control' value='$bank_agency' disabled />
            </div>
        </div>

        <div class='form-group'>
          <p><h5>Conta corrente:</h5></p>
          <div class='input-group'>
            <span class='input-group-addon'><span class='glyphicon glyphicon-piggy-bank'></span></span>
            <input type='number' name='conta' class='form-control' value='$bank_account' disabled />
            </div>
        </div>

        <div class='form-group'>
          <button type='submit' class='btn btn-block btn-primary' name='remover' id='remover'>Remover conta cadastrada</button>
        </div>

</div></form></div></div></div>

    <script src='assets/jquery-1.11.3-jquery.min.js'></script>
    <script src='assets/js/bootstrap.min.js'></script>
    <script src='assets/js/gradient.js'></script>

</body>
</html>";
  } else {
?>
  <div id='login-form'>
    <form method='post' action='insere_conta.php' autocomplete='off'>

      <div class='col-md-12'>

          <div class='form-group'>
              <h3>Cadastrar conta bancária:</h3>
            </div>

          <div class='form-group'>
              <hr />
            </div>

            <?php
      if ( isset($errMSG) ) {

        ?>
        <div class='form-group'>
              <div class='alert alert-danger'>
        <span class='glyphicon glyphicon-info-sign'></span> <?php echo $errMSG; ?>
                </div>
              </div>
                <?php
      }
      ?>

        <div class='form-group'>
          <p><h5>Nome:</h5></p>
          <div class='input-group'>
            <span class='input-group-addon'><span class='glyphicon glyphicon-user'></span></span>
            <input type='text' name='nome' class='form-control' value='<?php echo $name; ?>' disabled />
            </div>
        <!-- <span class='text-danger'><?php echo $emailError; ?></span> -->
        </div>

        <div class='form-group'>
          <p><h5>CPF:</h5></p>
          <div class='input-group'>
            <span class='input-group-addon'><span class='glyphicon glyphicon-user'></span></span>
            <input type='text' name='cpf' class='form-control' value='<?php echo $cpf; ?>' disabled />
            </div>
        <!-- <span class='text-danger'><?php echo $emailError; ?></span> -->
        </div>

        <div class='form-group'>
          <p><h5>Banco:</h5></p>
          <div class='input-group'>
            <span class='input-group-addon'><span class='glyphicon glyphicon-piggy-bank'></span></span>
          <select id='banco' name='banco' class='input-group form-control' required>
            <option value='0' disabled selected>Escolha o seu banco</option>
            <option value='001'>001 - Banco do Brasil</option>
            <option value='003'>003 - Banco da Amazônia</option>
            <option value='004'>004 - Banco do Nordeste</option>
            <option value='021'>021 - Banestes</option>
            <option value='025'>025 - Banco Alfa</option>
            <option value='027'>027 - Besc</option>
            <option value='029'>029 - Banerj</option>
            <option value='031'>031 - Banco Beg</option>
            <option value='033'>033 - Banco Santander Banespa</option>
            <option value='036'>036 - Banco Bem</option>
            <option value='037'>037 - Banpará</option>
            <option value='038'>038 - Banestado</option>
            <option value='039'>039 - BEP</option>
            <option value='040'>040 - Banco Cargill</option>
            <option value='041'>041 - Banrisul</option>
            <option value='044'>044 - BVA</option>
            <option value='045'>045 - Banco Opportunity</option>
            <option value='047'>047 - Banese</option>
            <option value='062'>062 - Hipercard</option>
            <option value='063'>063 - Ibibank</option>
            <option value='065'>065 - Lemon Bank</option>
            <option value='066'>066 - Banco Morgan Stanley Dean Witter</option>
            <option value='069'>069 - BPN Brasil</option>
            <option value='070'>070 - Banco de Brasília – BRB</option>
            <option value='072'>072 - Banco Rural</option>
            <option value='073'>073 - Banco Popular</option>
            <option value='074'>074 - Banco J. Safra</option>
            <option value='075'>075 - Banco CR2</option>
            <option value='076'>076 - Banco KDB</option>
            <option value='096'>096 - Banco BMF</option>
            <option value='104'>104 - Caixa Econômica Federal</option>
            <option value='107'>107 - Banco BBM</option>
            <option value='116'>116 - Banco Único</option>
            <option value='151'>151 - Nossa Caixa</option>
            <option value='175'>175 - Banco Finasa</option>
            <option value='184'>184 - Banco Itaú BBA</option>
            <option value='204'>204 - American Express Bank</option>
            <option value='208'>208 - Banco Pactual</option>
            <option value='212'>212 - Banco Matone</option>
            <option value='213'>213 - Banco Arbi</option>
            <option value='214'>214 - Banco Dibens</option>
            <option value='217'>217 - Banco Joh Deere</option>
            <option value='218'>218 - Banco Bonsucesso</option>
            <option value='222'>222 - Banco Calyon Brasil</option>
            <option value='224'>224 - Banco Fibra</option>
            <option value='225'>225 - Banco Brascan</option>
            <option value='229'>229 - Banco Cruzeiro</option>
            <option value='230'>230 - Unicard</option>
            <option value='233'>233 - Banco GE Capital</option>
            <option value='237'>237 - Bradesco</option>
            <option value='241'>241 - Banco Clássico</option>
            <option value='243'>243 - Banco Stock Máxima</option>
            <option value='246'>246 - Banco ABC Brasil</option>
            <option value='248'>248 - Banco Boavista Interatlântico</option>
            <option value='249'>249 - Investcred Unibanco</option>
            <option value='250'>250 - Banco Schahin</option>
            <option value='252'>252 - Fininvest</option>
            <option value='254'>254 - Paraná Banco</option>
            <option value='263'>263 - Banco Cacique</option>
            <option value='265'>265 - Banco Fator</option>
            <option value='266'>266 - Banco Cédula</option>
            <option value='300'>300 - Banco de la Nación Argentina</option>
            <option value='318'>318 - Banco BMG</option>
            <option value='320'>320 - Banco Industrial e Comercial</option>
            <option value='356'>356 - ABN Amro Real</option>
            <option value='341'>341 - Itau</option>
            <option value='347'>347 - Sudameris</option>
            <option value='351'>351 - Banco Santander</option>
            <option value='353'>353 - Banco Santander Brasil</option>
            <option value='366'>366 - Banco Societe Generale Brasil</option>
            <option value='370'>370 - Banco WestLB</option>
            <option value='376'>376 - JP Morgan</option>
            <option value='389'>389 - Banco Mercantil do Brasil</option>
            <option value='394'>394 - Banco Mercantil de Crédito</option>
            <option value='399'>399 - HSBC</option>
            <option value='409'>409 - Unibanco</option>
            <option value='412'>412 - Banco Capital</option>
            <option value='422'>422 - Banco Safra</option>
            <option value='453'>453 - Banco Rural</option>
            <option value='456'>456 - Banco Tokyo Mitsubishi UFJ</option>
            <option value='464'>464 - Banco Sumitomo Mitsui Brasileiro</option>
            <option value='477'>477 - Citibank</option>
            <option value='479'>479 - Itaubank (antigo Bank Boston)</option>
            <option value='487'>487 - Deutsche Bank</option>
            <option value='488'>488 - Banco Morgan Guaranty</option>
            <option value='492'>492 - Banco NMB Postbank</option>
            <option value='494'>494 - Banco la República Oriental del Uruguay</option>
            <option value='495'>495 - Banco La Provincia de Buenos Aires</option>
            <option value='505'>505 - Banco Credit Suisse</option>
            <option value='600'>600 - Banco Luso Brasileiro</option>
            <option value='604'>604 - Banco Industrial</option>
            <option value='610'>610 - Banco VR</option>
            <option value='611'>611 - Banco Paulista</option>
            <option value='612'>612 - Banco Guanabara</option>
            <option value='613'>613 - Banco Pecunia</option>
            <option value='623'>623 - Banco Panamericano</option>
            <option value='626'>626 - Banco Ficsa</option>
            <option value='630'>630 - Banco Intercap</option>
            <option value='633'>633 - Banco Rendimento</option>
            <option value='634'>634 - Banco Triângulo</option>
            <option value='637'>637 - Banco Sofisa</option>
            <option value='638'>638 - Banco Prosper</option>
            <option value='643'>643 - Banco Pine</option>
            <option value='652'>652 - Itaú Holding Financeira</option>
            <option value='653'>653 - Banco Indusval</option>
            <option value='654'>654 - Banco A.J. Renner</option>
            <option value='655'>655 - Banco Votorantim</option>
            <option value='707'>707 - Banco Daycoval</option>
            <option value='719'>719 - Banif</option>
            <option value='721'>721 - Banco Credibel</option>
            <option value='734'>734 - Banco Gerdau</option>
            <option value='735'>735 - Banco Pottencial</option>
            <option value='738'>738 - Banco Morada</option>
            <option value='739'>739 - Banco Galvão de Negócios</option>
            <option value='740'>740 - Banco Barclays</option>
            <option value='741'>741 - BRP</option>
            <option value='743'>743 - Banco Semear</option>
            <option value='745'>745 - Banco Citibank</option>
            <option value='746'>746 - Banco Modal</option>
            <option value='747'>747 - Banco Rabobank International</option>
            <option value='748'>748 - Banco Cooperativo Sicredi</option>
            <option value='749'>749 - Banco Simples</option>
            <option value='751'>751 - Dresdner Bank</option>
            <option value='752'>752 - BNP Paribas</option>
            <option value='753'>753 - Banco Comercial Uruguai</option>
            <option value='755'>755 - Banco Merrill Lynch</option>
            <option value='756'>756 - Banco Cooperativo do Brasil</option>
            <option value='757'>757 - KEB</option>
          </select>
            </div>
        <!-- <span class='text-danger'><?php echo $emailError; ?></span> -->
        </div>

        <div class='form-group'>
          <p><h5>Agência (apenas números, sem DV):</h5></p>
          <div class='input-group'>
            <span class='input-group-addon'><span class='glyphicon glyphicon-piggy-bank'></span></span>
            <input type='number' name='agencia' class='form-control' placeholder='Digite o código da sua agência' required />
            </div>
        <!-- <span class='text-danger'><?php echo $emailError; ?></span> -->
        </div>

        <div class='form-group'>
          <p><h5>Conta corrente (apenas números, com DV):</h5></p>
          <div class='input-group'>
            <span class='input-group-addon'><span class='glyphicon glyphicon-piggy-bank'></span></span>
            <input type='number' name='conta' class='form-control' placeholder='Digite o número da sua conta bancária' required />
            </div>
        <!-- <span class='text-danger'><?php echo $emailError; ?></span> -->
        </div>

        <div class='form-group'>
          <div class='input-group'>
          <p><input type='checkbox' name='aceito' id='aceito' onchange="document.getElementById('cadastrar').disabled = !this.checked;" />&nbsp;Estou ciente das <a href='home.php'>condições</a> e declaro ser o beneficiário da conta acima.</p>
          </div>
        </div>

        <div class='form-group'>
          <button type='submit' class='btn btn-block btn-primary botao' name='cadastrar' id='cadastrar' disabled>Cadastrar conta</button>
        </div>

</div></form></div></div></div>

    <script src='//code.jquery.com/jquery-2.2.4.min.js'></script>
    <script src='assets/js/bootstrap.min.js'></script>
    <script src='assets/js/gradient.js'></script>

</body>
</html>
<?php
}
ob_end_flush();
mysqli_close($link);
?>
