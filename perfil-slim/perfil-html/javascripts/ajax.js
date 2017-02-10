$(".botaofavorita").click(function(){
  	jQuery('#formfavorita').submit(function(){
		var dados = jQuery( this ).serialize();

		jQuery.ajax({
			type: "POST",
			dataType: 'html',
			url: "http://localhost:8888/elenco-ui/perfil-slim/perfil-html/addsearch.php",
			data: dados,
			success: function( data )
			{
				// alert("Sucesso ajax");
				// $("#formfavorita").submit();
				// $('.img__fav').attr('src', img);
				$(".favoritado").html(data);
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

    cols += '<td>&nbsp;</td>';
    cols += '<td>&nbsp;</td>';
    cols += '<td>&nbsp;</td>';
    cols += '<td>&nbsp;</td>';

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
