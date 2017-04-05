<?php
include ("api/conecta.php");
$ranger_age = $_POST['ranger_age'];
if ($ranger_age[1] != ';') {
    $age1 =  $ranger_age[0];
    $age1 .=  $ranger_age[1];
    $age2 =  $ranger_age[3];
    if (isset($ranger_age[4])) {
      $age2 .=  $ranger_age[4];
    }
}
elseif ($ranger_age[1] == ';') {
    $age1 =  $ranger_age[0];
    $age2 =  $ranger_age[2];
    if (isset($ranger_age[3])) {
        $age2 .=  $ranger_age[3];
    }
}
$sql = "SELECT * FROM (SELECT id_elenco AS id, nome_artistico, sexo, bairro, cd_pele, tl_celular, TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) AS idade, tipo_cadastro_vigente FROM tb_elenco WHERE TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= '$age1' AND TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) <= '$age2'";
if (isset($_POST['gender'])) {
  $gender = $_POST['gender'];
  $sql .= " AND sexo='$gender'";
}
if (isset($_POST['bairro']) ) {
  $bairro = $_POST['bairro'];
  $sql .= " AND bairro='$bairro'";
}
if ($_POST['raca_index'] != 0) {
  $raca_index = $_POST['raca_index'];
  $sql .= " AND cd_pele='$raca_index'";
}

$sql .= ") t1 INNER JOIN (SELECT cd_elenco AS id, arquivo, dt_foto FROM tb_foto WHERE cd_tipo_foto = '1' ORDER BY dh_cadastro ASC) t2 USING (id) GROUP BY id ORDER BY dt_foto DESC";

$res = mysqli_query($conexao_index, $sql) or die (alerta("Falha na Conexão  ".mysqli_error()));

$count = mysqli_num_rows($res);

$array_profissional = array();
$array_premium = array();
$array_gratuito = array();

while($row = mysqli_fetch_array($res)) {
  if ($row['tipo_cadastro_vigente'] == 'Profissional') {
    $addarray1 = array(
    'id' => $row['id'],
    'nome_artistico' => $row['nome_artistico'],
    'arquivo' => $row['arquivo'],
    'tipo_cadastro_vigente' => $row['tipo_cadastro_vigente'],
    'idade' => $row['idade'],
    'dt_foto' => $row['dt_foto']
    );
    array_push($array_profissional, $addarray1);
    $cadastro1 = array();
    foreach ($array_profissional as $key => $value){
      $cadastro1[$key] = $value['dt_foto'];
    }
    array_multisort($cadastro1, SORT_DESC, $array_profissional);
  }
  elseif ($row['tipo_cadastro_vigente'] == 'Premium' || $row['tipo_cadastro_vigente'] == 'Ator') {
    $addarray2 = array(
    'id' => $row['id'],
    'nome_artistico' => $row['nome_artistico'],
    'arquivo' => $row['arquivo'],
    'tipo_cadastro_vigente' => $row['tipo_cadastro_vigente'],
    'idade' => $row['idade'],
    'dt_foto' => $row['dt_foto']
    );
    array_push($array_premium, $addarray2);
    $cadastro2 = array();
    foreach ($array_premium as $key => $value){
      $cadastro2[$key] = $value['dt_foto'];
    }
    array_multisort($cadastro2, SORT_DESC, $array_premium);
  }
  elseif ($row['tipo_cadastro_vigente'] == 'Gratuito') {
    $addarray3 = array(
    'id' => $row['id'],
    'nome_artistico' => $row['nome_artistico'],
    'arquivo' => $row['arquivo'],
    'tipo_cadastro_vigente' => $row['tipo_cadastro_vigente'],
    'idade' => $row['idade'],
    'dt_foto' => $row['dt_foto']
    );
    array_push($array_gratuito, $addarray3);
    $cadastro3 = array();
    foreach ($array_gratuito as $key => $value){
      $cadastro3[$key] = $value['dt_foto'];
    }
    array_multisort($cadastro3, SORT_DESC, $array_gratuito);
  }
}
$array = array();
foreach ($array_profissional as $key => $value) {
  array_push($array, $value);
}
foreach ($array_premium as $key => $value) {
  array_push($array, $value);
}
foreach ($array_gratuito as $key => $value) {
  array_push($array, $value);
}
$_SESSION['array_busca'] = $array;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Perfil</title>
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <link rel="stylesheet" href="stylesheets/ion.rangeSlider.css">
  <link rel="stylesheet" href="stylesheets/ion.rangeSlider.skinFlat.css">
  <link rel="stylesheet" href="stylesheets/bootstrap-glyphicons.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="stylesheets/slick.css">
  <link rel="stylesheet" href="stylesheets/slick-theme.css">
  <link rel="stylesheet" href="stylesheets/contato.css">
  <link rel="stylesheet" href="stylesheets/assinatura.css">
  <link rel="stylesheet" href="stylesheets/portfolio.css">
  <link rel="stylesheet" href="stylesheets/caches.css">
  <link rel="stylesheet" href="stylesheets/jobs.css">
  <link rel="stylesheet" href="stylesheets/fisicos.css">
  <link rel="stylesheet" href="stylesheets/popularidade.css">
  <link rel="stylesheet" href="stylesheets/reputacao.css">
  <link rel="stylesheet" href="stylesheets/newsite.css">
