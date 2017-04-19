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


$(".botaodiscard").click(function(){
    jQuery('form').submit(function(){
    var dados = jQuery( this ).serialize();

    jQuery.ajax({
      type: "POST",
      dataType: 'html',
      url: "http://localhost:8888/elenco-ui/perfil-slim/perfil-html/api/discardsearch.php",
      data: dados,
      success: function( data )
      {        
        // location = 'http://localhost:8888/elenco-ui/perfil-slim/perfil-html/novoperfil.php';
      }
    });
    return false;
  });
});
function slickCarousel() {
  $('.skills_section').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1
  });
}

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

$(window).scroll(function() {
    var end = 0;
    var loading = false;
    if( !loading && $(window).scrollTop() + $(window).height() == $(document).height() ) {
        end += 30;
        loading = true;
        $.ajax( {
            url: 'http://localhost:8888/elenco-ui/perfil-slim/perfil-html/api/novoperfil.php?end='+end,
            type: 'GET',
            dataType: 'html',
            success: function( result ) {
                $('#content').append( result );
                loading = false;
            }
        } );
    }
});

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
