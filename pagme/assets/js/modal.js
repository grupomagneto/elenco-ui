// Get the modal
var modal = document.getElementById('myModal');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    $('#myModal').fadeOut(250);
  }
}
// When the user presses ESC, close the modal
$(document).keyup(function(e) {
  if (e.keyCode == 27) {
    $('#myModal').fadeOut(250);
  }
});
$(window).on('load',function(){
  $('#myModal').fadeIn(250);
  $('.renova_02-1').fadeOut(0);
  $('.renova_02-2').fadeOut(0);
  $('.renova_02-3').fadeOut(0);
  $('.renova_03-gratuito').fadeOut(0);
  $('.renova_03-premium').fadeOut(0);
  $('.renova_03-profissional').fadeOut(0);
  $('.renova_04').fadeOut(0);
  $('.renova_05').fadeOut(0);
  $('.renova_06').fadeOut(0);
  $('.renova_05-2').fadeOut(0);
  $('.voltar').fadeOut(0);
  $('.progresso').fadeOut(0);
  $('.navegacao').css('justify-content', 'flex-end');
});
$('.fechar').click(function(){
  $('#myModal').fadeOut(250);
});
$('.botao_renovar-contrato').click(function(){
    $('.renova_01').fadeOut(0);
    $('.renova_02-1').fadeIn(200);
    $('.voltar').fadeIn(200);
    $('.progresso').fadeIn(200);
    $('.navegacao').css('justify-content', 'space-between');
    $('.modal-content').css('height', '600px');
});
$('.botao_apagar-perfil').click(function(){
    $('.renova_01').fadeOut(0);
    $('.renova_02-2').fadeIn(200);
    $('.voltar').fadeIn(200);
    $('.navegacao').css('justify-content', 'space-between');
});
$('.botao_confirma_apagar').click(function(){
  $('.renova_02-2').fadeOut(0);
  $('.navegacao').css('justify-content', 'flex-end');
  $('.renova_02-3').fadeIn(200);
});
$('.gratuito').click(function(){
    $('.renova_02-1').fadeOut(0);
    $('.renova_03-gratuito').fadeIn(200);
    $('.modal-content').css('height', '725px');
    $('.titulo').css('margin-top', '15px');
    $('.descricao').css('margin', '25px');
});
$('.premium').click(function(){
    $('.renova_02-1').fadeOut(0);
    $('.renova_03-premium').fadeIn(200);
    $('.modal-content').css('height', '850px');
    $('.titulo').css('margin-top', '15px');
    $('.descricao').css('margin', '25px');
});
$('.profissional').click(function(){
    $('.renova_02-1').fadeOut(0);
    $('.renova_03-profissional').fadeIn(200);
    $('.modal-content').css('height', '1110px');
    $('.titulo').css('margin-top', '15px');
    $('.descricao').css('margin', '25px');
});
$('.voltar_1').click(function(){
  $('.renova_02-1').fadeOut(0);
  $('.renova_01').fadeIn(200);
  $('.modal-content').css('height', '350px');
  $('.navegacao').css('justify-content', 'flex-end');
});
$('.voltar_1-2').click(function(){
  $('.renova_02-2').fadeOut(0);
  $('.renova_01').fadeIn(200);
  $('.navegacao').css('justify-content', 'flex-end');
});
$('.voltar_2').click(function(){
  $('.renova_03-gratuito').fadeOut(0);
  $('.renova_03-premium').fadeOut(0);
  $('.renova_03-profissional').fadeOut(0);
  $('.requerido').fadeOut(200);
  $('.renova_02-1').fadeIn(200);
  $('.navegacao').css('justify-content', 'space-between');
  $('.modal-content').css('height', '600px');
  $('.titulo').css('margin-top', '-10px');
  $('.descricao').css('margin', '0px 20px 0px 20px');
});
$('.voltar_3').click(function(){
  $('.renova_04').fadeOut(0);
  $('.renova_02-1').fadeIn(200);
  $('.navegacao').css('justify-content', 'space-between');
  $('.modal-content').css('height', '600px');
  $('.titulo').css('margin-top', '-10px');
  $('.descricao').css('margin', '0px 20px 0px 20px');
});
$('.voltar_4').click(function(){
  $('.renova_05').fadeOut(0);
  $('.renova_05-2').fadeOut(0);
  $('.renova_04').fadeIn(200);
  $('.navegacao').css('justify-content', 'space-between');
  $('.modal-content').css('height', '350px');
});
$('#btn_renova-cadastro-gratuito').click(function(){
  if(!$('#terms-1').is(':checked')){
    $('.requerido').fadeIn(200);
    e.preventDefault();
  }
  if($('#terms-1').is(':checked')){
    $('.renova_03-gratuito').fadeOut(0);
    $('.modal-content').css('height', '350px');
    $('.renova_06').fadeIn(200);
    $('.titulo').css('margin-top', '-10px');
    $('.descricao').css('margin', '0px 20px 0px 20px');
    $('.navegacao').css('justify-content', 'flex-end');

    // Ajax Cadastros
// $('.escolher').click(function(){
//     jQuery('form').submit(function(){
//     var dados = jQuery( this ).serialize();

//     jQuery.ajax({
//       type: 'POST',
//       dataType: 'html',
//       url: 'http://localhost:8888/elenco-ui/pagme/renova_cadastro.php',
//       data: dados,
//       success: function( data ) {
//         $('.renova_04').html(data);
//         $('.renova_03-gratuito').fadeOut(0);
//         $('.renova_03-premium').fadeOut(0);
//         $('.renova_03-profissional').fadeOut(0);
//         $('.modal-content').fadeOut(0);
//         $('.renova_04').fadeIn(200);
//       }
//     });
//     return false;
//     });
// });
  }
});
$('#btn_renova-cadastro-premium').click(function(){
  if(!$('#terms-2').is(':checked')){
    $('.requerido').fadeIn(200);
    e.preventDefault();
  }
  if($('#terms-2').is(':checked')){
    $('.renova_03-premium').fadeOut(0);
    $('.modal-content').css('height', '350px');
    $('.renova_04').fadeIn(200);
    $('.titulo').css('margin-top', '-10px');
    $('.descricao').css('margin', '0px 20px 0px 20px');
    document.getElementById("cadastro").innerHTML = "Premium";
    var recebivel = document.getElementById("recebivel").innerHTML;
    var valor = 199;
    if (parseInt(recebivel,10) >= valor) {
      $('.botao_saldo').fadeIn(0);
      document.getElementById("descricao-pagamento").innerHTML = "Parcele em até 10x sem juros no Cartão de Crédito ou utilize seu Saldo de Cachês a receber.";
      document.getElementById("valor").innerHTML = valor;
      var remanescente = parseInt(recebivel,10) - valor;
      document.getElementById("remanescente").innerHTML = remanescente;
      $('.valor-cadastro').css('background', '#CC64E0');
    }
    if (parseInt(recebivel,10) < valor) {
      $('.botao_saldo').fadeOut(0);
      document.getElementById("descricao-pagamento").innerHTML = "Parcele em até 10x sem juros no Cartão de Crédito ou pague por Boleto Bancário.";
    }
        // Ajax Cadastros
// $('.escolher').click(function(){
//     jQuery('form').submit(function(){
//     var dados = jQuery( this ).serialize();

//     jQuery.ajax({
//       type: 'POST',
//       dataType: 'html',
//       url: 'http://localhost:8888/elenco-ui/pagme/renova_cadastro.php',
//       data: dados,
//       success: function( data ) {
//         $('.renova_04').html(data);
//         $('.renova_03-gratuito').fadeOut(0);
//         $('.renova_03-premium').fadeOut(0);
//         $('.renova_03-profissional').fadeOut(0);
//         $('.modal-content').fadeOut(0);
//         $('.renova_04').fadeIn(200);
//       }
//     });
//     return false;
//     });
// });
  }
});
$('#btn_renova-cadastro-profissional').click(function(){
  if(!$('#terms-3').is(':checked')){
    $('.requerido').fadeIn(200);
    e.preventDefault();
  }
  if($('#terms-3').is(':checked')){
    $('.renova_03-profissional').fadeOut(0);
    $('.modal-content').css('height', '350px');
    $('.renova_04').fadeIn(200);
    $('.titulo').css('margin-top', '-10px');
    $('.descricao').css('margin', '0px 20px 0px 20px');
    document.getElementById("cadastro").innerHTML = "Profissional";
    var recebivel = document.getElementById("recebivel").innerHTML;
    var valor = 799;
    if (parseInt(recebivel,10) >= valor) {
      $('.botao_saldo').fadeIn(0);
      document.getElementById("descricao-pagamento").innerHTML = "Parcele em até 10x sem juros no Cartão de Crédito ou utilize seu Saldo de Cachês a receber.";
      document.getElementById("valor").innerHTML = valor;
      var remanescente = parseInt(recebivel,10) - valor;
      document.getElementById("remanescente").innerHTML = remanescente;
      $('.valor-cadastro').css('background', '#2AA6E4');
    }
    if (parseInt(recebivel,10) < valor) {
      $('.botao_saldo').fadeOut(0);
      document.getElementById("descricao-pagamento").innerHTML = "Parcele em até 10x sem juros no Cartão de Crédito ou pague por Boleto Bancário.";
    }
            // Ajax Cadastros
// $('.escolher').click(function(){
//     jQuery('form').submit(function(){
//     var dados = jQuery( this ).serialize();

//     jQuery.ajax({
//       type: 'POST',
//       dataType: 'html',
//       url: 'http://localhost:8888/elenco-ui/pagme/renova_cadastro.php',
//       data: dados,
//       success: function( data ) {
//         $('.renova_04').html(data);
//         $('.renova_03-gratuito').fadeOut(0);
//         $('.renova_03-premium').fadeOut(0);
//         $('.renova_03-profissional').fadeOut(0);
//         $('.modal-content').fadeOut(0);
//         $('.renova_04').fadeIn(200);
//       }
//     });
//     return false;
//     });
// });
  }
});
$('.botao_saldo').click(function(){
  $('.renova_04').fadeOut(0);
  $('.renova_05').fadeIn(200);
  $('.modal-content').css('height', '450px');
});
$('.botao_gateway').click(function(){
  $('.renova_04').fadeOut(0);
  $('.renova_05-2').fadeIn(200);
  $('.modal-content').css('height', '350px');
});
$('.checado').click(function(){
  $('.requerido').fadeOut(200);
});
$('.confirmar-saldo').click(function(){
  $('.renova_05').fadeOut(0);
  $('.renova_06').fadeIn(200);
  $('.modal-content').css('height', '350px');
  $('.titulo').css('margin-top', '-10px');
  $('.descricao').css('margin', '0px 20px 0px 20px');
  $('.navegacao').css('justify-content', 'flex-end');
});

