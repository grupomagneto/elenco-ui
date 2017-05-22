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

	
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	
alert("mobile detected");

//$('.checkbox-image-action__fav').on('touchstart', function(e) {
//});

$(document).ready(function(){
   $("img.checkbox-multiples-img__fav").css('display', 'none');

   $('img.tab-image__background').off('mouseleave', function () {
			 $("img.checkbox-multiples-img__fav", $(this).closest(".tab-actions__multiples")).css('display', 'block');
	 });
    
});

$(document).ready(function(){
   $(".tab-actions__multiples > .subtitle__prof").css('display', 'none');

		$('img.tab-image__background').off('mouseleave', function () {
        $("> .subtitle__prof", $(this).closest(".tab-actions__multiples")).css('display', 'block');
	 });
    
});

$(document).ready(function(){
   $(".tab-actions__multiples > .subtitle").css('display', 'none');

	
		$('img.tab-image__background').off('mouseleave', function () {
        $("> .subtitle", $(this).closest(".tab-actions__multiples")).css('display', 'block');
	 });
	
    
});
	
	
	// quantos milissegundos vai ser pressionado?
  var longpressMin = 1000;
	var longpressMax = 3000;
	// mantem hora de inicio
	var start;

	$(".checkbox-image-action__fav").on('touchstart', function(e){
	    start = new Date().getTime();
	});
    
	$(".checkbox-image-action__fav").on('touchleave', function(e){
        start = 0;
    } );
    
	$( ".checkbox-image-action__fav" ).on('touchend', function(e){
	    if (new Date().getTime() >= (start + longpressMin) && new Date().getTime() <= (start + longpressMax)){
	      alert('long press!');   
				
		jQuery('form').submit(function(){
    var dados = jQuery( this ).serialize();
    
    jQuery.ajax({
      type: "POST",
      dataType: 'html',
      url: "api/addsearch.php",
      data: dados,
      success: function( data )
      { 
				console.log("ajax click longo mobile sucesso");
				
				$('img.fav-action', $(this).closest(".tab-actions__multiples")).fadeToggle('fast');
            
      }
    });
    return false;
  });
				
	    } else {
	       alert('clique curto');   
				    
    jQuery('form').submit(function(){
    var dados = jQuery( this ).serialize();
    
    jQuery.ajax({
      type: "POST",
      dataType: 'html',
      url: "api/single_profile.php",
      data: dados,
      success: function( data )
      { 
				console.log("ajax mobile success");
				
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
				
				$('.carousel-portfolio').slick({
						dots: true,
						infinite: false,
						speed: 200,
						centerMode: false,
						variableWidth: false,
						autoplay: false,
						arrows: false
				}); 
				
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
				
      }
			
    });
    return false;
  });
				
	 }
});
	
} else {
	
	
$('.checkbox-image-action__fav').on('click', function() {
    
    jQuery('form').submit(function(){
    var dados = jQuery( this ).serialize();
    
    jQuery.ajax({
      type: "POST",
      dataType: 'html',
      url: "api/single_profile.php",
      data: dados,
      success: function( data )
      { 
				console.log("ajax desktop success");
				
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
				
				
				//press ESC
				$(document).keydown(function(e) {
						// ESCAPE key pressed
						if (e.keyCode == 27) {
							$(".photo__single").css("display", "none");
							$(".container-outline__single").css("display", "none");
							$(".container-outline__categories").css("display", "none");
							$(".gradient").css("display", "block");
							$(".container").css("display", "block");
						}
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
	

	
$(document).ready(function(){
   $("img.checkbox-multiples-img__fav").css('display', 'none');

		$('img.tab-image__background').on('mouseover', function () {
			 $("img.checkbox-multiples-img__fav", $(this).closest(".tab-actions__multiples")).css('display', 'block');
	 });

    $("img.tab-image__background").mouseout(function(){
        $("img.checkbox-multiples-img__fav", $(this).closest(".tab-actions__multiples")).css('display', 'none');
    });
    
});

$(document).ready(function(){
   $(".tab-actions__multiples > .subtitle__prof").css('display', 'none');
	
		$('img.tab-image__background').on('mouseover', function () {
        $("> .subtitle__prof", $(this).closest(".tab-actions__multiples")).css('display', 'block');
	 });

    $("img.tab-image__background").mouseout(function(){
        $("> .subtitle__prof", $(this).closest(".tab-actions__multiples")).css('display', 'none');
    });
    
});

$(document).ready(function(){
   $(".tab-actions__multiples > .subtitle").css('display', 'none');

	
		$('img.tab-image__background').on('mouseover', function () {
        $("> .subtitle", $(this).closest(".tab-actions__multiples")).css('display', 'block');
	 });
	
    $("img.tab-image__background").mouseout(function(){
        $("> .subtitle", $(this).closest(".tab-actions__multiples")).css('display', 'none');
    });
    
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





