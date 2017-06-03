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
  $('.div-renovar_modalidades').fadeOut(0);
  $('.div-renovar_cancelar').fadeOut(0);
  $('.div-renovar_sucesso-cancelar').fadeOut(0);
  $('.div-renovar_gratuito').fadeOut(0);
  $('.div-renovar_premium').fadeOut(0);
  $('.div-renovar_profissional').fadeOut(0);
  $('.div-renovar_atualiza-dados').fadeOut(0);
  $('.div-renovar_forma-pagamento').fadeOut(0);
  $('.div-renovar_saldo-caches').fadeOut(0);
  $('.div-renovar_sucesso-renovacao').fadeOut(0);
  $('.div-renovar_confirmacao-dados-cartao').fadeOut(0);
  $('.div-renovar_dados-cartao').fadeOut(0);
  $('.div-renovar_dados-fatura-cartao').fadeOut(0);
  $('.div-renovar_dados-titular-cartao').fadeOut(0);
  $('.div-renovar_boleto-bancario').fadeOut(0);
  $('.voltar').fadeOut(0);
  $('.progresso').fadeOut(0);
  $('.navegacao').css('justify-content', 'flex-end');
});
$('.fechar').click(function(){
  $('#myModal').fadeOut(250);
});
$('#botao_renovar-contrato').click(function(){
    $('.div-renovar_renova-ou-cancela').fadeOut(0);
    $('.div-renovar_modalidades').fadeIn(200);
    $('.voltar').fadeIn(200);
    $('.progresso').fadeIn(200);
    $('.navegacao').css('justify-content', 'space-between');
    $('.modal-content').css('height', '600px');
});
$('#botao_apagar-perfil').click(function(){
    $('.div-renovar_renova-ou-cancela').fadeOut(0);
    $('.div-renovar_cancelar').fadeIn(200);
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
        $('.div-renovar_cancelar').fadeOut(0);
        $('.navegacao').css('justify-content', 'flex-end');
        $('.div-renovar_sucesso-cancelar').fadeIn(200);
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
    $('.div-renovar_modalidades').fadeOut(0);
    $('.div-renovar_gratuito').fadeIn(200);
    $('.modal-content').css('height', '725px');
    $('.titulo').css('margin-top', '15px');
    $('.descricao').css('margin', '25px');
});
$('.premium').click(function(){
    $('.div-renovar_modalidades').fadeOut(0);
    $('.div-renovar_premium').fadeIn(200);
    $('.modal-content').css('height', '850px');
    $('.titulo').css('margin-top', '15px');
    $('.descricao').css('margin', '25px');
});
$('.profissional').click(function(){
    $('.div-renovar_modalidades').fadeOut(0);
    $('.div-renovar_profissional').fadeIn(200);
    $('.modal-content').css('height', '1110px');
    $('.titulo').css('margin-top', '15px');
    $('.descricao').css('margin', '25px');
});
$('.voltar_1').click(function(){
  $('.div-renovar_modalidades').fadeOut(0);
  $('.div-renovar_renova-ou-cancela').fadeIn(200);
  $('.modal-content').css('height', '350px');
  $('.navegacao').css('justify-content', 'flex-end');
});
$('.voltar_1-2').click(function(){
  $('.div-renovar_cancelar').fadeOut(0);
  $('.div-renovar_renova-ou-cancela').fadeIn(200);
  $('.navegacao').css('justify-content', 'flex-end');
});
$('.voltar_2').click(function(){
  $('.div-renovar_gratuito').fadeOut(0);
  $('.div-renovar_premium').fadeOut(0);
  $('.div-renovar_profissional').fadeOut(0);
  $('.requerido').fadeOut(0);
  $('.div-renovar_modalidades').fadeIn(200);
  $('.navegacao').css('justify-content', 'space-between');
  $('.modal-content').css('height', '600px');
  // $('.titulo').css('margin-top', '-10px');
  // $('.descricao').css('margin', '0px 20px 0px 20px');
});
$('.voltar_3').click(function(){
  $('.div-renovar_forma-pagamento').fadeOut(0);
  $('.botao_saldo').fadeOut(0);
  $('.div-renovar_atualiza-dados').fadeIn(200);
  $('.modal-content').css('height', '700px');
});
$('.voltar_saldo-caches').click(function(){
  $('.div-renovar_saldo-caches').fadeOut(0);
  $('.div-renovar_forma-pagamento').fadeIn(200);
  $('.navegacao').css('justify-content', 'space-between');
  $('.modal-content').css('height', '400px');
  $('.titulo').css('margin-top', '-10px');
  $('.descricao').css('margin', '0px 20px 0px 20px');
});
$('.voltar_atualiza-dados').click(function(){
  $('.div-renovar_atualiza-dados').fadeOut(0);
  $('.div-renovar_modalidades').fadeIn(200);
  $('.navegacao').css('justify-content', 'space-between');
  $('.modal-content').css('height', '600px');
  document.getElementById("terms-1").checked = false;
  document.getElementById("terms-2").checked = false;
  document.getElementById("terms-3").checked = false;
});
$('.voltar_confirmacao-dados-cartao').click(function(){
  $('.div-renovar_confirmacao-dados-cartao').fadeOut(0);
  $('.div-renovar_forma-pagamento').fadeIn(200);
  $('.modal-content').css('height', '400px');
});
$('.voltar_dados-cartao').click(function(){
  $('.div-renovar_dados-cartao').fadeOut(0);
  $('.div-renovar_confirmacao-dados-cartao').fadeIn(200);
  $('.modal-content').css('height', '350px');
});
$('.voltar_dados-titular-cartao').click(function(){
  $('.div-renovar_dados-titular-cartao').fadeOut(0);
  $('.div-renovar_confirmacao-dados-cartao').fadeIn(200);
  $('.modal-content').css('height', '350px');
});
$('.voltar_dados-fatura-cartao').click(function(){
  $('.div-renovar_dados-fatura-cartao').fadeOut(0);
  $('.div-renovar_dados-titular-cartao').fadeIn(200);
  $('.modal-content').css('height', '550px');
});
$('#btn_renova-cadastro-gratuito').click(function(){
  if(!$('#terms-1').is(':checked')){
    $('.requerido').fadeIn(200);
    event.preventDefault();
  }
  if($('#terms-1').is(':checked')){
    $('.div-renovar_gratuito').fadeOut(0);
    $('.modal-content').css('height', '725px');
    $('.div-renovar_atualiza-dados').fadeIn(200);
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
    $('.div-renovar_premium').fadeOut(0);
    $('.modal-content').css('height', '725px');
    $('.div-renovar_atualiza-dados').fadeIn(200);
    document.getElementById("input-botao_atualiza-dados").value = "premium";
    document.getElementById("amount").value = "19900";
    document.getElementById("valor_pagar-cartao").innerHTML = "199";
    document.getElementById("envia_dados-cadastro").value = "Cadastro Premium";
    document.getElementById("envia_dados-valor").value = "199.00";
    event.preventDefault();
  }
});
$('#btn_renova-cadastro-profissional').click(function(){
  if(!$('#terms-3').is(':checked')){
    $('.requerido').fadeIn(200);
    event.preventDefault();
  }
  if($('#terms-3').is(':checked')){
    $('.div-renovar_profissional').fadeOut(0);
    $('.modal-content').css('height', '725px');
    $('.div-renovar_atualiza-dados').fadeIn(200);
    document.getElementById("input-botao_atualiza-dados").value = "profissional";
    document.getElementById("amount").value = "79900";
    document.getElementById("valor_pagar-cartao").innerHTML = "799";
    document.getElementById("envia_dados-cadastro").value = "Cadastro Profissional";
    document.getElementById("envia_dados-valor").value = "799.00";
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
          $('.div-renovar_atualiza-dados').fadeOut(0);
          $('.div-renovar_forma-pagamento').fadeOut(0);
          $('.modal-content').css('height', '350px');
          $('.div-renovar_sucesso-renovacao').fadeIn(200);
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
          $('.div-renovar_atualiza-dados').fadeOut(0);
          $('.div-renovar_forma-pagamento').fadeIn(200);
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
          $('.div-renovar_atualiza-dados').fadeOut(0);
          $('.div-renovar_forma-pagamento').fadeIn(200);
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
  $('.div-renovar_forma-pagamento').fadeOut(0);
  $('.div-renovar_saldo-caches').fadeIn(200);
  $('.titulo').css('margin-top', '-10px');
  $('.descricao').css('margin', '0px 20px 0px 20px');
  $('.modal-content').css('height', '500px');
});
$('#botao_credito').click(function(){
  $('.div-renovar_forma-pagamento').fadeOut(0);
  $('.div-renovar_confirmacao-dados-cartao').fadeIn(200);
  $('.modal-content').css('height', '350px');
  // Ajax Dados Cartão
    jQuery('form').submit(function(){
      var novos_dados = jQuery( this ).serialize();
      jQuery.ajax({
        type: 'POST',
        dataType: 'html',
        url: 'http://localhost:8888/elenco-ui/pagme/puxa_dados.php',
        data: novos_dados,
        success: function( data ) {
          // alert(data);
          var dados_novos = JSON.parse(data);
          document.getElementById("envia_dados-nome").value = (dados_novos['nome']);
          document.getElementById("envia_dados-email").value = (dados_novos['email']);
          document.getElementById("envia_dados-endereco").value = (dados_novos['endereco']);
          document.getElementById("envia_dados-numero").value = (dados_novos['numero']);
          document.getElementById("envia_dados-complemento").value = (dados_novos['complemento']);
          document.getElementById("envia_dados-cidade").value = (dados_novos['cidade']);
          document.getElementById("envia_dados-bairro").value = (dados_novos['bairro']);
          document.getElementById("envia_dados-uf").value = (dados_novos['uf']);
          document.getElementById("envia_dados-cep").value = (dados_novos['cep']);
          document.getElementById("envia_dados-tel").value = (dados_novos['tel']);
          event.preventDefault();
          }
      });
      return false;
    });
});
$('#botao_boleto').click(function(){
  $('.div-renovar_forma-pagamento').fadeOut(0);
  $('.div-renovar_boleto-bancario').fadeIn(200);
  $('.modal-content').css('height', '350px');
  $('.navegacao').css('justify-content', 'flex-end');
});
$('.checado').click(function(){
  $('.requerido').fadeOut(200);
});
$('#botao_dados-cartao-sim').click(function(){
  $('.div-renovar_confirmacao-dados-cartao').fadeOut(0);
  $('.div-renovar_dados-cartao').fadeIn(200);
  $('.modal-content').css('height', '550px');
  // Ajax Token
    jQuery('form').submit(function(){
      var dados_enviados = jQuery( this ).serialize();
      jQuery.ajax({
        type: 'POST',
        dataType: 'html',
        url: 'http://localhost:8888/elenco-ui/pagme/moip_config.php',
        data: dados_enviados,
        success: function( data ) {
          var dados = JSON.parse(data);
          alert(dados['token']);
          // document.getElementById("callback").html("<input type='hidden' id='token' class='span6' value='" + dados['token'] + "' />");
          // document.getElementById("token").value = (dados['token']);
          // $('#token').val(dados['token']);
          // $("#token").attr("value",dados['token']);
          // $("#callback").html("<input type='hidden' id='token' class='span6' value='" + dados['token'] + "' />");
          event.preventDefault();
        }
      });
      return false;
    });
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
          $('.div-renovar_saldo-caches').fadeOut(0);
          $('.div-renovar_sucesso-renovacao').fadeIn(200);
          $('.modal-content').css('height', '350px');
          // $('.titulo').css('margin-top', '-10px');
          // $('.descricao').css('margin', '0px 20px 0px 20px');
          $('.navegacao').css('justify-content', 'flex-end');
        }
      });
      return false;
    });
});
$('#botao_dados-cartao-nao').click(function(){
  $('.div-renovar_confirmacao-dados-cartao').fadeOut(0);
  $('.div-renovar_dados-titular-cartao').fadeIn(200);
  $('.modal-content').css('height', '550px');
});
$('#botao_dados-titular-cartao').click(function(){
  $('.div-renovar_dados-titular-cartao').fadeOut(0);
  $('.div-renovar_dados-fatura-cartao').fadeIn(200);
  $('.modal-content').css('height', '550px');
});
$('#botao_dados-fatura-cartao').click(function(){
  $('.div-renovar_dados-fatura-cartao').fadeOut(0);
  $('.div-renovar_dados-cartao').fadeIn(200);
  $('.modal-content').css('height', '550px');
});
// FORMAT O SELECTS DAS PARCELAS
$('#parcelas').each(function(){
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
// FORMAT O SELECT DA BANDEIRA
$('#instituicao').each(function(){
    var $this = $(this), numberOfOptions = $(this).children('option').length;
    $this.addClass('select-hidden-bandeira'); 
    $this.wrap('<div class="select-bandeira"></div>');
    $this.after('<div class="select-styled-bandeira"></div>');
    var $styledSelect = $this.next('div.select-styled-bandeira');
    $styledSelect.text($this.children('option').eq(0).text());
    var $list = $('<ul />', {
        'class': 'select-options-bandeira'
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
        $('div.select-styled-bandeira.active').each(function(){
            $(this).removeClass('active').next('ul.select-options-bandeira').hide();
        });
        $(this).toggleClass('active').next('ul.select-options-bandeira').toggle(); 
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
