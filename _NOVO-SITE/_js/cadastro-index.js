$(document).ready(function(){
  var percentage = "2%";
  var previousPercentage = "2%";
  var swiper = new Swiper(".swiper-container", {
      nextButton: ".swiper-button-next",
      prevButton: ".swiper-button-prev",
      spaceBetween: 30,
      // simulateTouch: false,
      // onlyExternal: true,
      speed: 200,
      initialSlide: 0,
      keyboardControl: true,
      direction: 'horizontal',
      loop: false,
      pagination: '.swiper-pagination'
      // onSlideChangeEnd : function(swiper) {
      //  console.log("activeIndex: "+swiper.activeIndex);
      //  console.log("anterior: "+anterior);
      // }
  });
});