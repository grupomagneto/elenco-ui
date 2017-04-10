<?php
include ("conecta.php");
// session_start();
$array_key = $_POST['array_key'];
$array = $_SESSION['array_busca'];
$nome = $array[$array_key]["nome_artistico"];
$nome = explode(" ", $nome);
$nome = $nome[0];
$idade = $array[$array_key]['idade'];
$arquivo = $array[$array_key]["arquivo"];
$tipo_cadastro_vigente = $array[$array_key]["tipo_cadastro_vigente"];
// if ($tipo_cadastro_vigente == 'Ator') {
//   $tipo_cadastro_vigente = 'Premium';
// }
$id = $array[$array_key]["id"];
$dt_foto = date('d/m/Y', strtotime($array[$array_key]["dt_foto"]));
$sql_contato = "SELECT nome_artistico, tl_celular, endereco, email, bairro, cidade, uf, data_contrato_vigente, TIMESTAMPDIFF(YEAR, data_contrato_vigente, CURDATE()) AS contrato FROM tb_elenco WHERE id_elenco='$id'";
$result_contato = mysqli_query($conexao_index, $sql_contato) or die (alert("Falha na Conexão  ".mysqli_error()));
$row_contato = mysqli_fetch_array($result_contato);
$nome_artistico = $row_contato['nome_artistico'];
$tl_celular = $row_contato['tl_celular'];
$email = $row_contato['email'];
$endereco = strtolower($row_contato['endereco']);
$endereco = ucwords($endereco);
$bairro = strtolower($row_contato['bairro']);
$bairro = ucwords($bairro);
$cidade = $row_contato['cidade'];
$uf = $row_contato['uf'];
// Validade do Contrato
$data_contrato_vigente = $row_contato['data_contrato_vigente'];
$validade_contrato = date('d/m/Y', strtotime('+2 years', strtotime($data_contrato_vigente)));
$today = date('d/m/Y', time());
// if ($validade_contrato > $today) {
//   $validade_contrato = "Ativo até: ".$validade_contrato;
// }
// else {
//   $validade_contrato = "CONTRATO VENCIDO";
// }
if ($row_contato['contrato'] < 2 && $row_contato['contrato'] != NULL) {
  $validade_contrato = "Ativo até: ".$validade_contrato;
}
else {
  $validade_contrato = "CONTRATO VENCIDO";
}
$sql_cadastro = "SELECT SUM(cache_liquido) as doze_meses FROM financeiro WHERE id_elenco_financeiro='$id' AND tipo_entrada='cache' AND data_job >= CURDATE() - INTERVAL 12 MONTH";
// Recebido no último ano
// Gratuito
if ($tipo_cadastro_vigente == 'Gratuito') {
$doze_meses = mysqli_query($conexao_index, $sql_cadastro);
$row = mysqli_fetch_array($doze_meses);
$gratuito = $row['doze_meses'];
$gratuito = number_format($gratuito,2,",",".");
$gratuito_pieces = explode(",", $gratuito);
$gratuito = $gratuito_pieces[0];
$gratuito_cents = $gratuito_pieces[1];
// Estimativa Premium
$premium = $row['doze_meses'] * 1.3333;
$premium = number_format($premium,2,",",".");
$premium_pieces = explode(",", $premium);
$premium = $premium_pieces[0];
$premium_cents = $premium_pieces[1];
// Estimativa Profissional
$profissional = $row['doze_meses'] * 1.5;
$profissional = number_format($profissional,2,",",".");
$profissional_pieces = explode(",", $profissional);
$profissional = $profissional_pieces[0];
$profissional_cents = $profissional_pieces[1];
}
// Premium
if ($tipo_cadastro_vigente == 'Premium' || $tipo_cadastro_vigente == 'Ator') {
$doze_meses = mysqli_query($conexao_index, $sql_cadastro);
$row = mysqli_fetch_array($doze_meses);
$premium = $row['doze_meses'];
$premium = number_format($premium,2,",",".");
$premium_pieces = explode(",", $premium);
$premium = $premium_pieces[0];
$premium_cents = $premium_pieces[1];
// Estimativa Gratuito
$gratuito = $row['doze_meses'] * 0.75;
$gratuito = number_format($gratuito,2,",",".");
$gratuito_pieces = explode(",", $gratuito);
$gratuito = $gratuito_pieces[0];
$gratuito_cents = $gratuito_pieces[1];
// Estimativa Profissional
$profissional = $row['doze_meses'] * 1.125;
$profissional = number_format($profissional,2,",",".");
$profissional_pieces = explode(",", $profissional);
$profissional = $profissional_pieces[0];
$profissional_cents = $profissional_pieces[1];
}
// Profissional
if ($tipo_cadastro_vigente == 'Profissional') {
$doze_meses = mysqli_query($conexao_index, $sql_cadastro);
$row = mysqli_fetch_array($doze_meses);
$profissional = $row['doze_meses'];
$profissional = number_format($profissional,2,",",".");
$profissional_pieces = explode(",", $profissional);
$profissional = $profissional_pieces[0];
$profissional_cents = $profissional_pieces[1];
// Estimativa Gratuito
$gratuito = $row['doze_meses'] * 0.6666;
$gratuito = number_format($gratuito,2,",",".");
$gratuito_pieces = explode(",", $gratuito);
$gratuito = $gratuito_pieces[0];
$gratuito_cents = $gratuito_pieces[1];
// Estimativa Profissional
$premium = $row['doze_meses'] * 0.8888;
$premium = number_format($premium,2,",",".");
$premium_pieces = explode(",", $premium);
$premium = $premium_pieces[0];
$premium_cents = $premium_pieces[1];
}
function mask($val, $mask)
  {
   $maskared = '';
   $k = 0;
   for($i = 0; $i<=strlen($mask)-1; $i++)
   {
   if($mask[$i] == '#')
   {
   if(isset($val[$k]))
   $maskared .= $val[$k++];
   }
   else
   {
   if(isset($mask[$i]))
   $maskared .= $mask[$i];
   }
   }
   return $maskared;
  }
