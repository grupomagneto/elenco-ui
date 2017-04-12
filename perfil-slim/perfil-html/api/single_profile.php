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
// Caches
$result = mysqli_query($link, "SELECT id, tipo_entrada, cliente_job, data_job, cache_liquido, status_pagamento, data_pagamento, liberado, request_timestamp FROM financeiro WHERE id_elenco_financeiro='$id' AND tipo_entrada='cache' ORDER BY data_job DESC LIMIT 0, 100");

$primeiro_contrato = mysqli_query($link, "SELECT tipo_cadastro_vigente, data_1o_contrato as primeiro_contrato FROM tb_elenco WHERE id_elenco='$id'");
$row = mysqli_fetch_array($primeiro_contrato);
$primeiro_contrato = date('d/m/y',strtotime($row['primeiro_contrato']));
$tipo_cadastro = $row['tipo_cadastro_vigente'];

$doze_meses = mysqli_query($link, "SELECT SUM(cache_liquido) as doze_meses FROM financeiro WHERE id_elenco_financeiro='$id' AND tipo_entrada='cache' AND data_job >= CURDATE() - INTERVAL 12 MONTH");
$row = mysqli_fetch_array($doze_meses);
$doze_meses = $row['doze_meses'];
$doze_meses = number_format($doze_meses,2,",",".");
$doze_meses_pieces = explode(",", $doze_meses);
$doze_meses = $doze_meses_pieces[0];
$doze_meses_cents = $doze_meses_pieces[1];

$total_gerado = mysqli_query($link, "SELECT SUM(cache_liquido) as liquido FROM financeiro WHERE id_elenco_financeiro='$id' AND tipo_entrada='cache'");
$row = mysqli_fetch_array($total_gerado);
$total_gerado = $row['liquido'];
$total_gerado = number_format($total_gerado,2,",",".");
$total_gerado_pieces = explode(",", $total_gerado);
$total_gerado = $total_gerado_pieces[0];
$total_gerado_cents = $total_gerado_pieces[1];

$n_jobs = mysqli_query($link, "SELECT COUNT(cache_liquido) as qtd FROM financeiro WHERE id_elenco_financeiro='$id' AND tipo_entrada='cache'");
$row = mysqli_fetch_array($n_jobs);
$n_jobs = $row['qtd'];

$indisponivel = mysqli_query($link, "SELECT SUM(cache_liquido) as indisponivel FROM financeiro WHERE id_elenco_financeiro='$id' AND tipo_entrada='cache' AND status_pagamento='0' AND (liberado IS NULL OR liberado='0')");
$row = mysqli_fetch_array($indisponivel);
$indisponivel = $row['indisponivel'];
$indisponivel = number_format($indisponivel,2,",",".");
$indisponivel_pieces = explode(",", $indisponivel);
$indisponivel = $indisponivel_pieces[0];
$indisponivel_cents = $indisponivel_pieces[1];

$recebivel = mysqli_query($link, "SELECT SUM(cache_liquido) as receber FROM financeiro WHERE id_elenco_financeiro='$id' AND tipo_entrada='cache' AND status_pagamento='0' AND liberado='1'");
$row = mysqli_fetch_array($recebivel);
$recebivel = $row['receber'];
$recebivel = number_format($recebivel,2,",",".");
$recebivel_pieces = explode(",", $recebivel);
$recebivel = $recebivel_pieces[0];
$recebivel_cents = $recebivel_pieces[1];
?>
<div class="topbar">
  <div class="container-outline__center">
    <a class="menu-button cursor">
      <button class="close">
       <svg width="23px" height="23px">
          <title><?php echo $nome . ', ' . $idade; ?></title>
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
<!--       <img src="../images/close.svg" /> -->
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

<!-- Slider main container -->
<div class="swiper-container">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
       
