$(document).ready(function(){
  var swiper1 = new Swiper('.swiper1', {
      spaceBetween: 30,
      simulateTouch: true,
      onlyExternal: true,
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
        }
        // console.log("activeIndex: "+swiper.activeIndex);
        //   var gradientBg = document.querySelector('.gradient');
        //   var result = getComputedStyle(gradientBg, ':after').backgroundImage;
        //   console.log(result);
      }
  });
  var swiper2 = new Swiper('.swiper2', {
    spaceBetween: 30,
    simulateTouch: false,
    onlyExternal: true,
    speed: 200,
    initialSlide: 0,
    keyboardControl: false,
    direction: 'horizontal',
    loop: false
  });
  $(".pular-intro").click(function(e){
    e.preventDefault();
    swiper1.slideTo( $("#01-0-04_faca-parte-do-nosso-elenco").index(), 200);
  });
  $(".seu-email").click(function(e){
    e.preventDefault();
    $(".swiper1").fadeOut(200);
    var styleElem = document.head.appendChild(document.createElement("style"));
    styleElem.innerHTML = ".gradient:after {display: none;}";
  });
  $("#btn_inicia-cadastro").click(function(e){
    e.preventDefault();
    swiper2.slideNext();
  });
});