?>


<div class="topbar">
  <div class="container-outline__center">
    <a class="menu-button cursor">
      <button class="close">
       <svg width="23px" height="23px">
          <!-- Generator: Sketch 42 (36781) - http://www.bohemiancoding.com/sketch -->
          <title>Group 2</title>
          <desc>Created with Sketch.</desc>
          <defs>
              <rect id="path-1" x="0" y="0" width="23" height="23"></rect>
              <mask id="mask-2" maskContentUnits="userSpaceOnUse" maskUnits="objectBoundingBox" x="0" y="0" width="23" height="23" fill="white">
                  <use xlink:href="#path-1"></use>
              </mask>
          </defs>
          <g id="zz" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g id="Resultado---Perfil-Copy-3" transform="translate(-20.000000, -76.000000)">
                  <g id="Group-2" transform="translate(20.000000, 76.000000)">
                      <polygon id="Shape" fill="#FFFFFF" points="19.0625 5.9 17.6625 4.5 12.0625 10.1 6.4625 4.5 5.0625 5.9 10.6625 11.5 5.0625 17.1 6.4625 18.5 12.0625 12.9 17.6625 18.5 19.0625 17.1 13.4625 11.5"></polygon>
                      <use id="Rectangle-12" stroke="#FFFFFF" mask="url(#mask-2)" stroke-width="2" xlink:href="#path-1"></use>
                  </g>
              </g>
          </g>
      </svg>
      </button>
    </a>
    <a class="cursor top-name-single font-family color-primary font-medium">
      <?php echo $nome . ', ' . $idade; ?>
    </a>
    <a class="menu-fav cursor">
      <img src="images/menu-fav.svg" />
      <span class="fav-number font-family">1</span>
    </a>
  </div>
</div>


<div class='container-outline__single'>
 
  <section class='intro' id='intro'>
   
    <div class='content'>
      <div class='parent'>
        <div class='container-outline__center'>
          <div class='carousel'>
          <?php
          $sql_foto = "SELECT arquivo FROM tb_foto WHERE cd_elenco='$id' AND cd_tipo_foto<>2 ORDER BY arquivo ASC";
          $result_foto = mysqli_query($conexao_index, $sql_foto) or die (alert("Falha na Conexão  ".mysqli_error()));
          while($row_foto = mysqli_fetch_array($result_foto)){
            $arquivo = $row_foto['arquivo'];
            echo "
              <div class='item'>
                <div class='container-outline__center'>
                  <div class='imageContainer'>
                    <img alt='$nome' class='image__single' src='http://www.magnetoelenco.com.br/fotos/$arquivo' />
                  </div>
                </div>
              </div>";
            }
          ?>
          </div>

        <input type='radio' name='imagefavorita' value='valor da imagem' class='checkbox-single' />
        <button type='submit' class='checkbox-single-action__fav botaofavorita fav' onclick='AddTableRow()'>
          <img src='images/fav-single.svg' alt=''>
        </button>
        <input type='radio' name='imagefavorita' value='valor da imagem' class='checkbox-single' />
        <button type='submit' class='checkbox-single-action__discard botaofavorita fav' onclick='AddTableRow()'>
          <img src='images/discard-single.svg' alt=''>
        </button>

          <div class='legend-after__carousel'>
            <p class='font-family color-primary'>
              <?php echo $cidade."-".$uf; ?>
            </p>
            <p class='font-family color-primary'>
              Foto: <?php echo $dt_foto; ?>
            </p>
          </div>
        </div>
      </div>
    </div>
    
  </section>
  
