$(".botaofavorita").click(function(){
    jQuery('form').submit(function(){
    var dados = jQuery( this ).serialize();

    jQuery.ajax({
      type: "POST",
      dataType: 'html',
      url: "http://localhost:8888/elenco-ui/perfil-slim/perfil-html/api/addsearch.php",
      data: dados,
      success: function( data )
      {
        $(".favoritado").html(data);
      }
    });
    return false;
  });
}); 

//$('.checkbox-image-action__fav').on('click touchstart', function() {
//    
//    jQuery('form').submit(function(){
//    var dados = jQuery( this ).serialize();
//    
//    jQuery.ajax({
//      type: "POST",
//      dataType: 'html',
//      url: "api/single_profile.php",
//      data: dados,
//      success: function( data )
//      { 
//				
//        $(".gradient").css('display', 'none');
//        $(".photo__single").css('display', 'block');
//        $(".photo__single").html(data);
//        $(".photo__single").load("../api/single_profile.php");
//        $('.container-outline__single').css('display', 'block');
//        $('.container-outline__categories').css('display', 'block');
//        $('.container').css('display', 'none');
//         
//        $(".close").click(function() {
//            $(".photo__single").css("display", "none");
//            $(".container-outline__single").css("display", "none");
//            $(".container-outline__categories").css("display", "none");
//            $(".gradient").css("display", "block");
//            $(".container").css("display", "block");
//        });
//          
//        var mySwiper = new Swiper ('.swiper-container', {
//            // Optional parameters
//            direction: 'horizontal',
//            loop: false,
//            keyboardControl: true,
//            // If we need pagination
//            pagination: '.swiper-pagination'
//        });
//          
//          
//      }
//    });
//    return false;
//  });
//});

//double click actions

//$(document).ready(function(){
//    $("img.tab-image__background").dblclick(function(){
//         event.preventDefault();
//         var $input = $("input[name=imagefavorita]")
//         $input.prop('checked', true);
//    });
//});


if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	
alert("mobile detected");
 
jQuery.fn.single_double_click = function(single_click_callback, double_click_callback, timeout) {
    return this.each(function() {
        var clicks = 0,
            self = this;
        jQuery(this).click(function(event) {
            clicks++;
            if (clicks == 1) {
                setTimeout(function() {
                    if (clicks == 1) {
                        single_click_callback.call(self, event);
                    } else {
                        double_click_callback.call(self, event);
                    }
                    clicks = 0;
                }, timeout || 300);
            }
    				return false;
        });
    });
}

$(".checkbox-image-action__fav").single_double_click(function (event) {
    
    jQuery('form').submit(function(){
    var dados = jQuery( this ).serialize();
    
    jQuery.ajax({
      type: "POST",
      dataType: 'html',
      url: "api/single_profile.php",
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


	
}, function (event) { 
	
   alert("dblclick"); 
	
	 event.preventDefault();
	
	 var $input = $("input[name=imagefavorita]")
	 $input.prop('checked', true);
	
	$('img.fav-action', $(this).closest(".tab-actions__multiples")).fadeToggle('fast');
});
	
	
}



(function($) {
  AddTableRow = function() {
    var newRow = $("<tr>");
    var cols = "";
    cols += '<td>';
    cols += '<div class="perfil-fav__select font-family color-primary cursor" href="">';
    cols += '<img alt="" class="cursor img__fav" src="images/elenco_019589_20160913140545.jpg" />';
    cols += '<p class="cursor favoritado">';
    cols += '</p>';
    cols += '</div>';
    cols += '<div class="excluir discard" onclick="RemoveTableRow(this)">';
    cols += '<img alt="excluir" class="cursor" src="images/excluir.svg" />';
    cols += '<p class="cursor">';
    cols += 'excluir';
    cols += '</p>';
    cols += '</div>';
    cols += '</td>';

    newRow.append(cols);
    $(".table-menu-fav").append(newRow);

    return false;
  };
})(jQuery);

(function($) {
  RemoveTableRow = function(item) {
    var tr = $(item).closest('tr');

    tr.fadeOut(400, function() {
      tr.remove();  
    });

    return false;
  }
})(jQuery);