<?php
$sql_foto = "SELECT arquivo FROM tb_foto WHERE cd_elenco='$id' AND cd_tipo_foto<>2 ORDER BY arquivo ASC";
$result_foto = mysqli_query($conexao_index, $sql_foto) or die (alert("Falha na Conexão  ".mysqli_error()));
while($row_foto = mysqli_fetch_array($result_foto)){
  $arquivo = $row_foto['arquivo'];
  echo "
  <div class='swiper-slide'>
  <img alt='$nome' class='image__single' src='http://www.magnetoelenco.com.br/fotos/$arquivo' />
  </div>";
}
?>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>
    

        <input type='radio' name='imagefavorita' value='valor da imagem' class='checkbox-single' />
        <button type='submit' class='checkbox-single-action__fav botaofavorita fav' onclick='AddTableRow()'>
          <img src='images/fav-single.svg' alt=''>
        </button>
        <input type='radio' name='imagefavorita' value='valor da imagem' class='checkbox-single' />
        <button type='submit' class='checkbox-single-action__discard botaofavorita fav' onclick='AddTableRow()'>
          <img src='images/discard-single.svg' alt=''>
        </button>

    
    
</div>
 
  <section class='intro' id='intro'>
   
    <div class='content'>
      <div class='parent'>
        <div class='container-outline__center'>
          <div class='legend-after__carousel'>
            <p class='font-family color-primary'>
              <?php echo $cidade."-".$uf; ?>
            </p>
            <p class='font-family color-primary'>
              Foto: <?php echo $dt_foto; ?>
            </p>
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
    <!-- INÍCIO PORTFÓLIO -->
  <section class='third'>
  <div class="container-outline__content">
    <div class="portfolio-section">
      <div class="title-section">
        <img alt="portfolio" src="images/portfolio.svg" />
        <p class="font-family font-medium color-primary">
          portfólio
        </p>
      </div>
      <form action="" id="form__portfolio">
        <div class="content_section">
          <div class="content__portfolio">
            <div class="after-title__portfolio">
              <div class="switch__portfolio">
                <input checked="" class="switch-input" id="videos" name="portfolio" type="radio" value="videos" /><label class="switch-label switch-label-off" for="videos"> Vídeos</label><input class="switch-input" id="fotos" name="portfolio" type="radio" value="fotos" /><label class="switch-label switch-label-on" for="fotos"> Fotos</label><span class="switch-selection"></span>
              </div>
              <div class="carousel-portfolio" id="video-portfolio">
                <div class="item">
                  <div class="container-outline__center">
                    <div class="imageContainer">
                      <video class="vid1 video-js vjs-default-skin vjs-big-play-centered" controls="" data-setup="{ &quot;vid1&quot;: true }" poster=" images/poster-video.svg" preload="auto" src="http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4"></video>
                      <img alt="" class="img_portfolio" src="images/elenco_019589_20160913140545.jpg" />
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="container-outline__center">
                    <div class="imageContainer">
                      <video class="vid1 video-js vjs-default-skin vjs-big-play-centered" controls="" data-setup="{ &quot;vid2&quot;: true }" poster=" images/poster-video.svg" preload="auto" src="http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4"></video>
                      <img alt="" class="img_portfolio" height="200" src="images/elenco_019589_20160913140545.jpg" width="200" />
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="container-outline__center">
                    <div class="imageContainer">
                      <video class="vid1 video-js vjs-default-skin vjs-big-play-centered" controls="" data-setup="{ &quot;vid3&quot;: true }" poster=" images/poster-video.svg" preload="auto" src="http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4"></video>
                      <img alt="" class="img_portfolio" height="200" src="images/elenco_019589_20160913140545.jpg" width="200" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="button-portfolio">
                <button class="button button__medium" type="button">Editar</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  </section>
  <!-- FIM PORTFÓLIO -->
  <!-- INÍCIO CACHÊS -->
  <section class='fourth'>
  <div class="container-outline__content">
    <div class="cache-section">
      <div class="title-section">
        <img alt="cache" src="images/cache.svg" />
        <p class="font-family font-medium color-primary">
          cachês
        </p>
      </div>
      <div class="content_section">
        <div class="content__cache">
          <div class="after-title__cache">
            <h2 class="font-family font-medium color-primary">
              Total de cachês
            </h2>
            <div class="total-cache">
              <div class="total-cache__box">
                <p class="font-family font-small color-primary">
                  últimos 12 meses
                </p>
                <p class="font-family font-medium color-primary">
                  <span>R$</span> 2.507,<sup>00</sup>
                </p>
              </div>
              <div class="total-cache__box">
                <p class="font-family font-small color-primary">
                  desde 11/12/2012
                </p>
                <p class="font-family font-medium color-primary">
                  <span>R$</span> 12.568,<sup>00</sup>
                </p>
              </div>
            </div>
            <h2 class="font-family font-medium color-primary">
              A receber
            </h2>
            <div class="areceber-cache">
              <div class="areceber__box">
                <p class="font-family font-small color-primary">
                  disponível
                </p>
                <p class="font-family font-medium color-primary">
                  <span>R$</span> 1980,<sup>00</sup>
                </p>
              </div>
              <div class="areceber__box">
                <p class="font-family font-small color-primary">
                  não disponível
                </p>
                <p class="font-family font-medium color-disable">
                  <span>R$</span> 527,<sup>00</sup>
                </p>
              </div>
            </div>
            <div class="button-cache">
              <button class="button button__medium" type="button">Retirar dinheiro</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>
  <!-- FIM CACHÊS -->
  <!-- INÍCIO JOBS -->
  <section class='fifth'>
  <div class="container-outline__content">
    <div class="jobs-section">
      <div class="title-section">
        <img alt="jobs" src="images/jobs.svg" />
        <p class="font-family font-medium color-primary">
          meus jobs
        </p>
      </div>
      <div class="content_section">
        <div class="content__jobs">
          <div class="after-title__jobs">
            <h2 class="font-family font-medium color-primary">
              Total: 16 trabalho(s)
            </h2>
          </div>
          <div class="my-jobs__box">
            <table class="table-menu-jobs">
              <tr>
                <td>
                  <div class="title-jobs font-family color-primary">
                    <p class="bold">
                      Banco do Brasil
                    </p>
                    <p>
                      Data do trabalho
                    </p>
                  </div>
                  <div class="values-jobs font-family color-primary">
                    <p class="bold">
                      R$ 1980,00
                    </p>
                    <p>
                      19/06/2016
                    </p>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="title-jobs font-family color-primary">
                    <p class="bold">
                      Ministério da Saúde
                    </p>
                    <p>
                      Data do trabalho
                    </p>
                  </div>
                  <div class="values-jobs font-family color-primary">
                    <p class="bold">
                      R$ 300,00
                    </p>
                    <p>
                      19/06/2016
                    </p>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="title-jobs font-family color-primary">
                    <p class="bold">
                      Ministério da Saúde
                    </p>
                    <p>
                      Data do trabalho
                    </p>
                  </div>
                  <div class="values-jobs font-family color-primary">
                    <p class="bold">
                      R$ 300,00
                    </p>
                    <p>
                      19/06/2016
                    </p>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="title-jobs font-family color-primary">
                    <p class="bold">
                      Ministério da Saúde
                    </p>
                    <p>
                      Data do trabalho
                    </p>
                  </div>
                  <div class="values-jobs font-family color-primary">
                    <p class="bold">
                      R$ 300,00
                    </p>
                    <p>
                      19/06/2016
                    </p>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="title-jobs font-family color-primary">
                    <p class="bold">
                      Ministério da Saúde
                    </p>
                    <p>
                      Data do trabalho
                    </p>
                  </div>
                  <div class="values-jobs font-family color-primary">
                    <p class="bold">
                      R$ 300,00
                    </p>
                    <p>
                      19/06/2016
                    </p>
                  </div>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>
