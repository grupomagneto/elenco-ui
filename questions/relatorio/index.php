<?php
$candidate_ID = 16759;
$facebook_ID = 10209477525328372;
$sex = "m";
if (isset($_GET['month'])) { $month = $_GET['month']; }
else { $month=10; }
if (isset($_GET['year'])) { $year = $_GET['year']; }
else { $year = 2016; }
$from_day = 1;
$days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
// $candidate_ID = 19626;
// $facebook_ID = 1047656205332957;
// $sex = "f";
require_once "db.php";
// MONTHS INTO NAMES
if ($month == 1) { $month_name = "janeiro"; }
if ($month == 2) { $month_name = "fevereiro"; }
if ($month == 3) { $month_name = "março"; }
if ($month == 4) { $month_name = "abril"; }
if ($month == 5) { $month_name = "maio"; }
if ($month == 6) { $month_name = "junho"; }
if ($month == 7) { $month_name = "julho"; }
if ($month == 8) { $month_name = "agosto"; }
if ($month == 9) { $month_name = "setembro"; }
if ($month == 10) { $month_name = "outubro"; }
if ($month == 11) { $month_name = "novembro"; }
if ($month == 12) { $month_name = "dezembro"; }
$sql_name = "SELECT nome_artistico AS name, arquivo AS photo FROM (SELECT nome_artistico, id_elenco id FROM tb_elenco WHERE id_elenco = '$candidate_ID') T1 INNER JOIN (SELECT arquivo, cd_elenco id FROM tb_foto ORDER BY dh_cadastro ASC) T2 USING (id) GROUP BY id";
$result = mysqli_query($link2, $sql_name);
$row = mysqli_fetch_array($result);
$name = $row['name'];
$photo = "http://www.magnetoelenco.com.br/fotos/";
$photo .= $row['photo'];
	// SELECT AND COUNT VOTE PERCENTAGE PER SEX
	$sql_votes = "SELECT sex, COUNT(winner_candidate_ID) AS votes FROM tb_votes WHERE winner_candidate_ID = '$candidate_ID' GROUP BY sex";
	$result = mysqli_query($link2, $sql_votes);
	while ($row = mysqli_fetch_array($result)) {
		if ($row['sex'] == 'f') {
			$female = $row['votes'];
		}
		elseif ($row['sex'] == 'm') {
			$male = $row['votes'];
		}
	}
	$votes = $male + $female;
	if ($male > $female) {
		$sex_description = 'homens';
		$votes_percentage = round($male/($male+$female)*100);
	}
	elseif ($male < $female) {
		$sex_description = 'mulheres';
		$votes_percentage = round($female/($male+$female)*100);
	}
	elseif ($male == $female) {
		$sex_description = 'hom/mul';
		$votes_percentage = 50;
	}
// AVERAGE AGE FROM VOTER
$sql_age = "SELECT AVG(TIMESTAMPDIFF(YEAR, birthday, CURDATE())) AS age FROM tb_votes WHERE winner_candidate_ID = '$candidate_ID'";
$result = mysqli_query($link2, $sql_age);
$row = mysqli_fetch_array($result);
$age = round($row['age']);
// FRIENDS WHO VOTED
$sql_friends = "SELECT COUNT(player_facebook_ID) AS friends FROM (SELECT player_facebook_ID FROM tb_shares T1 WHERE player_facebook_ID IS NOT NULL AND candidate_ID = '$candidate_ID' AND player_facebook_ID != '$facebook_ID' AND type = 'in' GROUP BY player_facebook_ID) T2";
$result = mysqli_query($link2, $sql_friends);
$row = mysqli_fetch_array($result);
$friends = round($row['friends']);