</head>
<body>

<div class="background__single">
    
<div class="photo__single"></div>
    
<div class="gradient">
  <div class="container-outline__content">
    <div class="topbar">
      <div class="container-outline__center">
        <a class="menu-button cursor">
          <img src="images/menu.svg" />
        </a>
        <a class="logo cursor">
          <img src="images/logo.svg" />
        </a>
        <a class="menu-fav cursor">
          <img src="images/menu-fav.svg" />
          <span class="fav-number font-family">1</span>
        </a>
      </div>
    </div>
    <div class="fullscreen-menu">
      <div class="mask">
        <div class="container-outline__center">
          <span class="arrow-up">
            <form action="#">
              <div class="content-menu-trigger">
                <table class="table-menu">
                  <tr>
                    <td>
                      <a class="font-family color-primary cursor" href="">
                        <img alt="busca" src="images/search.svg" />
                        <p>
                          Busca
                        </p>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <a class="font-family color-primary cursor" href="">
                        <img alt="jobs" src="images/jobs.svg" />
                        <p>
                          Meus Jobs
                        </p>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <a class="font-family color-primary cursor" href="">
                        <img alt="notificação" src="images/notification.svg" />
                        <p>
                          Notificações
                        </p>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <a class="font-family color-primary cursor" href="">
                        <img alt="perfil" src="images/perfil.svg" />
                        <p>
                          Meu Perfil
                        </p>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <a class="font-family color-primary cursor" href="">
                        <img alt="configurar" src="images/configuration.svg" />
                        <p>
                          Configurações
                        </p>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <a class="font-family color-primary cursor" href="">
                        <img alt="sair" src="images/logout.svg" />
                        <p>
                          Sair
                        </p>
                      </a>
                    </td>
                  </tr>
                </table>
              </div>
            </form>
          </span>
        </div>
      </div>
    </div>
    <div class="fullscreen-menu-fav">
      <div class="mask-fav">
        <div class="container-outline__center">
          <span class="arrow-up-fav">
            <form action="#">
              <div class="content-menu-fav container-outline__center">
                <div class="top-menu-fav-left">
                  <img alt="" src="images/jobs.svg" />
                  <p class="bold font-family color-primary">
                    criar job
                  </p>
                </div>
                <div class="top-menu-fav-right">
                  <div class="top-menu-fav-right__picture">
                    <img alt="" src="images/criar-jogo.svg" />
                    <p class="bold font-family color-primary">
                      criar jogo
                    </p>
                  </div>
                  <div class="top-menu-fav-right__picture">
                    <img alt="" src="images/encaminhar.svg" />
                    <p class="bold font-family color-primary">
                      encaminhar
                    </p>
                  </div>
                </div>
                <div class="perfil-fav">
                  <table class="table-menu-fav">
                  </table>
                </div>
              </div>
            </form>
          </span>
        </div>
      </div>
    </div>
    <div class="middle">
      <div class="container-outline__center">
        <div class="wrapper">
            <div class="container">

