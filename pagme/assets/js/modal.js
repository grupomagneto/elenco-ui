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
  $('.atualiza-dados').fadeOut(0);
  $('.renova_04').fadeOut(0);
  $('.renova_05').fadeOut(0);
  $('.renova_06').fadeOut(0);
  $('.confirmacao-dados-cartao').fadeOut(0);
  $('.dados-cartao').fadeOut(0);
  $('.voltar').fadeOut(0);
  $('.progresso').fadeOut(0);
  $('.navegacao').css('justify-content', 'flex-end');
});
$('.fechar').click(function(){
  $('#myModal').fadeOut(250);
});
$('#botao_renovar-contrato').click(function(){
    $('.renova_01').fadeOut(0);
    $('.renova_02-1').fadeIn(200);
    $('.voltar').fadeIn(200);
    $('.progresso').fadeIn(200);
    $('.navegacao').css('justify-content', 'space-between');
    $('.modal-content').css('height', '600px');
});
$('#botao_apagar-perfil').click(function(){
    $('.renova_01').fadeOut(0);
    $('.renova_02-2').fadeIn(200);
    $('.voltar').fadeIn(200);
    $('.navegacao').css('justify-content', 'space-between');
});
$('#botao_confirma_apagar').click(function(){
  // Ajax Cadastros
  jQuery('form').submit(function(){
    var dados2 = jQuery( this ).serialize();
    jQuery.ajax({
      type: 'POST',
      dataType: 'html',
      url: 'http://localhost:8888/elenco-ui/pagme/apaga_cadastro.php',
      data: dados2,
      success: function( data ) {
        $('.renova_02-2').fadeOut(0);
        $('.navegacao').css('justify-content', 'flex-end');
        $('.renova_02-3').fadeIn(200);
        // Recarrega em 5 segundos
        setTimeout(function() {window.location.href='index.php';},10000);
        // Exibe o timer
        var count=10;
        var counter=setInterval(timer, 1000); //1000 will run it every 1 second
        function timer() {
          count=count-1;
          if (count <= 0){
            clearInterval(counter);
            return;
          }
          document.getElementById("timer").innerHTML="Sua sessão será encerrada em " + count + " segundos"; // watch for spelling
        }
      }
    });
    return false;
  });
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
  $('.requerido').fadeOut(0);
  $('.renova_02-1').fadeIn(200);
  $('.navegacao').css('justify-content', 'space-between');
  $('.modal-content').css('height', '600px');
  // $('.titulo').css('margin-top', '-10px');
  // $('.descricao').css('margin', '0px 20px 0px 20px');
});
$('.voltar_3').click(function(){
  $('.renova_04').fadeOut(0);
  $('.botao_saldo').fadeOut(0);
  $('.atualiza-dados').fadeIn(200);
  $('.modal-content').css('height', '700px');
});
$('.voltar_4').click(function(){
  $('.renova_05').fadeOut(0);
  // $('.renova_05-2').fadeOut(0);
  $('.renova_04').fadeIn(200);
  $('.navegacao').css('justify-content', 'space-between');
  $('.modal-content').css('height', '400px');
  $('.titulo').css('margin-top', '-10px');
  $('.descricao').css('margin', '0px 20px 0px 20px');
});
$('.voltar_atualiza-dados').click(function(){
  $('.atualiza-dados').fadeOut(0);
  $('.renova_02-1').fadeIn(200);
  $('.navegacao').css('justify-content', 'space-between');
  $('.modal-content').css('height', '600px');
  document.getElementById("terms-1").checked = false;
  document.getElementById("terms-2").checked = false;
  document.getElementById("terms-3").checked = false;
});
$('#btn_renova-cadastro-gratuito').click(function(){
  if(!$('#terms-1').is(':checked')){
    $('.requerido').fadeIn(200);
    event.preventDefault();
  }
  if($('#terms-1').is(':checked')){
    $('.renova_03-gratuito').fadeOut(0);
    $('.modal-content').css('height', '725px');
    $('.atualiza-dados').fadeIn(200);
    document.getElementById("input-botao_atualiza-dados").value = "gratuito";
    event.preventDefault();
  }
});
$('#btn_renova-cadastro-premium').click(function(){
  if(!$('#terms-2').is(':checked')){
    $('.requerido').fadeIn(200);
    event.preventDefault();
  }
  if($('#terms-2').is(':checked')){
    $('.renova_03-premium').fadeOut(0);
    $('.modal-content').css('height', '725px');
    $('.atualiza-dados').fadeIn(200);
    document.getElementById("input-botao_atualiza-dados").value = "premium";
    document.getElementById("amount").value = "19900";
    document.getElementById("valor_pagar-cartao").innerHTML = "199";
    event.preventDefault();
  }
});
$('#btn_renova-cadastro-profissional').click(function(){
  if(!$('#terms-3').is(':checked')){
    $('.requerido').fadeIn(200);
    event.preventDefault();
  }
  if($('#terms-3').is(':checked')){
    $('.renova_03-profissional').fadeOut(0);
    $('.modal-content').css('height', '725px');
    $('.atualiza-dados').fadeIn(200);
    document.getElementById("input-botao_atualiza-dados").value = "profissional";
    document.getElementById("amount").value = "79900";
    document.getElementById("valor_pagar-cartao").innerHTML = "799";
    event.preventDefault();
  }
});
$('#botao_atualizar-dados').click(function(){
  if (document.getElementById("input-botao_atualiza-dados").value == "gratuito") {
    // Ajax Atualiza Dados
    jQuery('#form_atualiza-dados').submit(function(){
      var dados = jQuery( this ).serialize();
      jQuery.ajax({
        type: 'POST',
        dataType: 'html',
        url: 'http://localhost:8888/elenco-ui/pagme/atualiza_dados.php',
        data: dados,
        success: function( data ) {
          event.preventDefault();
        }
      });
      return false;
    });
    // Ajax Renova Cadastros
    jQuery('#form_atualiza-dados').submit(function(){
      var dados = jQuery( this ).serialize();
      jQuery.ajax({
        type: 'POST',
        dataType: 'html',
        url: 'http://localhost:8888/elenco-ui/pagme/renova_cadastro.php',
        data: dados,
        success: function( data ) {
          $('.atualiza-dados').fadeOut(0);
          $('.modal-content').css('height', '350px');
          $('.renova_06').fadeIn(200);
          // $('.titulo').css('margin-top', '-10px');
          // $('.descricao').css('margin', '0px 20px 0px 20px');
          $('.navegacao').css('justify-content', 'flex-end');
          event.preventDefault();
        }
      });
      return false;
    });
  }
  else if (document.getElementById("input-botao_atualiza-dados").value == "premium") {
    // Ajax Atualiza Dados
    jQuery('#form_atualiza-dados').submit(function(){
      var dados = jQuery( this ).serialize();
      jQuery.ajax({
        type: 'POST',
        dataType: 'html',
        url: 'http://localhost:8888/elenco-ui/pagme/atualiza_dados.php',
        data: dados,
        success: function( data ) {
          $('.atualiza-dados').fadeOut(0);
          $('.renova_04').fadeIn(200);
          // $('.titulo').css('margin-top', '-10px');
          // $('.descricao').css('margin', '0px 20px 0px 20px');
          var valor = 199;
          var recebivel = document.getElementById("recebivel").innerHTML;
          document.getElementById("cadastro").innerHTML = "Premium";
          document.getElementById("input_saldo").value = "premium";
          document.getElementById("valor_cadastro").value = valor;
          if (parseInt(recebivel,10) >= valor) {
            $('.modal-content').css('height', '400px');
            $('#botao_saldo').fadeIn(0);
            document.getElementById("descricao-pagamento").innerHTML = "Parcele em até 10x sem juros no Cartão de Crédito ou utilize seu Saldo de Cachês a receber.";
            document.getElementById("valor").innerHTML = valor;
            var remanescente = parseInt(recebivel,10) - valor;
            document.getElementById("remanescente").innerHTML = remanescente;
            $('.valor-cadastro').css('background', '#CC64E0');
          }
          if (parseInt(recebivel,10) < valor) {
            $('.modal-content').css('height', '350px');
            $('#botao_saldo').fadeOut(0);
            document.getElementById("descricao-pagamento").innerHTML = "Parcele em até 10x sem juros no Cartão de Crédito ou pague por Boleto Bancário.";
          }
          event.preventDefault();
        }
      });
      return false;
    });       
  }
  else if (document.getElementById("input-botao_atualiza-dados").value == "profissional") {
    // Ajax Atualiza Dados
    jQuery('#form_atualiza-dados').submit(function(){
      var dados = jQuery( this ).serialize();
      jQuery.ajax({
        type: 'POST',
        dataType: 'html',
        url: 'http://localhost:8888/elenco-ui/pagme/atualiza_dados.php',
        data: dados,
        success: function( data ) {
          $('.atualiza-dados').fadeOut(0);
          $('.renova_04').fadeIn(200);
          // $('.titulo').css('margin-top', '-10px');
          // $('.descricao').css('margin', '0px 20px 0px 20px');
          var valor = 799;
          var recebivel = document.getElementById("recebivel").innerHTML;
          document.getElementById("cadastro").innerHTML = "Profissional";
          document.getElementById("input_saldo").value = "profissional";
          document.getElementById("valor_cadastro").value = valor;
          if (parseInt(recebivel,10) >= valor) {
            $('.modal-content').css('height', '400px');
            $('#botao_saldo').fadeIn(0);
            document.getElementById("descricao-pagamento").innerHTML = "Parcele em até 10x sem juros no Cartão de Crédito ou utilize seu Saldo de Cachês a receber.";
            document.getElementById("valor").innerHTML = valor;
            var remanescente = parseInt(recebivel,10) - valor;
            document.getElementById("remanescente").innerHTML = remanescente;
            $('.valor-cadastro').css('background', '#2AA6E4');
          }
          if (parseInt(recebivel,10) < valor) {
            $('.modal-content').css('height', '350px');
            $('#botao_saldo').fadeOut(0);
            document.getElementById("descricao-pagamento").innerHTML = "Parcele em até 10x sem juros no Cartão de Crédito ou pague por Boleto Bancário.";
          }
          event.preventDefault();
        }
      });
      return false;
    });       
  }
});
$('#botao_saldo').click(function(){
  $('.renova_04').fadeOut(0);
  $('.renova_05').fadeIn(200);
  $('.titulo').css('margin-top', '-10px');
  $('.descricao').css('margin', '0px 20px 0px 20px');
  $('.modal-content').css('height', '500px');
});
$('#botao_credito').click(function(){
  $('.renova_04').fadeOut(0);
  $('.confirmacao-dados-cartao').fadeIn(200);
  $('.modal-content').css('height', '350px');
});
$('#botao_boleto').click(function(){
  $('.renova_04').fadeOut(0);
  // $('.renova_05-2').fadeIn(200);
  $('.modal-content').css('height', '350px');
});
$('.checado').click(function(){
  $('.requerido').fadeOut(200);
});
$('#botao_dados-cartao-sim').click(function(){
  $('.confirmacao-dados-cartao').fadeOut(0);
  $('.dados-cartao').fadeIn(200);
  $('.modal-content').css('height', '500px');
});
$('#confirmar-saldo').click(function(){
  // Ajax Cadastros
    jQuery('form').submit(function(){
      var dados_2 = jQuery( this ).serialize();
      jQuery.ajax({
        type: 'POST',
        dataType: 'html',
        url: 'http://localhost:8888/elenco-ui/pagme/renova_cadastro.php',
        data: dados_2,
        success: function( data ) {
          $('.renova_05').fadeOut(0);
          $('.renova_06').fadeIn(200);
          $('.modal-content').css('height', '350px');
          // $('.titulo').css('margin-top', '-10px');
          // $('.descricao').css('margin', '0px 20px 0px 20px');
          $('.navegacao').css('justify-content', 'flex-end');
        }
      });
      return false;
    });
});
// ENCRIPTANDO DADOS DO CARTÃO PELO PAGAR.ME
$(document).ready(function() { // quando o jQuery estiver carregado...
    PagarMe.encryption_key = "ek_test_Ec8KhxISQ1tug1b8bCGxC2nXfxqRmk";

    var form = $("#payment_form");

    form.submit(function(event) { // quando o form for enviado...
        // inicializa um objeto de cartão de crédito e completa
        // com os dados do form
        var creditCard = new PagarMe.creditCard();
        creditCard.cardHolderName = $("#payment_form #card_holder_name").val();
        creditCard.cardExpirationMonth = $("#payment_form #card_expiration_month").val();
        creditCard.cardExpirationYear = $("#payment_form #card_expiration_year").val();
        creditCard.cardNumber = $("#payment_form #card_number").val();
        creditCard.cardCVV = $("#payment_form #card_cvv").val();

        // pega os erros de validação nos campos do form
        var fieldErrors = creditCard.fieldErrors();

        //Verifica se há erros
        var hasErrors = false;
        for(var field in fieldErrors) { hasErrors = true; break; }

        if(hasErrors) {
            // realiza o tratamento de errors
            alert(fieldErrors);
        } else {
            // se não há erros, gera o card_hash...
            creditCard.generateHash(function(cardHash) {
                // ...coloca-o no form...
                form.append($('<input type="hidden" name="card_hash">').val(cardHash));
                // e envia o form
                form.get(0).submit();
            });
        }

        return false;
    });
});
// FORMAT OS SELECTS
$('#installments').each(function(){
    var $this = $(this), numberOfOptions = $(this).children('option').length;
    $this.addClass('select-hidden'); 
    $this.wrap('<div class="select"></div>');
    $this.after('<div class="select-styled"></div>');
    var $styledSelect = $this.next('div.select-styled');
    $styledSelect.text($this.children('option').eq(0).text());
    var $list = $('<ul />', {
        'class': 'select-options'
    }).insertAfter($styledSelect);
    for (var i = 0; i < numberOfOptions; i++) {
        $('<li />', {
            text: $this.children('option').eq(i).text(),
            rel: $this.children('option').eq(i).val()
        }).appendTo($list);
    }
    var $listItems = $list.children('li');
    $styledSelect.click(function(e) {
        e.stopPropagation();
        $('div.select-styled.active').each(function(){
            $(this).removeClass('active').next('ul.select-options').hide();
        });
        $(this).toggleClass('active').next('ul.select-options').toggle(); 
    });
    $listItems.click(function(e) {
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass('active');
        $this.val($(this).attr('rel'));
        $list.hide();
        //console.log($this.val());
    });
    $(document).click(function() {
        $styledSelect.removeClass('active');
        $list.hide();
    });
});