$(document).ready(function () {

	$("#botaofavorita").click(function () {
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
			window.location.replace("http://localhost:8888/elenco-ui/perfil-slim/perfil-html/addsearch.php");
			$("#resultado_nome").html(result);
		},

		error: function (result) {
			console.log(result);
			alert('Erro: Inserir Registro!!');
		}

   	});
  });
});
