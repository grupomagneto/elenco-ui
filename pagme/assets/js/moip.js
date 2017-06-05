$(document).ready(function(){
    $("#sendToMoip").click(function(){
        var forma_pagamento = "Cartão de Crédito";
        applyToken();
        sendToCreditCard();
    });
    $("#sendToMoip2").click(function(){
        var forma_pagamento = "Boleto Bancário";
        applyToken();
        sendToBoleto();
    });
});
sendToCreditCard = function() {
    var n_parcelas = $("#parcelas").val();
    var settings = {
        "Forma": "CartaoCredito",
        "Instituicao": $("#instituicao").val(),
        "Parcelas": $("#parcelas").val(),
        "Recebimento": "AVista",
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
    var n_parcelas = "1";
    var settings = {
        "Forma": "BoletoBancario"
    };
    // $("#sendToMoip2").attr("disabled", "disabled");
    MoipWidget(settings);
};

var sucesso = function(data){
    // alert(data.Mensagem +
    //     '\n\n Status: ' + data.Status +
    //     '\n Status Pagamento: ' + data.StatusPagamento +
    //     '\n ID Moip: ' + data.CodigoMoIP +
    //     '\n Valor Pago: ' + data.TotalPago +
    //     '\n Taxa Moip: ' + data.TaxaMoIP +
    //     '\n Mensagem: ' + data.Mensagem +
    //     '\n Cod. Operadora: ' + data.CodigoRetorno);
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
        "valor_venda" : valor_venda,
        "forma_pagamento" : forma_pagamento,
        "n_parcelas" : n_parcelas
    };
    jQuery.ajax({
      type: "POST",
      dataType: "json",
      url: "http://localhost:8888/elenco-ui/pagme/confirma_venda.php",
      data: dados
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