<!-- FIM JOBS -->
<!-- INÍCIO FÍSICOS -->
    <section class='sixth'>
  <div class="container-outline__content">
    <div class="physical-section">
      <div class="title-section">
        <img alt="fisico" src="images/fisico.svg" />
        <p class="font-family font-medium color-primary">
          atributos físicos
        </p>
      </div>
      <div class="content_section">
        <div class="content__physical">
          <div class="physical">
            <div class="physical__box">
              <img alt="" src="images/icon-female.svg" />
              <p class="font-family font-medium color-primary">
                63 kg
              </p>
              <p class="font-family font-medium color-primary">
                174 cm
              </p>
            </div>
            <div class="physical__box">
              <img alt="" src="images/icon-roupa.svg" />
              <p class="font-family font-medium color-primary">
                38/40
              </p>
              <img alt="" src="images/icon-sapato.svg" />
              <p class="font-family font-medium color-primary">
                39
              </p>
            </div>
          </div>
          <div class="physical-description">
            <div class="physical-description__box">
              <div class="physical-description__box_left">
                <p class="font-family font-small color-primary">
                  busto
                </p>
                <p class="font-family font-small color-primary">
                  cintura
                </p>
                <p class="font-family font-small color-primary">
                  quadril
                </p>
              </div>
              <div class="physical-description__box_right">
                <p class="font-family font-small color-primary">
                  82cm
                </p>
                <p class="font-family font-small color-primary">
                  66cm
                </p>
                <p class="font-family font-small color-primary">
                  97cm
                </p>
              </div>
            </div>
            <div class="physical-description__box">
              <div class="physical-description__box_left">
                <p class="font-family font-small color-primary">
                  cabelo
                </p>
              </div>
              <div class="physical-description__box_right">
                <p class="font-family font-small color-primary">
                  cacheado
                </p>
                <p class="font-family font-small color-primary">
                  castanho
                </p>
                <p class="font-family font-small color-primary">
                  médio
                </p>
              </div>
            </div>
          </div>
          <div class="physical-description-bottom">
            <div class="physical-description-bottom__box">
              <div class="physical-description-bottom__box_left">
                <p class="font-family font-small color-primary">
                  olhos
                </p>
              </div>
              <div class="physical-description-bottom__box_right">
                <p class="font-family font-small color-primary">
                  castanho
                </p>
                <p class="font-family font-small color-primary">
                  escuro
                </p>
              </div>
            </div>
            <div class="physical-description-bottom__box">
              <div class="physical-description-bottom__box_left">
                <p class="font-family font-small color-primary">
                  tatto
                </p>
              </div>
              <div class="physical-description-bottom__box_right">
                <p class="font-family font-small color-primary">
                  perna,
                </p>
                <p class="font-family font-small color-primary">
                  braço,
                </p>
                <p class="font-family font-small color-primary">
                  costas,
                </p>
                <p class="font-family font-small color-primary">
                  tórax
                </p>
              </div>
            </div>
          </div>
          <div class="button-physical">
            <button class="button button__medium" type="button">Editar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
    </section>
