<?php
require_once 'config.php';
session_start();
$id = $_SESSION['id'];
include('conecta.php');
date_default_timezone_set('America/Sao_Paulo');
$per_page=2;
$vote_time_start = microtime(true);
if (isset($_GET['game_ID'])) { $game_ID = $_GET['game_ID']; }
else { $game_ID = 8395; }
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
</head>
<body>
  <div class='swiper-wrapper'>
    <div class='swiper-slide gradient'>
      <div class='pergunta font-family color-font medium'>
        $question
      </div>

          <a href='logout.php'>logout</a>
          
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
          <img class='or' src='images/or.svg' />
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
      <div class='box-outline__counter-compare'>
        <img src='images/counter-compare.svg' />
      </div>

      <div class='box-outline__counter-compare'>
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
</body>
</html>