
(function(a){(jQuery.browser=jQuery.browser||{}).mobile=/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))})(navigator.userAgent||navigator.vendor||window.opera);

if(jQuery.browser.mobile)
{
   $(document).ready(function(){
    $("img.tab-image__background").dblclick(function(){
         $('img.fav-action', $(this).closest(".tab-actions__multiples")).fadeToggle('fast');
    });
		
			 
		$(document).ready(function(){
			 $("img.checkbox-multiples-img__fav").css('display', 'none');
		});
			 
			 
$(function() { 

$(".checkbox-image-action__fav").click(function(){
    
    jQuery('form').submit(function(){
    var dados = jQuery( this ).serialize();
    
    jQuery.ajax({
      type: "POST",
      dataType: 'html',
      url: "http://localhost:8888/elenco-ui/perfil-slim/perfil-html/api/single_profile.php",
      data: dados,
      success: function( data )
      { 
        $(".gradient").css('display', 'none');
        $(".photo__single").css('display', 'block');
        $(".photo__single").html(data);
        $(".photo__single").load("../api/single_profile.php");
        $('.container-outline__single').css('display', 'block');
        $('.container-outline__categories').css('display', 'block');
        $('.container').css('display', 'none');
         
        $(".close").click(function() {
            $(".photo__single").css("display", "none");
            $(".container-outline__single").css("display", "none");
            $(".container-outline__categories").css("display", "none");
            $(".gradient").css("display", "block");
            $(".container").css("display", "block");
        });
          
        var mySwiper = new Swiper ('.swiper-container', {
            // Optional parameters
            direction: 'horizontal',
            loop: false,
            keyboardControl: true,
            // If we need pagination
            pagination: '.swiper-pagination'
        });
          
          
      }
    });
    return false;
  });
});

});
			 
			 

});

}
else {
   
//discard and fav actions
 $(document).ready(function(){
   $(".tab-actions__multiples > img.discard-action").hide();

   $(".discard").click(function(){
     $('> img.discard-action', $(this).closest(".tab-actions__multiples")).fadeToggle('fast');
   });
 });

 $(document).ready(function(){
   $("img.fav-action").hide();

   $("img.checkbox-multiples-img__fav").click(function(){
     $('> img.fav-action', $(this).closest(".tab-actions__multiples")).fadeToggle('fast');
   });
 });

 $(document).ready(function(){
   $(".checkbox-multiples-img__fav").dblclick(function(){
     $('img.fav-action', $(this).closest(".tab-actions__multiples")).fadeToggle('fast');
   });
 });

//hover fav, discard and subtitle
//$(document).ready(function(){
//    $(".tab-actions__multiples > .checkbox-multiples-action__discard img").hide();
//    
//  $("img.tab-image__background").mouseover(function(e){
//     $('> .checkbox-multiples-action__discard img', $(this).closest(".tab-actions__multiples")).fadeToggle('fast');
//   });
//    
//});

$(document).ready(function(){
   $("img.checkbox-multiples-img__fav").css('display', 'none');
    
    $("img.tab-image__background").mouseover(function(){
        $(this).closest('.tab-actions__multiples').find('img.checkbox-multiples-img__fav').css('display', 'block');
    });
    
    $("img.tab-image__background").mouseout(function(){
        $(this).closest('.tab-actions__multiples').find('img.checkbox-multiples-img__fav').css('display', 'none');
    });
    
});

$(document).ready(function(){
   $(".tab-actions__multiples > .subtitle__prof").css('display', 'none');

    $("img.tab-image__background").mouseenter(function(){
        $("> .subtitle__prof", $(this).closest(".tab-actions__multiples")).css('display', 'block');
    });
    $("img.tab-image__background").mouseout(function(){
        $("> .subtitle__prof", $(this).closest(".tab-actions__multiples")).css('display', 'none');
    });
    
});

$(document).ready(function(){
   $(".tab-actions__multiples > .subtitle").css('display', 'none');

    $("img.tab-image__background").mouseenter(function(){
        $("> .subtitle", $(this).closest(".tab-actions__multiples")).css('display', 'block');
    });
    $("img.tab-image__background").mouseout(function(){
        $("> .subtitle", $(this).closest(".tab-actions__multiples")).css('display', 'none');
    });
    
});
}
    

//circle
$(function() {
  $('.circle-graph').easyPieChart({
    scaleColor: false,
    lineWidth: 10,
    lineCap: 'butt',
    barColor: 'rgba(253,253,253,0.60)',
    trackColor: 'rgba(253,253,253,0.30)' ,
    size: 90,
    animate: 800
  });
});

//video e foto div portfólio
$(document).ready(function() {
  $( ".img_portfolio" ).hide();

  $("#form__portfolio [name='portfolio']").click(function() {
    if ($(this).attr("value") == "videos") {

      $( ".vid1" ).show();
      $( ".img_portfolio" ).hide();
     
    }
    if ($(this).attr("value") == "fotos") {

      $( ".vid1" ).hide();
      $( ".img_portfolio" ).show();
      
    }
  });
});

//Slick
$(document).ready(function() {
  $('.carousel-portfolio').slick({
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

$(document).ready(function() {

    jQuery(".excluir").click(function(){
      $(".checkbox-multiples-action__fav img").css("display", "none");
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

// Nome menu-search
$(document).ready(function() {

  $(".single-image").click(function(){
    document.getElementById("menu-link").style.display = "none";
    document.getElementById("perfil-name").style.display = "block";
    document.getElementById("single-perfil").style.display = "block";
    document.getElementById("rect-single").style.opacity = "0.6";
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


//double click
$(document).ready(function(){
    $("img.tab-image__background").dblclick(function(){
         event.preventDefault();
         var $input = $("input[name=imagefavorita]")
         $input.prop('checked', true);
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

//check nos inputs[type=radio]
$(document).on('click', '.checkbox-multiples-action__fav', function () {
    var $input = $("input[name=imagefavorita]")
    $input.prop('checked', true);
});

$(document).on('click', '.checkbox-image-action__fav', function () {
    var $input = $("input[name=array_key]")
    $input.prop('checked', true);
});

$(document).on('click', '.checkbox-multiples-action__discard', function () {
    var $input = $("input[name=imagediscard]")
    $input.prop('checked', true);

    var $input = $("input[name=imagefavorita]")
    $input.prop('checked', false);
});
