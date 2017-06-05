$(document).ready(function(){
    $("#sendToMoip").click(function(){
        applyToken();
        sendToCreditCard();
    });
    $("#sendToMoip2").click(function(){
        applyToken();
        sendToBoleto();
    });
});
sendToCreditCard = function() {
    document.getElementById("forma_pagamento").value = "Cartão de Crédito";
    document.getElementById("n_parcelas").value = $("#parcelas").val();
    var settings = {
        "Forma": "CartaoCredito",
        "Instituicao": $("#instituicao").val(),
        "Parcelas": $("#parcelas").val(),
        // "Recebimento": "AVista",
        "Recebimento": "Parcelado",
        "CartaoCredito": {
            "Numero": $("input[name=Numero]").val(),
            "Expiracao": $("input[name=Expiracao]").val(),
            "CodigoSeguranca": $("input[name=CodigoSeguranca]").val(),
            "Portador": {
                "Nome": $("input[name=Portador]").val(),
                "DataNascimento": $("input[name=DataNascimento]").val(),
                "Telefone": $("input[name=Telefone]").val(),
                "Identidade": $("input[name=CPF]").val()
            }
        }
    }
    $("#sendToMoip").attr("disabled", "disabled");
    MoipWidget(settings);
 };

sendToBoleto = function() {
    document.getElementById("forma_pagamento").value = "Boleto Bancário";
    document.getElementById("n_parcelas").value = "1";
    var settings = {
        "Forma": "BoletoBancario"
    };
		
    // $("#sendToMoip2").attr("disabled", "disabled");
    MoipWidget(settings);
};

var sucesso = function(data){
     alert(data.Mensagem +
         '\n\n Status: ' + data.Status +
         '\n Status Pagamento: ' + data.StatusPagamento +
         '\n ID Moip: ' + data.CodigoMoIP +
         '\n Valor Pago: ' + data.TotalPago +
         '\n Taxa Moip: ' + data.TaxaMoIP +
         '\n Mensagem: ' + data.Mensagem +
         '\n Cod. Operadora: ' + data.CodigoRetorno);
	
	
     alert("Dados\n\n" + JSON.stringify(data));
    $("#sendToMoip").removeAttr("disabled");
    $(".div-renovar_imprimir-boleto").fadeOut(0);
    $(".div-renovar_dados-cartao").fadeOut(0);
    $(".div-renovar_sucesso-renovacao").fadeIn(200);
    $(".navegacao").css("justify-content", "flex-end");
    $(".modal-content").css("height", "350px");
    // Ajax Renova Cadastros
    var valor_venda = data.TotalPago - data.TaxaMoIP;
    var dados = {
        valor_venda: valor_venda,
        forma_pagamento: document.getElementById("forma_pagamento").value,
        n_parcelas: document.getElementById("n_parcelas").value
    };
    jQuery.ajax({
      type: "POST",
      dataType: "html",
      url: "http://localhost:8888/elenco-ui/pagme/confirma_venda.php",
      data: dados,
      success: function( data ) {
        event.preventDefault();
      }
    });
    return false;
};

var erroValidacao = function(data) {
    alert("Erro !\n\n" + JSON.stringify(data));
    $("#sendToMoip").removeAttr("disabled");
};

var applyToken = function() {
  $("#MoipWidget").attr("data-token", $("#token").val());
};