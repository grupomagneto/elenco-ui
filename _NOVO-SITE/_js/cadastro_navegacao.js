$(document).ready(function(){
  var percentage = "2%";
  var previousPercentage = "2%";
  var swiper = new Swiper(".swiper-container", {
      nextButton: ".swiper-button-next",
      prevButton: ".swiper-button-prev",
      spaceBetween: 30,
      simulateTouch: false,
      onlyExternal: true,
      speed: 200,
      initialSlide: 0,
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
  voltar.addEventListener('click', function (e) {
    e.preventDefault();
    if (swiper.activeIndex !== 0 &&
        swiper.activeIndex !== 2 &&
        swiper.activeIndex !== 3 &&
        swiper.activeIndex !== 7 &&
        swiper.activeIndex !== 10 &&
        swiper.activeIndex !== 14 &&
        swiper.activeIndex !== 17) {
      swiper.unlockSwipeToPrev();
      swiper.slidePrev();
      swiper.lockSwipeToPrev();
    }
    if (swiper.activeIndex === 0) {
      $(".voltar").css("opacity", "0");
      previousPercentage = "2%";
      $(".status").hide();
      $(".invalido").hide();
      $(".valido").hide();
      $(".ok").hide();
    }
    if (swiper.activeIndex === 2) {
      swiper.unlockSwipeToPrev();
      // var id = $("button").closest("div").prop("id");
      // var oldSlide = id.replace("div_", "#");
      // swiper.slideTo($(oldSlide).index(), 200);
      swiper.slideTo(0, 200);
      swiper.lockSwipeToPrev();
      $(".voltar").css("opacity", "0");
      previousPercentage = "2%";
    }
    if (swiper.activeIndex === 3) {
      swiper.unlockSwipeToPrev();
      swiper.slideTo(2, 200);
      swiper.lockSwipeToPrev();
      previousPercentage = "35%";
    }
    if (swiper.activeIndex === 7) {
      swiper.unlockSwipeToPrev();
      swiper.slideTo(6, 200);
      swiper.lockSwipeToPrev();
      previousPercentage = "45%";
    }
    if (swiper.activeIndex === 10) {
      swiper.unlockSwipeToPrev();
      swiper.slideTo(6, 200);
      swiper.lockSwipeToPrev();
      previousPercentage = "50%";
    }
    if (swiper.activeIndex === 14) {
      swiper.unlockSwipeToPrev();
      swiper.slideTo(11, 200);
      swiper.lockSwipeToPrev();
      previousPercentage = "50%";
    }
    if (swiper.activeIndex === 17) {
      swiper.unlockSwipeToPrev();
      swiper.slideTo(9, 200);
      swiper.lockSwipeToPrev();
      previousPercentage = "50%";
    }
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
  $("#btn_data-maior").click(function(e){
    e.preventDefault();
    $(".voltar").css("opacity", "1");
    swiper.unlockSwipeToNext();
    var nascimento = document.getElementById("data-maior").value;
    var idade = getAge(nascimento);
    if (idade >= 18) {
      swiper.slideNext();
      percentage = "5%";
      previousPercentage = "2%";
      stopTransition();
    }
    if (idade < 18 && idade != "empty") {
      swiper.slideTo( $("#03-0-02_voce-e-menor-de-idade").index(), 200);
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
  $("#btn_recomecar-cadastro").click(function(e){
    e.preventDefault();
    if (swiper.activeIndex === 0) {
      window.location = "logout.php";
    }
    if (swiper.activeIndex === 1) {
      returnPrevious();
    }
    
  });
  $("#btn_email-vazio").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideNext();
    percentage = "12,5%";
    previousPercentage = "10%";
    stopTransition();
    sexo("M");
  });
  $("#btn_sexo-maior-feminino").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#03-1-01_quem-voce-esta-cadastrando").index(), 200);
    percentage = "10%";
    previousPercentage = "5%";
    stopTransition();
    sexo("F");
  });
  $("#btn_sexo-maior-masculino").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#03-1-01_quem-voce-esta-cadastrando").index(), 200);
    percentage = "10%";
    previousPercentage = "5%";
    stopTransition();
    sexo("M");
  });
  $("#btn_eu-mesmo-tenho-18").click(function(){
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
    swiper.slideTo( $("#03-1-02_qual-o-seu-cpf").index(), 200);
    // $("#cpf-maior").focus();
    percentage = "15%";
    previousPercentage = "10%";
    stopTransition();
    document.getElementById("nome-cpf_field").value = "nome";
    $("#ok_cep-maior").click(function(g){
      g.preventDefault();
      swiper.unlockSwipeToNext();
      swiper.slideTo( $("#04-1-01_qual-a-cor-da-sua-pele").index(), 200);
      percentage = "30%";
      previousPercentage = "25%";
      stopTransition();
    });
  });
  $("#btn_um-menor-de-idade").click(function(e){
    e.preventDefault();
    $(".voltar").css("opacity", "1");
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#03-1-02_qual-o-seu-cpf").index(), 200);
    percentage = "15%";
    previousPercentage = "10%";
    stopTransition();
    document.getElementById("nome-cpf_field").value = "nome_responsavel";
    $("#ok_cep-maior").click(function(f){
      f.preventDefault();
      swiper.unlockSwipeToNext();
      swiper.slideTo( $("#04-2-01_qual-o-sexo-do-menor").index(), 200);
      percentage = "30%";
      previousPercentage = "25%";
      stopTransition();
    });
  });
  $("#ok_cpf-maior").click(function(e){
    // e.preventDefault();
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
    swiper.slideTo( $("#03-1-03_qual-o-seu-telefone-celular").index(), 200);
    percentage = "20%";
    previousPercentage = "15%";
    stopTransition();
  });
  $("#ok_cel").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#03-1-04_qual-o-cep-da-sua-residencia").index(), 200);
    percentage = "25%";
    previousPercentage = "20%";
    stopTransition();
  });
  $("#btn_cor-da-pele-maior").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#04-1-02_voce-tem-registro-drt").index(), 200);
    percentage = "40%";
    previousPercentage = "30%";
    stopTransition();
  });
  $("#btn_drt-sim").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#04-1-03_envie-uma-foto-do-seu-registro-drt").index(), 200);
    percentage = "50%";
    previousPercentage = "40%";
    stopTransition();
  });
  $("#btn_drt-enviar").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-0-02_clique-e-conheca-nossos-planos_drt").index(), 200);
    percentage = "55%";
    previousPercentage = "50%";
    stopTransition();
  });
  $("#btn_drt-nao").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-0-01_clique-e-conheca-nossos-planos").index(), 200);
    percentage = "55%";
    previousPercentage = "40%";
    stopTransition();
  });

  // Navegação Menor de Idade
  $("#btn_sexo-menor-feminino").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#04-2-02_o-menor-tem-cpf-proprio").index(), 200);
    percentage = "35%";
    previousPercentage = "30%";
    stopTransition();
    sexo("F");
  });
  $("#btn_sexo-menor-masculino").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#04-2-02_o-menor-tem-cpf-proprio").index(), 200);
    percentage = "35%";
    previousPercentage = "30%";
    stopTransition();
    sexo("M");
  });
  $("#btn_sim-menor-cpf").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#04-2-03_qual-o-cpf-do-menor").index(), 200);
    percentage = "40%";
    previousPercentage = "35%";
    stopTransition();
  });
  $("#ok_cpf-menor").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#04-2-05_qual-a-data-de-nascimento-dele").index(), 200);
    percentage = "45%";
    previousPercentage = "40%";
    stopTransition();
  });
  $("#btn_nao-menor-cpf").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#04-2-04_qual-o-nome-completo-dele").index(), 200);
    percentage = "45%";
    previousPercentage = "40%";
    stopTransition();
  });
  $("#btn_nome-menor").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#04-2-05_qual-a-data-de-nascimento-dele").index(), 200);
    percentage = "50%";
    previousPercentage = "45%";
    stopTransition();
  });
  $("#btn_data-menor").click(function(e){
    e.preventDefault();
    var nascimentoMenor = document.getElementById("data-menor").value;
    var checaData = checarDataPassado(nascimentoMenor);
    if (checaData != "Invalid Date") {
      swiper.unlockSwipeToNext();
      swiper.slideTo( $("#04-2-06_qual-a-cor-da-pele-dele").index(), 200);
      percentage = "50%";
      previousPercentage = "45%";
      stopTransition();
    }
    else {
      var mensagem = "Por favor informe uma data válida!";
      $(".status").text(mensagem);
      $(".status").show();
      $(".invalido").show();
    }
  });
  $("#btn_cor-da-pele-menor").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-0-01_clique-e-conheca-nossos-planos").index(), 200);
    percentage = "55%";
    previousPercentage = "50%";
    stopTransition();
  });
  $("#btn_gratuito").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-1-01_perfeito-para-comecar").index(), 200);
    percentage = "60%";
    previousPercentage = "55%";
    stopTransition();
  });
  $("#btn_gratuito-drt").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-1-02_perfeito-para-quem-tem-drt").index(), 200);
    percentage = "60%";
    previousPercentage = "55%";
    stopTransition();
  });
  $("#btn_profissional-drt").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-2-02_ideal-para-quem-trabalha-muito").index(), 200);
    percentage = "60%";
    previousPercentage = "55%";
    stopTransition();
  });
  $("#btn_gratuito-drt-more").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-1-02_perfeito-para-quem-tem-drt").index(), 200);
    percentage = "60%";
    previousPercentage = "55%";
    stopTransition();
  });
  $("#btn_profissional-drt-more").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-2-02_ideal-para-quem-trabalha-muito").index(), 200);
    percentage = "60%";
    previousPercentage = "55%";
    stopTransition();
  });
  $("#btn_premium").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-2-01_mais-chances-de-trabalhar").index(), 200);
    percentage = "60%";
    previousPercentage = "55%";
    stopTransition();
  });
  $("#btn_profissional").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-2-02_ideal-para-quem-trabalha-muito").index(), 200);
    percentage = "60%";
    previousPercentage = "55%";
    stopTransition();
  });
  $(".checado").click(function(){
    $(".requerido").fadeOut(200);
  });
  $("#btn_cadastro-gratuito").click(function(e){
    e.preventDefault();
    if(!$("#terms-1").is(":checked")){
      $(".requerido").fadeIn(200);
      event.preventDefault();
    }
    if($("#terms-1").is(":checked")){
      swiper.unlockSwipeToNext();
      swiper.slideTo( $("#05-1-03_assista-ao-video").index(), 200);
      percentage = "70%";
      previousPercentage = "60%";
      stopTransition();
    }
  });
  $("#btn_cadastro-gratuito-DRT").click(function(e){
    e.preventDefault();
    if(!$("#terms-2").is(":checked")){
      $(".requerido").fadeIn(200);
      event.preventDefault();
    }
    if($("#terms-2").is(":checked")){
      swiper.unlockSwipeToNext();
      swiper.slideTo( $("#05-1-03_assista-ao-video").index(), 200);
      percentage = "70%";
      previousPercentage = "60%";
      stopTransition();
    }
  });
  $("#btn_video").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-1-04_envie-uma-foto-sorrindo").index(), 200);
    percentage = "80%";
    previousPercentage = "70%";
    stopTransition();
  });
  $("#btn_sorrindo-enviar").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-1-05_agora-uma-foto-sem-sorrir").index(), 200);
    percentage = "90%";
    previousPercentage = "80%";
    stopTransition();
  });
  $("#btn_serio-enviar").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-1-06_cadastro-concluido-gratuito").index(), 200);
    percentage = "100%";
    previousPercentage = "90%";
    stopTransition();
  });
  $("#btn_cadastro-premium").click(function(e){
    e.preventDefault();
    if(!$("#terms-3").is(":checked")){
      $(".requerido").fadeIn(200);
      event.preventDefault();
    }
    if($("#terms-3").is(":checked")){
      swiper.unlockSwipeToNext();
      swiper.slideTo( $("#05-2-03_desconto-para-horario-pre-fixado").index(), 200);
      percentage = "65%";
      previousPercentage = "60%";
      stopTransition();
    }
  });
  $("#btn_cadastro-profissional").click(function(e){
    e.preventDefault();
    if(!$("#terms-4").is(":checked")){
      $(".requerido").fadeIn(200);
      event.preventDefault();
    }
    if($("#terms-4").is(":checked")){
      swiper.unlockSwipeToNext();
      swiper.slideTo( $("#05-2-03_desconto-para-horario-pre-fixado").index(), 200);
      percentage = "65%";
      previousPercentage = "60%";
      stopTransition();
    }
  });
  $("#btn_aceito-data-desconto").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-2-05_complete-o-seu-endereco").index(), 200);
    percentage = "70%";
    previousPercentage = "65%";
    stopTransition();
  });
  $("#btn_nao-posso-nesse-horario").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-2-04_escolha-o-horario-da-sessao-de-fotos").index(), 200);
    percentage = "67%";
    previousPercentage = "65%";
    stopTransition();
  });
  $("#btn_novo-horario-fotos").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-2-05_complete-o-seu-endereco").index(), 200);
    percentage = "70%";
    previousPercentage = "67%";
    stopTransition();
  });
  $("#btn_completa-endereco").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-2-06_qual-a-forma-de-pagamento").index(), 200);
    percentage = "75%";
    previousPercentage = "70%";
    stopTransition();
  });
  $("#btn_cartao-de-credito").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-2-07_voce-e-o-titular-do-carta-de-credito").index(), 200);
    percentage = "80%";
    previousPercentage = "75%";
    stopTransition();
  });
  $("#btn_boleto-bancario").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-2-08_pagamento-via-boleto-bancario").index(), 200);
    percentage = "90%";
    previousPercentage = "75%";
    stopTransition();
  });
  $("#btn_sim-titular-do-cartao").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-2-11_dados-do-cartao-de-credito").index(), 200);
    percentage = "95%";
    previousPercentage = "80%";
    stopTransition();
  });
  $("#btn_nao-titular-do-cartao").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-2-09_dados-do-titular-do-cartao").index(), 200);
    percentage = "85%";
    previousPercentage = "80%";
    stopTransition();
  });
  $("#btn_dados-titular-cartao").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-2-10_endereco-da-fatura-do-cartao").index(), 200);
    percentage = "90%";
    previousPercentage = "85%";
    stopTransition();
  });
  $("#btn_endereco-titular-cartao").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-2-11_dados-do-cartao-de-credito").index(), 200);
    percentage = "95%";
    previousPercentage = "90%";
    stopTransition();
  });
  $("#sendToMoip").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-2-12_cadastro-agendado").index(), 200);
    percentage = "100%";
    previousPercentage = "95%";
    stopTransition();
  });
  $("#sendToMoip2").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-2-12_cadastro-agendado").index(), 200);
    percentage = "100%";
    previousPercentage = "90%";
    stopTransition();
  });
  $("#btn_o-que-devo-levar").click(function(e){
    e.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $("#05-2-13_prepare-se-para-suas-fotos").index(), 200);
    percentage = "100%";
    previousPercentage = "100%";
    stopTransition();
  });
});
