<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agenda</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<section class="gradient" id="intro">
  <div class="input grid-5">
          <section class="select">
            <form action="" class="scroll" name="date">
              <select class="date grid-5 font-family font-normal color-primary list" id="date" name="date" size="2">

<?php 
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

$timestamp = strtotime('09:00') + 60*60;

$time = date('H', $timestamp);

 ?>
                <option value="<?php echo date('d/m/Y', strtotime("now"));?>" selected>Hoje</option>
                <option value="<?php echo date('d/m/Y', strtotime("+1 day"));?>">Amanhã</option>
                <option value="<?php echo date('d/m/Y', strtotime("+2 day"));?>">
                  <?php echo strftime('%a %d de %b', strtotime('+2 day')); ?>

                </option>
                <option value="<?php echo date('d/m/Y', strtotime("+3 day"));?>">
                  <?php echo strftime('%a %d de %b', strtotime('+3 day')); ?>

                </option>
                <option value="<?php echo date('d/m/Y', strtotime("+4 day"));?>">
                  <?php echo strftime('%a %d de %b', strtotime('+4 day')); ?>

                </option>
                <option value="<?php echo date('d/m/Y', strtotime("+5 day"));?>">
                  <?php echo strftime('%a %d de %b', strtotime('+5 day')); ?>

                </option>
                <option value="<?php echo date('d/m/Y', strtotime("+6 day"));?>">
                  <?php echo strftime('%a %d de %b', strtotime('+6 day')); ?>

                </option>
                <option value="<?php echo date('d/m/Y', strtotime("+7 day"));?>">
                  <?php echo strftime('%a %d de %b', strtotime('+7 day')); ?>

                </option>
                <option value="<?php echo date('d/m/Y', strtotime("+8 day"));?>">
                  <?php echo strftime('%a %d de %b', strtotime('+8 day')); ?>

                </option>
                <option value="<?php echo date('d/m/Y', strtotime("+9 day"));?>">
                  <?php echo strftime('%a %d de %b', strtotime('+9 day')); ?>

                </option>
                <option value="<?php echo date('d/m/Y', strtotime("+10 day"));?>">
                  <?php echo strftime('%a %d de %b', strtotime('+10 day')); ?>

                </option>
                <option value="<?php echo date('d/m/Y', strtotime("+11 day"));?>">
                  <?php echo strftime('%a %d de %b', strtotime('+11 day')); ?>

                </option>
                <option value="<?php echo date('d/m/Y', strtotime("+12 day"));?>">
                  <?php echo strftime('%a %d de %b', strtotime('+12 day')); ?>

                </option>
                <option value="<?php echo date('d/m/Y', strtotime("+13 day"));?>">
                  <?php echo strftime('%a %d de %b', strtotime('+13 day')); ?>

                </option>
                <option value="<?php echo date('d/m/Y', strtotime("+14 day"));?>">
                  <?php echo strftime('%a %d de %b', strtotime('+14 day')); ?>

                </option>
                <option value="<?php echo date('d/m/Y', strtotime("+15 day"));?>">
                  <?php echo strftime('%a %d de %b', strtotime('+15 day')); ?>

                </option>
                <option value="<?php echo date('d/m/Y', strtotime("+16 day"));?>">
                  <?php echo strftime('%a %d de %b', strtotime('+16 day')); ?>

                </option>
                <option value="<?php echo date('d/m/Y', strtotime("+17 day"));?>">
                  <?php echo strftime('%a %d de %b', strtotime('+17 day')); ?>

                </option>
              </select>

<?php
function hour ( $a, $b )
{
    $timestamp = strtotime(''.$a.':'.$b.':00'); 
    $aa = idate('H', $timestamp);
    if($bb=="0") { $cc = "00"; } else { $cc = $bb; }
    $dd = $aa.$cc;
    return($dd);
}

echo "<select class='grid-5 font-family font-normal color-primary list' id='hour' name=\"hour\">";

for($i=9;$i<=18;$i++)
{
    for($ii=0; $ii<=0;$ii++)
    {
        $iii = $ii;
        $hour = hour($i, $iii);
        echo "<option class='option' value=\"".$hour."\" selected>".$hour."</option>";
    }
}
echo "</select>";

?>

              <select class="grid-5 font-family font-normal color-primary list" id="minutes" name="minutes" size="2">
                <option class="option">
                  00
                </option>
                <option class="option">
                  15
                </option>
                <option class="option">
                  30
                </option>
                <option class="option">
                  45
                </option>
                <option class="option">
                  00
                </option>
                <option class="option">
                  15
                </option>
                <option class="option">
                  30
                </option>
                <option class="option">
                  45
                </option>
              </select>
              
            </form>
          </section>
  </div>
</section>

<script src="javascripts/jquery-1.12.1.min.js"></script>
<script src="javascripts/all.js"></script>
<script src="javascripts/drum.js"></script>
	
</body>
</html>
