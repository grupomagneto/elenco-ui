<?php
require_once 'config.php';
$id = $_SESSION['id'];
include('conecta.php');
date_default_timezone_set('America/Sao_Paulo');
$per_page=2;
$vote_time_start = microtime(true);
if (isset($_GET['game_ID'])) { $game_ID = $_GET['game_ID']; }
else { $game_ID = 8412; }
$sql_id = "SELECT voter_facebook_ID FROM tb_votes WHERE game_ID = '$game_ID' AND voter_facebook_ID = '$id' LIMIT 1";
$result_id = mysqli_query($link2, $sql_id);
$row_id = mysqli_fetch_array($result_id);
$registered_vote = $row_id['voter_facebook_ID'];

$sql03 = "SELECT COUNT(candidate_elenco_ID) AS total FROM tb_games WHERE game_ID = '$game_ID'";
$result03 = mysqli_query($link2, $sql03);
$row03 = mysqli_fetch_array($result03);
$total_records = $row03['total'];

// PROGRESS BAR
$left_pages = $total_records;
$total_progress = 1;
while ($left_pages > 1){
  $left_pages = ceil($left_pages/$per_page);
  $total_progress = $total_progress + $left_pages;
}
if (isset($_GET['progress'])) {
  $current_progress = $_GET['progress'];
} else {
  $current_progress = 1;
}

