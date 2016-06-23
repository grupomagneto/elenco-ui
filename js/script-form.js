    var menor = new Swiper('.menor', {
        pagination: '.swiper-pagination',
        keyboardControl: true,
        direction: 'vertical',
        simulateTouch: false,
        onlyExternal: true,
        nextButton: '.swiper-control.next',
        prevButton: '.swiper-control.prev',
        speed: 200
    });

    var maior = new Swiper('.maior', {
        keyboardControl: true,
        direction: 'vertical',
        simulateTouch: false,
        onlyExternal: true,
        nextButton: '.swiper-control.next2',
        prevButton: '.swiper-control.prev2',
        speed: 200,
        initialSlide: 0
    });
//INICIO GRADIENTS
var colors = new Array(
        [165, 0, 200], [176, 116, 255], [255, 41, 129], [237, 107, 107], [201, 87, 222], [35, 188, 237]
        );

var step = 0;

var colorIndices = [0, 1, 2, 3];

var gradientSpeed = 0.001;

function updateGradient(container) {
    var c0_0 = colors[colorIndices[0]];
    var c0_1 = colors[colorIndices[1]];
    var c1_0 = colors[colorIndices[2]];
    var c1_1 = colors[colorIndices[3]];

    var istep = 1 - step;
    var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
    var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
    var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
    var color1 = "rgb(" + r1 + "," + g1 + "," + b1 + ")";

    var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
    var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
    var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
    var color2 = "rgb(" + r2 + "," + g2 + "," + b2 + ")";

    $(container).css({
        background: "-webkit-gradient(linear, left top, right top, from(" + color1 + "), to(" + color2 + "))"
    }).css({
        background: "-moz-linear-gradient(left, " + color1 + " 0%, " + color2 + " 100%)"
    });

    step += gradientSpeed;
    if (step >= 1) {
        step %= 1;
        colorIndices[0] = colorIndices[1];
        colorIndices[2] = colorIndices[3];

        colorIndices[1] = (colorIndices[1] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;
        colorIndices[3] = (colorIndices[3] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;
    }
}
setInterval(function() {
  updateGradient('.gradient');
}, 10);

var colors = new Array(
        [165, 0, 200], [176, 116, 255], [255, 41, 129], [237, 107, 107], [201, 87, 222], [35, 188, 237]
    );

var step = 0;

var colorIndices = [0, 1, 2, 3];

var gradientSpeed = 0.001;

function updateGradient(container) {
      var c0_0 = colors[colorIndices[0]];
      var c0_1 = colors[colorIndices[1]];
      var c1_0 = colors[colorIndices[2]];
      var c1_1 = colors[colorIndices[3]];

      var istep = 1 - step;
      var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
      var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
      var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
      var color1 = "rgb(" + r1 + "," + g1 + "," + b1 + ")";

      var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
      var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
      var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
      var color2 = "rgb(" + r2 + "," + g2 + "," + b2 + ")";

  $(container).css({
    background: "-webkit-gradient(linear, left top, right top, from(" + color1 + "), to(" + color2 + "))"
  }).css({
    background: "-moz-linear-gradient(left, " + color1 + " 0%, " + color2 + " 100%)"
  });

  step += gradientSpeed;
  if (step >= 1) {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];

    colorIndices[1] = (colorIndices[1] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = (colorIndices[3] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;

  }
}
setInterval(function() {
  updateGradient('.gradient2');
}, 10);

var colors = new Array(
  [165, 0, 200], [176, 116, 255], [255, 41, 129], [237, 107, 107], [201, 87, 222], [35, 188, 237]
);

var step = 0;

var colorIndices = [0, 1, 2, 3];

var gradientSpeed = 0.001;

function updateGradient(container) {
  var c0_0 = colors[colorIndices[0]];
  var c0_1 = colors[colorIndices[1]];
  var c1_0 = colors[colorIndices[2]];
  var c1_1 = colors[colorIndices[3]];

  var istep = 1 - step;
  var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
  var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
  var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
  var color1 = "rgb(" + r1 + "," + g1 + "," + b1 + ")";

  var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
  var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
  var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
  var color2 = "rgb(" + r2 + "," + g2 + "," + b2 + ")";

  $(container).css({
    background: "-webkit-gradient(linear, left top, right top, from(" + color1 + "), to(" + color2 + "))"
  }).css({
    background: "-moz-linear-gradient(left, " + color1 + " 0%, " + color2 + " 100%)"
  });

  step += gradientSpeed;
  if (step >= 1) {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];

    colorIndices[1] = (colorIndices[1] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = (colorIndices[3] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;
  }
}
setInterval(function() {
  updateGradient('.gradient3');
}, 10);

var colors = new Array(
  [165, 0, 200], [176, 116, 255], [255, 41, 129], [237, 107, 107], [201, 87, 222], [35, 188, 237]
);

var step = 0;

var colorIndices = [0, 1, 2, 3];

var gradientSpeed = 0.001;

function updateGradient(container) {
  var c0_0 = colors[colorIndices[0]];
  var c0_1 = colors[colorIndices[1]];
  var c1_0 = colors[colorIndices[2]];
  var c1_1 = colors[colorIndices[3]];

  var istep = 1 - step;
  var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
  var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
  var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
  var color1 = "rgb(" + r1 + "," + g1 + "," + b1 + ")";

  var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
  var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
  var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
  var color2 = "rgb(" + r2 + "," + g2 + "," + b2 + ")";

  $(container).css({
    background: "-webkit-gradient(linear, left top, right top, from(" + color1 + "), to(" + color2 + "))"
  }).css({
    background: "-moz-linear-gradient(left, " + color1 + " 0%, " + color2 + " 100%)"
  });

  step += gradientSpeed;
  if (step >= 1) {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];
    colorIndices[1] = (colorIndices[1] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = (colorIndices[3] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;

  }
}
setInterval(function() {
  updateGradient('.gradient4');
}, 10);
//FIM GRADIENTS

//INICIO MUDANÇA DE ACORDO COM O SEXO
function exibeMsg2(valor) {
  switch (valor) {
    case 'feminino':
      document.getElementById('txt2').innerHTML = 'dela';
      document.getElementById('txt3').innerHTML = 'dela';
      document.getElementById('txt4').innerHTML = 'ela';
      document.getElementById('txt5').innerHTML = 'da';
      document.getElementById('txt6').innerHTML = 'dela';
      document.getElementById('txt7').innerHTML = 'da';
      document.getElementById('txt8').innerHTML = 'dela';
      document.getElementById('txt9').innerHTML = 'ela';
      document.getElementById('txt10').innerHTML = 'ela';
      document.getElementById('txt11').innerHTML = 'dela';
      document.getElementById('txt12').innerHTML = 'da';
      document.getElementById('txt13').innerHTML = 'da';
      document.getElementById('txt14').innerHTML = 'dela';
      document.getElementById('txt15').innerHTML = 'dela';
      document.getElementById('txt16').innerHTML = 'ela';
      document.getElementById('txt17').innerHTML = 'da';
      document.getElementById('txt18').innerHTML = 'A';
      document.getElementById('txt19').innerHTML = 'a';
      document.getElementById('txt20').innerHTML = 'a';
      document.getElementById('txt21').innerHTML = 'a';
      document.getElementById('txt22').innerHTML = 'da';
      document.getElementById('txt23').innerHTML = 'dela';
      document.getElementById('txt24').innerHTML = 'dela';
      document.getElementById('txt25').innerHTML = 'ela';
      document.getElementById('txt26').innerHTML = 'da';
      document.getElementById('txt27').innerHTML = 'A';
      document.getElementById('txt28').innerHTML = 'a';
      document.getElementById('txt29').innerHTML = 'da';
      document.getElementById('txt30').innerHTML = 'dela';
      document.getElementById('txt31').innerHTML = 'dela';
      document.getElementById('txt32').innerHTML = 'ela';
      document.getElementById('txt33').innerHTML = 'da';
      document.getElementById('txt34').innerHTML = 'A';
      document.getElementById('txt35').innerHTML = 'a';
      document.getElementById('txt36').innerHTML = 'da';
      document.getElementById('txt37').innerHTML = 'dela';
      document.getElementById('txt38').innerHTML = 'dela';
      document.getElementById('txt39').innerHTML = 'ela';
      document.getElementById('txt40').innerHTML = 'da';
      document.getElementById('txt41').innerHTML = 'A';
      document.getElementById('txt42').innerHTML = 'a';
      document.getElementById('txt43').innerHTML = 'da';
      document.getElementById('txt44').innerHTML = 'dela';
      document.getElementById('txt45').innerHTML = 'dela';
      document.getElementById('txt46').innerHTML = 'ela';
      document.getElementById('txt47').innerHTML = 'da';
      document.getElementById('txt48').innerHTML = 'A';
      document.getElementById('txt49').innerHTML = 'a';
      document.getElementById('txt50').innerHTML = 'da';
      document.getElementById('txt51').innerHTML = 'dela';
      document.getElementById('txt52').innerHTML = 'dela';
      document.getElementById('txt53').innerHTML = 'ela';
      document.getElementById('txt54').innerHTML = 'da';
      document.getElementById('txt55').innerHTML = 'A';
      document.getElementById('txt56').innerHTML = 'a';
      document.getElementById('txt57').innerHTML = 'a';
      document.getElementById('txt58').innerHTML = 'da';
      document.getElementById('txt59').innerHTML = 'a';
      break;
    case 'masculino':
      document.getElementById('txt2').innerHTML = 'dele';
      document.getElementById('txt3').innerHTML = 'dele';
      document.getElementById('txt4').innerHTML = 'ele';
      document.getElementById('txt5').innerHTML = 'do';
      document.getElementById('txt6').innerHTML = 'dele';
      document.getElementById('txt7').innerHTML = 'do';
      document.getElementById('txt8').innerHTML = 'dele';
      document.getElementById('txt9').innerHTML = 'ele';
      document.getElementById('txt10').innerHTML = 'ele';
      document.getElementById('txt11').innerHTML = 'dele';
      document.getElementById('txt12').innerHTML = 'do';
      document.getElementById('txt13').innerHTML = 'do';
      document.getElementById('txt14').innerHTML = 'dele';
      document.getElementById('txt15').innerHTML = 'dele';
      document.getElementById('txt16').innerHTML = 'ele';
      document.getElementById('txt17').innerHTML = 'do';
      document.getElementById('txt18').innerHTML = 'O';
      document.getElementById('txt19').innerHTML = 'o';
      document.getElementById('txt20').innerHTML = 'o';
      document.getElementById('txt21').innerHTML = 'o';
      document.getElementById('txt22').innerHTML = 'do';
      document.getElementById('txt23').innerHTML = 'dele';
      document.getElementById('txt24').innerHTML = 'dele';
      document.getElementById('txt25').innerHTML = 'ele';
      document.getElementById('txt26').innerHTML = 'do';
      document.getElementById('txt27').innerHTML = 'O';
      document.getElementById('txt28').innerHTML = 'o';
      document.getElementById('txt29').innerHTML = 'do';
      document.getElementById('txt30').innerHTML = 'dele';
      document.getElementById('txt31').innerHTML = 'dele';
      document.getElementById('txt32').innerHTML = 'ele';
      document.getElementById('txt33').innerHTML = 'do';
      document.getElementById('txt34').innerHTML = 'O';
      document.getElementById('txt35').innerHTML = 'o';
      document.getElementById('txt36').innerHTML = 'do';
      document.getElementById('txt37').innerHTML = 'dele';
      document.getElementById('txt38').innerHTML = 'dele';
      document.getElementById('txt39').innerHTML = 'ele';
      document.getElementById('txt40').innerHTML = 'do';
      document.getElementById('txt41').innerHTML = 'O';
      document.getElementById('txt42').innerHTML = 'o';
      document.getElementById('txt43').innerHTML = 'do';
      document.getElementById('txt44').innerHTML = 'dele';
      document.getElementById('txt45').innerHTML = 'dele';
      document.getElementById('txt46').innerHTML = 'ele';
      document.getElementById('txt47').innerHTML = 'do';
      document.getElementById('txt48').innerHTML = 'O';
      document.getElementById('txt49').innerHTML = 'o';
      document.getElementById('txt50').innerHTML = 'do';
      document.getElementById('txt51').innerHTML = 'dele';
      document.getElementById('txt52').innerHTML = 'dele';
      document.getElementById('txt53').innerHTML = 'ele';
      document.getElementById('txt54').innerHTML = 'do';
      document.getElementById('txt55').innerHTML = 'O';
      document.getElementById('txt56').innerHTML = 'o';
      document.getElementById('txt57').innerHTML = 'o';
      document.getElementById('txt58').innerHTML = 'do';
      document.getElementById('txt59').innerHTML = 'o';
      break;
    default:
      document.getElementById('txt2').innerHTML = 'Nenhum valor informado';
      document.getElementById('txt3').innerHTML = 'Nenhum valor informado';
      break;
  }
}

function exibeMsg(valor) {
  switch (valor) {
    case 'feminino':
      document.getElementById('txt').innerHTML = 'atriz';
      break;
    case 'masculino':
      document.getElementById('txt').innerHTML = 'ator';
      break;
    default:
      document.getElementById('txt').innerHTML = 'Nenhum valor informado';
      break;
  }
}


//MASK APENAS PARA SAFARI

$(document).ready(function(){
  
var mascara = function() { 


if (window.matchMedia('(min-width: 1199px)').matches)
{
  
var ua = navigator.userAgent.toLowerCase(); 
if (ua.indexOf('safari') != -1) { 
  if (ua.indexOf('chrome') > -1) {
    
  } else {

    $('#data_menor').mask('99/99/9999');
  }
}
  
} else {

  
 $('#data_menor').unmask();
}
};
 
  $(window).resize(mascara);
 
  mascara();  
});


//MASK APENAS PARA SAFARI

//MASK APENAS PARA SAFARI

$(document).ready(function(){
  
var mascara = function() { 


if (window.matchMedia('(min-width: 1199px)').matches)
{
  
var ua = navigator.userAgent.toLowerCase(); 
if (ua.indexOf('safari') != -1) { 
  if (ua.indexOf('chrome') > -1) {
    
  } else {

    $('#data_maior').mask('99/99/9999');
  }
}
  
} else {

  
 $('#data_maior').unmask();
}
};
 
  $(window).resize(mascara);
 
  mascara();  
});


//MASK APENAS PARA SAFARI

//FIM MUDANÇA DE ACORDO COM O SEXO
$('form')[0].addEventListener('focus', function(e) {
  
  var focusIndex = $(e.target).parents('.swiper-slide').index();
  
  $('.swiper-container')[0].scrollTop = 0;
  setTimeout(function() {
    $('.swiper-container')[0].scrollTop = 0;
  }, 0);

  Swiper.slideTo(focusIndex);
}, true);

//FOCUS DIV RESPONSÁVEL FORM MENOR
$(document).ready(function() {
  $("#form2 [name='responsavel']").click(function() {
    if ($(this).attr("value") == "sim") {   
      var delay = 1000;
      setTimeout(function() {
         $("#cpf_responsavel").focus();
         menor.slideNext();
      }, 200);
    }
    if ($(this).attr("value") == "nao") {
      //LINK CASO NÃO FOR RESPONSÁVEL
        location="sucesso.php";
    }
  });
});
//FOCUS DIV RESPONSÁVEL FORM MENOR

//FOCUS DIV SEXO MENOR FORM MENOR
$(document).ready(function() {
  $("#form2 [name='sexo_menor']").click(function() {
    if ($(this).attr("value") == "feminino") {   
      var delay = 1000;
      setTimeout(function() {
         $("#nome_menor").focus();
         menor.slideNext();
      }, 200);
    }
    if ($(this).attr("value") == "masculino") {
      //MASCULINO
         var delay = 1000;
      setTimeout(function() {
         $("#nome_menor").focus();
         menor.slideNext();
      }, 200);
    }
  });
});
//FOCUS DIV SEXO MENOR FORM MENOR

//FOCUS DIV SEXO MENOR FORM MAIOR
$(document).ready(function() {
  $("#form [name='sexo_maior']").click(function() {
    if ($(this).attr("value") == "feminino") {   
      var delay = 1000;
      setTimeout(function() {
         $("#camera_maior").focus();
         maior.slideNext();
      }, 200);
    }
    if ($(this).attr("value") == "masculino") {
      //MASCULINO
         var delay = 1000;
      setTimeout(function() {
         $("#camera_maior").focus();
         maior.slideNext();
      }, 200);
    }
  });
});
//FOCUS DIV SEXO MENOR FORM MAIOR

//BUTTON OK INPUTS

$(window).load(function() {
  $('#cpf_responsavel').keyup(function() {
    if ($.trim(this.value).length > 13) {
      $('#btSend').show();
      $('#seta').show();
    } else {
      $('#btSend').hide();
      $('#seta').hide();
    }
  });
});
//BUTTON OK INPUTS

//FOCUS BUTTON OK
$(document).ready(function() {
  $("#seta").click(function() {
    $("#form2 [name='nome_responsavel']").focus();
  });
});
//FOCUS BUTTON OK

//TAB ENTER
$("#cpf_responsavel").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    menor.slideNext();
    $("#form2 [name='nome_responsavel']").focus();
  }
});

$("#nome_responsavel").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    menor.slideNext();
    $("#form2 [name='sexo_menor']").focus();
  }
});