<div class='container-outline__categories'>
<!-- Início Contato -->
    <section class='intro'>
       <div class="container-outline__content">
        <div class="contact">
          <div class="title-section">
            <img alt="contato" src="images/contato.svg" />
            <p class="font-family font-medium color-primary">
              Contato
            </p>
          </div>
          <div class="content_section">
            <div class="content_contact">
              <h2 class="font-family font-medium color-primary">
                 <?php echo $nome_artistico; ?>
              </h2>
              <table class="table-left">
                <tr>
                  <td>
                    <img src="images/icon-fone.svg" />
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icon-maps.svg" />
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icon-email.svg" />
                  </td>
                </tr>
              </table>
              <span class="after__table-left"><img alt="" src="images/after-redes.svg" /></span>
              <table class="table-right">
                <tr>
                  <td class="font-family color-primary">
                    <?php echo mask($tl_celular, "+## (##) #####-####"); ?>
                  </td>
                </tr>
                <tr>
                  <td class="font-family color-primary">
                    <?php echo $endereco.", ".$bairro; ?>
                  </td>
                </tr>
                <tr>
                  <td class="font-family color-primary">
                    <a href='mailto:<?php echo $email; ?>'><?php echo $email; ?></a>
                  </td>
                </tr>
              </table>
              <h2 class="second-title__contact font-family font-medium color-primary">
                redes sociais
              </h2>
              <ul class="redes-icon__contact">
                <li>
                  <img alt="" src="images/icon-face.svg" />
                </li>
                <li>
                  <img alt="" src="images/icon-insta.svg" />
                </li>
                <li>
                  <img alt="" src="images/icon-twitter.svg" />
                </li>
              </ul>
             <button class="button__contact button button__medium cursor">editar</button>
            </div>
          </div>
        </div>
</div>
    </section>
<!-- Fim Contato -->
<!-- Início Plano Assinatura -->
    <section class='second'>
      <div class="container-outline__content">
        <div class="subscription-plan">
          <div class="title-section">
            <img alt="plano de assinatura" src="images/plano-assinatura.svg" />
            <p class="font-family font-medium color-primary">
              plano de assinatura
            </p>
          </div>
          <div class="content_section">
            <div class="content__subscription-plan">
              <div class="after-title__subscription-plan">
                <h2 class="font-family font-medium color-primary bold">
                  <?php echo $tipo_cadastro_vigente; ?>
                </h2>
                <div class="switch__subscription-plan">
                  <input checked="" class="switch-input" id="mensal" name="plan" type="radio" value="mensal" /><label class="switch-label switch-label-off" for="mensal"> mensal</label><input class="switch-input" id="anual" name="plan" type="radio" value="anual" /><label class="switch-label switch-label-on" for="anual"> anual</label><span class="switch-selection"></span>
                </div>
              </div>
              <div class="change-plan__subscription-plan">
                <p class="font-family font-small color-primary">
                  <?php echo $validade_contrato; ?>
                </p>
                <button class="button button__medium" type="button">Mudar meu Plano</button>
                <p class="font-family font-small color-primary">
                  No último ano, quanto receberia se fosse:
                </p>
                <table class="tabled-curved">
                  <tr>
                    <th class="font-family font-small color-primary">
                      Gratuito
                    </th>
                    <th class="font-family font-small color-primary">
                      Premium
                    </th>
                    <th class="font-family font-small color-primary">
                      Profissional
                    </th>
                  </tr>
                  <tr>
                    <td class="font-family font-small color-primary">
                      R$ <?php if(!empty($gratuito)){echo $gratuito;}else{echo "0";}?>,<?php if(!empty($gratuito_cents)){echo $gratuito_cents;}else{echo "00";}?>
                    </td>
                    <td class="font-family font-small color-primary">
                      R$ <?php if(!empty($premium)){echo $premium;}else{echo "0";}?>,<?php if(!empty($premium_cents)){echo $premium_cents;}else{echo "00";}?>
                    </td>
                    <td class="font-family font-small color-primary">
                      R$ <?php if(!empty($profissional)){echo $profissional;}else{echo "0";}?>,<?php if(!empty($profissional_cents)){echo $profissional_cents;}else{echo "00";}?>
                    </td>
                  </tr>
                </table>
                <div class="tooltiptext font-family color-primary">
                  Melhor Plano para mim
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Fim Plano Assinatura -->
    <section class='third'>
    <?php
      include 'portfolio.php';
    ?>
    </section>

    <section class='fourth'>
    <?php
     include 'caches.php';
    ?>
    </section>

    <section class='fifth'>
    <?php
     include 'jobs.php';
    ?>
    </section>

    <section class='sixth'>
    <?php
     include 'fisicos.php';
    ?>
    </section>

    <section class='seventh'>
    <?php
     include 'popularidade.php';
    ?>
    </section>

    <section class='eighth'>
    <?php
     include 'reputacao.php';
    ?>
    </section>

    <section class='footer__section'>
        <div class='container-outline__content'>
          <a href='#intro'>
            <img src='images/arrow-to-top.svg' alt='arrow-to-top'>
          </a>
          <hr>
          <p class='font-family color-primary'>Magneto Elenco © 2009-2017</p>
        </div>
    </section>

</div>
  
</div>





















