$(".botaofavorita").click(function(){
    jQuery('.formfavorita').submit(function(){
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
        // location = 'http://localhost:8888/elenco-ui/perfil-slim/perfil-html/addsearch.php';
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
