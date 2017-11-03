$(document).ready(function(){

  var swiper1 = new Swiper('.swiper1', {
      preloadImages: true,
      spaceBetween: 0,
      // simulateTouch: true,
      // onlyExternal: true,
      speed: 200,
      initialSlide: 0,
      keyboardControl: true,
      direction: 'horizontal',
      loop: false,
      pagination: '.swiper-pagination',
      paginationClickable: true,
      onSlideChangeStart : function(swiper1) {
        if (swiper1.activeIndex == 0) {
          var styleElem = document.head.appendChild(document.createElement("style"));
          styleElem.innerHTML = ".gradient:after {background-image: url('../_images/img-DSC_2882.png');}";
          $(".footer-intro").fadeIn(200);
        }
        if (swiper1.activeIndex == 1) {
          var styleElem = document.head.appendChild(document.createElement("style"));
          styleElem.innerHTML = ".gradient:after {background-image: url('../_images/img-DSC_6550.png');}";
          $(".footer-intro").fadeIn(200);
        }
        if (swiper1.activeIndex == 2) {
          var styleElem = document.head.appendChild(document.createElement("style"));
          styleElem.innerHTML = ".gradient:after {background-image: url('../_images/img-DSC_6681.png');}";
          $(".footer-intro").fadeIn(200);
        }
        if (swiper1.activeIndex == 3) {
          var styleElem = document.head.appendChild(document.createElement("style"));
          styleElem.innerHTML = ".gradient:after {background-image: url('../_images/img-DSC_3304.png');}";
          $(".footer-intro").fadeOut(200);
          swiper1.enableKeyboardControl();
        }
        // console.log("activeIndex: "+swiper.activeIndex);
        //   var gradientBg = document.querySelector('.gradient');
        //   var result = getComputedStyle(gradientBg, ':after').backgroundImage;
        //   console.log(result);
      }
  });
  var swiper2 = new Swiper('.swiper2', {
    spaceBetween: 0,
    // simulateTouch: false,
    onlyExternal: true,
    speed: 200,
    initialSlide: 0,
    keyboardControl: false,
    direction: 'horizontal',
    loop: false,
    onSlideChangeStart : function(swiper2) {
      // swiper1.disableKeyboardControl();
    //   // console.log(swiper2.activeIndex);
    //   if (swiper2.activeIndex == 0) {
    //     $(".voltar").click(function(e){
    //       e.preventDefault();
    //       $(".swiper2").fadeOut(200);
    //       var styleElem = document.head.appendChild(document.createElement("style"));
    //       styleElem.innerHTML = ".gradient:after {display: block;}";
    //       $(".swiper1").fadeIn(200);
    //       $(".voltar").css("opacity", "0");
    //     });
    //   }
      if (swiper2.activeIndex == 2) {
        $(".voltar").css("opacity", "0");
        $(".voltar").click(function(e){
          e.preventDefault();
        });
      }
    }
  });
  $(".pular-intro").click(function(e){
    e.preventDefault();
    swiper1.slideTo( $("#01-0-04_faca-parte-do-nosso-elenco").index(), 200);
  });
  $(".seu-email").click(function(e){
    e.preventDefault();
    swiper2.slideTo( $("#02-0-01_cadastre-se-com-seu-e-mail").index(), 200);
    $(".voltar").css("opacity", "1");
    $(".swiper1").fadeOut(200);
    $(".swiper2").fadeIn(200);
    var styleElem = document.head.appendChild(document.createElement("style"));
    styleElem.innerHTML = ".gradient:after {display: none;}";
    swiper1.disableKeyboardControl();
    swiper2.disableKeyboardControl();
  });
  $("#btn_inicia-cadastro").click(function(){
    // console.log('rolou');
    // Ajax Cadastros
    jQuery("form").submit(function(){
      var dados = jQuery(this).serialize();
      // console.log(dados);
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "../cadastro/ajax/cadastro_email.php",
        data: dados,
        success: function( data ) {
          // console.log(dados);
        }
      });
      return false;
    });
    swiper2.slideNext();
  });
  $(".voltar").click(function(e){
    e.preventDefault();
    $(".swiper2").fadeOut(200);
    var styleElem = document.head.appendChild(document.createElement("style"));
    styleElem.innerHTML = ".gradient:after {display: block;}";
    $(".swiper1").fadeIn(200);
    $(".voltar").css("opacity", "0");
    swiper1.enableKeyboardControl();
  });
  $("#btn_estou-com-problemas").click(function(e){
    e.preventDefault();
    swiper2.slideTo( $("#02-0-03_e-mail-confirmado").index(), 200);
  });
  $("#btn_logar-com-email").click(function(){
    // e.preventDefault();
    // Ajax Cadastros
    jQuery("form").submit(function(){
      var dados2 = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "../_sys/email-login.php",
        data: dados2,
        success: function( data ) {
          // event.preventDefault();
          window.location = "../cadastro/cadastro.php";
        }
      });
      return false;
    });
  });
});

var trumps_index = document.querySelector('#trumps_index');
var nua = navigator.userAgent;
var is_android = ((nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 &&     nua.indexOf('AppleWebKit') > -1) && !(nua.indexOf('Chrome') > -1));

if(is_android) {
    $('.titulo-index_android').show();
    $('.titulo-index_desktop').hide();
    $('#ultima-index_android').show();
    $('#ultima-index_desktop').hide();
    trumps_index.setAttribute('href', '../_css/trumps-index.css');
}else{
    $('.titulo-index_desktop').show();
    $('.titulo-index_android').hide();
    $('#ultima-index_android').hide();
    $('#ultima-index_desktop').show();
    trumps_index.removeAttribute('href', '../_css/trumps-index.css');

}