<!-- FIM FÍSICOS -->
<!-- INÍCIO POPULARIDADE -->
    <section class='seventh'>
  <div class="container-outline__content">
    <div class="popular">
      <div class="title-section">
        <img alt="popularidade" src="images/popularidade.svg" />
        <p class="font-family font-medium color-primary">
          popularidade
        </p>
      </div>
      <div class="content_section">
        <div class="content_popular">
          <div class="popular__graph">
            <h2 class="font-family font-medium color-primary">
              pontencial de empatia
            </h2>
            <div class="circle-graph" data-percent="70">
              <p class="font-family font-medium color-primary">
                70%
              </p>
            </div>
          </div>
          <div class="popular__graph__box_right">
            <p class="font-family font-medium color-primary">
              Mulheres
            </p>
            <p class="font-family font-medium color-primary">
              25-34 anos
            </p>
            <p class="font-family font-medium color-primary">
              Alta renda
            </p>
          </div>
          <div class="popular__dados">
            <h2 class="second-title__popular font-family font-medium color-primary">
              Indicadores Sociais
            </h2>
            <table class="popular-table-left">
              <tr>
                <td>
                  <img src="images/icon-jobs.svg" />
                </td>
              </tr>
              <tr>
                <td>
                  <img src="images/icon-casting.svg" />
                </td>
              </tr>
              <tr>
                <td>
                  <img src="images/icon-views.svg" />
                </td>
              </tr>
              <tr>
                <td>
                  <img src="images/icon-redes.svg" />
                </td>
              </tr>
            </table>
            <span class="popular-after__table-left"><img alt="" src="images/after-redes.svg" /></span>
            <table class="popular-table-right">
              <tr>
                <td class="font-family color-primary">
                  <span class="bold">51</span>Trabalhos realizados
                </td>
              </tr>
              <tr>
                <td class="font-family color-primary">
                  <span class="bold">200</span>Participações em Castings
                </td>
              </tr>
              <tr>
                <td class="font-family color-primary">
                  <span class="bold">2036</span>Visualizações em Perfil
                </td>
              </tr>
              <tr>
                <td class="font-family color-primary">
                  <span class="bold">3567</span>Conexões Sociais
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
    </section>
