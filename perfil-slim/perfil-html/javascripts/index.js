var swiper = new Swiper('.swiper-container', {
    speed: 200,
    keyboardControl: true,
    nextButton: '.swiper-control.next',
    prevButton: '.swiper-control.prev'
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


//Select option

$('#raca').each(function(){
    var $this = $(this), numberOfOptions = $(this).children('option').length;
  
    $this.addClass('select-hidden5'); 
    $this.wrap('<div class="select5"></div>');
    $this.after('<div class="select-styled5"></div>');

    var $styledSelect = $this.next('div.select-styled5');
    $styledSelect.text($this.children('option').eq(0).text());
  
    var $list = $('<ul />', {
        'class': 'select-options5'
    }).insertAfter($styledSelect);
  
    for (var i = 0; i < numberOfOptions; i++) {
        $('<li />', {
            text: $this.children('option').eq(i).text(),
            rel: $this.children('option').eq(i).val()
        }).appendTo($list);
    }
  
    var $listItems = $list.children('li');
  
    $styledSelect.click(function(e) {
        e.stopPropagation();
        $('div.select-styled.active5').each(function(){
            $(this).removeClass('active').next('ul.select-options5').hide();
        });
        $(this).toggleClass('active').next('ul.select-options5').toggle();
    });
  
    $listItems.click(function(e) {
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass('active');
        $this.val($(this).attr('rel')); 
        
            menor.slideNext();
        $list.hide();
        //console.log($this.val());
    });
  
    $(document).click(function() {
        $styledSelect.removeClass('active');
        $list.hide();
    });

});

$('#bairro').each(function(){
    var $this = $(this), numberOfOptions = $(this).children('option').length;
  
    $this.addClass('select-hidden5'); 
    $this.wrap('<div class="select5"></div>');
    $this.after('<div class="select-styled5"></div>');

    var $styledSelect = $this.next('div.select-styled5');
    $styledSelect.text($this.children('option').eq(0).text());
  
    var $list = $('<ul />', {
        'class': 'select-options5'
    }).insertAfter($styledSelect);
  
    for (var i = 0; i < numberOfOptions; i++) {
        $('<li />', {
            text: $this.children('option').eq(i).text(),
            rel: $this.children('option').eq(i).val()
        }).appendTo($list);
    }
  
    var $listItems = $list.children('li');
  
    $styledSelect.click(function(e) {
        e.stopPropagation();
        $('div.select-styled.active5').each(function(){
            $(this).removeClass('active').next('ul.select-options5').hide();
        });
        $(this).toggleClass('active').next('ul.select-options5').toggle();
    });
  
    $listItems.click(function(e) {
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass('active');
        $this.val($(this).attr('rel')); 
        
            menor.slideNext();
        $list.hide();
        //console.log($this.val());
    });
  
    $(document).click(function() {
        $styledSelect.removeClass('active');
        $list.hide();
    });

});
