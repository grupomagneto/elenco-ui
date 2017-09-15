$(document).ready(function(){
  var percentage = "2%";
  var previousPercentage = "2%";
  var swiper = new Swiper(".swiper-container", {
      nextButton: ".swiper-button-next",
      prevButton: ".swiper-button-prev",
      spaceBetween: 0,
      simulateTouch: false,
      onlyExternal: true,
      speed: 200,
      initialSlide: 16,
      // keyboardControl: true
      // onSlideChangeEnd : function(swiper) {
      //  console.log("activeIndex: "+swiper.activeIndex);
      //  console.log("anterior: "+anterior);
      // }
  });
  swiper.lockSwipeToNext();
  swiper.lockSwipeToPrev();
  // DETECTA DE QUAL SLIDE VEIO E DEFINE O RETORNO
  voltar = document.querySelector('.voltar');
  voltar.addEventListener('click', function() {
    event.preventDefault();
    swiper.unlockSwipeToPrev();
    swiper.slidePrev();
    swiper.lockSwipeToPrev();
    $(".barra_progresso_porcentagem").css("width", previousPercentage);
  });
  function stopTransition(){
    swiper.lockSwipeToNext();
    $(".barra_progresso_porcentagem").css("width", percentage);
    $(".status").hide();
    $(".invalido").hide();
    $(".valido").hide();
    $(".ok").hide();
    // console.log(swiper.activeIndex);
  }
  // SEXO DO MENOR
  function sexo (s){
    switch (s) {
      case "F":
        // document.getElementById("cpf-proprio").innerHTML = "a";
        $(".dele").text("a");
        break;
      case "M":
        // document.getElementById("cpf-proprio").innerHTML = "e";
        $(".dele").text("e");
        break;
      default:
        // document.getElementById("cpf-proprio").innerHTML = "e";
        $(".dele").text("e");
        break;
    }
    // console.log("sexo: "+s);
  }
  // AÇÕES DOS BOTÕES
  $("#btn_data-maior").click(function(){
    // Ajax Cadastros
    var nascimento = document.getElementById("data-maior").value;
    jQuery("form").submit(function(){
      var dados = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
        data: dados,
        success: function( data ) {
          // console.log(dados);
          document.getElementById("dt_nascimento-maior").value = nascimento;
          document.getElementById("dt_nasc_responsavel").value = nascimento;
          // event.preventDefault();
        }
      });
      return false;
    });
    $(".voltar").css("opacity", "1");
    swiper.unlockSwipeToNext();
    var idade = getAge(nascimento);
    if (idade >= 18) {
      swiper.slideNext();
      percentage = "5%";
      previousPercentage = "2%";
      stopTransition();
    }
    if (idade < 18 && idade != "empty") {
      // swiper.slideTo( $("#03-0-02_voce-e-menor-de-idade").index(), 200);
      swiper.slideNext();
      percentage = "100%";
      previousPercentage = "2%";
      stopTransition();
    }
    if (idade == "empty") {
      var mensagem = "Por favor informe uma data válida!";
      $(".status").text(mensagem);
      $(".status").show();
      $(".invalido").show();
    }
  });
  $("#btn_recomecar-cadastro").click(function(){
    event.preventDefault();
    if (swiper.activeIndex === 0) {
      window.location = "logout.php";
    }
    if (swiper.activeIndex === 1) {
      returnPrevious();
    }
  });
  $("#btn_email-vazio").click(function(){
    // Ajax Cadastros
    jQuery("form").submit(function(){
      var dados = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
        data: dados,
        success: function( data ) {
          event.preventDefault();
        }
      });
      return false;
    });
    swiper.unlockSwipeToNext();
    swiper.slideNext();
    percentage = "12,5%";
    previousPercentage = "10%";
    stopTransition();
    sexo("M");
  });
  $("#btn_sexo-maior-feminino").click(function(){
    // Ajax Cadastros
    jQuery("form").submit(function(){
      var dados = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
        data: dados,
        success: function( data ) {
          event.preventDefault();
        }
      });
      return false;
    });
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#03-1-01_quem-voce-deseja-cadastrar").index(), 200);
    swiper.slideNext();
    percentage = "10%";
    previousPercentage = "5%";
    stopTransition();
    sexo("F");
  });
  $("#btn_sexo-maior-masculino").click(function(){
    // Ajax Cadastros
    jQuery("form").submit(function(){
      var dados = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
        data: dados,
        success: function( data ) {
          event.preventDefault();
        }
      });
      return false;
    });
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#03-1-01_quem-voce-deseja-cadastrar").index(), 200);
    swiper.slideNext();
    percentage = "10%";
    previousPercentage = "5%";
    stopTransition();
    sexo("M");
  });
  $("#btn_eu-mesmo-tenho-18").click(function(){
    event.preventDefault();
    document.getElementById("04-2-01_qual-o-sexo-do-menor").className += " display_none";
    document.getElementById("04-2-02_o-menor-tem-cpf-proprio").className += " display_none";
    document.getElementById("04-2-03_qual-o-cpf-do-menor").className += " display_none";
    document.getElementById("04-2-04_qual-o-nome-completo-dele").className += " display_none";
    document.getElementById("04-2-05_qual-a-data-de-nascimento-dele").className += " display_none";
    document.getElementById("04-2-06_qual-a-cor-da-pele-dele").className += " display_none";
    document.getElementById("04-1-02_voce-tem-registro-drt").classList.remove("display_none");
    document.getElementById("04-1-01_qual-a-cor-da-sua-pele").classList.remove("display_none");
    // Ajax Cadastros
    jQuery("form").submit(function(){
      var dados = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
        data: dados,
        success: function( data ) {
          event.preventDefault();
        }
      });
      return false;
    });
    $(".voltar").css("opacity", "1");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#03-1-02_qual-o-seu-cpf").index(), 200);
    swiper.slideNext();
    // $("#cpf-maior").focus();
    percentage = "15%";
    previousPercentage = "10%";
    stopTransition();
    document.getElementById("nome-cpf_field").value = "nome";
    $("#ok_cep-maior").click(function(){
      // g.preventDefault();
      jQuery("form").submit(function(){
        var dados = jQuery(this).serialize();
        jQuery.ajax({
          type: "POST",
          dataType: "html",
          url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
          data: dados,
          success: function( data ) {
            event.preventDefault();
          }
        });
        return false;
      });
      swiper.unlockSwipeToNext();
      // swiper.slideTo( $("#04-1-01_qual-a-cor-da-sua-pele").index(), 200);
      swiper.slideNext();
      percentage = "30%";
      previousPercentage = "25%";
      stopTransition();
    });
  });
  $("#btn_um-menor-de-idade").click(function(){
    // event.preventDefault();
    document.getElementById("04-1-02_voce-tem-registro-drt").className += " display_none";
    document.getElementById("04-1-03_envie-uma-foto-do-seu-registro-drt").className += " display_none";
    document.getElementById("05-0-02_clique-e-conheca-nossos-planos_drt").className += " display_none";
    document.getElementById("05-1-02_perfeito-para-quem-tem-drt").className += " display_none";
    document.getElementById("04-2-01_qual-o-sexo-do-menor").classList.remove("display_none");
    document.getElementById("nome-cpf_field").value = "nome_responsavel";
    if (document.getElementById("03-0-03_qual-o-seu-sexo")) {
      document.getElementById("sexo_field-fem").value = "sexo_responsavel";
      document.getElementById("sexo_field-masc").value = "sexo_responsavel";
    } 
    if (document.getElementById("04-1-01_qual-a-cor-da-sua-pele")) {
      document.getElementById("04-1-01_qual-a-cor-da-sua-pele").className += " display_none";
    }
    // if (document.getElementById("03-0-03_qual-o-seu-sexo")) {
    //   document.getElementById("03-0-03_qual-o-seu-sexo").className += " display_none";
    // }
    jQuery("form").submit(function(){
      var dados = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
        data: dados,
        success: function( data ) {
          // event.preventDefault();
        }
      });
      return false;
    });
    $(".voltar").css("opacity", "1");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#03-1-02_qual-o-seu-cpf").index(), 200);
    swiper.slideNext();
    percentage = "15%";
    previousPercentage = "10%";
    stopTransition();
    $("#ok_cep-maior").click(function(){
      jQuery("form").submit(function(){
        var dados = jQuery(this).serialize();
        jQuery.ajax({
          type: "POST",
          dataType: "html",
          url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
          data: dados,
          success: function( data ) {
            // event.preventDefault();
          }
        });
        return false;
      });
      swiper.unlockSwipeToNext();
      // swiper.slideTo( $("#04-2-01_qual-o-sexo-do-menor").index(), 200);
      swiper.slideNext();
      percentage = "30%";
      previousPercentage = "25%";
      stopTransition();
    });
  });
  $("#ok_cpf-maior").click(function(){
    // event.preventDefault();
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#03-1-03_qual-o-seu-telefone-celular").index(), 200);
    document.getElementById("03-1-03_qual-o-seu-telefone-celular").classList.remove("display_none");
    document.getElementById("03-1-04_qual-o-cep-da-sua-residencia").classList.remove("display_none");
    swiper.slideNext();
    percentage = "20%";
    previousPercentage = "15%";
    stopTransition();
    // Ajax Cadastros
    jQuery("form").submit(function(){
      var dados = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
        data: dados,
        success: function( data ) {
          event.preventDefault();
        }
      });
      return false;
    });

  });
  $("#ok_cel").click(function(){
    // event.preventDefault();
    jQuery("form").submit(function(){
      var dados = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
        data: dados,
        success: function( data ) {
          event.preventDefault();
        }
      });
      return false;
    });
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#03-1-04_qual-o-cep-da-sua-residencia").index(), 200);
    swiper.slideNext();
    percentage = "25%";
    previousPercentage = "20%";
    stopTransition();
  });
  $("#btn_cor-da-pele-maior").click(function(){
    // event.preventDefault();
    jQuery("form").submit(function(){
      var dados = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
        data: dados,
        success: function( data ) {
          // event.preventDefault();
        }
      });
      return false;
    });
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#04-1-02_voce-tem-registro-drt").index(), 200);
    swiper.slideNext();
    percentage = "40%";
    previousPercentage = "30%";
    stopTransition();
  });
  $("#btn_drt-sim").click(function(){
    event.preventDefault();
    document.getElementById("05-0-01_clique-e-conheca-nossos-planos").className += " display_none";
    document.getElementById("05-1-01_perfeito-para-comecar").className += " display_none";
    document.getElementById("05-2-01_mais-chances-de-trabalhar").className += " display_none";
    document.getElementById("04-1-03_envie-uma-foto-do-seu-registro-drt").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#04-1-03_envie-uma-foto-do-seu-registro-drt").index(), 200);
    swiper.slideNext();
    percentage = "50%";
    previousPercentage = "40%";
    stopTransition();
    // Ajax
    jQuery("form").submit(function(){
      var dados = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
        data: dados,
        success: function( data ) {
          // event.preventDefault();
        }
      });
      return false;
    });
  });
  $('input[name=drt_file]').change(function() {
    document.getElementById('drt_enviar').style.display = "none";
    document.getElementById('upload_percentage').style.display = "block";
    var circulo = new ProgressBar.Circle('#upload_percentage', {
      strokeWidth: 2,
      trailWidth: 0,
      easing: 'easeInOut',
      duration: 1000,
      svgStyle: null,
      fill: 'rgba(255, 255, 255, 0.15)',
      text: {
        style: {
            color: '#FFFFFF',
            position: 'absolute',
            left: '50%',
            top: '50%',
            padding: 0,
            margin: 0,
            transform: {
                prefix: true,
                value: 'translate(-50%, -50%)'
            }
        },
        autoStyleContainer: true,
        alignToBottom: true,
        value: null,
        className: 'uploadbar-text'
      },
      from: { color: 'rgba(255, 255, 255, 0)', width: 0 },
      to: { color: 'rgba(255, 255, 255, 1)', width: 2 },
      // Set default step function for all animate calls
      step: function(state, circle) {
        circle.path.setAttribute('stroke', state.color);
        circle.path.setAttribute('stroke-width', state.width);
        var value = Math.round(circle.value() * 100);
        if (value === 0) {
          circle.setText('');
        } if (value === 100) {
          document.getElementById("drt_upload_text").innerHTML = "DRT enviada!";
          circle.setText(value + "%");
        } else {
          circle.setText(value + "%");
        }
      }
    });
    circulo.text.style.fontFamily = 'Avenir-Book';
    circulo.text.style.fontSize = '1.5rem';
    circulo.animate(1.0);  // Number from 0.0 to 1.0
    $("#btn_drt-enviar").removeClass("disabled");
    $("#btn_drt-enviar").removeAttr("disabled");
  });
  $("#btn_drt-enviar").click(function(){
    event.preventDefault();
    document.getElementById("05-0-01_clique-e-conheca-nossos-planos").className += " display_none";
    document.getElementById("05-0-02_clique-e-conheca-nossos-planos_drt").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-0-02_clique-e-conheca-nossos-planos_drt").index(), 200);
    swiper.slideNext();
    percentage = "55%";
    previousPercentage = "50%";
    stopTransition();
    document.form_drt.submit();
  });
  $("#btn_drt-nao").click(function(){
    event.preventDefault();
    document.getElementById("04-1-03_envie-uma-foto-do-seu-registro-drt").className += " display_none";
    document.getElementById("05-0-02_clique-e-conheca-nossos-planos_drt").className += " display_none";
    document.getElementById("05-1-02_perfeito-para-quem-tem-drt").className += " display_none";
    document.getElementById("05-0-01_clique-e-conheca-nossos-planos").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-0-01_clique-e-conheca-nossos-planos").index(), 200);
    swiper.slideNext();
    percentage = "55%";
    previousPercentage = "40%";
    stopTransition();
    // Ajax
    jQuery("form").submit(function(){
      var dados = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
        data: dados,
        success: function( data ) {
          // event.preventDefault();
        }
      });
      return false;
    });

  });
  // Navegação Menor de Idade
  $("#btn_sexo-menor-feminino").click(function(){
    // Ajax Cadastros
    jQuery("form").submit(function(){
      var dados = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
        data: dados,
        success: function( data ) {
          event.preventDefault();
        }
      });
      return false;
    });
    document.getElementById("04-2-02_o-menor-tem-cpf-proprio").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#04-2-02_o-menor-tem-cpf-proprio").index(), 200);
    swiper.slideNext();
    percentage = "35%";
    previousPercentage = "30%";
    stopTransition();
    sexo("F");
  });
  $("#btn_sexo-menor-masculino").click(function(){
    // Ajax Cadastros
    jQuery("form").submit(function(){
      var dados = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
        data: dados,
        success: function( data ) {
          event.preventDefault();
        }
      });
      return false;
    });
    document.getElementById("04-2-02_o-menor-tem-cpf-proprio").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#04-2-02_o-menor-tem-cpf-proprio").index(), 200);
    swiper.slideNext();
    percentage = "35%";
    previousPercentage = "30%";
    stopTransition();
    sexo("M");
  });
  $("#btn_sim-menor-cpf").click(function(){
    event.preventDefault();
    document.getElementById("04-2-04_qual-o-nome-completo-dele").className += " display_none";
    document.getElementById("04-2-03_qual-o-cpf-do-menor").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#04-2-03_qual-o-cpf-do-menor").index(), 200);
    swiper.slideNext();
    percentage = "40%";
    previousPercentage = "35%";
    stopTransition();
  });
  $("#ok_cpf-menor").click(function(){
    // Ajax Cadastros
    jQuery("form").submit(function(){
      var rawData = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
        data: rawData,
        success: function( data ) {
          // console.log('cpf menor: ' + rawData);
        }
      });
      return false;
    });
    document.getElementById("04-2-05_qual-a-data-de-nascimento-dele").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#04-2-05_qual-a-data-de-nascimento-dele").index(), 200);
    swiper.slideNext();
    percentage = "45%";
    previousPercentage = "40%";
    stopTransition();
  });
  $("#btn_nao-menor-cpf").click(function(){
    event.preventDefault();
    document.getElementById("04-2-03_qual-o-cpf-do-menor").className += " display_none";
    document.getElementById("04-2-04_qual-o-nome-completo-dele").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#04-2-04_qual-o-nome-completo-dele").index(), 200);
    swiper.slideNext();
    percentage = "45%";
    previousPercentage = "40%";
    stopTransition();
  });
  $("#btn_nome-menor").click(function(){
    // event.preventDefault();
    // Ajax Cadastros
    jQuery("form").submit(function(){
      var dados9 = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
        data: dados9,
        success: function( data ) {
          event.preventDefault();
          // console.log('btn_data_menor');
        }
      });
      return false;
    });
    document.getElementById("04-2-05_qual-a-data-de-nascimento-dele").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#04-2-05_qual-a-data-de-nascimento-dele").index(), 200);
    swiper.slideNext();
    percentage = "50%";
    previousPercentage = "45%";
    stopTransition();
  });
  $("#btn_data-menor").click(function(){
    // event.preventDefault();
    var nascimentoMenor = document.getElementById("dt_nascimento-menor_value").value;
    var checaData = checarDataPassado(nascimentoMenor);
    if (checaData != "Invalid Date") {
      var checaIdade = getAge(nascimentoMenor);
      if (checaIdade < 18) {
        // Ajax Cadastros
        jQuery("form").submit(function(){
          var dados9 = jQuery(this).serialize();
          jQuery.ajax({
            type: "POST",
            dataType: "html",
            url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
            data: dados9,
            success: function( data ) {
              event.preventDefault();
              // console.log('btn_data_menor');
            }
          });
          return false;
        });
        document.getElementById("04-2-06_qual-a-cor-da-pele-dele").classList.remove("display_none");
        swiper.unlockSwipeToNext();
        // swiper.slideTo( $("#04-2-06_qual-a-cor-da-pele-dele").index(), 200);
        swiper.slideNext();
        percentage = "50%";
        previousPercentage = "45%";
        stopTransition();
      }
      if (checaIdade >= 18) {
        var mensagem = "Data maior do que 18 anos!";
        $(".status").text(mensagem);
        $(".status").show();
        $(".invalido").show();
      }
    }
    else {
      var mensagem = "Por favor insira uma data válida!";
      $(".status").text(mensagem);
      $(".status").show();
      $(".invalido").show();
    }
  });
  $("#btn_cor-da-pele-menor").click(function(){
    // Ajax Cadastros
        jQuery("form").submit(function(){
          var dados = jQuery(this).serialize();
          jQuery.ajax({
            type: "POST",
            dataType: "html",
            url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
            data: dados,
            success: function( data ) {
              // event.preventDefault();
            }
          });
          return false;
        });
    document.getElementById("05-0-01_clique-e-conheca-nossos-planos").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-0-01_clique-e-conheca-nossos-planos").index(), 200);
    swiper.slideNext();
    percentage = "55%";
    previousPercentage = "50%";
    stopTransition();
  });
  $("#btn_gratuito").click(function(){
    event.preventDefault();
    document.getElementById("05-0-02_clique-e-conheca-nossos-planos_drt").className += " display_none";
    document.getElementById("05-1-02_perfeito-para-quem-tem-drt").className += " display_none";
    document.getElementById("05-2-01_mais-chances-de-trabalhar").className += " display_none";
    document.getElementById("05-2-02_ideal-para-quem-trabalha-muito").className += " display_none";
    document.getElementById("05-2-03_desconto-para-horario-pre-fixado").className += " display_none";
    document.getElementById("05-2-04_escolha-o-horario-da-sessao-de-fotos").className += " display_none";
    document.getElementById("05-2-05_complete-o-seu-endereco").className += " display_none";
    document.getElementById("05-2-06_qual-a-forma-de-pagamento").className += " display_none";
    document.getElementById("05-2-07_voce-e-o-titular-do-carta-de-credito").className += " display_none";
    document.getElementById("05-2-08_pagamento-via-boleto-bancario").className += " display_none";
    document.getElementById("05-2-09_dados-do-titular-do-cartao").className += " display_none";
    document.getElementById("05-2-10_endereco-da-fatura-do-cartao").className += " display_none";
    document.getElementById("05-2-11_dados-do-cartao-de-credito").className += " display_none";
    document.getElementById("05-2-12_cadastro-agendado").className += " display_none";
    document.getElementById("05-2-13_prepare-se-para-suas-fotos").className += " display_none";
    document.getElementById("05-1-01_perfeito-para-comecar").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-1-01_perfeito-para-comecar").index(), 200);
    swiper.slideNext();
    percentage = "60%";
    previousPercentage = "55%";
    stopTransition();
  });
  $("#btn_gratuito-more").click(function(){
    event.preventDefault();
    document.getElementById("05-0-02_clique-e-conheca-nossos-planos_drt").className += " display_none";
    document.getElementById("05-1-02_perfeito-para-quem-tem-drt").className += " display_none";
    document.getElementById("05-2-01_mais-chances-de-trabalhar").className += " display_none";
    document.getElementById("05-2-02_ideal-para-quem-trabalha-muito").className += " display_none";
    document.getElementById("05-2-03_desconto-para-horario-pre-fixado").className += " display_none";
    document.getElementById("05-2-04_escolha-o-horario-da-sessao-de-fotos").className += " display_none";
    document.getElementById("05-2-05_complete-o-seu-endereco").className += " display_none";
    document.getElementById("05-2-06_qual-a-forma-de-pagamento").className += " display_none";
    document.getElementById("05-2-07_voce-e-o-titular-do-carta-de-credito").className += " display_none";
    document.getElementById("05-2-08_pagamento-via-boleto-bancario").className += " display_none";
    document.getElementById("05-2-09_dados-do-titular-do-cartao").className += " display_none";
    document.getElementById("05-2-10_endereco-da-fatura-do-cartao").className += " display_none";
    document.getElementById("05-2-11_dados-do-cartao-de-credito").className += " display_none";
    document.getElementById("05-2-12_cadastro-agendado").className += " display_none";
    document.getElementById("05-2-13_prepare-se-para-suas-fotos").className += " display_none";
    document.getElementById("05-1-01_perfeito-para-comecar").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-1-01_perfeito-para-comecar").index(), 200);
    swiper.slideNext();
    percentage = "60%";
    previousPercentage = "55%";
    stopTransition();
  });
  $("#btn_gratuito-drt").click(function(){
    event.preventDefault();
    document.getElementById("05-1-01_perfeito-para-comecar").className += " display_none";
    document.getElementById("05-2-01_mais-chances-de-trabalhar").className += " display_none";
    document.getElementById("05-2-02_ideal-para-quem-trabalha-muito").className += " display_none";
    document.getElementById("05-2-03_desconto-para-horario-pre-fixado").className += " display_none";
    document.getElementById("05-2-04_escolha-o-horario-da-sessao-de-fotos").className += " display_none";
    document.getElementById("05-2-05_complete-o-seu-endereco").className += " display_none";
    document.getElementById("05-2-06_qual-a-forma-de-pagamento").className += " display_none";
    document.getElementById("05-2-07_voce-e-o-titular-do-carta-de-credito").className += " display_none";
    document.getElementById("05-2-08_pagamento-via-boleto-bancario").className += " display_none";
    document.getElementById("05-2-09_dados-do-titular-do-cartao").className += " display_none";
    document.getElementById("05-2-10_endereco-da-fatura-do-cartao").className += " display_none";
    document.getElementById("05-2-11_dados-do-cartao-de-credito").className += " display_none";
    document.getElementById("05-2-12_cadastro-agendado").className += " display_none";
    document.getElementById("05-2-13_prepare-se-para-suas-fotos").className += " display_none";
    document.getElementById("05-1-02_perfeito-para-quem-tem-drt").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-1-02_perfeito-para-quem-tem-drt").index(), 200);
    swiper.slideNext();
    percentage = "60%";
    previousPercentage = "55%";
    stopTransition();
  });
  $("#btn_gratuito-drt-more").click(function(){
    event.preventDefault();
    document.getElementById("05-1-01_perfeito-para-comecar").className += " display_none";
    document.getElementById("05-2-01_mais-chances-de-trabalhar").className += " display_none";
    document.getElementById("05-2-02_ideal-para-quem-trabalha-muito").className += " display_none";
    document.getElementById("05-2-03_desconto-para-horario-pre-fixado").className += " display_none";
    document.getElementById("05-2-04_escolha-o-horario-da-sessao-de-fotos").className += " display_none";
    document.getElementById("05-2-05_complete-o-seu-endereco").className += " display_none";
    document.getElementById("05-2-06_qual-a-forma-de-pagamento").className += " display_none";
    document.getElementById("05-2-07_voce-e-o-titular-do-carta-de-credito").className += " display_none";
    document.getElementById("05-2-08_pagamento-via-boleto-bancario").className += " display_none";
    document.getElementById("05-2-09_dados-do-titular-do-cartao").className += " display_none";
    document.getElementById("05-2-10_endereco-da-fatura-do-cartao").className += " display_none";
    document.getElementById("05-2-11_dados-do-cartao-de-credito").className += " display_none";
    document.getElementById("05-2-12_cadastro-agendado").className += " display_none";
    document.getElementById("05-2-13_prepare-se-para-suas-fotos").className += " display_none";
    document.getElementById("05-1-02_perfeito-para-quem-tem-drt").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-1-02_perfeito-para-quem-tem-drt").index(), 200);
    swiper.slideNext();
    percentage = "60%";
    previousPercentage = "55%";
    stopTransition();
  });
  $("#btn_profissional-drt").click(function(){
    event.preventDefault();
    document.getElementById("05-1-02_perfeito-para-quem-tem-drt").className += " display_none";
    document.getElementById("05-1-01_perfeito-para-comecar").className += " display_none";
    document.getElementById("05-1-03_assista-ao-video").className += " display_none";
    document.getElementById("05-1-04_envie-uma-foto-sorrindo").className += " display_none";
    document.getElementById("05-1-05_agora-uma-foto-sem-sorrir").className += " display_none";
    document.getElementById("05-1-06_cadastro-concluido-gratuito").className += " display_none";
    document.getElementById("05-2-01_mais-chances-de-trabalhar").className += " display_none";
    document.getElementById("05-2-02_ideal-para-quem-trabalha-muito").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-2-02_ideal-para-quem-trabalha-muito").index(), 200);
    swiper.slideNext();
    percentage = "60%";
    previousPercentage = "55%";
    stopTransition();
  });
  $("#btn_profissional-drt-more").click(function(){
    event.preventDefault();
    document.getElementById("05-1-02_perfeito-para-quem-tem-drt").className += " display_none";
    document.getElementById("05-1-01_perfeito-para-comecar").className += " display_none";
    document.getElementById("05-1-03_assista-ao-video").className += " display_none";
    document.getElementById("05-1-04_envie-uma-foto-sorrindo").className += " display_none";
    document.getElementById("05-1-05_agora-uma-foto-sem-sorrir").className += " display_none";
    document.getElementById("05-1-06_cadastro-concluido-gratuito").className += " display_none";
    document.getElementById("05-2-01_mais-chances-de-trabalhar").className += " display_none";
    document.getElementById("05-2-02_ideal-para-quem-trabalha-muito").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-2-02_ideal-para-quem-trabalha-muito").index(), 200);
    swiper.slideNext();
    percentage = "60%";
    previousPercentage = "55%";
    stopTransition();
  });
  $("#btn_premium").click(function(){
    event.preventDefault();
    document.getElementById("05-0-02_clique-e-conheca-nossos-planos_drt").className += " display_none";
    document.getElementById("05-1-02_perfeito-para-quem-tem-drt").className += " display_none";
    document.getElementById("05-1-01_perfeito-para-comecar").className += " display_none";
    document.getElementById("05-1-03_assista-ao-video").className += " display_none";
    document.getElementById("05-1-04_envie-uma-foto-sorrindo").className += " display_none";
    document.getElementById("05-1-05_agora-uma-foto-sem-sorrir").className += " display_none";
    document.getElementById("05-1-06_cadastro-concluido-gratuito").className += " display_none";
    document.getElementById("05-2-02_ideal-para-quem-trabalha-muito").className += " display_none";
    document.getElementById("05-2-01_mais-chances-de-trabalhar").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-2-01_mais-chances-de-trabalhar").index(), 200);
    swiper.slideNext();
    percentage = "60%";
    previousPercentage = "55%";
    stopTransition();
  });
  $("#btn_premium-more").click(function(){
    event.preventDefault();
    document.getElementById("05-0-02_clique-e-conheca-nossos-planos_drt").className += " display_none";
    document.getElementById("05-1-02_perfeito-para-quem-tem-drt").className += " display_none";
    document.getElementById("05-1-01_perfeito-para-comecar").className += " display_none";
    document.getElementById("05-1-03_assista-ao-video").className += " display_none";
    document.getElementById("05-1-04_envie-uma-foto-sorrindo").className += " display_none";
    document.getElementById("05-1-05_agora-uma-foto-sem-sorrir").className += " display_none";
    document.getElementById("05-1-06_cadastro-concluido-gratuito").className += " display_none";
    document.getElementById("05-2-02_ideal-para-quem-trabalha-muito").className += " display_none";
    document.getElementById("05-2-01_mais-chances-de-trabalhar").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-2-01_mais-chances-de-trabalhar").index(), 200);
    swiper.slideNext();
    percentage = "60%";
    previousPercentage = "55%";
    stopTransition();
  });
  $("#btn_profissional").click(function(){
    event.preventDefault();
    document.getElementById("05-0-02_clique-e-conheca-nossos-planos_drt").className += " display_none";
    document.getElementById("05-1-02_perfeito-para-quem-tem-drt").className += " display_none";
    document.getElementById("05-1-01_perfeito-para-comecar").className += " display_none";
    document.getElementById("05-1-03_assista-ao-video").className += " display_none";
    document.getElementById("05-1-04_envie-uma-foto-sorrindo").className += " display_none";
    document.getElementById("05-1-05_agora-uma-foto-sem-sorrir").className += " display_none";
    document.getElementById("05-1-06_cadastro-concluido-gratuito").className += " display_none";
    document.getElementById("05-2-01_mais-chances-de-trabalhar").className += " display_none";
    document.getElementById("05-2-02_ideal-para-quem-trabalha-muito").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-2-02_ideal-para-quem-trabalha-muito").index(), 200);
    swiper.slideNext();
    percentage = "60%";
    previousPercentage = "55%";
    stopTransition();
  });
  $("#btn_profissional-more").click(function(){
    event.preventDefault();
    document.getElementById("05-0-02_clique-e-conheca-nossos-planos_drt").className += " display_none";
    document.getElementById("05-1-02_perfeito-para-quem-tem-drt").className += " display_none";
    document.getElementById("05-1-01_perfeito-para-comecar").className += " display_none";
    document.getElementById("05-1-03_assista-ao-video").className += " display_none";
    document.getElementById("05-1-04_envie-uma-foto-sorrindo").className += " display_none";
    document.getElementById("05-1-05_agora-uma-foto-sem-sorrir").className += " display_none";
    document.getElementById("05-1-06_cadastro-concluido-gratuito").className += " display_none";
    document.getElementById("05-2-01_mais-chances-de-trabalhar").className += " display_none";
    document.getElementById("05-2-02_ideal-para-quem-trabalha-muito").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-2-02_ideal-para-quem-trabalha-muito").index(), 200);
    swiper.slideNext();
    percentage = "60%";
    previousPercentage = "55%";
    stopTransition();
  });
  $(".checado").click(function(){
    $(".requerido").fadeOut(200);
  });
  $("#btn_cadastro-gratuito").click(function(){
    // event.preventDefault();
    if(!$("#terms-1").is(":checked")){
      $(".requerido").fadeIn(200);
      // event.preventDefault();
    }
    if($("#terms-1").is(":checked")){
      // event.preventDefault();
      document.getElementById("05-1-02_perfeito-para-quem-tem-drt").className += " display_none";
      document.getElementById("05-1-03_assista-ao-video").classList.remove("display_none");
      swiper.unlockSwipeToNext();
      // swiper.slideTo( $("#05-1-03_assista-ao-video").index(), 200);
      swiper.slideNext();
      percentage = "70%";
      previousPercentage = "60%";
      stopTransition();
      jQuery("form").submit(function(){
        var dados = jQuery(this).serialize();
        jQuery.ajax({
          type: "POST",
          dataType: "html",
          url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
          data: dados,
          success: function( data ) {
            // event.preventDefault();
          }
        });
        return false;
      });
    }
  });
  $("#btn_cadastro-gratuito-DRT").click(function(){
    // event.preventDefault();
    if(!$("#terms-2").is(":checked")){
      $(".requerido").fadeIn(200);
      // event.preventDefault();
    }
    if($("#terms-2").is(":checked")){
      document.getElementById("05-1-01_perfeito-para-comecar").className += " display_none";
      document.getElementById("05-1-02_perfeito-para-quem-tem-drt").classList.remove("display_none");
      swiper.unlockSwipeToNext();
      // swiper.slideTo( $("#05-1-03_assista-ao-video").index(), 200);
      swiper.slideNext();
      percentage = "70%";
      previousPercentage = "60%";
      stopTransition();
      jQuery("form").submit(function(){
        var dados = jQuery(this).serialize();
        jQuery.ajax({
          type: "POST",
          dataType: "html",
          url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
          data: dados,
          success: function( data ) {
            // event.preventDefault();
          }
        });
        return false;
      });
    }
  });
  $("#btn_video").click(function(){
    event.preventDefault();
    document.getElementById("05-1-04_envie-uma-foto-sorrindo").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-1-04_envie-uma-foto-sorrindo").index(), 200);
    swiper.slideNext();
    percentage = "80%";
    previousPercentage = "70%";
    stopTransition();
  });
  $("#btn_sorrindo-enviar").click(function(){
    event.preventDefault();
    document.getElementById("05-1-05_agora-uma-foto-sem-sorrir").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-1-05_agora-uma-foto-sem-sorrir").index(), 200);
    swiper.slideNext();
    percentage = "90%";
    previousPercentage = "80%";
    stopTransition();
  });
  $("#btn_serio-enviar").click(function(){
    // event.preventDefault();
    document.getElementById("05-1-06_cadastro-concluido-gratuito").classList.remove("display_none");
    jQuery("form").submit(function(){
      var dados = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
        data: dados,
        success: function( data ) {
          // event.preventDefault();
        }
      });
      return false;
    });
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-1-06_cadastro-concluido-gratuito").index(), 200);
    swiper.slideNext();
    percentage = "100%";
    previousPercentage = "90%";
    stopTransition();
    $(".voltar").css("opacity", "0");
  });
  $("#btn_cadastro-premium").click(function(){
    // event.preventDefault();
    if(!$("#terms-3").is(":checked")){
      $(".requerido").fadeIn(200);
      // event.preventDefault();
    }
    if($("#terms-3").is(":checked")){
      document.getElementById("05-2-02_ideal-para-quem-trabalha-muito").className += " display_none";
      document.getElementById("05-2-03_desconto-para-horario-pre-fixado").classList.remove("display_none");
      jQuery("form").submit(function(){
        var dados = jQuery(this).serialize();
        jQuery.ajax({
          type: "POST",
          dataType: "html",
          url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
          data: dados,
          success: function( data ) {
            // event.preventDefault();
          }
        });
        return false;
      });
      swiper.unlockSwipeToNext();
      // swiper.slideTo( $("#05-2-03_desconto-para-horario-pre-fixado").index(), 200);
      swiper.slideNext();
      percentage = "65%";
      previousPercentage = "60%";
      stopTransition();
    }
  });
  $("#btn_cadastro-profissional").click(function(){
    // event.preventDefault();
    if(!$("#terms-4").is(":checked")){
      $(".requerido").fadeIn(200);
      // event.preventDefault();
    }
    if($("#terms-4").is(":checked")){
      document.getElementById("05-2-01_mais-chances-de-trabalhar").className += " display_none";
      document.getElementById("05-2-03_desconto-para-horario-pre-fixado").classList.remove("display_none");
      jQuery("form").submit(function(){
        var dados = jQuery(this).serialize();
        jQuery.ajax({
          type: "POST",
          dataType: "html",
          url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/update_db.php",
          data: dados,
          success: function( data ) {
            // event.preventDefault();
          }
        });
        return false;
      });
      swiper.unlockSwipeToNext();
      // swiper.slideTo( $("#05-2-03_desconto-para-horario-pre-fixado").index(), 200);
      swiper.slideNext();
      percentage = "65%";
      previousPercentage = "60%";
      stopTransition();
    }
  });
  $("#btn_aceito-data-desconto").click(function(){
    event.preventDefault();
    document.getElementById("05-2-04_escolha-o-horario-da-sessao-de-fotos").className += " display_none";
    document.getElementById("05-2-05_complete-o-seu-endereco").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-2-05_complete-o-seu-endereco").index(), 200);
    swiper.slideNext();
    percentage = "70%";
    previousPercentage = "65%";
    stopTransition();
  });
  $("#btn_nao-posso-nesse-horario").click(function(){
    event.preventDefault();
    document.getElementById("05-2-04_escolha-o-horario-da-sessao-de-fotos").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-2-04_escolha-o-horario-da-sessao-de-fotos").index(), 200);
    swiper.slideNext();
    percentage = "67%";
    previousPercentage = "65%";
    stopTransition();
  });
  $("#btn_novo-horario-fotos").click(function(){
    event.preventDefault();
    document.getElementById("05-2-05_complete-o-seu-endereco").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-2-05_complete-o-seu-endereco").index(), 200);
    swiper.slideNext();
    percentage = "70%";
    previousPercentage = "67%";
    stopTransition();
  });
  $("#btn_completa-endereco").click(function(){
    event.preventDefault();
    document.getElementById("05-2-06_qual-a-forma-de-pagamento").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-2-06_qual-a-forma-de-pagamento").index(), 200);
    swiper.slideNext();
    percentage = "75%";
    previousPercentage = "70%";
    stopTransition();
  });
  $("#btn_cartao-de-credito").click(function(){
    event.preventDefault();
    document.getElementById("05-2-08_pagamento-via-boleto-bancario").className += " display_none";
    document.getElementById("05-2-07_voce-e-o-titular-do-carta-de-credito").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-2-07_voce-e-o-titular-do-carta-de-credito").index(), 200);
    swiper.slideNext();
    percentage = "80%";
    previousPercentage = "75%";
    stopTransition();
  });
  $("#btn_boleto-bancario").click(function(){
    event.preventDefault();
    document.getElementById("05-2-07_voce-e-o-titular-do-carta-de-credito").className += " display_none";
    document.getElementById("05-2-09_dados-do-titular-do-cartao").className += " display_none";
    document.getElementById("05-2-10_endereco-da-fatura-do-cartao").className += " display_none";
    document.getElementById("05-2-11_dados-do-cartao-de-credito").className += " display_none";
    document.getElementById("05-2-08_pagamento-via-boleto-bancario").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-2-08_pagamento-via-boleto-bancario").index(), 200);
    swiper.slideNext();
    percentage = "90%";
    previousPercentage = "75%";
    stopTransition();
  });
  $("#btn_sim-titular-do-cartao").click(function(){
    event.preventDefault();
    document.getElementById("05-2-08_pagamento-via-boleto-bancario").className += " display_none";
    document.getElementById("05-2-09_dados-do-titular-do-cartao").className += " display_none";
    document.getElementById("05-2-10_endereco-da-fatura-do-cartao").className += " display_none";
    document.getElementById("05-2-11_dados-do-cartao-de-credito").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-2-11_dados-do-cartao-de-credito").index(), 200);
    swiper.slideNext();
    percentage = "95%";
    previousPercentage = "80%";
    stopTransition();
  });
  $("#btn_nao-titular-do-cartao").click(function(){
    event.preventDefault();
    document.getElementById("05-2-09_dados-do-titular-do-cartao").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-2-09_dados-do-titular-do-cartao").index(), 200);
    swiper.slideNext();
    percentage = "85%";
    previousPercentage = "80%";
    stopTransition();
  });
  $("#btn_dados-titular-cartao").click(function(){
    event.preventDefault();
    document.getElementById("05-2-10_endereco-da-fatura-do-cartao").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-2-10_endereco-da-fatura-do-cartao").index(), 200);
    swiper.slideNext();
    percentage = "90%";
    previousPercentage = "85%";
    stopTransition();
  });
  $("#btn_endereco-titular-cartao").click(function(){
    event.preventDefault();
    document.getElementById("05-2-11_dados-do-cartao-de-credito").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-2-11_dados-do-cartao-de-credito").index(), 200);
    swiper.slideNext();
    percentage = "95%";
    previousPercentage = "90%";
    stopTransition();
  });
  $("#sendToMoip").click(function(){
    event.preventDefault();
    document.getElementById("05-2-12_cadastro-agendado").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-2-12_cadastro-agendado").index(), 200);
    swiper.slideNext();
    percentage = "100%";
    previousPercentage = "95%";
    stopTransition();
    $(".voltar").css("opacity", "0");
  });
  $("#sendToMoip2").click(function(){
    event.preventDefault();
    document.getElementById("05-2-12_cadastro-agendado").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-2-12_cadastro-agendado").index(), 200);
    swiper.slideNext();
    percentage = "100%";
    previousPercentage = "90%";
    stopTransition();
    $(".voltar").css("opacity", "0");
  });
  $("#btn_o-que-devo-levar").click(function(){
    event.preventDefault();
    document.getElementById("05-2-13_prepare-se-para-suas-fotos").classList.remove("display_none");
    swiper.unlockSwipeToNext();
    // swiper.slideTo( $("#05-2-13_prepare-se-para-suas-fotos").index(), 200);
    swiper.slideNext();
    percentage = "100%";
    previousPercentage = "100%";
    stopTransition();
  });
});