<?php
foreach ($array as $key => $value) {
  $nome = $array[$key]["nome_artistico"];
  $nome = explode(" ", $nome);
  $nome = $nome[0];
  $idade = $array[$key]['idade'];
  $arquivo = $array[$key]["arquivo"];
  $id = $array[$key]["id"];
  echo "
<div class='box animated'>
  <div class='tab__box'>
    <div class='tab-actions tab-actions__multiples'>

      <form method='post' action='#' id='like_$key'>
      <input type='radio' name='imagefavorita' value='$key' class='checkbox-multiples' />
      <button type='submit' class='checkbox-multiples-action__fav botaofavorita fav' onclick='AddTableRow()'>
      <img class='checkbox-multiples-img__fav' src='images/fav-icon.svg' alt=''>
      </button>
      </form>

      <form method='post' action='#' id='dislike_$key'>
      <input type='radio' name='imagediscard' value='$key' class='checkbox-multiples' />
      <button type='submit' class='checkbox-multiples-action__discard botaodiscard discard'>
      <img src='images/discard-icon.svg' alt=''>
      </button>
      </form>

      <img alt='discard' class='discard-action cursor' src='images/discard.svg' />
      <img alt='fav' class='fav-action cursor' src='images/fav.svg' />
      <p class='subtitle font-family color-primary font-small cursor'>
      $nome, $idade
      </p>

      <form method='post' action='#' id='single_$key'>
      <button type='submit' class='checkbox-image-action__fav'>
      <input type='hidden' name='array_key' value='$key' class='checkbox-image__background' />
      <img class='tab-image__background' src='http://www.magnetoelenco.com.br/fotos/$arquivo' />
      </button>
      </form>

      <button type='button' class='dislike'>
      <img alt='overlay discard' src='images/discard-single.svg' />
      </button>

      <button type='button' class='like'>
      <img alt='overlay fav' src='images/fav-single.svg' />
      </button>

    </div>
  </div>
</div>";
}
?>
        </div>
    </div>
    </div>
</div>
    <div class="container-outline__center">
      <div class="footer">
        <div class="bottombar">
          <div class="container-outline__center">
            <a class="menu-search cursor" id="menu-link">
              <div class="search" id="search">
                <img src="images/search.svg" />
                <p class="font-family color-primary">
                  <?php echo $count." perfis"; ?>
                </p>
              </div>
            </a>
            <p class="font-family color-primary" id="perfil-name">
              <?php echo $nome.", ".$idade; ?>
            </p>
          <footer class="tabs">
            <button class="show-list-single">
            <?php
              include "images/show-list-single.svg";
            ?>
            </button>
            <button class="show-list">
            <?php
              include "images/show-list.svg";
            ?>
            </button>
            <button class="hide-list">
            <?php
              include "images/hide-list.svg";
            ?>
            </button>
          </footer>
          </div>
        </div>
        <div class="fullscreen-menu-search">
          <div class="mask-search">
            <form action="">
              <div class="content-menu-search">
                <div class="container-outline__center">
                  <div class="search-menu">
                    <input class="font-family color-primary" name="search" placeholder="Parâmetros da Busca:" type="text" />
                  </div>
                  <div class="gender_age-group">
                    <p class="title-menu font-family color-primary">
                      Sexo:
                    </p>
                    <input id="male" name="gender" type="radio" value="male" />
                    <label class="gender-cc male" for="male"></label>
                    <input id="female" name="gender" type="radio" value="female" /><label class="gender-cc female" for="female"></label>
                  </div>
                  <div class="ranger-slide">
                    <p class="font-family color-primary">
                      Faixa etária:
                    </p>
                    <input class="js-range-slider" name="ranger" type="text" value="" />
                  </div>
                  <div class="after-ranger-slide__search">
                    <p class="font-family color-primary">
                      Cor da pele: <span class="font-family color-primary bold">Branca</span>
                    </p>
                    <p class="font-family color-primary">
                      Bairro: <span class="font-family color-primary bold">Lago Norte</span>
                    </p>
                    <button class="button button__small" type="button"> Alterar</button>
                  </div>
                  <div class="title__order-perfil">
                    <span class="glyphicon glyphicon-sort" />
                    <p class="font-family color-primary">
                      Exibir primeiro perfis:
                    </p>
                    <hr />
                  </div>
                  <div class="button__order-perfil">
                    <div class="switch-field font-family">
                      <input checked="" id="switch_left" name="order" type="radio" value="yes" />
                      <label class="button button__small" for="switch_left"> Mais avaliados</label>
                      <input id="switch_right" name="order" type="radio" value="no" />
                      <label class="button button__small" for="switch_right"> Mais novos</label>
                    </div>
                  </div>
                  <div class="arrow-down"></div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="javascripts/slick.min.js"></script>
