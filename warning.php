<?php 
$pergunta   = 'Qual o seu e-mail cadastrado?';
$input_id   = 'email_prompt';
$text_id    = 'msgemail ';
$name       = 'email_prompt';
$extra      = " onblur='validacaoEmail(f1.email)' ";

 ?>

<!DOCTYPE html>
<html>
<head>
  <link rel='stylesheet' href='mmf/stylesheets/questions.css'>
  <link rel='stylesheet' href='mmf/stylesheets/swiper.min.css'>
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'> 
  </head>
<body>
<form action='#' method='post' id='form'>
  <div class='gradient container'>
    <div class='box'>
      <h1 class='pergunta font-family color-font'><?php echo $pergunta; ?></h1>
    </div>
    <div class='box'>
      <div class='box-outline_textfield'>

        <div class='column-full font-family color-font'>

            <input id='<?php echo $input_id; ?>' name='<?php echo $name; ?>' <?php $extra; ?> type='email'>
            
            <button id='btn' class='ok' type='submit' onclick='showLoading()'>
              <img id='btn_img' alt='' src='images/ok_neg.svg' />
            </button>
            
            <!-- MENSAGEM DE ERRO -->
            <div id='<?php echo $text_id; ?>'></div>
        </div>

      </div>
    </div>
  </div>
</form>

<script src='mmf/javascripts/jquery-1.12.1.min.js'></script>
<script src='mmf/javascripts/swiper.jquery.min.js'></script>
<script src='mmf/javascripts/swiper.min.js'></script>
<script src='mmf/javascripts/progressbar.min.js'></script>
<script src='mmf/javascripts/all.js'></script>
<script src='mmf/javascripts/questions.js'></script>
</body>
</html>
