$(document).ready(function () {

	$(".botaofavorita").click(function () {
		var dados = {
			imagefavorita: $("#imagefavorita").val()
		};

		$.ajax({
			url: 'http://localhost:8888/elenco-ui/perfil-slim/perfil-html/addsearch.php',
			type: 'POST',
			dataType: 'html',
			data: dados,

		success: function (result) {

		alert("Sucesso ajax!!!");
			$("#resultado").html(result);
		},

		error: function (result) {
			console.log(result);
			alert('Erro: passar para php!!');
		}

   	});
  });
});

// jQuery(document).ready(function(){
// 	jQuery('#formfavorita').submit(function(){
// 		var dados = jQuery( this ).serialize();

// 		jQuery.ajax({
// 			type: "POST",
// 			dataType: 'html',
// 			url: "http://localhost:8888/elenco-ui/perfil-slim/perfil-html/addsearch.php",
// 			data: dados,
// 			success: function( data )
// 			{
// 				alert("Sucesso ajax");
// 				$("#resultado").html(result);
// 				// window.location.href = 'http://localhost:8888/elenco-ui/perfil-slim/perfil-html/addsearch.php';
// 			}
// 		});
		
// 		return false;
// 	});
// })
