//Slick

$(document).ready(function() {
  $('.carousel').slick({
    dots: true,
    infinite: false,
    speed: 200,
    centerMode: false,
    variableWidth: false,
    autoplay: false,
    arrows: false
  });
});


//Botão excluir - menu fav

$(document).ready(function() {
  $(".excluir").hide();

    jQuery("tr").click(function(){
      $(".excluir").show();
    });
});

//Ranger Slide

$(document).ready(function() {
var $range = $(".js-range-slider");

  $range.ionRangeSlider({
      type: "double",
      min: 0,
      max: 65,
      from: 20,
      to: 40,
      hide_min_max: false,
      hide_from_to: false,
      max_postfix: "+",
      grid: false
    });
});
// TABS
$(document).ready(function() {
// tabbed content
    $(".tab_content").hide();
    $(".tab_content:first").show(); 

    $("ul.tabs li").click(function() {
      $("ul.tabs li").removeClass("active");
      $(this).addClass("active");
      $(".tab_content").hide();
      var activeTab = $(this).attr("rel"); 
      $("#"+activeTab).fadeIn(); 
    });

});

// Menu top trigger
function showMenuItems () {

  if (theMenu.hasClass('show')) {
    theMenu.removeClass('show');
  } else {
    theMenu.addClass('show');
  }
}

$(document).ready(function() {

  body = $("body");
  topBar = $(".topbar");
  menuButton = $(".menu-button");
  theMenu = $(".fullscreen-menu");

  menuButton.on('click', function(event) {
    event.preventDefault();
    /* Act on the event */
    
    showMenuItems()


  });
  
});

// Menu bottom search
function showMenuSearch () {

  if (theMenuSearch.hasClass('showSearch')) {
    theMenuSearch.removeClass('showSearch');
  } else {
    theMenuSearch.addClass('showSearch');
  }
}

$(document).ready(function() {

  body = $("body");
  bottombar = $(".bottombar");
  menuSearch = $(".menu-search");
  theMenuSearch = $(".fullscreen-menu-search");

  menuSearch.on('click', function(event) {
    event.preventDefault();
    /* Act on the event */
    
    showMenuSearch()


  });
  
});

// MENU fav
function showMenuFav () {

  if (theMenuFav.hasClass('showFav')) {
    theMenuFav.removeClass('showFav');
  } else {
    theMenuFav.addClass('showFav');
  }
}

$(document).ready(function() {

  body = $("body");
  favbar = $(".top-fav-bar");
  menuFav = $(".menu-fav");
  theMenuFav = $(".fullscreen-menu-fav");

  menuFav.on('click', function(event) {
    event.preventDefault();
    /* Act on the event */
    
    showMenuFav()


  });
  
});


// Nome

$(document).ready(function() {

  $(".single-image").click(function(){
    document.getElementById("menu-link").style.display = "none";
    document.getElementById("perfil-name").style.display = "block";
    document.getElementById("single-perfil").style.display = "block";
  });

});

$(document).ready(function() {

  $(".box-multiple").click(function(){
    document.getElementById("menu-link").style.display = "block";
    document.getElementById("perfil-name").style.display = "none";
    document.getElementById("single-perfil").style.display = "none";
  });

});

$(document).ready(function() {

  $(".box-4").click(function(){
    document.getElementById("menu-link").style.display = "block";
    document.getElementById("perfil-name").style.display = "none";
    document.getElementById("single-perfil").style.display = "none";
  });

});

//discard and fav actions

$(document).ready(function(){
  $(".tab-actions > img:nth-child(3)").hide();

  $(".discard").click(function(e){
    $('> img:nth-child(3)', $(this).closest(".tab-actions")).fadeToggle('fast');
  });

});

$(document).ready(function(){
  $(".tab-actions > img").dblclick(function(){
    $('> img:nth-child(4)', $(this).closest(".tab-actions")).fadeToggle('fast');
  });
});

$(document).ready(function(){
  $(".tab-actions > img:nth-child(4)").hide();

  $(".fav").click(function(){
    $('> img:nth-child(4)', $(this).closest(".tab-actions")).fadeToggle('fast');
  });

});

// Gradient
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

