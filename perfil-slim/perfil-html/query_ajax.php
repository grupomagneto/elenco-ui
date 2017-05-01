<?php
include ("api/conecta.php");
$times = $_POST['page'];
$start = $times*60;
if ($times*60 >= $_SESSION['max']) {
$end = $_SESSION['max'];
$limit = "LIMIT ".$start.",".$end;
$sql = $_SESSION['sql_busca'];
$sql .= " $limit";
$res = mysqli_query($conexao_index, $sql);
}
else {
$end = $times*60;
$limit = "LIMIT ".$start.",60";
$sql = $_SESSION['sql_busca'];
$sql .= " $limit";
$res = mysqli_query($conexao_index, $sql);
}
while($row = mysqli_fetch_array($res)) {
    $nome = $row['nome_artistico'];
    $nome = explode(" ", $nome);
    $nome = $nome[0];
    $id = $row['id'];
    $idade = $row['idade'];
    $arquivo = $row['arquivo'];
    echo "
  <div class='box'>
    <div class='tab__box'>
      <div class='tab-actions tab-actions__multiples'>

        <form method='post' action='#' id='like_$id'>
        <input type='radio' name='imagefavorita' value='$id' class='checkbox-multiples' />
        <button type='submit' class='checkbox-multiples-action__fav botaofavorita fav' onclick='AddTableRow()'>
        <img class='checkbox-multiples-img__fav' src='images/fav-icon.svg' alt=''>
        </button>
        </form>

        <form method='post' action='#' id='dislike_$id'>
        <input type='radio' name='imagediscard' value='$id' class='checkbox-multiples' />
        <button type='submit' class='checkbox-multiples-action__discard botaodiscard discard'>
        <img src='images/discard-icon.svg' alt=''>
        </button>
        </form>

        <img alt='discard' class='discard-action cursor' src='images/discard.svg' />
        <img alt='fav' class='fav-action cursor' src='images/fav.svg' />
        <p class='subtitle font-family color-primary font-small cursor'>
        $nome, $idade
        </p>

        <form method='post' action='#' id='single_$id'>
        <button type='submit' class='checkbox-image-action__fav checkbox-image-action__fav__mobile'>
        <input type='hidden' name='key' value='$id' class='checkbox-image__background' />
        <img class='tab-image__background' alt='$nome' src='http://www.magnetoelenco.com.br/fotos/$arquivo' />
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
  // }
}
if ($times*60 >= $_SESSION['max']) {
    echo"
      <section class='footer__section'>
        <div class='container-outline__content'>
          <a href='#intro'>
            <img src='images/arrow-to-top.svg' alt='arrow-to-top'>
          </a>
          <div class='loading' id='loading' style='display: block;'>loading...</div>
          <hr>
          <p class='font-family color-primary'>Magneto Elenco © 2009-<?php echo $year; ?></p>
        </div>
      </section>";
}
?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="javascripts/swiper.jquery.min.js"></script>
<script src="javascripts/swiper.min.js"></script>
<script src="javascripts/slick.min.js"></script>
<script src="javascripts/jquery.easing.min.js"></script>
<script src="javascripts/ion.rangeSlider.min.js"></script>
<script src="javascripts/jquery.easy-pie-chart.js"></script>
<script src="javascripts/all.js"></script>
<script>

  $(document).ready(function() {
      document.getElementById("dislike").style.display = "none";
      document.getElementById("like").style.display = "none";
      $(".box-multiple").click(function(){
        document.getElementById("menu-link").style.display = "block";
        document.getElementById("perfil-name").style.display = "none";
        document.getElementById("single-perfil").style.display = "none";
      });
  });

  $(".show-list-single").click(function(){
    $(".container").css("display", "block");
    $(".photo__single").css("display", "none");
    $(".container-outline__single").css("display", "none");
    $(".wrapper").addClass("list-mode-single");
    $(".wrapper").removeClass("list-mode");
  });

  $(".show-list").click(function(){
    $(".container").css("display", "block");
    $(".photo__single").css("display", "none");
    $(".container-outline__single").css("display", "none");
    $(".wrapper").removeClass("list-mode-single");
    $(".wrapper").addClass("list-mode");
    $(".dislike").css("display", "none");
    $(".like").css("display", "none");
    $(".container-outline__categories").css("display", "none");
  });

  $(".hide-list").click(function(){
    $(".container").css("display", "block");
    $(".photo__single").css("display", "none");
    $(".container-outline__single").css("display", "none");
    $(".wrapper").removeClass("list-mode-single");
    $(".wrapper").removeClass("list-mode");
    $(".dislike").css("display", "none");
    $(".like").css("display", "none");
    $(".container-outline__categories").css("display", "none");
  });

  $(".dislike").click(function(){
      $(".wrapper.list-mode-single .box:last-child").addClass("fadeOutLeft");
    $(this).one("webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend",
                function(event) {
      // Do something when the transition ends
      $(".wrapper.list-mode-single .box:last-child").remove();
    });
  });

  $(".like").click(function(){
      $(".wrapper.list-mode-single .box:last-child").addClass("fadeOutRight");
    $(this).one("webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend",
                function(event) {
      // Do something when the transition ends
      $(".wrapper.list-mode-single .box:last-child").remove();
    });
  });
</script>
<script src="javascripts/ajax.js"></script>
<?php
ob_end_flush();
mysqli_close($conexao_index);
// exit;
?>