$("#nome_menor").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    menor.slideNext();
    $("#form2 [name='sobrenome_menor']").focus();
  }
});

$("#data_menor").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    menor.slideNext();
    $("#form2 [name='celular_responsavel']").focus();
  }
});

$("#celular_responsavel").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    menor.slideNext();
    $("#form2 [name='email_responsavel']").focus();
  }
});

$("#ig_menor").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    $("#form2 [name='face_menor']").focus();
  }
});

$("#face_menor").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    $("#form2 [name='tt_menor']").focus();
  }
});

$("#nome_maior").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
      // $("html, body").animate({ scrollTop: 0 });
  }
});

$("#sobrenome_maior").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    maior.slideNext();
  }
});

$("#data_maior").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    maior.slideNext();
  }
});

$("#celular_maior").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    maior.slideNext();
  }
});

$("#email_maior").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    maior.slideNext();
  }
});

//TAB ENTER

//FOCUS MENOR PARA MAIOR
function inputFocus(){
    $('html, body').animate({ scrollTop: $("#17").offset().top }, 200);
    $("#form [name='nome_maior']").focus();
}

//FOCUS MENOR PARA MAIOR


//SCRIPT MODAL

$('#myModal').appendTo("form");
$('#Modalmaior-premium').appendTo("form");
$('#Modalmaior-gratuito').appendTo("form");
$('#Modalmaior-profissional').appendTo("form");
$('#Modalm-maior-premium').appendTo("form");
$('#Modalm-maior-gratuito').appendTo("form");
$('#Modalm-maior-profissional').appendTo("form");
$('#myModal1_m').appendTo("form");
$('#termo_premium_mobile').appendTo("form");
$('#termo_maior_premium_mobile').appendTo("form");
$('#termo_maior_gratuito_mobile').appendTo("form");
$('#termo_maior_profissional_mobile').appendTo("form");
$('#myModal2').appendTo("form");
$('#myModal1_m2').appendTo("form");
$('#termo_gratuito_mobile').appendTo("form");

