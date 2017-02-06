// $(document).ready(function () {

// 	$(".botaofavorita").click(function () {

// 		var dados = {
// 			$("#formfavorita").serialize();
// 			// 'imagefavorita': $(".imagefavorita").val()
// 		};

// 		$.ajax({
// 			url: 'http://localhost:8888/elenco-ui/perfil-slim/perfil-html/addsearch.php',
// 			type: 'post',
// 			dataType: 'html',
// 			data: dados,

// 		success: function (result) {

// 		// alert("Sucesso ajax!!!");
// 		// location = ("http://localhost:8888/elenco-ui/perfil-slim/perfil-html/addsearch.php");
// 			$(".resultado").html(result);
// 		},

// 		error: function (result) {
// 			console.log(result);
// 			alert('Erro: passar para php!!');
// 		}

//    	});
//   });
// });


$(".botaofavorita").click(function(){
  $("#formfavorita").submit();
});  

jQuery(document).ready(function(){
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
				$(".favoritado").html(data);
				// location = 'http://localhost:8888/elenco-ui/perfil-slim/perfil-html/addsearch.php';
			}
		});
		
		return false;
	});
})