if ($registered_vote == $id) { // SE JÁ VOTOU
  if (isset($_GET['page']) && isset($_GET['level'])) {
    $sql_question = "SELECT question, role, client, campaign FROM tb_games WHERE game_ID = '$game_ID' limit 1";
    $result_question = mysqli_query($link2, $sql_question);
    $row_question = mysqli_fetch_array($result_question);
      $question = $row_question['question'];
      $role = $row_question['role'];
      $client = $row_question['client'];
      $campaign = $row_question['campaign'];
    $page = $_GET['page'];
    $level = $_GET['level'];
    if ($level == 1){ // SE JÁ TERMINOU DE VOTAR
      include('result.php');
    } else {
    if ($level == 0) { // PRIMEIRO NÍVEL DE VOTAÇÃO
      
      $start_from = ($page-1) * $per_page;

      $sql01 = "SELECT id candidate_elenco_ID, arquivo foto_01 FROM (SELECT candidate_elenco_ID id FROM tb_games WHERE game_ID = '$game_ID' LIMIT $start_from, 1) T1 INNER JOIN (SELECT arquivo, cd_elenco id FROM tb_foto ORDER BY dh_cadastro ASC) T2 USING (id) LIMIT 0, 1";
      $result01 = mysqli_query($link2, $sql01);
      $row01 = mysqli_fetch_array($result01);
        $foto01 = $row01['foto_01'];
        $candidate_elenco_ID_1 = $row01['candidate_elenco_ID'];

      $start_from++;

      $sql02 = "SELECT id candidate_elenco_ID, arquivo foto_02 FROM (SELECT candidate_elenco_ID id FROM tb_games WHERE game_ID = '$game_ID' LIMIT $start_from, 1) T1 INNER JOIN (SELECT arquivo, cd_elenco id FROM tb_foto ORDER BY dh_cadastro ASC) T2 USING (id) LIMIT 0, 1";
      $result02 = mysqli_query($link2, $sql02);
      $row02 = mysqli_fetch_array($result02);
      $foto02 = $row02['foto_02'];
      $candidate_elenco_ID_2 = $row02['candidate_elenco_ID'];

      $total_pages = ceil($total_records/$per_page);

      $max_level = 1;
      $candidate_number = $total_records;
      while ($candidate_number > 2) {
        $candidate_number = ceil($candidate_number/$per_page);
        $max_level++;
      }
        $newpage = $page + 1;
        if ($page <= $total_pages) {
          $write_level = $max_level;
          }
    } else { // FASES FINAIS DE VOTAÇÃO
      $start_from = ($page-1) * $per_page;

      $sql01 = "SELECT id candidate_elenco_ID, arquivo foto_01 FROM (SELECT winner_candidate_ID id FROM tb_votes WHERE game_ID = '$game_ID' AND level = '$level' AND voter_facebook_ID = '$id' LIMIT $start_from, 1) T1 INNER JOIN (SELECT arquivo, cd_elenco id FROM tb_foto ORDER BY dh_cadastro ASC) T2 USING (id) LIMIT 0, 1";
      $result01 = mysqli_query($link2, $sql01);
      $row01 = mysqli_fetch_array($result01);
      $foto01 = $row01['foto_01'];
      $candidate_elenco_ID_1 = $row01['candidate_elenco_ID'];

      $start_from++;

      $sql02 = "SELECT id candidate_elenco_ID, arquivo foto_02 FROM (SELECT winner_candidate_ID id FROM tb_votes WHERE game_ID = '$game_ID' AND level = '$level' AND voter_facebook_ID = '$id' LIMIT $start_from, 1) T1 INNER JOIN (SELECT arquivo, cd_elenco id FROM tb_foto ORDER BY dh_cadastro ASC) T2 USING (id) LIMIT 0, 1";
      $result02 = mysqli_query($link2, $sql02);
      $row02 = mysqli_fetch_array($result02);
      $foto02 = $row02['foto_02'];
      $candidate_elenco_ID_2 = $row02['candidate_elenco_ID'];

      $sql03 = "SELECT COUNT(winner_candidate_ID) AS total FROM tb_votes WHERE game_ID = '$game_ID' AND level = '$level' AND voter_facebook_ID = '$id' ";
      $result03 = mysqli_query($link2, $sql03);
      $row03 = mysqli_fetch_array($result03);
      $total_records = $row03['total'];

      $total_pages = ceil($total_records/$per_page);
      $newpage = $page + 1;
      if ($page <= $total_pages) {
        $write_level = $level - 1;
      }

      $max_level = 1;
      $candidate_number = $total_records;
      while ($candidate_number > 2) {
        $candidate_number = ceil($candidate_number/$per_page);
        $max_level++;
      }

      if (!isset($foto02)) { // REPESCAGEM
        $previous_level = $_GET['level'];
        $sql_odd = "SELECT id loser_candidate_elenco_ID2, arquivo foto_ODD2, vote_delay FROM (SELECT vote_delay, loser_candidate_ID id FROM tb_votes WHERE game_ID = '$game_ID' AND level = '$previous_level' AND voter_facebook_ID = '$id' ORDER BY CAST(vote_delay AS UNSIGNED) DESC LIMIT 0,1) T1 INNER JOIN (SELECT arquivo, cd_elenco id FROM tb_foto ORDER BY dh_cadastro ASC) T2 USING (id) LIMIT 0, 1";
        $result_odd = mysqli_query($link2, $sql_odd);
        $row_odd = mysqli_fetch_array($result_odd);
        $foto02 = $row_odd['foto_ODD2'];
        $candidate_elenco_ID_2 = $row_odd['loser_candidate_elenco_ID2'];
      }
    }
  }
}
  else { include('result.php'); exit(); } // DISPLAY RESULTADO PARA QUEM JÁ VOTOU

} else { // SE AINDA NÃO VOTOU
  if (isset($_GET['page'])) { $page = $_GET['page']; }
  else { $page=1; }
  if (isset($_GET['level'])) { $level = $_GET['level']; }
  else { $level=0; }

  $start_from = ($page-1) * $per_page;

  $sql_question = "SELECT question, role, client, campaign FROM tb_games WHERE game_ID = '$game_ID' limit 1";
  $result_question = mysqli_query($link2, $sql_question);
  $row_question = mysqli_fetch_array($result_question);
    $question = $row_question['question'];
    $role = $row_question['role'];
    $client = $row_question['client'];
    $campaign = $row_question['campaign'];

  $sql01 = "SELECT id candidate_elenco_ID, arquivo foto_01 FROM (SELECT candidate_elenco_ID id FROM tb_games WHERE game_ID = '$game_ID' LIMIT $start_from, 1) T1 INNER JOIN (SELECT arquivo, cd_elenco id FROM tb_foto ORDER BY dh_cadastro ASC) T2 USING (id) LIMIT 0, 1";
  $result01 = mysqli_query($link2, $sql01);
  $row01 = mysqli_fetch_array($result01);
    $foto01 = $row01['foto_01'];
    $candidate_elenco_ID_1 = $row01['candidate_elenco_ID'];

  $start_from++;

  $sql02 = "SELECT id candidate_elenco_ID, arquivo foto_02 FROM (SELECT candidate_elenco_ID id FROM tb_games WHERE game_ID = '$game_ID' LIMIT $start_from, 1) T1 INNER JOIN (SELECT arquivo, cd_elenco id FROM tb_foto ORDER BY dh_cadastro ASC) T2 USING (id) LIMIT 0, 1";
  $result02 = mysqli_query($link2, $sql02);
  $row02 = mysqli_fetch_array($result02);
  $foto02 = $row02['foto_02'];
  $candidate_elenco_ID_2 = $row02['candidate_elenco_ID'];

  $sql03 = "SELECT COUNT(candidate_elenco_ID) AS total FROM tb_games WHERE game_ID = '$game_ID'";
  $result03 = mysqli_query($link2, $sql03);
  $row03 = mysqli_fetch_array($result03);
  $total_records = $row03['total'];

  $total_pages = ceil($total_records/$per_page);

  $max_level = 1;
  $candidate_number = $total_records;
  while ($candidate_number > 2) {
    $candidate_number = ceil($candidate_number/$per_page);
    $max_level++;
  }
    $newpage = $page + 1;
    if ($page <= $total_pages) {
      $write_level = $max_level;
      }
}
if ($level != 1){
echo "
<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<title>Home</title>
	<link rel='stylesheet' href='stylesheets/site.css'>
	<link rel='stylesheet' href='stylesheets/swiper.min.css'>
  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'> 
</head>
<body>
  <div class='swiper-wrapper'>
    <div class='swiper-slide gradient'>
      <div class='pergunta pergunta-vote font-family color-font medium'>
        $question
      </div>

         
          
      <div class='box-outline_compare'>

        <div class='column-compare'>
          <div class='box-compare box-compare_style'>
            <form id='form01' action='action_select.php' method='post'>
            <input type='hidden' name='candidate_elenco_ID' value='$candidate_elenco_ID_1' />
            <input type='hidden' name='game_ID' value='$game_ID' />
            <input type='hidden' name='loser_candidate_ID' value='$candidate_elenco_ID_2' />
            <input type='hidden' name='write_level' value='$write_level' />
            <input type='hidden' name='max_level' value='$max_level' />
            <input type='hidden' name='view_level' value='$level' />
            <input type='hidden' name='total_pages' value='$total_pages' />
            <input type='hidden' name='progress' value='$current_progress' />
            <input type='hidden' name='facebook_ID' value='$id' />
            <input type='hidden' name='vote_time_start' value='$vote_time_start' />
            <input type='hidden' name='page' value='$newpage' />";
            ?>
            <a href="javascript:document.getElementById('form01').submit();">
            <?php echo "
            <img src='http://www.magnetoelenco.com.br/fotos/$foto01' class='foto'>
            </a></form>
          </div>
        </div>

        <div class='box box_or'>
          <img class='or' src='images/or.svg' width='40' height='40' />
        </div>

        <div class='column-compare_two'>
          <div class='box-compare box-compare_style'>
            <form id='form02' action='action_select.php' method='post'>
            <input type='hidden' name='candidate_elenco_ID' value='$candidate_elenco_ID_2' />
            <input type='hidden' name='game_ID' value='$game_ID' />
            <input type='hidden' name='loser_candidate_ID' value='$candidate_elenco_ID_1' />
            <input type='hidden' name='write_level' value='$write_level' />
            <input type='hidden' name='max_level' value='$max_level' />
            <input type='hidden' name='view_level' value='$level' />
            <input type='hidden' name='total_pages' value='$total_pages' />
            <input type='hidden' name='progress' value='$current_progress' />
            <input type='hidden' name='facebook_ID' value='$id' />
            <input type='hidden' name='vote_time_start' value='$vote_time_start' />
            <input type='hidden' name='page' value='$newpage' />";
            ?>
            <a href="javascript:document.getElementById('form02').submit();">
            <?php echo "
            <img src='http://www.magnetoelenco.com.br/fotos/$foto02' class='foto'>
            </a></form>
          </div>
        </div>
        
      </div>

      <div class='box-outline__counter-compare-loading'>
      <svg width='40px' height='40px' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100' preserveAspectRatio='xMidYMid' class='uil-ring'><rect x='0' y='0' width='100' height='100' fill='none' class='bk'></rect><defs><filter id='uil-ring-shadow' x='-100%' y='-100%' width='300%' height='300%'><feOffset result='offOut' in='SourceGraphic' dx='0' dy='0'></feOffset><feGaussianBlur result='blurOut' in='offOut' stdDeviation='0'></feGaussianBlur><feBlend in='SourceGraphic' in2='blurOut' mode='normal'></feBlend></filter></defs><path d='M10,50c0,0,0,0.5,0.1,1.4c0,0.5,0.1,1,0.2,1.7c0,0.3,0.1,0.7,0.1,1.1c0.1,0.4,0.1,0.8,0.2,1.2c0.2,0.8,0.3,1.8,0.5,2.8 c0.3,1,0.6,2.1,0.9,3.2c0.3,1.1,0.9,2.3,1.4,3.5c0.5,1.2,1.2,2.4,1.8,3.7c0.3,0.6,0.8,1.2,1.2,1.9c0.4,0.6,0.8,1.3,1.3,1.9 c1,1.2,1.9,2.6,3.1,3.7c2.2,2.5,5,4.7,7.9,6.7c3,2,6.5,3.4,10.1,4.6c3.6,1.1,7.5,1.5,11.2,1.6c4-0.1,7.7-0.6,11.3-1.6 c3.6-1.2,7-2.6,10-4.6c3-2,5.8-4.2,7.9-6.7c1.2-1.2,2.1-2.5,3.1-3.7c0.5-0.6,0.9-1.3,1.3-1.9c0.4-0.6,0.8-1.3,1.2-1.9 c0.6-1.3,1.3-2.5,1.8-3.7c0.5-1.2,1-2.4,1.4-3.5c0.3-1.1,0.6-2.2,0.9-3.2c0.2-1,0.4-1.9,0.5-2.8c0.1-0.4,0.1-0.8,0.2-1.2 c0-0.4,0.1-0.7,0.1-1.1c0.1-0.7,0.1-1.2,0.2-1.7C90,50.5,90,50,90,50s0,0.5,0,1.4c0,0.5,0,1,0,1.7c0,0.3,0,0.7,0,1.1 c0,0.4-0.1,0.8-0.1,1.2c-0.1,0.9-0.2,1.8-0.4,2.8c-0.2,1-0.5,2.1-0.7,3.3c-0.3,1.2-0.8,2.4-1.2,3.7c-0.2,0.7-0.5,1.3-0.8,1.9 c-0.3,0.7-0.6,1.3-0.9,2c-0.3,0.7-0.7,1.3-1.1,2c-0.4,0.7-0.7,1.4-1.2,2c-1,1.3-1.9,2.7-3.1,4c-2.2,2.7-5,5-8.1,7.1 c-0.8,0.5-1.6,1-2.4,1.5c-0.8,0.5-1.7,0.9-2.6,1.3L66,87.7l-1.4,0.5c-0.9,0.3-1.8,0.7-2.8,1c-3.8,1.1-7.9,1.7-11.8,1.8L47,90.8 c-1,0-2-0.2-3-0.3l-1.5-0.2l-0.7-0.1L41.1,90c-1-0.3-1.9-0.5-2.9-0.7c-0.9-0.3-1.9-0.7-2.8-1L34,87.7l-1.3-0.6 c-0.9-0.4-1.8-0.8-2.6-1.3c-0.8-0.5-1.6-1-2.4-1.5c-3.1-2.1-5.9-4.5-8.1-7.1c-1.2-1.2-2.1-2.7-3.1-4c-0.5-0.6-0.8-1.4-1.2-2 c-0.4-0.7-0.8-1.3-1.1-2c-0.3-0.7-0.6-1.3-0.9-2c-0.3-0.7-0.6-1.3-0.8-1.9c-0.4-1.3-0.9-2.5-1.2-3.7c-0.3-1.2-0.5-2.3-0.7-3.3 c-0.2-1-0.3-2-0.4-2.8c-0.1-0.4-0.1-0.8-0.1-1.2c0-0.4,0-0.7,0-1.1c0-0.7,0-1.2,0-1.7C10,50.5,10,50,10,50z' fill='#ffffff' filter='url(#uil-ring-shadow)'><animateTransform attributeName='transform' type='rotate' from='0 50 50' to='360 50 50' repeatCount='indefinite' dur='1s'></animateTransform></path></svg>
      </div>

      <div class='box-outline__counter-compare-timer'>
        <label id='seconds' class='seconds'>00</label>
      </div>

      <div class='box-outline__counter-compare-loading-progress'>
          <div class='progress'>
          <progress id='progressbar' value='$current_progress' max='$total_progress'></progress>
          </div>
      </div>

    </div>
 </div>

<script src='javascripts/jquery-1.12.1.min.js'></script>
<script src='javascripts/swiper.jquery.min.js'></script>
<script src='javascripts/swiper.min.js'></script>
<script src='javascripts/progressbar.min.js'></script>
<script src='javascripts/all.js'></script>";
}
?>
<script>
	
