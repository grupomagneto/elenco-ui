$(document).ready(function(){

  $("#sendToMoip").click(function(){
    applyToken();
    sendToCreditCard();
  });
	
	
  $("#boleto").click(function(){
    applyToken();
    sendToBoleto();
  });

});

sendToCreditCard = function() {
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
  var settings = {
    "Forma": "BoletoBancario"
  };

  MoipWidget(settings);
};

var sucesso = function(data){
    alert(data.Mensagem +
        '\n\n Status: ' + data.Status +
        '\n ID Moip: ' + data.CodigoMoIP +
        '\n Valor Pago: ' + data.TotalPago +
        '\n Taxa Moip: ' + data.TaxaMoIP +
        '\n Cod. Operadora: ' + data.CodigoRetorno);

    $("#sendToMoip").removeAttr("disabled");

};

var erroValidacao = function(data) {
    alert("Erro !\n\n" + JSON.stringify(data));
    $("#sendToMoip").removeAttr("disabled");
};

var applyToken = function() {
  $("#MoipWidget").attr("data-token", $("#token").val());
};