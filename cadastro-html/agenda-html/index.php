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
  <div class="input">

    <div class="wrap">
      <div class="multi-select" id="select">
        <div class="panel">
          <section class="select">
            <div class="box"></div>
            <form action="" class="scroll" name="date">
              <select class="date grid-5 font-family font-normal color-primary list" id="date" name="date" size="2">


                <option value="<?php echo date('d/m/Y', strtotime("now"));?>" selected>Hoje</option>
                <option value="<?php echo date('d/m/Y', strtotime("+1 day"));?>">Amanhã</option>
                <option value="<?php echo date('d/m/Y', strtotime("+2 day"));?>"><?php echo date('d/m/Y', strtotime("+2 day"));?></option>
                <option value="<?php echo date('d/m/Y', strtotime("+3 day"));?>"><?php echo date('d/m/Y', strtotime("+3 day"));?></option>
                <option value="<?php echo date('d/m/Y', strtotime("+4 day"));?>"><?php echo date('d/m/Y', strtotime("+4 day"));?></option>
                <option value="<?php echo date('d/m/Y', strtotime("+5 day"));?>"><?php echo date('d/m/Y', strtotime("+5 day"));?></option>
                <option value="<?php echo date('d/m/Y', strtotime("+6 day"));?>"><?php echo date('d/m/Y', strtotime("+6 day"));?></option>
                <option value="<?php echo date('d/m/Y', strtotime("+7 day"));?>"><?php echo date('d/m/Y', strtotime("+7 day"));?></option>
                <option value="<?php echo date('d/m/Y', strtotime("+8 day"));?>"><?php echo date('d/m/Y', strtotime("+8 day"));?></option>
                <option value="<?php echo date('d/m/Y', strtotime("+9 day"));?>"><?php echo date('d/m/Y', strtotime("+9 day"));?></option>
                <option value="<?php echo date('d/m/Y', strtotime("+10 day"));?>"><?php echo date('d/m/Y', strtotime("+10 day"));?></option>
                <option value="<?php echo date('d/m/Y', strtotime("+11 day"));?>"><?php echo date('d/m/Y', strtotime("+11 day"));?></option>
                <option value="<?php echo date('d/m/Y', strtotime("+12 day"));?>"><?php echo date('d/m/Y', strtotime("+12 day"));?></option>
                <option value="<?php echo date('d/m/Y', strtotime("+13 day"));?>"><?php echo date('d/m/Y', strtotime("+13 day"));?></option>
                <option value="<?php echo date('d/m/Y', strtotime("+14 day"));?>"><?php echo date('d/m/Y', strtotime("+14 day"));?></option>
                <option value="<?php echo date('d/m/Y', strtotime("+15 day"));?>"><?php echo date('d/m/Y', strtotime("+15 day"));?></option>
                <option value="<?php echo date('d/m/Y', strtotime("+16 day"));?>"><?php echo date('d/m/Y', strtotime("+16 day"));?></option>
                <option value="<?php echo date('d/m/Y', strtotime("+17 day"));?>"><?php echo date('d/m/Y', strtotime("+17 day"));?></option>
              </select>

              <select class="grid-5 font-family font-normal color-primary list" id="hour" name="hour" size="2">
                <option class="option">
                  01
                </option>
                <option class="option">
                  02
                </option>
                <option class="option">
                  03
                </option>
                <option class="option">
                  04
                </option>
                <option class="option">
                  05
                </option>
                <option class="option">
                  06
                </option>
                <option class="option">
                  07
                </option>
                <option class="option">
                  08
                </option>
                <option class="option">
                  09
                </option>
                <option class="option">
                  10
                </option>
                <option class="option">
                  11
                </option>
                <option class="option">
                  12
                </option>
                <option class="option">
                  13
                </option>
                <option class="option">
                  14
                </option>
                <option class="option">
                  15
                </option>
                <option class="option">
                  16
                </option>
                <option class="option">
                  17
                </option>
                <option class="option">
                  18
                </option>
              </select><select class="grid-5 font-family font-normal color-primary list" id="minutes" name="minutes" size="2">
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
      </div>
    </div>
  </div>
</section>

<script src="javascripts/jquery-1.12.1.min.js"></script>
<script src="javascripts/all.js"></script>
<script src="javascripts/drum.js"></script>
	
</body>
</html>