<script src="javascripts/jquery.easing.min.js"></script>
<script src="javascripts/ion.rangeSlider.min.js"></script>
<script src="javascripts/jquery.easy-pie-chart.js"></script>
<script src="javascripts/all.js"></script>
<script>

  $(document).ready(function() {
      document.getElementById('dislike').style.display = 'none';
      document.getElementById('like').style.display = 'none';
      $(".box-multiple").click(function(){
        document.getElementById("menu-link").style.display = "block";
        document.getElementById("perfil-name").style.display = "none";
        document.getElementById("single-perfil").style.display = "none";
      });
  });

  $('.show-list-single').click(function(){
    $('.container').css('display', 'block');
    $(".photo__single").css('display', 'none');
    $('.container-outline__single').css('display', 'none');
    $('.wrapper').addClass('list-mode-single');
    $('.wrapper').removeClass('list-mode');
  });

  $('.show-list').click(function(){
    $('.container').css('display', 'block');
    $(".photo__single").css('display', 'none');
    $('.container-outline__single').css('display', 'none');
    $('.wrapper').removeClass('list-mode-single');
    $('.wrapper').addClass('list-mode');
    $('.checkbox-multiples-action__fav img').css('display', 'block');
    $('.checkbox-multiples-action__discard img').css('display', 'block');
    $('.dislike').css('display', 'none');
    $('.like').css('display', 'none');
    $('.container-outline__categories').css('display', 'none');
  });

  $('.hide-list').click(function(){
    $('.container').css('display', 'block');
    $(".photo__single").css('display', 'none');
    $('.container-outline__single').css('display', 'none');
    $('.wrapper').removeClass('list-mode-single');
    $('.wrapper').removeClass('list-mode');
    $('.checkbox-multiples-action__fav img').css('display', 'block');
    $('.checkbox-multiples-action__discard img').css('display', 'block');
    $('.dislike').css('display', 'none');
    $('.like').css('display', 'none');
    $('.container-outline__categories').css('display', 'none');
  });

  $(".dislike").click(function(){
      $(".wrapper.list-mode-single .box:last-child").addClass('fadeOutLeft');
    $(this).one("webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend",
                function(event) {
      // Do something when the transition ends
      $(".wrapper.list-mode-single .box:last-child").remove();
    });
  });

  $(".like").click(function(){
      $(".wrapper.list-mode-single .box:last-child").addClass('fadeOutRight');
    $(this).one("webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend",
                function(event) {
      // Do something when the transition ends
      $(".wrapper.list-mode-single .box:last-child").remove();
    });
  });

</script>
<script src="javascripts/ajax.js"></script>

</body>
</html>
