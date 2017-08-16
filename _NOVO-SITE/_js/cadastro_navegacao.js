$(document).ready(function(){
var anterior = 0;
var percentage = "10%";
var previousPercentage = "10%";
var swiper = new Swiper('.swiper-container', {
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    spaceBetween: 30,
    simulateTouch: false,
    onlyExternal: true,
    speed: 200,
    initialSlide: 0
    // keyboardControl: true
    // onSlideChangeEnd : function(swiper) {
    //  console.log("activeIndex: "+swiper.activeIndex);
    //  console.log("anterior: "+anterior);
    // }
});
swiper.lockSwipeToNext();
swiper.lockSwipeToPrev();
// DETECTA DE QUAL SLIDE VEIO E DEFINE O RETORNO
function returnPrevious(){
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
    previousPercentage = "10%";
    $('.status').hide();
    $('.invalido').hide();
    $('.valido').hide();
    $('.ok').hide();
  }
  if (swiper.activeIndex === 2) {
    swiper.unlockSwipeToPrev();
    // var id = $("button").closest("div").prop("id");
    // var oldSlide = id.replace("div_", "#");
    // swiper.slideTo($(oldSlide).index(),200);
    swiper.slideTo(0,200);
    swiper.lockSwipeToPrev();
    $(".voltar").css("opacity", "0");
    previousPercentage = "10%";
  }
  if (swiper.activeIndex === 3) {
    swiper.unlockSwipeToPrev();
    swiper.slideTo(2,200);
    swiper.lockSwipeToPrev();
    previousPercentage = "35%";
  }
  if (swiper.activeIndex === 7) {
    swiper.unlockSwipeToPrev();
    swiper.slideTo(6,200);
    swiper.lockSwipeToPrev();
    previousPercentage = "45%";
  }
  if (swiper.activeIndex === 10) {
    swiper.unlockSwipeToPrev();
    swiper.slideTo(6,200);
    swiper.lockSwipeToPrev();
    previousPercentage = "50%";
  }
  if (swiper.activeIndex === 14) {
    swiper.unlockSwipeToPrev();
    swiper.slideTo(11,200);
    swiper.lockSwipeToPrev();
    previousPercentage = "50%";
  }
  if (swiper.activeIndex === 17) {
    swiper.unlockSwipeToPrev();
    swiper.slideTo(9,200);
    swiper.lockSwipeToPrev();
    previousPercentage = "50%";
  }
  $(".barra_progresso_porcentagem").css("width", previousPercentage);
}
function stopTransition(){
  swiper.lockSwipeToNext();
  $(".barra_progresso_porcentagem").css("width", percentage);
  $('.status').hide();
  $('.invalido').hide();
  $('.valido').hide();
  $('.ok').hide();
  console.log(swiper.activeIndex);
}
// SEXO DO MENOR
function sexo (s){
  switch (s) {
    case 'F':
      // document.getElementById('cpf-proprio').innerHTML = 'a';
      $(".dele").text("a");
      break;
    case 'M':
      // document.getElementById('cpf-proprio').innerHTML = 'e';
      $(".dele").text("e");
      break;
    default:
      // document.getElementById('cpf-proprio').innerHTML = 'e';
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
  var nascimento = document.getElementById('data-maior').value;
  var idade = getAge(nascimento);
  if (idade >= 18) {
    swiper.slideTo( $('#03-0-03_qual-o-seu-sexo').index(),200 );
    percentage = "15%";
    previousPercentage = "10%";
    stopTransition();
  }
  if (idade < 18 && idade != "empty") {
    swiper.slideTo( $('#03-0-02_voce-e-menor-de-idade').index(),200 );
    percentage = "15%";
    previousPercentage = "10%";
    stopTransition();
  }
  if (idade == "empty") {
    var mensagem = 'Por favor informe uma data válida!';
    $(".status").text(mensagem);
    $('.status').show();
    $('.invalido').show();
  }
});
$("#btn_recomecar-cadastro").click(function(e){
  e.preventDefault();
  returnPrevious();
});
$("#btn_sexo-maior-feminino").click(function(e){
  e.preventDefault();
  swiper.unlockSwipeToNext();
  swiper.slideTo( $('#03-1-01_quem-voce-esta-cadastrando').index(),200 );
  percentage = "30%";
  previousPercentage = "20%";
  stopTransition();
  sexo("F");
});
$("#btn_sexo-maior-masculino").click(function(e){
  e.preventDefault();
  swiper.unlockSwipeToNext();
  swiper.slideTo( $('#03-1-01_quem-voce-esta-cadastrando').index(),200 );
  percentage = "30%";
  previousPercentage = "20%";
  stopTransition();
  sexo("M");
});
$("#btn_eu-mesmo-tenho-18").click(function(e){
  e.preventDefault();
  $(".voltar").css("opacity", "1");
  swiper.unlockSwipeToNext();
  swiper.slideTo( $('#03-1-02_qual-o-seu-cpf').index(),200 );
  // $("#cpf-maior").focus();
  percentage = "20%";
  previousPercentage = "10%";
  stopTransition();
  $("#ok_cep-maior").click(function(g){
    g.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $('#04-1-01_qual-a-cor-da-sua-pele').index(),200 );
    percentage = "35%";
    previousPercentage = "30%";
    stopTransition();
  });
});
$("#btn_um-menor-de-idade").click(function(e){
  e.preventDefault();
  $(".voltar").css("opacity", "1");
  swiper.unlockSwipeToNext();
  swiper.slideTo( $('#03-1-02_qual-o-seu-cpf').index(),200 );
  percentage = "20%";
  previousPercentage = "10%";
  stopTransition();
  $("#ok_cep-maior").click(function(f){
    f.preventDefault();
    swiper.unlockSwipeToNext();
    swiper.slideTo( $('#04-2-01_qual-o-sexo-do-menor').index(),200 );
    percentage = "35%";
    previousPercentage = "30%";
    stopTransition();
  });
});
$("#ok_cpf-maior").click(function(e){
  e.preventDefault();
  swiper.unlockSwipeToNext();
  swiper.slideTo( $('#03-1-03_qual-o-seu-telefone-celular').index(),200 );
  percentage = "25%";
  previousPercentage = "20%";
  stopTransition();
});
$("#ok_cel").click(function(e){
  e.preventDefault();
  swiper.unlockSwipeToNext();
  swiper.slideTo( $('#03-1-04_qual-o-cep-da-sua-residencia').index(),200 );
  percentage = "30%";
  previousPercentage = "25%";
  stopTransition();
});
$("#btn_cor-da-pele-maior").click(function(e){
  e.preventDefault();
  swiper.unlockSwipeToNext();
  swiper.slideTo( $('#04-1-02_voce-tem-registro-drt').index(),200 );
  percentage = "40%";
  previousPercentage = "35%";
  stopTransition();
});
$("#btn_drt-sim").click(function(e){
  e.preventDefault();
  swiper.unlockSwipeToNext();
  swiper.slideTo( $('#04-1-03_envie-uma-foto-do-seu-registro-drt').index(),200 );
  percentage = "45%";
  previousPercentage = "40%";
  stopTransition();
});
$("#btn_drt-enviar").click(function(e){
  e.preventDefault();
  swiper.unlockSwipeToNext();
  swiper.slideTo( $('#05-0-02_clique-e-conheca-nossos-planos_drt').index(),200 );
  percentage = "50%";
  previousPercentage = "45%";
  stopTransition();
});
$("#btn_drt-nao").click(function(e){
  e.preventDefault();
  swiper.unlockSwipeToNext();
  swiper.slideTo( $('#05-0-01_clique-e-conheca-nossos-planos').index(),200 );
  percentage = "45%";
  previousPercentage = "40%";
  stopTransition();
});

