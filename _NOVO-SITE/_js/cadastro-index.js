$(document).ready(function(){
  var percentage = "2%";
  var previousPercentage = "2%";
  var swiper = new Swiper(".swiper-container", {
      nextButton: ".swiper-button-next",
      prevButton: ".swiper-button-prev",
      spaceBetween: 30,
      simulateTouch: false,
      onlyExternal: true,
      speed: 200,
      initialSlide: 0,
      keyboardControl: true,
      direction: 'horizontal',
      loop: false,
      pagination: '.swiper-pagination',
      paginationClickable: true,
      onSlideChangeStart : function(swiper) {
        if (swiper.activeIndex == 0) {
          var styleElem = document.head.appendChild(document.createElement("style"));
          styleElem.innerHTML = ".gradient:after {background-image: url('../_images/img-DSC_2882.png');}";
          $(".footer-intro").fadeIn(200);
        }
        if (swiper.activeIndex == 1) {
          var styleElem = document.head.appendChild(document.createElement("style"));
          styleElem.innerHTML = ".gradient:after {background-image: url('../_images/img-DSC_6550.png');}";
          $(".footer-intro").fadeIn(200);
        }
        if (swiper.activeIndex == 2) {
          var styleElem = document.head.appendChild(document.createElement("style"));
          styleElem.innerHTML = ".gradient:after {background-image: url('../_images/img-DSC_6681.png');}";
          $(".footer-intro").fadeIn(200);
        }
        if (swiper.activeIndex == 3) {
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
  $(".pular-intro").click(function(e){
    e.preventDefault();
    swiper.slideTo( $("#01-0-04_faca-parte-do-nosso-elenco").index(), 200);
  });
});