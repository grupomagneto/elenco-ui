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

// jQuery(document).ready(function(){

// })