// Navegação Menor de Idade
$("#btn_sexo-menor-feminino").click(function(e){
  e.preventDefault();
  swiper.unlockSwipeToNext();
  swiper.slideTo( $('#04-2-02_o-menor-tem-cpf-proprio').index(),200 );
  percentage = "30%";
  previousPercentage = "20%";
  stopTransition();
  sexo("F");
});
$("#btn_sexo-menor-masculino").click(function(e){
  e.preventDefault();
  swiper.unlockSwipeToNext();
  swiper.slideTo( $('#04-2-02_o-menor-tem-cpf-proprio').index(),200 );
  percentage = "30%";
  previousPercentage = "20%";
  stopTransition();
  sexo("M");
});
$("#btn_sim-menor-cpf").click(function(e){
  e.preventDefault();
  swiper.unlockSwipeToNext();
  swiper.slideTo( $('#04-2-03_qual-o-cpf-do-menor').index(),200 );
  percentage = "35%";
  previousPercentage = "30%";
  stopTransition();
});
$("#ok_cpf-menor").click(function(e){
  e.preventDefault();
  swiper.unlockSwipeToNext();
  swiper.slideTo( $('#04-2-05_qual-a-data-de-nascimento-dele').index(),200 );
  percentage = "40%";
  previousPercentage = "35%";
  stopTransition();
});
$("#btn_nao-menor-cpf").click(function(e){
  e.preventDefault();
  swiper.unlockSwipeToNext();
  swiper.slideTo( $('#04-2-04_qual-o-nome-completo-dele').index(),200 );
  percentage = "35%";
  previousPercentage = "30%";
  stopTransition();
});
$("#btn_nome-menor").click(function(e){
  e.preventDefault();
  swiper.unlockSwipeToNext();
  swiper.slideTo( $('#04-2-05_qual-a-data-de-nascimento-dele').index(),200 );
  percentage = "40%";
  previousPercentage = "35%";
  stopTransition();
});
$("#btn_data-menor").click(function(e){
  e.preventDefault();
  var nascimentoMenor = document.getElementById('data-menor').value;
  var checaData = checarDataPassado(nascimentoMenor);
  if (checaData != "Invalid Date") {
    swiper.unlockSwipeToNext();
    swiper.slideTo( $('#04-2-06_qual-a-cor-da-pele-dele').index(),200 );
    percentage = "45%";
    previousPercentage = "40%";
    stopTransition();
  }
  else {
    var mensagem = 'Por favor informe uma data válida!';
    $(".status").text(mensagem);
    $('.status').show();
    $('.invalido').show();
  }
});
$("#btn_cor-da-pele-menor").click(function(e){
  e.preventDefault();
  swiper.unlockSwipeToNext();
  swiper.slideTo( $('#05-0-01_clique-e-conheca-nossos-planos').index(),200 );
  percentage = "40%";
  previousPercentage = "35%";
  stopTransition();
});
$("#btn_gratuito").click(function(e){
  e.preventDefault();
  swiper.unlockSwipeToNext();
  swiper.slideTo( $('#05-1-01_perfeito-para-comecar').index(),200 );
  percentage = "40%";
  previousPercentage = "35%";
  stopTransition();
});
$("#btn_gratuito-drt").click(function(e){
  e.preventDefault();
  swiper.unlockSwipeToNext();
  swiper.slideTo( $('#05-1-02_perfeito-para-quem-tem-drt').index(),200 );
  percentage = "40%";
  previousPercentage = "35%";
  stopTransition();
});
$("#btn_premium").click(function(e){
  e.preventDefault();
  swiper.unlockSwipeToNext();
  swiper.slideTo( $('#05-2-01_mais-chances-de-trabalhar').index(),200 );
  percentage = "40%";
  previousPercentage = "35%";
  stopTransition();
});
$("#btn_profissional").click(function(e){
  e.preventDefault();
  swiper.unlockSwipeToNext();
  swiper.slideTo( $('#05-2-02_ideal-para-quem-trabalha-muito').index(),200 );
  percentage = "40%";
  previousPercentage = "35%";
  stopTransition();
});
$(".checado").click(function(){
  $(".requerido").fadeOut(200);
});
$("#btn_renova-cadastro-gratuito").click(function(e){
  e.preventDefault();
  if(!$("#terms-1").is(":checked")){
    $(".requerido").fadeIn(200);
    event.preventDefault();
  }
  if($("#terms-1").is(":checked")){
    swiper.unlockSwipeToNext();
    swiper.slideTo( $('#05-1-03_assista-ao-video').index(),200 );
    percentage = "40%";
    previousPercentage = "35%";
    stopTransition();
  }
});
$("#btn_video").click(function(e){
  e.preventDefault();
  swiper.unlockSwipeToNext();
  swiper.slideTo( $('#05-1-04_envie-uma-foto-sorrindo').index(),200 );
  percentage = "40%";
  previousPercentage = "35%";
  stopTransition();
});

  $("#btn_sorrindo-enviar").click(function(){
    console.log('01');

    // jQuery("form").submit(function(){
    //   console.log('02');
    //   var formData = new FormData(this);
    //   form.append('file', event.target.files[0]);
    //   console.log(formData);
    //   $.ajax({
    //       url: "http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/ajax/processa_upload.php",
    //       type: 'POST',
    //       data: formData,
    //       success: function (data) {
    //           alert(data)
    //           // swiper.unlockSwipeToNext();
    //           // swiper.slideTo( $('#05-1-05_reenquadre-sorrindo').index(),200 );
    //           // percentage = "40%";
    //           // previousPercentage = "35%";
    //           // stopTransition();
    //       },
    //       cache: false,
    //       contentType: false,
    //       processData: false,
    //       xhr: function() {  // Custom XMLHttpRequest
    //           var myXhr = $.ajaxSettings.xhr();
    //           if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
    //               myXhr.upload.addEventListener('progress', function () {
    //                   /* faz alguma coisa durante o progresso do upload */
    //               }, false);
    //           }
    //       return myXhr;
    //       }
    //   });
    // });

  });

var $formUpload = document.getElementById('form-sorrindo'),
    $preview = document.getElementById('btn_sorrindo-enviar'),
    i = 0;

$formUpload.addEventListener('submit', function(event){
  event.preventDefault();
  var xhr = new XMLHttpRequest();
  xhr.open("POST", $formUpload.getAttribute('action'));
  var formData = new FormData($formUpload);
  formData.append("i", i++);
  xhr.send(formData);
  xhr.addEventListener('readystatechange', function() {
    if (xhr.readyState === 4 && xhr.status == 200) {
      var json = JSON.parse(xhr.responseText);
      if (!json.error && json.status === 'ok') {
        $preview.innerHTML += 'Enviado!!';
      } else {
        $preview.innerHTML = 'Arquivo não enviado';
        console.log(json.error);
      }
    } else {
      $preview.innerHTML = xhr.statusText;
    }
  });
  xhr.upload.addEventListener("progress", function(e) {
    if (e.lengthComputable) {
      var percentage = Math.round((e.loaded * 100) / e.total);
      $preview.innerHTML = String(percentage) + '%';
    }
  }, false);
  xhr.upload.addEventListener("load", function(e){
    $preview.innerHTML = String(100) + '%';
  }, false);
}, false);

});