<!-- FIM POPULARIDADE -->
<!-- INÍCIO REPUTAÇÃO -->
    <section class='eighth'>
  <div class="container-outline__content">
    <div class="reputation">
      <div class="title-section">
        <img alt="reputacao" src="images/reputacao.svg" />
        <p class="font-family font-medium color-primary">
          Reputação
        </p>
      </div>
      <div class="content_section">
        <div class="content_rating">
          <img alt="" src="images/star-preenchida.svg" />
          <h2 class="font-family font-medium color-primary">
            3,7
          </h2>
          <p class="font-famil color-primary">
            34 avaliações
          </p>
        </div>
        <div class="container__rating-left">
          <img alt="" src="images/after-redes.svg" />
        </div>
        <div class="rating">
          <input id="star5" name="rating" type="radio" value="5" /><label for="star5"> 5 stars</label><input id="star4" name="rating" type="radio" value="4" /><label for="star4"> 4 stars</label><input id="star3" name="rating" type="radio" value="3" /><label for="star3"> 3 stars</label><input id="star2" name="rating" type="radio" value="2" /><label for="star2"> 2 stars</label><input id="star1" name="rating" type="radio" value="1" /><label for="star1"> 1 star</label>
        </div>
        <div class="rating-two">
          <input id="star25" name="ratingsympathy" type="radio" value="5" /><label for="star25">  5 stars</label><input id="star24" name="ratingympathy" type="radio" value="4" /><label for="star24"> 4 stars</label><input id="star23" name="ratingsympathy" type="radio" value="3" /><label for="star23">  3 stars</label><input id="star22" name="ratingsympathy" type="radio" value="2" /><label for="star22">  2 stars</label><input id="star21" name="ratingsympathy" type="radio" value="1" /><label for="star21">  1 star</label>
        </div>
        <div class="rating-three">
          <input id="star35" name="ratingsympathy" type="radio" value="5" /><label for="star35">  5 stars</label><input id="star34" name="ratingympathy" type="radio" value="4" /><label for="star34"> 4 stars</label><input id="star33" name="ratingsympathy" type="radio" value="3" /><label for="star33">  3 stars</label><input id="star32" name="ratingsympathy" type="radio" value="2" /><label for="star32">  2 stars</label><input id="star31" name="ratingsympathy" type="radio" value="1" /><label for="star31">  1 star</label>
        </div>
        <div class="container__rating-right">
          <p class="font-family font-small color-primary">
            Popularidade
          </p>
          <p class="font-family font-small color-primary">
            Simpatia
          </p>
          <p class="font-family font-small color-primary">
            Desenvoltura
          </p>
        </div>
      </div>
    </div>
  </div>
    </section>
<!-- FIM REPUTAÇÃO -->
    <section class='footer__section'>
        <div class='container-outline__content'>
          <a href='#intro'>
            <img src='images/arrow-to-top.svg' alt='arrow-to-top'>
          </a>
          <hr>
          <p class='font-family color-primary'>Magneto Elenco © 2009-<?php echo $year; ?></p>
        </div>
    </section>
</div>
</div>





