$sql_completed = "SELECT SUM((SELECT COUNT(*) FROM tb_voters T1 WHERE facebook_ID ='$facebook_ID' AND transportation IS NOT NULL) + (SELECT COUNT(*) FROM tb_voters T2 WHERE facebook_ID ='$facebook_ID' AND scholarity IS NOT NULL) + (SELECT COUNT(*) FROM tb_voters T3 WHERE facebook_ID ='$facebook_ID' AND cep IS NOT NULL) + (SELECT COUNT(*) FROM tb_voters T4 WHERE facebook_ID ='$facebook_ID' AND pet IS NOT NULL) + (SELECT COUNT(*) FROM tb_voters T5 WHERE facebook_ID ='$facebook_ID' AND physical_activity IS NOT NULL) + (SELECT COUNT(*) FROM tb_voters T6 WHERE facebook_ID ='$facebook_ID' AND tech_level IS NOT NULL) + (SELECT COUNT(*) FROM tb_voters T7 WHERE facebook_ID ='$facebook_ID' AND social_network IS NOT NULL) + (SELECT COUNT(*) FROM tb_voters T8 WHERE facebook_ID ='$facebook_ID' AND music IS NOT NULL) + (SELECT COUNT(*) FROM tb_voters T9 WHERE facebook_ID ='$facebook_ID' AND children IS NOT NULL) + (SELECT COUNT(*) FROM tb_voters T10 WHERE facebook_ID ='$facebook_ID' AND diet IS NOT NULL) + (SELECT COUNT(*) FROM tb_voters T11 WHERE facebook_ID ='$facebook_ID' AND traveling IS NOT NULL) + (SELECT COUNT(*) FROM tb_voters T12 WHERE facebook_ID ='$facebook_ID' AND travel_motive IS NOT NULL) + (SELECT COUNT(*) FROM tb_voters T13 WHERE facebook_ID ='$facebook_ID' AND gastronomy IS NOT NULL) + (SELECT COUNT(*) FROM tb_voters T14 WHERE facebook_ID ='$facebook_ID' AND occupation IS NOT NULL) + (SELECT COUNT(*) FROM tb_voters T15 WHERE facebook_ID ='$facebook_ID' AND relationship_status IS NOT NULL)) AS completed";
$result = mysqli_query($link2, $sql_completed);
$row = mysqli_fetch_array($result);
$completed = round($row['completed']);
$percentage = round($completed/15*100);
// RANKING
$sql_rank = "SELECT x.id, x.votes, @curRank := @curRank + 1 AS rank FROM (SELECT winner_candidate_ID AS id, COUNT(winner_candidate_ID) AS votes FROM tb_votes GROUP BY winner_candidate_ID ORDER BY COUNT(winner_candidate_ID) DESC) x, (SELECT @curRank := 0) r";
$result = mysqli_query($link2, $sql_rank);
while($row =  mysqli_fetch_assoc($result)) {
	if ($row['id'] == $candidate_ID) {
		$rank = $row['rank'];
	}
}
$sql_total_rank = "SELECT COUNT(candidate_elenco_ID) AS total FROM tb_games";
$result = mysqli_query($link2, $sql_total_rank);
$row =  mysqli_fetch_assoc($result);
$total_rank = $row['total'];
// VOTES PER DAY FROM MONTH
$sql_vote_per_day = "SELECT vote_date, COUNT(winner_candidate_ID) AS votes_per_day FROM tb_votes WHERE winner_candidate_ID = '$candidate_ID' AND MONTH(vote_date)='$month' GROUP BY vote_date";
$result = mysqli_query($link2, $sql_vote_per_day);
$vote_days = array();
while($row =  mysqli_fetch_assoc($result)) {
	$vote_days[$row['vote_date']] = array('votes' => $row['votes_per_day']);
	$new_vote_day = array(
    'votes' => $row['votes_per_day'],
    );
}
$d = $from_day;
$month_days = array();
while ($d <= $days_in_month) {
	if ($d < 10) {
		$d = "0".$d;
	}
	$date = $year."-".$month."-".$d;
	$month_days[$date] = array('votes' => 0);
	$new_month_day = array(
    'votes' => 0,
    );
    $d++;
}
$resultado = array_replace($month_days, $vote_days);
$keys = array(array_keys($resultado));
// TOTAL VOTES IN THE MONTH
$sql_month_votes = "SELECT COUNT(winner_candidate_ID) AS month_votes FROM tb_votes WHERE winner_candidate_ID = '$candidate_ID' AND MONTH(vote_date)=$month";
$result = mysqli_query($link2, $sql_month_votes);
$row = mysqli_fetch_array($result);
$month_votes = $row['month_votes'];
echo "
<!DOCTYPE html>
<html lang='pt-BR'>
<head>
	<meta charset='UTF-8'>
	<meta content='width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no' name='viewport'>
	<title>Magneto Elenco - Relatório Premium dos votos recebidos</title>
	<link rel='stylesheet' href='normalize.css'>
	<link rel='stylesheet' href='reset.css'>
	<link rel='stylesheet' href='grid.css'>
	<link rel='stylesheet' href='style.css'>
	<link rel='stylesheet' href='media_menu.css'>
	<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
	<style>
	div.google-visualization-tooltip {
		background-color: #875DA2;
		color: #ffffff;
		font-family: Avenir-Book;
		font-weight: 100;
		font-size: 14px;
		padding: 10px;
		border-radius: 10px;
		white-space: nowrap;
	}
	evidence {
		font-family: Avenir-Heavy;
		font-size: 20px;
	}
	</style>
	<script type='text/javascript'>
	google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBackgroundColor);

