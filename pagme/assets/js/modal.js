$(document).ready(function(){
  // Get the modal
  var modal = document.getElementById("myModal");

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      $("#myModal").fadeOut(250);
    }
  };
  // When the user presses ESC, close the modal
  $(document).keyup(function(e) {
    if (e.keyCode == 27) {
      $("#myModal").fadeOut(250);
    }
  });
  $(window).on("load",function(){
    $("#myModal").fadeIn(250);
    $(".div-renovar_modalidades").fadeOut(0);
    $(".div-renovar_cancelar").fadeOut(0);
    $(".div-renovar_sucesso-cancelar").fadeOut(0);
    $(".div-renovar_gratuito").fadeOut(0);
    $(".div-renovar_premium").fadeOut(0);
    $(".div-renovar_profissional").fadeOut(0);
    $(".div-renovar_atualiza-dados").fadeOut(0);
    $(".div-renovar_forma-pagamento").fadeOut(0);
    $(".div-renovar_saldo-caches").fadeOut(0);
    $(".div-renovar_sucesso-renovacao").fadeOut(0);
    $(".div-renovar_confirmacao-dados-cartao").fadeOut(0);
    $(".div-renovar_dados-cartao").fadeOut(0);
    $(".div-renovar_dados-fatura-cartao").fadeOut(0);
    $(".div-renovar_dados-titular-cartao").fadeOut(0);
    $(".div-renovar_boleto-bancario").fadeOut(0);
    $(".div-renovar_gerar-boleto").fadeOut(0);
    $(".div-renovar_imprimir-boleto").fadeOut(0);
    $(".div-renovar_aguardando-pagamento").fadeOut(0);
    $(".div-renovar_dados-fatura-boleto").fadeOut(0);
    $(".div-renovar_dados-titular-boleto").fadeOut(0);
    $(".voltar").fadeOut(0);
    $(".progresso").fadeOut(0);
    $(".navegacao").css("justify-content", "flex-end");
  });
  $(".fechar").click(function(){
    $("#myModal").fadeOut(250);
  });
  $("#botao_renovar-contrato").click(function(){
      $(".div-renovar_renova-ou-cancela").fadeOut(0);
      $(".div-renovar_modalidades").fadeIn(200);
      $(".voltar").fadeIn(200);
      $(".progresso").fadeIn(200);
      $(".navegacao").css("justify-content", "space-between");
      $(".modal-content").css("height", "600px");
      acesso("botao_renovar-contrato");
  });
  $("#botao_apagar-perfil").click(function(){
      $(".div-renovar_renova-ou-cancela").fadeOut(0);
      $(".div-renovar_cancelar").fadeIn(200);
      $(".voltar").fadeIn(200);
      $(".navegacao").css("justify-content", "space-between");
      acesso("botao_apagar-perfil");
  });
  $("#botao_confirma_apagar").click(function(){
    acesso("botao_confirma_apagar");
    // Ajax Cadastros
    jQuery("form").submit(function(){
      var dados1 = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://www.grupomagneto.com.br/magnetoelenco/pagme/apaga_cadastro.php",
        data: dados1,
        success: function( data1 ) {
          $(".div-renovar_cancelar").fadeOut(0);
          $(".navegacao").css("justify-content", "flex-end");
          $(".div-renovar_sucesso-cancelar").fadeIn(200);
          // Recarrega em 5 segundos
          setTimeout(function() {window.location.href="index.php";},10000);
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
  $(".gratuito").click(function(){
      $(".div-renovar_modalidades").fadeOut(0);
      $(".div-renovar_gratuito").fadeIn(200);
      $(".modal-content").css("height", "725px");
      $(".titulo").css("margin-top", "15px");
      $(".descricao").css("margin", "25px");
      acesso("gratuito");
  });
  $(".premium").click(function(){
      $(".div-renovar_modalidades").fadeOut(0);
      $(".div-renovar_premium").fadeIn(200);
      $(".modal-content").css("height", "850px");
      $(".titulo").css("margin-top", "15px");
      $(".descricao").css("margin", "25px");
      acesso("premium");
  });
  $(".profissional").click(function(){
      $(".div-renovar_modalidades").fadeOut(0);
      $(".div-renovar_profissional").fadeIn(200);
      $(".modal-content").css("height", "1110px");
      $(".titulo").css("margin-top", "15px");
      $(".descricao").css("margin", "25px");
      acesso("profissional");
  });
  $(".voltar_1").click(function(){
    $(".div-renovar_modalidades").fadeOut(0);
    $(".div-renovar_renova-ou-cancela").fadeIn(200);
    $(".modal-content").css("height", "350px");
    $(".navegacao").css("justify-content", "flex-end");
  });
  $(".voltar_1-2").click(function(){
    $(".div-renovar_cancelar").fadeOut(0);
    $(".div-renovar_renova-ou-cancela").fadeIn(200);
    $(".navegacao").css("justify-content", "flex-end");
  });
  $(".voltar_2").click(function(){
    $(".div-renovar_gratuito").fadeOut(0);
    $(".div-renovar_premium").fadeOut(0);
    $(".div-renovar_profissional").fadeOut(0);
    $(".requerido").fadeOut(0);
    $(".div-renovar_modalidades").fadeIn(200);
    $(".navegacao").css("justify-content", "space-between");
    $(".modal-content").css("height", "600px");
    // $(".titulo").css("margin-top", "-10px");
    // $(".descricao").css("margin", "0px 20px 0px 20px");
  });
  $(".voltar_3").click(function(){
    $(".div-renovar_forma-pagamento").fadeOut(0);
    $(".botao_saldo").fadeOut(0);
    $(".div-renovar_atualiza-dados").fadeIn(200);
    $(".modal-content").css("height", "700px");
  });
  $(".voltar_saldo-caches").click(function(){
    $(".div-renovar_saldo-caches").fadeOut(0);
    $(".div-renovar_forma-pagamento").fadeIn(200);
    $(".navegacao").css("justify-content", "space-between");
    $(".modal-content").css("height", "400px");
    $(".titulo").css("margin-top", "-10px");
    $(".descricao").css("margin", "0px 20px 0px 20px");
  });
  $(".voltar_atualiza-dados").click(function(){
    $(".div-renovar_atualiza-dados").fadeOut(0);
    $(".div-renovar_modalidades").fadeIn(200);
    $(".navegacao").css("justify-content", "space-between");
    $(".modal-content").css("height", "600px");
    document.getElementById("terms-1").checked = false;
    document.getElementById("terms-2").checked = false;
    document.getElementById("terms-3").checked = false;
  });
  $(".voltar_confirmacao-dados-cartao").click(function(){
    $(".div-renovar_confirmacao-dados-cartao").fadeOut(0);
    $(".div-renovar_forma-pagamento").fadeIn(200);
    $(".modal-content").css("height", "400px");
  });
  $(".voltar_dados-cartao").click(function(){
    $(".div-renovar_dados-cartao").fadeOut(0);
    $(".div-renovar_confirmacao-dados-cartao").fadeIn(200);
    $(".modal-content").css("height", "350px");
  });
  $(".voltar_dados-titular-cartao").click(function(){
    $(".div-renovar_dados-titular-cartao").fadeOut(0);
    $(".div-renovar_confirmacao-dados-cartao").fadeIn(200);
    $(".modal-content").css("height", "350px");
  });
  $(".voltar_dados-fatura-cartao").click(function(){
    $(".div-renovar_dados-fatura-cartao").fadeOut(0);
    $(".div-renovar_dados-titular-cartao").fadeIn(200);
    $(".modal-content").css("height", "600px");
  });
  $(".voltar_gerar-boleto").click(function(){
    $(".div-renovar_gerar-boleto").fadeOut(0);
    $(".div-renovar_forma-pagamento").fadeIn(200);
    $(".modal-content").css("height", "400px");
  });
  $(".voltar_imprimir-boleto").click(function(){
    $(".div-renovar_imprimir-boleto").fadeOut(0);
    $(".div-renovar_gerar-boleto").fadeIn(200);
    $(".modal-content").css("height", "350px");
  });
  $("#btn_renova-cadastro-gratuito").click(function(){
    if(!$("#terms-1").is(":checked")){
      $(".requerido").fadeIn(200);
      event.preventDefault();
    }
    if($("#terms-1").is(":checked")){
      $(".div-renovar_gratuito").fadeOut(0);
      $(".modal-content").css("height", "725px");
      $(".div-renovar_atualiza-dados").fadeIn(200);
      document.getElementById("input-botao_atualiza-dados").value = "gratuito";
      document.getElementById("renovar_sucesso-cadastro").innerHTML = "Cadastro Gratuito";
      document.getElementById("mensagem_cadastro").innerHTML = "Seu cadastro foi renovado com sucesso. Obrigada!";
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth()+1;
      var yyyy = today.getFullYear()+1;
      if(dd<10){dd="0"+dd;}
      if(mm<10){mm="0"+mm;}
      var today = dd+"/"+mm+"/"+yyyy;
      document.getElementById("dt_validade").innerHTML = "válido até " + today;
      acesso("btn_renova-cadastro-gratuito");
      event.preventDefault();
    }
  });
  $("#btn_renova-cadastro-premium").click(function(){
    if(!$("#terms-2").is(":checked")){
      $(".requerido").fadeIn(200);
      event.preventDefault();
    }
    if($("#terms-2").is(":checked")){
      $(".div-renovar_premium").fadeOut(0);
      $(".modal-content").css("height", "725px");
      $(".div-renovar_atualiza-dados").fadeIn(200);
      document.getElementById("input-botao_atualiza-dados").value = "premium";
      document.getElementById("valor_pagar-cartao").innerHTML = "199";
      document.getElementById("envia_dados-cadastro").value = "Renovação Premium";
      document.getElementById("envia_dados-valor").value = "199.00";
      document.getElementById("envia_dados_boleto-cadastro").value = "Renovação Premium";
      document.getElementById("envia_dados_boleto-valor").value = "199.00";
      document.getElementById("envia_pagador-cadastro").value = "Renovação Premium";
      document.getElementById("envia_pagador-valor").value = "199.00";
      document.getElementById("envia_pagador_boleto-cadastro").value = "Renovação Premium";
      document.getElementById("envia_pagador_boleto-valor").value = "199.00";
      document.getElementById("renovar_aguardando-cadastro").innerHTML = "Cadastro Premium";
      document.getElementById("renovar_sucesso-cadastro").innerHTML = "Cadastro Premium";
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth()+1;
      var yyyy = today.getFullYear()+1;
      if(dd<10){dd="0"+dd;}
      if(mm<10){mm="0"+mm;}
      var today = dd+"/"+mm+"/"+yyyy;
      document.getElementById("dt_validade").innerHTML = "válido até " + today;
      acesso("btn_renova-cadastro-premium");
      event.preventDefault();
    }
  });
  $("#btn_renova-cadastro-profissional").click(function(){
    if(!$("#terms-3").is(":checked")){
      $(".requerido").fadeIn(200);
      event.preventDefault();
    }
    if($("#terms-3").is(":checked")){
      $(".div-renovar_profissional").fadeOut(0);
      $(".modal-content").css("height", "725px");
      $(".div-renovar_atualiza-dados").fadeIn(200);
      document.getElementById("input-botao_atualiza-dados").value = "profissional";
      document.getElementById("valor_pagar-cartao").innerHTML = "799";
      document.getElementById("envia_dados-cadastro").value = "Renovação Profissional";
      document.getElementById("envia_dados-valor").value = "799.00";
      document.getElementById("envia_dados_boleto-cadastro").value = "Renovação Profissional";
      document.getElementById("envia_dados_boleto-valor").value = "799.00";
      document.getElementById("envia_pagador-cadastro").value = "Renovação Profissional";
      document.getElementById("envia_pagador-valor").value = "799.00";
      document.getElementById("envia_pagador_boleto-cadastro").value = "Renovação Profissional";
      document.getElementById("envia_pagador_boleto-valor").value = "799.00";
      document.getElementById("renovar_aguardando-cadastro").innerHTML = "Cadastro Profissional";
      document.getElementById("renovar_sucesso-cadastro").innerHTML = "Cadastro Profissional";
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth()+1;
      var yyyy = today.getFullYear()+2;
      if(dd<10){dd="0"+dd;}
      if(mm<10){mm="0"+mm;}
      var today = dd+"/"+mm+"/"+yyyy;
      document.getElementById("dt_validade").innerHTML = "válido até " + today;
      acesso("btn_renova-cadastro-profissional");
      event.preventDefault();
    }
  });
  $("#botao_atualizar-dados").click(function(){
    if (document.getElementById("input-botao_atualiza-dados").value == "gratuito") {
      // Ajax Atualiza Dados
      jQuery("#form_atualiza-dados").submit(function(){
        var dados2 = jQuery(this).serialize();
        jQuery.ajax({
          type: "POST",
          dataType: "html",
          url: "http://www.grupomagneto.com.br/magnetoelenco/pagme/atualiza_dados.php",
          data: dados2,
          success: function( data2 ) {
            event.preventDefault();
          }
        });
        return false;
      });
      // Ajax Renova Cadastros
      jQuery("#form_atualiza-dados").submit(function(){
        var dados3 = jQuery(this).serialize();
        jQuery.ajax({
          type: "POST",
          dataType: "html",
          url: "http://www.grupomagneto.com.br/magnetoelenco/pagme/renova_cadastro.php",
          data: dados3,
          success: function( data3 ) {
            $(".div-renovar_atualiza-dados").fadeOut(0);
            $(".div-renovar_forma-pagamento").fadeOut(0);
            $(".modal-content").css("height", "350px");
            $(".div-renovar_sucesso-renovacao").fadeIn(200);
            // $(".titulo").css("margin-top", "-10px");
            // $(".descricao").css("margin", "0px 20px 0px 20px");
            $(".navegacao").css("justify-content", "flex-end");
            event.preventDefault();
          }
        });
        return false;
      });
    }
    else if (document.getElementById("input-botao_atualiza-dados").value == "premium") {
      // Ajax Atualiza Dados
      jQuery("#form_atualiza-dados").submit(function(){
        var dados4 = jQuery(this).serialize();
        jQuery.ajax({
          type: "POST",
          dataType: "html",
          url: "http://www.grupomagneto.com.br/magnetoelenco/pagme/atualiza_dados.php",
          data: dados4,
          success: function( data4 ) {
            $(".div-renovar_atualiza-dados").fadeOut(0);
            $(".div-renovar_forma-pagamento").fadeIn(200);
            // $(".titulo").css("margin-top", "-10px");
            // $(".descricao").css("margin", "0px 20px 0px 20px");
            var valor = 199;
            var recebivel = document.getElementById("recebivel").innerHTML;
            document.getElementById("cadastro").innerHTML = "Premium";
            document.getElementById("input_saldo").value = "premium";
            document.getElementById("valor_cadastro").value = valor;
            if (parseInt(recebivel,10) >= valor) {
              $(".modal-content").css("height", "400px");
              $("#botao_saldo").fadeIn(0);
              document.getElementById("descricao-pagamento").innerHTML = "Parcele em até 10x sem juros no Cartão de Crédito ou utilize seu Saldo de Cachês a receber.";
              document.getElementById("valor").innerHTML = valor;
              var remanescente = parseInt(recebivel,10) - valor;
              document.getElementById("remanescente").innerHTML = remanescente;
              $(".valor-cadastro").css("background", "#CC64E0");
            }
            if (parseInt(recebivel,10) < valor) {
              $(".modal-content").css("height", "350px");
              $("#botao_saldo").fadeOut(0);
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
      jQuery("#form_atualiza-dados").submit(function(){
        var dados5 = jQuery(this).serialize();
        jQuery.ajax({
          type: "POST",
          dataType: "html",
          url: "http://www.grupomagneto.com.br/magnetoelenco/pagme/atualiza_dados.php",
          data: dados5,
          success: function( data5 ) {
            $(".div-renovar_atualiza-dados").fadeOut(0);
            $(".div-renovar_forma-pagamento").fadeIn(200);
            // $(".titulo").css("margin-top", "-10px");
            // $(".descricao").css("margin", "0px 20px 0px 20px");
            var valor = 799;
            var recebivel = document.getElementById("recebivel").innerHTML;
            document.getElementById("cadastro").innerHTML = "Profissional";
            document.getElementById("input_saldo").value = "profissional";
            document.getElementById("valor_cadastro").value = valor;
            if (parseInt(recebivel,10) >= valor) {
              $(".modal-content").css("height", "400px");
              $("#botao_saldo").fadeIn(0);
              document.getElementById("descricao-pagamento").innerHTML = "Parcele em até 10x sem juros no Cartão de Crédito ou utilize seu Saldo de Cachês a receber.";
              document.getElementById("valor").innerHTML = valor;
              var remanescente = parseInt(recebivel,10) - valor;
              document.getElementById("remanescente").innerHTML = remanescente;
              $(".valor-cadastro").css("background", "#2AA6E4");
            }
            if (parseInt(recebivel,10) < valor) {
              $(".modal-content").css("height", "350px");
              $("#botao_saldo").fadeOut(0);
              document.getElementById("descricao-pagamento").innerHTML = "Parcele em até 10x sem juros no Cartão de Crédito ou pague por Boleto Bancário.";
            }
            event.preventDefault();
          }
        });
        return false;
      });
    }
  });
  $(".checado").click(function(){
    $(".requerido").fadeOut(200);
  });
  $("#botao_saldo").click(function(){
    $(".div-renovar_forma-pagamento").fadeOut(0);
    $(".div-renovar_saldo-caches").fadeIn(200);
    $(".titulo").css("margin-top", "-10px");
    $(".descricao").css("margin", "0px 20px 0px 20px");
    $(".modal-content").css("height", "500px");
    acesso("botao_saldo");
    event.preventDefault();
  });
  $("#confirmar-saldo").click(function(){
    // Ajax Cadastros
      jQuery("form").submit(function(){
        document.getElementById("mensagem_cadastro").innerHTML = "Seu cadastro foi renovado utilizando seu saldo de cachês com sucesso. Obrigada!";
        var dados8 = jQuery(this).serialize();
        jQuery.ajax({
          type: "POST",
          dataType: "html",
          url: "http://www.grupomagneto.com.br/magnetoelenco/pagme/renova_cadastro.php",
          data: dados8,
          success: function( data8 ) {
            $(".div-renovar_saldo-caches").fadeOut(0);
            $(".div-renovar_sucesso-renovacao").fadeIn(200);
            $(".modal-content").css("height", "350px");
            // $(".titulo").css("margin-top", "-10px");
            // $(".descricao").css("margin", "0px 20px 0px 20px");
            $(".navegacao").css("justify-content", "flex-end");
            acesso("confirmar-saldo");
          }
        });
        return false;
      });
  });
  $("#botao_credito").click(function(){
    $(".div-renovar_forma-pagamento").fadeOut(0);
    $(".div-renovar_confirmacao-dados-cartao").fadeIn(200);
    $(".modal-content").css("height", "350px");
    acesso("botao_credito");
    // Ajax Dados Cartão
    jQuery("#requisita_dados-comprador").submit(function(){
      var dados6 = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://www.grupomagneto.com.br/magnetoelenco/pagme/puxa_dados.php",
        data: dados6,
        success: function( data ) {
            var dados_novos = JSON.parse(data);
            document.getElementById("envia_dados-nome").value = dados_novos.nome;
            document.getElementById("envia_dados-email").value = dados_novos.email;
            document.getElementById("envia_dados-endereco").value = dados_novos.endereco;
            document.getElementById("envia_dados-numero").value = dados_novos.numero;
            document.getElementById("envia_dados-complemento").value = dados_novos.complemento;
            document.getElementById("envia_dados-cidade").value = dados_novos.cidade;
            document.getElementById("envia_dados-bairro").value = dados_novos.bairro;
            document.getElementById("envia_dados-uf").value = dados_novos.uf;
            document.getElementById("envia_dados-cep").value = dados_novos.cep;
            document.getElementById("envia_dados-tel").value = dados_novos.tel;
            event.preventDefault();
        }
      });
      return false;
    });
  });
  $("#botao_boleto").click(function(){
    $(".div-renovar_forma-pagamento").fadeOut(0);
    $(".div-renovar_gerar-boleto").fadeIn(200);
    $(".modal-content").css("height", "350px");
    $(".navegacao").css("justify-content", "space-between");
    acesso("botao_boleto");
    // Ajax Dados Boleto
    jQuery("#requisita_dados-comprador").submit(function(){
      var dados62 = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://www.grupomagneto.com.br/magnetoelenco/pagme/puxa_dados.php",
        data: dados62,
        success: function( data ) {
            var dados_novos = JSON.parse(data);
            document.getElementById("envia_dados_boleto-nome").value = dados_novos.nome;
            document.getElementById("envia_dados_boleto-email").value = dados_novos.email;
            document.getElementById("envia_dados_boleto-endereco").value = dados_novos.endereco;
            document.getElementById("envia_dados_boleto-numero").value = dados_novos.numero;
            document.getElementById("envia_dados_boleto-complemento").value = dados_novos.complemento;
            document.getElementById("envia_dados_boleto-cidade").value = dados_novos.cidade;
            document.getElementById("envia_dados_boleto-bairro").value = dados_novos.bairro;
            document.getElementById("envia_dados_boleto-uf").value = dados_novos.uf;
            document.getElementById("envia_dados_boleto-cep").value = dados_novos.cep;
            document.getElementById("envia_dados_boleto-tel").value = dados_novos.tel;
            event.preventDefault();
        }
      });
      return false;
    });
  });
  $("#botao_boleto-sim").click(function(){
    // Ajax Token
    jQuery("#envia_dados_boleto-comprador").submit(function(){
      $(".div-renovar_gerar-boleto").fadeOut(0);
      $(".div-renovar_imprimir-boleto").fadeIn(3000);
      $(".modal-content").css("height", "350px");
      $(".navegacao").css("justify-content", "space-between");
      var dados7 = jQuery(this).serialize();
      // Ajax Token
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://www.grupomagneto.com.br/magnetoelenco/pagme/moip_config.php",
        data: dados7,
        success: function( data ) {
          var dados72 = JSON.parse(data);
          document.getElementById("token").value = dados72.token;
          event.preventDefault();
        }
      });
      return false;
    });
    acesso("botao_boleto-sim");
  });
  $("#botao_dados-cartao-sim").click(function(){
    // Ajax Pré-Venda
    jQuery("#envia_dados-comprador").submit(function(){
      $(".div-renovar_confirmacao-dados-cartao").fadeOut(0);
      $(".div-renovar_dados-cartao").fadeIn(200);
      $(".modal-content").css("height", "550px");
      var dados7 = jQuery(this).serialize();
      // Ajax Token
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://www.grupomagneto.com.br/magnetoelenco/pagme/moip_config.php",
        data: dados7,
        success: function( data ) {
          var dados72 = JSON.parse(data);
          document.getElementById("token").value = dados72.token;
          event.preventDefault();
        }
      });
      return false;
    });
    acesso("botao_dados-cartao-sim");
  });
  $("#botao_dados-cartao-nao").click(function(){
    $(".div-renovar_confirmacao-dados-cartao").fadeOut(0);
    $(".div-renovar_dados-titular-cartao").fadeIn(200);
    $(".modal-content").css("height", "600px");
    document.getElementById("envia_dados-nome").value = "";
    document.getElementById("envia_dados-email").value = "";
    document.getElementById("envia_dados-endereco").value = "";
    document.getElementById("envia_dados-numero").value = "";
    document.getElementById("envia_dados-complemento").value = "";
    document.getElementById("envia_dados-cidade").value = "";
    document.getElementById("envia_dados-bairro").value = "";
    document.getElementById("envia_dados-uf").value = "";
    document.getElementById("envia_dados-cep").value = "";
    document.getElementById("envia_dados-tel").value = "";
    acesso("botao_dados-cartao-nao");
  });
  $("#botao_dados-titular-cartao").click(function(){
    acesso("botao_dados-titular-cartao");
    // Ajax Dados Cartão
    jQuery("#form_dados-titular-cartao").submit(function(){
      $(".div-renovar_dados-titular-cartao").fadeOut(0);
      $(".div-renovar_dados-fatura-cartao").fadeIn(200);
      $(".modal-content").css("height", "550px");
      var dadosX6 = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://www.grupomagneto.com.br/magnetoelenco/pagme/processa_dados.php",
        data: dadosX6,
        success: function( data ) {
            var dados_pagador = JSON.parse(data);
            document.getElementById("envia_pagador-cpf").value = dados_pagador.cpf;
            document.getElementById("envia_pagador-nome").value = dados_pagador.nome;
            document.getElementById("envia_pagador-email").value = dados_pagador.email;
            document.getElementById("envia_pagador-tel").value = dados_pagador.tel;
            document.getElementById("CPF").value = dados_pagador.cpf;
            document.getElementById("Telefone").value = dados_pagador.tel;
            var dt_nasc = new Date(dados_pagador.data_nascimento);
            var dd = dt_nasc.getDate()+1;
            var mm = dt_nasc.getMonth()+1;
            var yyyy = dt_nasc.getFullYear();
            if(dd<10){dd="0"+dd;}
            if(mm<10){mm="0"+mm;}
            var dt_nasc = dd+"/"+mm+"/"+yyyy;
            document.getElementById("DataNascimento").value = dt_nasc;
            event.preventDefault();
        }
      });
      return false;
    });
  });
  $("#botao_dados-fatura-cartao").click(function(){
    acesso("botao_dados-fatura-cartao");
    // Ajax Token
      jQuery("#form_dados-fatura-cartao").submit(function(){
        $(".div-renovar_dados-fatura-cartao").fadeOut(0);
        $(".div-renovar_dados-cartao").fadeIn(200);
        $(".modal-content").css("height", "550px");
        var dadosX = jQuery(this).serialize();
        // Ajax Token
        jQuery.ajax({
          type: "POST",
          dataType: "html",
          url: "http://www.grupomagneto.com.br/magnetoelenco/pagme/moip_config.php",
          data: dadosX,
          success: function( data ) {
            var dadosX2 = JSON.parse(data);
            document.getElementById("token").value = dadosX2.token;
            event.preventDefault();
          }
        });
        return false;
      });
  });

  $("#botao_boleto-nao").click(function(){
    $(".div-renovar_gerar-boleto").fadeOut(0);
    $(".div-renovar_dados-titular-boleto").fadeIn(200);
    $(".modal-content").css("height", "600px");
    document.getElementById("envia_dados_boleto-nome").value = "";
    document.getElementById("envia_dados_boleto-email").value = "";
    document.getElementById("envia_dados_boleto-endereco").value = "";
    document.getElementById("envia_dados_boleto-numero").value = "";
    document.getElementById("envia_dados_boleto-complemento").value = "";
    document.getElementById("envia_dados_boleto-cidade").value = "";
    document.getElementById("envia_dados_boleto-bairro").value = "";
    document.getElementById("envia_dados_boleto-uf").value = "";
    document.getElementById("envia_dados_boleto-cep").value = "";
    document.getElementById("envia_dados_boleto-tel").value = "";
    acesso("botao_boleto-nao");
  });
  $("#botao_dados-titular-boleto").click(function(){
    // Ajax Dados Cartão
    jQuery("#form_dados-titular-boleto").submit(function(){
      $(".div-renovar_dados-titular-boleto").fadeOut(0);
      $(".div-renovar_dados-fatura-boleto").fadeIn(200);
      $(".modal-content").css("height", "550px");
      var dadosX6 = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://www.grupomagneto.com.br/magnetoelenco/pagme/processa_dados.php",
        data: dadosX6,
        success: function( data ) {
            var dados_pagador = JSON.parse(data);
            document.getElementById("envia_pagador_boleto-cpf").value = dados_pagador.cpf;
            document.getElementById("envia_pagador_boleto-nome").value = dados_pagador.nome;
            document.getElementById("envia_pagador_boleto-email").value = dados_pagador.email;
            document.getElementById("envia_pagador_boleto-tel").value = dados_pagador.tel;
            event.preventDefault();
        }
      });
      return false;
    });
    acesso("botao_dados-titular-boleto");
  });
  $("#botao_dados-fatura-boleto").click(function(){
    // Ajax Token
      jQuery("#form_dados-fatura-boleto").submit(function(){
        $(".div-renovar_dados-fatura-boleto").fadeOut(0);
        $(".div-renovar_imprimir-boleto").fadeIn(3000);
        $(".modal-content").css("height", "350px");
        $(".navegacao").css("justify-content", "space-between");
        var dadosX = jQuery(this).serialize();
        // Ajax Token
        jQuery.ajax({
          type: "POST",
          dataType: "html",
          url: "http://www.grupomagneto.com.br/magnetoelenco/pagme/moip_config.php",
          data: dadosX,
          success: function( data ) {
            var dadosX2 = JSON.parse(data);
            document.getElementById("token").value = dadosX2.token;
            event.preventDefault();
          }
        });
        return false;
      });
      acesso("botao_dados-fatura-boleto");
  });
  // FORMAT O SELECTS DAS PARCELAS
  $("#parcelas").each(function(){
      var $this = $(this);
      var numberOfOptions = $(this).children("option").length;
      $this.addClass("select-hidden");
      $this.wrap("<div class='select'></div>");
      $this.after("<div class='select-styled'></div>");
      var $styledSelect = $this.next("div.select-styled");
      $styledSelect.text($this.children("option").eq(0).text());
      var $list = $("<ul />", {
          "class": "select-options"
      }).insertAfter($styledSelect);
      for (var i = 0; i < numberOfOptions; i++) {
          $("<li />", {
              text: $this.children("option").eq(i).text(),
              rel: $this.children("option").eq(i).val()
          }).appendTo($list);
      }
      var $listItems = $list.children("li");
      $styledSelect.click(function(e) {
          e.stopPropagation();
          $("div.select-styled.active").each(function(){
              $(this).removeClass("active").next("ul.select-options").hide();
          });
          $(this).toggleClass("active").next("ul.select-options").toggle();
      });
      $listItems.click(function(e) {
          e.stopPropagation();
          $styledSelect.text($(this).text()).removeClass("active");
          $this.val($(this).attr("rel"));
          $list.hide();
          //console.log($this.val());
      });
      $(document).click(function() {
          $styledSelect.removeClass("active");
          $list.hide();
      });
  });
  // FORMAT O SELECT DA BANDEIRA
  $("#instituicao").each(function(){
      var $this = $(this);
      var numberOfOptions = $(this).children("option").length;
      $this.addClass("select-hidden-bandeira");
      $this.wrap("<div class='select-bandeira'></div>");
      $this.after("<div class='select-styled-bandeira'></div>");
      var $styledSelect = $this.next("div.select-styled-bandeira");
      $styledSelect.text($this.children("option").eq(0).text());
      var $list = $("<ul />", {
          "class": "select-options-bandeira"
      }).insertAfter($styledSelect);
      for (var i = 0; i < numberOfOptions; i++) {
          $("<li />", {
              text: $this.children("option").eq(i).text(),
              rel: $this.children("option").eq(i).val()
          }).appendTo($list);
      }
      var $listItems = $list.children("li");
      $styledSelect.click(function(e) {
          e.stopPropagation();
          $("div.select-styled-bandeira.active").each(function(){
              $(this).removeClass("active").next("ul.select-options-bandeira").hide();
          });
          $(this).toggleClass("active").next("ul.select-options-bandeira").toggle();
      });
      $listItems.click(function(e) {
          e.stopPropagation();
          $styledSelect.text($(this).text()).removeClass("active");
          $this.val($(this).attr("rel"));
          $list.hide();
          //console.log($this.val());
      });
      $(document).click(function() {
          $styledSelect.removeClass("active");
          $list.hide();
      });
  });
});