var colors = new Array(
[165, 0, 200], [176, 116, 255], [255, 41, 129], [237, 107, 107], [201, 87, 222], [35, 188, 237]
);

var step = 0;
var colorIndices = [0,1,2,3];

var gradientSpeed = 0.001;

function updateGradient(container) {
  var c0_0 = colors[colorIndices[0]];
  var c0_1 = colors[colorIndices[1]];
  var c1_0 = colors[colorIndices[2]];
  var c1_1 = colors[colorIndices[3]];

  var istep = 1 - step;
  var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
  var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
  var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
  var color1 = "rgb("+r1+","+g1+","+b1+")";

  var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
  var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
  var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
  var color2 = "rgb("+r2+","+g2+","+b2+")";

  $(container).css({
    background: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"}).css({
    background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});

  step += gradientSpeed;
  if ( step >= 1 ) {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];

    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;

  }
}
setInterval(function(){updateGradient('.gradient')},10);
</script>
<!-- <label id='minutes'>00</label>:<label id='seconds'>00</label> -->
  <script type="text/javascript">
      // var minutesLabel = document.getElementById("minutes");
      var secondsLabel = document.getElementById("seconds");
      var totalSeconds = 0;
      setInterval(setTime, 1000);

      function setTime()
      {
          ++totalSeconds;
          secondsLabel.innerHTML = pad(totalSeconds);
          // minutesLabel.innerHTML = pad(parseInt(totalSeconds/60));
      }

      function pad(val)
      {
          var valString = val + "";
          if(valString.length < 2)
          {
              return "0" + valString;
          }
          else
          {
              return valString;
          }
      }
  </script>
</body>
</html>