function drawBackgroundColor() {
      var data = new google.visualization.DataTable();
      data.addColumn('date', 'Day');
      data.addColumn('number', 'Votos');
      data.addColumn({type: 'string', role: 'tooltip', 'p': {'html': true}});

    data.addRows([";

	$n = 0;
	foreach ($resultado as $array) {
		$votes_per_day  = $array['votes'];
		foreach ($keys as $vd) {
			$vote_date = $vd[$n];
			$dayofweek = date('w', strtotime($vote_date));
			if ($dayofweek == 0) {$dayofweek = 'Domingo';}
			elseif ($dayofweek == 1) {$dayofweek = 'Segunda-feira';}
			elseif ($dayofweek == 2) {$dayofweek = 'Terça-feira';}
			elseif ($dayofweek == 3) {$dayofweek = 'Quarta-feira';}
			elseif ($dayofweek == 4) {$dayofweek = 'Quinta-feira';}
			elseif ($dayofweek == 5) {$dayofweek = 'Sexta-feira';}
			elseif ($dayofweek == 6) {$dayofweek = 'Sábado';}
		    $pieces = explode("-", $vote_date);
		    $year = $pieces[0];
		    $month = $pieces[1] - 1;
		    $day = $pieces[2];
		    if ($votes_per_day != 1) { $votos = "votos"; }
		    $n++;
		}
		echo "[new Date(".$year.", ".$month.", ".$day."), ".$votes_per_day.", '".$dayofweek.",<br/>".$day."-".$pieces[1]."-".$year."<br/><br/><evidence>".$votes_per_day."</evidence> voto(s)'],";
	}  
    echo"
      ]);

      var options = {
      	tooltip: {isHtml: true},
      	legend: 'none',
      	colors: ['#875DA2'],
      	pointSize: 5,
      	chartArea:{left:60,top:40,right:60,bottom:40,width:'100%',height:'100%'},
	    animation:{
	        duration: 1000,
	        easing: 'out',
	        startup: true
        },
        hAxis: {
          format: 'd',
          gridlines: {count: 31, color: 'none'},
          baselineColor: 'none',
          textStyle: {
            color: '#C9C9C9',
            fontSize: 11,
            bold: false
          }
        },
        vAxis: {
          format: '#',
       	  gridlines: {count: 5, color: '#C9C9C9'},
       	  baselineColor: 'none',
       	  textStyle: {
            color: '#C9C9C9',
            fontSize: 11,
            bold: false
          }
        },
        backgroundColor: '#ffffff'
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    </script>
</head>
<body>

<div class='gradient'>


<header class='header-menu'>

<div class='container-outline__center'>

	<div>	
		<span class='menu-anchor'></span>
	</div>

		<a href='#' class='cursor'>
			<img class='logo' src='images/logo.svg' alt='logo'>
		</a>

	<div class='notifications'>
			<span class='notification__num font-family color-font cursor'>1</span> 
			<img src='images/notification.svg' alt='' class='notification cursor'>
		<span class='line'></span>
	
	  <h1 class='link-menu font-family color-font__purple-secondary'><a class='cursor font-family color-font__purple-secondary' href='#'>Relatório Premium</a></h1>
	</div> 

	

</div>

</header>


<menu class='menu-mobile'>
	<ul>
		<li><a href='#'>Relatório Premium</a></li>
	</ul>
</menu>

  <div class='btn btn-scrollTop'>
    <a class='scroll-to-top' href='#'>
      <img src='images/arrow-scroll-down.svg' alt='arrow'>
    </a>
  </div>

<section class='profile'>

<div class='container-outline__center'>

	<div class='grid-6 profile_photo'>
				<img src='$photo' alt='$name' />
				<h1 class='font-family color-font font-size-large'>$name</h1>
				<p class='font-family color-font font-size-small'>".$rank."º perfil mais votado no geral</p>

	</div>


	<div class='profile-info grid-6'>
		<nav class='profile-info__menu'>
		  <ul>
			  <li>
			      <a href='' class='font-family color-font'>Recebeu</a> 
			  </li>
			    <li>
			      <a href='' class='font-family color-font'>Principal eleitor</a> 
			  </li> 
			    <li>
			      <a href='' class='font-family color-font'>Idade média</a> 
			  </li>
			    <li>
			      <a href='' class='font-family color-font'>Você trouxe</a>
			  </li>
		  </ul>
		</nav>

		<div class='box-profile'>
			<img  src='images/icon_1.svg' width='30px' height='30px' alt=''>
			<h1 class='font-family color-font'>$votes</h1>
			<p class='font-family color-font'>votos</p>
		</div>

		<div class='box-profile'>
			<img  src='images/icon_2.svg' width='30px' height='30px'>
			<h1 class='font-family color-font'>$votes_percentage%</h1>
			<p class='font-family color-font'>$sex_description</p>
		</div>

		<div class='box-profile'>
			<img  src='images/icon_3.svg' width='30px' height='30px'>
			<h1 class='font-family color-font'>$age</h1>
			<p class='font-family color-font'>anos</p>
		</div>

		<div class='box-profile'>
			<img  src='images/icon_4.svg' width='30px' height='30px'>
			<h1 class='font-family color-font'>$friends</h1>
			<p class='font-family color-font'>amigos</p>
		</div>

	<div class='progressbar'>
			
		<h3 class='font-family color-font'> $percentage% cadastro completo</h3>
			
		<progress id='progressbar'  max='15' value='$completed'></progress> 
	</div>

	</div>

</div>


</section>

<section class='tabs'>
<div class='container-outline__center'>

		<div class='title-tabs'>
			<h1 class='font-family color-font'>Relatório Premium</h1>
		</div>
		
	<ul class='tab'>
		<li>
		    <a href='javascript:void(0)' onclick='openCity(event, ";echo '"votosdiarios"';echo")'  id='defaultOpen' class='font-family color-font tablinks'>Votos diários</a> 
		</li>  
		  <li>
		    <a href='javascript:void(0)'  onclick='openCity(event, ";echo '"perfil"';echo")'  class='font-family color-font tablinks'>Perfil eleitores</a> 
		</li>
		  <li>
		    <a href='javascript:void(0)'  onclick='openCity(event, ";echo '"votosamigos"';echo")' class='font-family color-font tablinks'> Votos de amigos</a> 
		</li>
	</ul>


	<div class='tabcontent' id='votosdiarios' style='display: block;'>
		<div class='tabcontent-title__left grid-6'>
			<h3 class='font-family color-font__purple-secondary font-size-medium'>
				Análise diária de votos recebidos
			</h3>
			<p class='font-family color-font__secondary font-size-small'>
				De $from_day a $days_in_month de $month_name de $year
			</p>
		</div>";
?>
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='get' id='form01'>
<?php
echo "<div class='tabcontent-title__right grid-6'>
			<h3 class='initial font-family color-font__purple-secondary font-size-medium'>
				<button class='button-arrow cursor' type='submit' name='month' value='";$month--;echo"$month'>
			    	<img  src='images/arrow-left.svg' alt='' />
				</button>

				$month_name de $year

				<button class='button-arrow cursor' type='submit' name='month' value='";$month++;echo"$month'>
			    	<img  src='images/arrow-right.svg' alt='' />
				</button>
			</h3>
			<p class='font-family color-font__secondary font-size-small'>
				Votos recebidos em $month_name: $month_votes
			</p>
		</div>
		</form>
		<div id='chart_div' style='position:relative; top:70px; width; 100%'></div>
	</div>

	<div class='tabcontent' id='perfil' style='display: block;'>
		<div class='tabcontent-title__left grid-6'>
			<h3 class='font-family color-font__purple-secondary font-size-medium'>
				Gênero e idade
			</h3>
			<p class='font-family color-font__secondary font-size-small'>
				Até hoje, 21 de outubro de 2016
			</p>

		</div>
		<div class='tabcontent__left'>
			<div class='answers_graph'>

			</div>
		</div>

		<div class='tabcontent__right tabcontent__faq grid-6'>
			<h3 class='font-family color-font__purple-secondary font-size-medium'>
				Respostas mais frequentes
			</h3>
			<p class='font-family color-font__secondary font-size-small'>
				dos seus eleitores
			</p>

			<div class='recents__answers'>
				<div class='box-recents__answers'>
					<p class='font-family color-font font-size-xsmall'> Bairro </p>
					<h3 class='font-family color-font font-size-small font-bold'> Setor Habitacional Samambaia (Vicente Pires)</h3>
				</div>
				<div class='box-recents__answers'>
					<p class='font-family color-font font-size-xsmall'> Meio de Transporte </p>
					<h3 class='font-family color-font font-size-small font-bold'> Ônibus / Metrô</h3>
				</div>
				<div class='box-recents__answers'>
					<p class='font-family color-font font-size-xsmall'> Escolaridade </p>
					<h3 class='font-family color-font font-size-small font-bold'> Superior</h3>
				</div>
			</div>

		</div>
	</div>
	
	<div class='tabcontent' id='votosamigos' style='display: block;'>

		<div class='tabcontent__left grid-6'>
			<h3 class='font-family color-font__purple-secondary font-size-medium'>
				Votos que recebi
			</h3>
			<p class='font-family color-font__secondary font-size-small'>
				Até hoje, 21 de outubro de 2016
			</p>


			<div class='answers_graph'>

			</div>
		</div>

		<div class='tabcontent__right grid-6'>
			<h3 class='font-family color-font__purple-secondary font-size-medium'>
				Amigos que já votaram
			</h3>
			<p class='font-family color-font__secondary font-size-small'>
				Convide seus amigos que ainda não votaram
			</p>
			<div id='scrollbar_votes' class='votes_friends'>
				<div class='box-votes_friends'>
					<img src='https://dummyimage.com/60x60' alt=''>
				</div>
				<div class='box-votes_friends'>
					<img src='https://dummyimage.com/60x60' alt=''>
				</div>
				<div class='box-votes_friends'>
					<img src='https://dummyimage.com/60x60' alt=''>
				</div>
				<div class='box-votes_friends'>
					<img src='https://dummyimage.com/60x60' alt=''>
				</div>			
				<div class='box-votes_friends'>
					<img src='https://dummyimage.com/60x60' alt=''>
				</div>
				<div class='box-votes_friends'>
					<img src='https://dummyimage.com/60x60' alt=''>
				</div>
				<div class='box-votes_friends'>
					<img src='https://dummyimage.com/60x60' alt=''>
				</div>
				<div class='box-votes_friends'>
					<img src='https://dummyimage.com/60x60' alt=''>
				</div>
				<div class='box-votes_friends'>
					<img src='https://dummyimage.com/60x60' alt=''>
				</div>
				<div class='box-votes_friends'>
					<img src='https://dummyimage.com/60x60' alt=''>
				</div>
				<div class='box-votes_friends'>
					<img src='https://dummyimage.com/60x60' alt=''>
				</div>
				<div class='box-votes_friends'>
					<img src='https://dummyimage.com/60x60' alt=''>
				</div>
	
			</div>
		</div>
	</div>




</div>
</section>

<footer class='footer__button'>
	
<div class='container-outline__center'>
		<div class='container__after-tabs'>
			
			<button class='button button-medium cursor'>
			  <div>
			    <p class='font-family color-font'>Participar de mais castings</p>
			  </div>
			</button>

			<button class='button button-medium cursor'>
			 <div class='button-image'>
			    <img  src='images/fb.svg' alt='' />
			</div>
			<div>
			    <p class='font-family color-font'>Convidar meus amigos</p>
			</div>
			</button> 

		</div>
</div>

</footer>

</div>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.12/jquery.mousewheel.min.js'></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jScrollPane/2.0.14/jquery.jscrollpane.min.js'></script>

<script>

$('.votes_friends').jScrollPane(); 



var zero = 0;
$('a.scroll-to-top').stop().click(function () {
  $(document.$('.profile')).animate({'scrollTop': zero.top}, 
  200 );
  return false;
});



$(document).scroll(function() {
  var y = $(this).scrollTop();
  if (y > 100) {   
    $('.btn-scrollTop').fadeOut();
  } else {
  	 $('.btn-scrollTop').fadeIn();
  }
});


$(document).ready(function(){
	$('.menu-anchor').on('click touchstart', function(e){
		$('html').toggleClass('menu-active');
	  	e.preventDefault();
	});
});


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
  var color1 = 'rgb('+r1+','+g1+','+b1+')';

  var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
  var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
  var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
  var color2 = 'rgb('+r2+','+g2+','+b2+')';

  $(container).css({
    background: '-webkit-gradient(linear, left top, right top, from('+color1+'), to('+color2+'))'}).css({
    background: '-moz-linear-gradient(left, '+color1+' 0%, '+color2+' 100%)'});

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



function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName('tabcontent');
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = 'none';
    }
    tablinks = document.getElementsByClassName('tablinks');
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(' active', '');
    }
    document.getElementById(cityName).style.display = 'block';
    evt.currentTarget.className += ' active';
}

document.getElementById('defaultOpen').click();


</script>
</body>
</html>";
mysqli_close($link2);
?>