$('#myModal3').appendTo("form");
$('#myModal3_m1').appendTo("form");
$('#termo_profissional_mobile').appendTo("form");

$(".botao_escolha_m").click(function() {
  $('#myModal1_m').modal('hide');
});

$(".botao_escolha_m2_2").click(function() {
  $('#myModal1_m2').modal('hide');
});

$(".botao_escolha_m3_m1").click(function() {
  $('#myModal3_m1').modal('hide');
});

// ESCONDER MODAL PREMIUM
$(".button").click(function() {
  $('#myModal').modal('hide');
  menor.slideNext();
  $("#ig").focus();
});

$(".sim_acordo_termo_premium_mobile").click(function() {
  $('#termo_premium_mobile').modal('hide');
  $("#ig").focus();
});

// ESCONDER MODAL GRATUITO
$(".button2").click(function() {
  $('#myModal2').modal('hide');
  menor.slideNext();
  $("#ig").focus();
});

$(".sim_acordo_termo_gratuito_mobile").click(function() {
  $('#termo_gratuito_mobile').modal('hide');
  $("#ig").focus();
});

// ESCONDER MODAL PROFISSIONAL
$(".button3").click(function() {
  $('#myModal3').modal('hide');
  menor.slideNext();
  $("#ig").focus();
});

$(".sim_acordo_termo_profissional_mobile").click(function() {
  $('#termo_profissional_mobile').modal('hide');
  $("#ig").focus();
});

//SCRIPT MODAL




