$(".botaofavorita").click(function(){
    jQuery('.formfavorita').submit(function(){
    var dados = jQuery(" this ").serialize();

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
    jQuery('.formfavorita').submit(function(){
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


$(".show-list-single").click(function(){
    jQuery('.formfavorita').submit(function(){
    var dados = jQuery( this ).serialize();

    jQuery.ajax({
      type: "POST",
      dataType: 'html',
      url: "http://localhost:8888/elenco-ui/perfil-slim/perfil-html/api/single_profile.php",
      data: dados,
      success: function( data )
      {
        $(".photo__single").html(data);
//          $(".photo__single").load("../api/single_profile.php");
      }
    });
    return false;
  });
});


$(document).ready(function() {
$(".tab-image__background").click(function(){
    jQuery('.formfavorita').submit(function(){
//    var dados = jQuery(".tab-image__background").val();
    var dados = $("input[type=radio][name=array_key]").val();
//        var dados = $("input[name=rarray_key]").val();
//     var dados = $('input[name=array_key]:checked', '.formfavorita').val();

    jQuery.ajax({
      type: "GET",
      dataType: 'html',
      url: "http://localhost:8888/elenco-ui/perfil-slim/perfil-html/api/single_profile.php",
      data: dados,
      success: function( data )
      {
          alert(data);
//          alert($('input[name=array_key]:checked', '.formfavorita').val());
        $(".photo__single").html(data);
//          $(".photo__single").load("../api/single_profile.php");
      }
    });
    return false;
  });
}); 

});

$(".search_index").click(function(){
  jQuery('.perfil_index').submit(function(){
    var dados_index = jQuery( this ).serialize();

    jQuery.ajax({
      type: "POST",
      dataType: 'html',
      url: "http://localhost:8888/elenco-ui/perfil-slim/perfil-html/api/addsearch.php",
      data: dados_index,
      success: function ( data )
      {
        alert("PESQUISOU");
      }
    });
    return false;
  });
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
