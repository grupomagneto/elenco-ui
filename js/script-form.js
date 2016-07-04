    var menor = new Swiper('.swiper-container.menor', {
        pagination: '.swiper-pagination',
        keyboardControl: true,
        direction: 'vertical',
        simulateTouch: false,
        onlyExternal: true,
        nextButton: '.swiper-control.next',
        prevButton: '.swiper-control.prev',
        speed: 200,
        initialSlide: 0
    });

    var maior = new Swiper('.swiper-container.maior', {
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

//LANDSCAPE ANDROID
var isAndroid = navigator.userAgent.toLowerCase().indexOf("android") > -1; //&& ua.indexOf("mobile");
if(isAndroid) {
    document.write('<meta name="viewport" content="width=device-width,height='+window.innerHeight+', initial-scale=1.0">');
}
//LANDSCAPE ANDROID

//INICIO MUDAN? DE ACORDO COM O SEXO
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
      document.getElementById('txt60').innerHTML = 'a';
      document.getElementById('txt61').innerHTML = 'a';
      document.getElementById('txt62').innerHTML = 'a';
      document.getElementById('txt63').innerHTML = 'a';
      document.getElementById('txt64').innerHTML = 'a';
      document.getElementById('txt65').innerHTML = 'a';
      break;
    case 'masculino':
      document.getElementById('txt').innerHTML = 'ator';
      document.getElementById('txt60').innerHTML = 'o';
      document.getElementById('txt61').innerHTML = 'o';
      document.getElementById('txt62').innerHTML = 'o';
      document.getElementById('txt63').innerHTML = 'o';
      document.getElementById('txt64').innerHTML = 'o';
      document.getElementById('txt65').innerHTML = 'o';
      break;
    default:
      document.getElementById('txt').innerHTML = 'Nenhum valor informado';
      break;
  }
}


//MASK APENAS PARA SAFARI

$(document).ready(function(){
  
var mascara = function() { 


if (window.matchMedia('(min-width: 1024px)').matches)
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


if (window.matchMedia('(min-width: 1024px)').matches)
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

//FIM MUDAN? DE ACORDO COM O SEXO
$('#form')[0].addEventListener('focus', function(e) {
  
  var focusIndex = $(e.target).parents('.swiper-slide').index();
  
  $('.swiper-container.maior')[0].scrollTop = 0;
  setTimeout(function() {
    $('.swiper-container.maior')[0].scrollTop = 0;
  }, 0);

  maior.slideTo(focusIndex);
}, true);


$('form')[0].addEventListener('focus', function(e) {
  
  var focusIndex = $(e.target).parents('.swiper-slide').index();
  
  $('.swiper-container.menor')[0].scrollTop = 0;
  setTimeout(function() {
    $('.swiper-container.menor')[0].scrollTop = 0;
  }, 0);

  menor.slideTo(focusIndex);
}, true);


// SCROLL DIV SEXO  FORM MAIOR
$(document).ready(function() {
  $("#form [name='sexo_maior']").click(function() {
    if ($(this).attr("value") == "feminino") {   

$('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {});

    }
    if ($(this).attr("value") == "masculino") {
     $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {});
    }
  });
});

//SCROLL DIV SEXO FORM MAIOR

//BUTTON OK INPUTS

$(window).load(function() {
  $('#cpf_responsavel').keyup(function() {
    if ($.trim(this.value).length > 13) {
      $('#btSend').show();
      $('#seta').show();
      $('input#cpf_responsavel').css('padding-right', '55px');
    } else {
      $('#btSend').hide();
      $('#seta').hide();
    }
  });
});

$(window).load(function() {
  $('#nome_responsavel').keyup(function() {
    if ($.trim(this.value).length > 2) {
      $('#btSend2').show();
      $('#seta2').show();
      $('input#nome_responsavel').css('padding-right', '55px');
    } else {
      $('#btSend2').hide();
      $('#seta2').hide();
    }
  });
});

$(window).load(function() {
  $('#nome_menor').keyup(function() {
    if ($.trim(this.value).length > 2) {
      $('#btSend4').show();
      $('#seta4').show();
      $('input#nome_menor').css('padding-right', '55px');
    } else {
      $('#btSend4').hide();
      $('#seta4').hide();
    }
  });
});

$(window).load(function() {
  $('#sobrenome_menor').keyup(function() {
    if ($.trim(this.value).length > 2) {
      $('#btSend5').show();
      $('#seta5').show();
      $('input#sobrenome_menor').css('padding-right', '55px');
    } else {
      $('#btSend5').hide();
      $('#seta5').hide();
    }
  });
});

$(window).load(function() {
  $('#data_menor').keyup(function() {
    if ($.trim(this.value).length > 2) {
      $('#btSend6').show();
      $('#seta6').show();
      $('input#data_menor').css('padding-right', '55px');
    } else {
      $('#btSend6').hide();
      $('#seta6').hide();
    }
  });
});

$(window).load(function() {
  $('#celular_responsavel').keyup(function() {
    if ($.trim(this.value).length > 13) {
      $('#btSend10').show();
      $('#seta10').show();
      $('input#celular_responsavel').css('padding-right', '55px');
    } else {
      $('#btSend10').hide();
      $('#seta10').hide();
    }
  });
});

$(window).load(function() {
  $('#email_responsavel').keyup(function() {
    if ($.trim(this.value).length > 7) {
      $('#btSend11').show();
      $('#seta11').show();
      $('input#email_responsavel').css('padding-right', '55px');
    } else {
      $('#btSend11').hide();
      $('#seta11').hide();
    }
  });
});

$(window).load(function() {
  $('#nome_maior').keyup(function() {
    if ($.trim(this.value).length > 2) {
      $('#btSend17').show();
      $('#seta17').show();
      $('input#nome_maior').css('padding-right', '55px');
    } else {
      $('#btSend17').hide();
      $('#seta17').hide();
    }
  });
});

$(window).load(function() {
  $('#sobrenome_maior').keyup(function() {
    if ($.trim(this.value).length > 2) {
      $('#btSend18').show();
      $('#seta18').show();
      $('input#sobrenome_maior').css('padding-right', '55px');
    } else {
      $('#btSend18').hide();
      $('#seta18').hide();
    }
  });
});

$(window).load(function() {
  $('#data_maior').keyup(function() {
    if ($.trim(this.value).length > 2) {
      $('#btSend19').show();
      $('#seta19').show();
      $('input#data_maior').css('padding-right', '55px');
    } else {
      $('#btSend19').hide();
      $('#seta19').hide();
    }
  });
});

$(window).load(function() {
  $('#celular_maior').keyup(function() {
    if ($.trim(this.value).length > 13) {
      $('#btSend20').show();
      $('#seta20').show();
      $('input#celular_maior').css('padding-right', '55px');
    } else {
      $('#btSend20').hide();
      $('#seta20').hide();
    }
  });
});

$(window).load(function() {
  $('#email_maior').keyup(function() {
    if ($.trim(this.value).length > 7) {
      $('#btSend21').show();
      $('#seta21').show();
      $('input#email_maior').css('padding-right', '55px');
    } else {
      $('#btSend21').hide();
      $('#seta21').hide();
    }
  });
});

$(window).load(function() {
  $('#cpf_maior').keyup(function() {
    if ($.trim(this.value).length > 13) {
      $('#btSend22').show();
      $('#seta22').show();
      $('input#cpf_maior').css('padding-right', '55px');
    } else {
      $('#btSend22').hide();
      $('#seta22').hide();
    }
  });
});

//BUTTON OK INPUTS


$("#sobrenome_maior").keypress(function(e) {
var ENTER = 13;

var getKey = function(e) {
  if(window.event) { return e.keyCode; }  // IE
  else if(e.which) { return e.which; }    // Netscape/Firefox/Opera
};
var keynum = getKey(e);

if(keynum === ENTER) {
  //code focus    
    e.preventDefault();
    maior.slideNext();
}
});

$("#22").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    maior.slideNext();
  }
});

$("#23").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    maior.slideNext();
  }
});


$("#celular_maior").keypress(function(e) {
var ENTER = 13;

var getKey = function(e) {
  if(window.event) { return e.keyCode; }  // IE
  else if(e.which) { return e.which; }    // Netscape/Firefox/Opera
};
var keynum = getKey(e);

if(keynum === ENTER) {
  //code focus    
   $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#email_maior').focus();
});
}
});


$("#email_maior").keypress(function(e) {
var ENTER = 13;

var getKey = function(e) {
  if(window.event) { return e.keyCode; }  // IE
  else if(e.which) { return e.which; }    // Netscape/Firefox/Opera
};
var keynum = getKey(e);

if(keynum === ENTER) {
  //code focus    
    e.preventDefault();
    maior.slideNext();
}
});


$("#cpf_maior").keypress(function(e) {
var ENTER = 13;

var getKey = function(e) {
  if(window.event) { return e.keyCode; }  // IE
  else if(e.which) { return e.which; }    // Netscape/Firefox/Opera
};
var keynum = getKey(e);

if(keynum === ENTER) {
  //code focus    
    e.preventDefault();
    maior.slideNext();
}
});



//SCRIPT MODAL

$('#myModal').appendTo("form");
$('#myModal2').appendTo("form");
$('#myModal3').appendTo("form");
$('#Modalmaior-premium').appendTo("#form");
$('#Modalmaior-gratuito').appendTo("#form");
$('#Modalmaior-profissional').appendTo("#form");
$('#Modalm-maior-premium').appendTo("#form");
$('#Modalm-maior-gratuito').appendTo("#form");
$('#Modalm-maior-profissional').appendTo("#form");
$('#myModal1_m').appendTo("form");
$('#termo_premium_mobile').appendTo("form");
$('#termo_maior_premium_mobile').appendTo("#form");
$('#termo_maior_gratuito_mobile').appendTo("#form");
$('#termo_maior_profissional_mobile').appendTo("#form");
$('#myModal1_m2').appendTo("form");
$('#termo_gratuito_mobile').appendTo("form");
$('#myModal3_m1').appendTo("form");
$('#termo_profissional_mobile').appendTo("form");

$(".botao_escolha_m").click(function() {
  $('#myModal1_m').modal('hide');
});

$(".botao_escolha_m.maior").click(function() {
  $('#Modalm-maior-premium').modal('hide');
});

$(".botao_escolha_m2_2").click(function() {
  $('#myModal1_m2').modal('hide');
});

$(".botao_escolha_m2_2.maior").click(function() {
  $('#Modalm-maior-gratuito').modal('hide');
});

$(".botao_escolha_m3_m1").click(function() {
  $('#myModal3_m1').modal('hide');
});

$(".botao_escolha_m3_m1.maior").click(function() {
  $('#Modalm-maior-profissional').modal('hide');
});


//SCRIPT MODAL

//DRT ATOR (COPIADO E COLADO DO FORM.JS)

function exibeMsg3(valor) {
  switch (valor) {
    case 'sim':
      document.getElementById('txtpremium1').innerHTML = 'Voc?n? precisa pagar para se agenciar;';
      document.getElementById("txtpremium2").setAttribute("style","display:none"); 
      document.getElementById("txtpremium1").setAttribute("style","display:block"); 
      document.getElementById('txtpremium1_mobile').innerHTML = 'Voc?n? precisa pagar para se agenciar;';
      document.getElementById("txtpremium2_mobile").setAttribute("style","display:none"); 
      document.getElementById("txtpremium1_mobile").setAttribute("style","display:block"); 
      break;
    case 'nao':
      document.getElementById('txtpremium2').innerHTML = 'Para efetivar seu contrato voc?dever?pagar R$ 299 em at?10x ou comprar um de nossos ensaios fotogr?icos;';
      document.getElementById("txtpremium1").setAttribute("style","display:none");
      document.getElementById("txtpremium2").setAttribute("style","display:block");
      document.getElementById('txtpremium2_mobile').innerHTML = 'Para efetivar seu contrato voc?dever?pagar R$ 299 em at?10x ou comprar um de nossos ensaios fotogr?icos;';
      document.getElementById("txtpremium1_mobile").setAttribute("style","display:none");
      document.getElementById("txtpremium2_mobile").setAttribute("style","display:block");  
      break;
    default:
      document.getElementById('txtpremium3').innerHTML = 'n? clicou';
      break;
  }
}

$("#nome_maior").keyup(function() {
  $(".concat_texto").html($(this).val());
});

$("#nome_menor").keyup(function() {
  $(".concat2_texto").html($(this).val());
});

$("#nome_responsavel").keyup(function() {
  $(".concat3_texto").html($(this).val());
});

//C?igo da div ator

$(document).ready(function() {
  $(".blue").hide();
  $("#form [name='ator']").click(function() {
    if ($(this).attr("value") == "sim") {

      $(".box").not(".blue").hide();
      $(".descricao").hide();
      $(".blue").show();
      
    }
    if ($(this).attr("value") == "nao") {

      $(".box").not(".blue").hide();
      $(".descricao").show();
      $(".blue").hide();
    }
  });
});

//TEXTO ATOR
function simAtor() {
  $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {});
      document.getElementById("modal-opcao-gratuito").setAttribute("style","opacity:0.3; -moz-opacity:0.3; filter:alpha(opacity=30)"); 
      document.getElementById('bota-modal-opcao-gratuito').setAttribute("disabled","disabled"); document.getElementById("modal-opcao-gratuito").setAttribute("style","opacity:0.3; -moz-opacity:0.3; filter:alpha(opacity=50)"); 
     
      document.getElementById('txtpremium1').innerHTML = 'Voc?n? precisa pagar para se agenciar;';
      document.getElementById("txtpremium2").setAttribute("style","display:none"); 
      document.getElementById("txtpremium1").setAttribute("style","display:block"); 

      document.getElementById('txtpremium1_mobile').innerHTML = 'Voc?n? precisa pagar para se agenciar;';
      document.getElementById("txtpremium2_mobile").setAttribute("style","display:none"); 
      document.getElementById("txtpremium1_mobile").setAttribute("style","display:block"); 

      $(".div_m2").css({ opacity: 0.3 }); 
      $('.div_m2').removeAttr('data-toggle');
     document.getElementById("premium_desktop1").setAttribute("style","display:none"); 
     document.getElementById("premium_desktop2").setAttribute("style","display:none"); 
     document.getElementById("premium_desktop3").setAttribute("style","display:block;margin-top:33px;width:170px;margin-left:75px;color:#fff;font-family:Avenir-Book;line-height:24px;font-size:20px");

     document.getElementById("premium_desktop3_1").setAttribute("style","display:block;margin-top:80px;width:170px;margin-left:110px;color:#fff;font-family:Avenir-Book;line-height:24px;font-size:20px"); 
     // document.getElementById("premium_desktop3_2").setAttribute("style","display:block");
     document.getElementById("premium_desktop2_1").setAttribute("style","display:none");
     document.getElementById("premium_desktop1_1").setAttribute("style","display:none");

     document.getElementById("premium_desktop3_mobile").setAttribute("style","display:block"); 
     document.getElementById("premium_desktop1_mobile").setAttribute("style","display:none");
     document.getElementById("premium_desktop2_mobile").setAttribute("style","display:none");
      
}
function naoAtor() {
  $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {});
     document.getElementById("modal-opcao-gratuito").setAttribute("style","opacity:1; -moz-opacity:1; filter:alpha(opacity=100)"); 
     document.getElementById('bota-modal-opcao-gratuito').removeAttribute("disabled"); document.getElementById("modal-opcao-gratuito").setAttribute("style","opacity:1; -moz-opacity:1; filter:alpha(opacity=10)"); 
      
     document.getElementById("premium_desktop1").setAttribute("style","display:block"); 
     document.getElementById("premium_desktop2").setAttribute("style","display:block"); 
     document.getElementById("premium_desktop3").setAttribute("style","display:none");

     document.getElementById('txtpremium2').innerHTML = 'Para efetivar seu contrato voc?dever?pagar R$ 299 em at?10x ou comprar um de nossos ensaios fotogr?icos;';
     document.getElementById("txtpremium1").setAttribute("style","display:none");
     document.getElementById("txtpremium2").setAttribute("style","display:block");

     document.getElementById('txtpremium2_mobile').innerHTML = 'Para efetivar seu contrato voc?dever?pagar R$ 299 em at?10x ou comprar um de nossos ensaios fotogr?icos;';
     document.getElementById("txtpremium1_mobile").setAttribute("style","display:none");
     document.getElementById("txtpremium2_mobile").setAttribute("style","display:block");  

     document.getElementById("premium_desktop3_1").setAttribute("style","display:none"); 
     document.getElementById("premium_desktop3_2").setAttribute("style","display:none"); 
     document.getElementById("premium_desktop2_1").setAttribute("style","display:block");
     document.getElementById("premium_desktop1_1").setAttribute("style","display:block");

     document.getElementById("premium_desktop3_mobile").setAttribute("style","display:none"); 
     document.getElementById("premium_desktop1_mobile").setAttribute("style","display:block");
     document.getElementById("premium_desktop2_mobile").setAttribute("style","display:block");
}
//TEXTO ATOR

//SCRIPTS FOCUS

$(document).ready(function(){ 

var tabletedesktop = function() { 

if (window.matchMedia('(min-width: 1024px)').matches)
{

$(function() {
  $(".swiper-control.next.focus1").click(function() {
        $('#cpf_responsavel').focus();
  });
});

$(function() {
  $(".swiper-control.prev.focus2").click(function() {
        $('#cpf_responsavel').focus();
  });
});

$(function() {
  $(".swiper-control.next.focus2").click(function() {
        $('#nome_responsavel').focus();
  });
});

$(function() {
  $(".swiper-control.prev.focus3").click(function() {
        $('#nome_responsavel').focus();
  });
});

$(function() {
  $(".swiper-control.next.focus4").click(function() {
        $('#nome_menor').focus();
  });
});

$(function() {
  $(".swiper-control.next.focus5").click(function() {
        $('#sobrenome_menor').focus();
  });
});

$(function() {
  $(".swiper-control.prev.focus6").click(function() {
        $('#nome_menor').focus();
  });
});

$(function() {
  $(".swiper-control.prev.focus7").click(function() {
        $('#sobrenome_menor').focus();
  });
});

$(function() {
  $(".swiper-control.next.focus8").click(function() {
        $('#data_menor').focus();
  });
});

$(function() {
  $(".swiper-control.next.focus9").click(function() {
        $('#celular_responsavel').focus();
  });
});

$(function() {
  $(".swiper-control.prev.focus10").click(function() {
        $('#data_menor').focus();
  });
});

$(function() {
  $(".swiper-control.next.focus11").click(function() {
        $('#email_responsavel').focus();
  });
});

$(function() {
  $(".swiper-control.prev.focus12").click(function() {
        $('#celular_responsavel').focus();
  });
});

$(function() {
  $(".swiper-control.prev.focus13").click(function() {
        $('#email_responsavel').focus();
  });
});

$(function() {
  $(".swiper-control.next.focus14").click(function() {
        $('#ig_responsavel').focus();
  });
});
//FOCUS SETAS MAIOR
$(function() {
  $(".swiper-control.next2.focus15").click(function() {
        $('#sobrenome_maior').focus();
  });
});


$(function() {
  $(".swiper-control.prev2.focus17").click(function() {

         $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
        $("#form [name='sobrenome_maior']").focus();
});

  });
});

$(function() {
  $(".swiper-control.next2.focus18").click(function() {
         $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
        $("#form [name='data_maior']").focus();
});
  });
});


$(function() {
  $(".swiper-control.next2.focus19").click(function() {
         $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
        $("#form [name='celular_maior']").focus();
});
  });
});


$(function() {
  $(".swiper-control.prev2.focus20").click(function() {
         $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
        $("#form [name='data_maior']").focus();
});
  });
});


$(function() {
  $(".swiper-control.next2.focus21").click(function() {
         $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
        $("#form [name='email_maior']").focus();
});
  });
});


$(function() {
  $(".swiper-control.prev2.focus22").click(function() {
         $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
        $("#form [name='celular_maior']").focus();
});
  });
});


$(function() {
  $(".swiper-control.prev2.focus23").click(function() {
         $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
        $("#form [name='email_maior']").focus();
});
  });
});


$(function() {
  $(".swiper-control.next2.focus24").click(function() {
         $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
        $("#form [name='cpf_maior']").focus();
});
  });
});


$(function() {
  $(".swiper-control.prev2.focus25").click(function() {
         $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
        $("#form [name='cpf_maior']").focus();
});
  });
});

//FOCUS SETAS MAIOR
//FOCUS MODAL
$("#premium_menor").click(function() {
  $('#myModal').modal('hide');
  menor.slideNext();
  $("#form2 [name='ig_menor']").focus();
});

$("#premium_maior").click(function() {
  $('#Modalmaior-premium').modal('hide');
  $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#ig_maior').focus();
});
});

$(".sim_acordo_termo_premium_mobile").click(function() {
  $('#termo_premium_mobile').modal('hide');
  menor.slideNext();
  $("#form2 [name='ig_menor']").focus();
});

$(".sim_acordo_termo_premium_mobile.maior").click(function() {
  $('#termo_maior_premium_mobile').modal('hide');
  $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#ig_maior').focus();
});
});


// ESCONDER MODAL GRATUITO
$("#gratuito_menor").click(function() {
  $('#myModal2').modal('hide');
  menor.slideNext();
  $("#form2 [name='ig_menor']").focus();
});

$("#gratuito_maior").click(function() {
  $('#Modalmaior-gratuito').modal('hide');
  $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#ig_maior').focus();
});
});


$(".sim_acordo_termo_gratuito_mobile").click(function() {
  $('#termo_gratuito_mobile').modal('hide');
  menor.slideNext();
  $("#form2 [name='ig_menor']").focus();
});

$(".sim_acordo_termo_gratuito_mobile.maior").click(function() {
  $('#termo_maior_gratuito_mobile').modal('hide');
   $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#ig_maior').focus();
});
});

// ESCONDER MODAL PROFISSIONAL
$("#profissional_menor").click(function() {
  $('#myModal3').modal('hide');
  menor.slideNext();
  $("#form2 [name='ig_menor']").focus();
});

$("#profissional_maior").click(function() {
  $('#Modalmaior-profissional').modal('hide');;
   $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#ig_maior').focus();
});
});

$(".sim_acordo_termo_profissional_mobile").click(function() {
  $('#termo_profissional_mobile').modal('hide');
  menor.slideNext();
  $("#form2 [name='ig_menor']").focus();
});

$(".sim_acordo_termo_profissional_mobile.maior").click(function() {
  $('#termo_maior_profissional_mobile').modal('hide');
   $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#ig_maior').focus();
});
});



//FOCUS BUTTON OK
$(document).ready(function() {
  $("#seta").click(function() {
    $("#form2 [name='nome_responsavel']").focus();
  });
});

$(document).ready(function() {
  $("#seta4").click(function() {
    $("#form2 [name='sobrenome_menor']").focus();
  });
});

$(document).ready(function() {
  $("#seta6").click(function() {
    $("#form2 [name='celular_responsavel']").focus();
  });
});

$(document).ready(function() {
  $("#seta10").click(function() {
    $("#form2 [name='email_responsavel']").focus();
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
var ENTER = 13;

var getKey = function(e) {
  if(window.event) { return e.keyCode; }  // IE
  else if(e.which) { return e.which; }    // Netscape/Firefox/Opera
};
var keynum = getKey(e);

if(keynum === ENTER) {
  //code focus    
  $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#sobrenome_maior').focus();
});
}
});

$("#data_maior").keypress(function(e) {
var ENTER = 13;

var getKey = function(e) {
  if(window.event) { return e.keyCode; }  // IE
  else if(e.which) { return e.which; }    // Netscape/Firefox/Opera
};
var keynum = getKey(e);

if(keynum === ENTER) {
  //code focus    
  $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#celular_maior').focus();
});
}
});

$("#ig_maior").keypress(function(e) {
var ENTER = 13;

var getKey = function(e) {
  if(window.event) { return e.keyCode; }  // IE
  else if(e.which) { return e.which; }    // Netscape/Firefox/Opera
};
var keynum = getKey(e);

if(keynum === ENTER) {
  //code focus    
    $('#face_maior').focus();

}
});


$("#face_maior").keypress(function(e) {
var ENTER = 13;

var getKey = function(e) {
  if(window.event) { return e.keyCode; }  // IE
  else if(e.which) { return e.which; }    // Netscape/Firefox/Opera
};
var keynum = getKey(e);

if(keynum === ENTER) {
  //code focus    
    $('#tt_maior').focus();

}
});


$("#ig_responsavel").keypress(function(e) {
var ENTER = 13;

var getKey = function(e) {
  if(window.event) { return e.keyCode; }  // IE
  else if(e.which) { return e.which; }    // Netscape/Firefox/Opera
};
var keynum = getKey(e);

if(keynum === ENTER) {
  //code focus    
    $('#face_responsavel').focus();

}
});


$("#face_responsavel").keypress(function(e) {
var ENTER = 13;

var getKey = function(e) {
  if(window.event) { return e.keyCode; }  // IE
  else if(e.which) { return e.which; }    // Netscape/Firefox/Opera
};
var keynum = getKey(e);

if(keynum === ENTER) {
  //code focus    
    $('#tt_responsavel').focus();

}
});

//TAB ENTER

//FOCUS MENOR PARA MAIOR
function inputFocus(){
    $('html, body').animate({ scrollTop: $("#17").offset().top }, 200);
    $("#form [name='nome_maior']").focus();
}

//FOCUS MENOR PARA MAIOR


//FOCUS DIV RESPONS?VEL FORM MENOR
$(document).ready(function() {
  $("#form2 [name='responsavel']").click(function() {
    if ($(this).attr("value") == "sim") {   
      var delay = 1000;
      setTimeout(function() {
    menor.slideNext();
         $("#cpf_responsavel").focus();
      }, 200);
    }
    if ($(this).attr("value") == "nao") {
      //LINK CASO N? FOR RESPONS?VEL
        location="sucesso.php";
    }
  });
});
//FOCUS DIV RESPONS?VEL FORM MENOR

//FOCUS DIV SEXO MENOR FORM MENOR
$(document).ready(function() {
  $("#form2 [name='sexo_menor']").click(function() {
    if ($(this).attr("value") == "feminino") {   
      var delay = 1000;
      setTimeout(function() {
    menor.slideNext();
         $("#nome_menor").focus();
      }, 200);
    }
    if ($(this).attr("value") == "masculino") {
      //MASCULINO
         var delay = 1000;
      setTimeout(function() {
    menor.slideNext();
         $("#nome_menor").focus();
      }, 200);
    }
  });
});
//FOCUS DIV SEXO MENOR FORM MENOR


} else {



//FOCUS DIV RESPONS?VEL FORM MENOR
$(document).ready(function() {
  $("#form2 [name='responsavel']").click(function() {
    if ($(this).attr("value") == "sim") {   
      var delay = 1000;
      setTimeout(function() {
    menor.slideNext();
         $("#cpf_responsavel").blur();
      }, 200);
    }
    if ($(this).attr("value") == "nao") {
      //LINK CASO N? FOR RESPONS?VEL
        location="sucesso.php";
    }
  });
});
//FOCUS DIV RESPONS?VEL FORM MENOR

//FOCUS DIV SEXO MENOR FORM MENOR
$(document).ready(function() {
  $("#form2 [name='sexo_menor']").click(function() {
    if ($(this).attr("value") == "feminino") {   
      var delay = 1000;
      setTimeout(function() {
    menor.slideNext();
         $("#nome_menor").blur();
      }, 200);
    }
    if ($(this).attr("value") == "masculino") {
      //MASCULINO
         var delay = 1000;
      setTimeout(function() {
    menor.slideNext();
         $("#nome_menor").blur();
      }, 200);
    }
  });
});
//FOCUS DIV SEXO MENOR FORM MENOR

//FOCUS BUTTON OK
$(document).ready(function() {
  $("#seta").click(function() {
    $("#form2 [name='nome_responsavel']").blur();
  });
});

$(document).ready(function() {
  $("#seta4").click(function() {
    $("#form2 [name='sobrenome_menor']").blur();
  });
});

$(document).ready(function() {
  $("#seta6").click(function() {
    $("#form2 [name='celular_responsavel']").blur();
  });
});

$(document).ready(function() {
  $("#seta10").click(function() {
    $("#form2 [name='email_responsavel']").blur();
  });
});
//FOCUS BUTTON OK

//TAB ENTER
$("#cpf_responsavel").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    menor.slideNext();
    $("#form2 [name='nome_responsavel']").blur();
  }
});

$("#nome_responsavel").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    menor.slideNext();
    $("#form2 [name='sexo_menor']").blur();
  }
});

$("#nome_menor").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    menor.slideNext();
    $("#form2 [name='sobrenome_menor']").blur();
  }
});

$("#data_menor").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    menor.slideNext();
    $("#form2 [name='celular_responsavel']").blur();
  }
});

$("#celular_responsavel").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    menor.slideNext();
    $("#form2 [name='email_responsavel']").blur();
  }
});

$("#ig_menor").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    $("#form2 [name='face_menor']").blur();
  }
});

$("#face_menor").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    $("#form2 [name='tt_menor']").blur();
  }
});

$("#nome_maior").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
 $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#sobrenome_maior').blur();
});
    return false;
  }
});

$("#data_maior").keypress(function(e) {
var ENTER = 13;

var getKey = function(e) {
  if(window.event) { return e.keyCode; }  // IE
  else if(e.which) { return e.which; }    // Netscape/Firefox/Opera
};
var keynum = getKey(e);

if(keynum === ENTER) {
  //code focus    
  $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#celular_maior').blur();
});
}
});
$("#ig_maior").keypress(function(e) {
var ENTER = 13;

var getKey = function(e) {
  if(window.event) { return e.keyCode; }  // IE
  else if(e.which) { return e.which; }    // Netscape/Firefox/Opera
};
var keynum = getKey(e);

if(keynum === ENTER) {
  //code focus    
    $('#face_maior').blur();

}
});


$("#face_maior").keypress(function(e) {
var ENTER = 13;

var getKey = function(e) {
  if(window.event) { return e.keyCode; }  // IE
  else if(e.which) { return e.which; }    // Netscape/Firefox/Opera
};
var keynum = getKey(e);

if(keynum === ENTER) {
  //code focus    
    $('#tt_maior').blur();

}
});


$("#ig_responsavel").keypress(function(e) {
var ENTER = 13;

var getKey = function(e) {
  if(window.event) { return e.keyCode; }  // IE
  else if(e.which) { return e.which; }    // Netscape/Firefox/Opera
};
var keynum = getKey(e);

if(keynum === ENTER) {
  //code focus    
    $('#face_responsavel').blur();

}
});


$("#face_responsavel").keypress(function(e) {
var ENTER = 13;

var getKey = function(e) {
  if(window.event) { return e.keyCode; }  // IE
  else if(e.which) { return e.which; }    // Netscape/Firefox/Opera
};
var keynum = getKey(e);

if(keynum === ENTER) {
  //code focus    
    $('#tt_responsavel').blur();

}
});

//TAB ENTER

//FOCUS MENOR PARA MAIOR
function inputFocus(){
    $('html, body').animate({ scrollTop: $("#17").offset().top }, 200);
    $("#form [name='nome_maior']").blur();
}

//FOCUS MENOR PARA MAIOR

$(function() {
  $(".swiper-control.next.focus1").click(function() {
        $('#cpf_responsavel').blur();
  });
});

$(function() {
  $(".swiper-control.prev.focus2").click(function() {
        $('#cpf_responsavel').blur();
  });
});

$(function() {
  $(".swiper-control.next.focus2").click(function() {
        $('#nome_responsavel').blur();
  });
});

$(function() {
  $(".swiper-control.prev.focus3").click(function() {
        $('#nome_responsavel').blur();
  });
});

$(function() {
  $(".swiper-control.next.focus4").click(function() {
        $('#nome_menor').blur();
  });
});

$(function() {
  $(".swiper-control.next.focus5").click(function() {
        $('#sobrenome_menor').blur();
  });
});

$(function() {
  $(".swiper-control.prev.focus6").click(function() {
        $('#nome_menor').blur();
  });
});

$(function() {
  $(".swiper-control.prev.focus7").click(function() {
        $('#sobrenome_menor').blur();
  });
});

$(function() {
  $(".swiper-control.next.focus8").click(function() {
        $('#data_menor').blur();
  });
});

$(function() {
  $(".swiper-control.next.focus9").click(function() {
        $('#celular_responsavel').blur();
  });
});

$(function() {
  $(".swiper-control.prev.focus10").click(function() {
        $('#data_menor').blur();
  });
});

$(function() {
  $(".swiper-control.next.focus11").click(function() {
        $('#email_responsavel').blur();
  });
});

$(function() {
  $(".swiper-control.prev.focus12").click(function() {
        $('#celular_responsavel').blur();
  });
});

$(function() {
  $(".swiper-control.prev.focus13").click(function() {
        $('#email_responsavel').blur();
  });
});

$(function() {
  $(".swiper-control.next.focus14").click(function() {
        $('#ig_responsavel').blur();
  });
});


//FOCUS SETAS MAIOR
$(function() {
  $(".swiper-control.next2.focus15").click(function() {
        $('#sobrenome_maior').blur();
  });
});


$(function() {
  $(".swiper-control.prev2.focus17").click(function() {
         $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
        $("#form [name='sobrenome_maior']").blur();
});
  });
});

$(function() {
  $(".swiper-control.next2.focus18").click(function() {
         $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
        $("#form [name='data_maior']").blur();
});
  });
});


$(function() {
  $(".swiper-control.next2.focus19").click(function() {
         $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
        $("#form [name='celular_maior']").blur();
});
  });
});


$(function() {
  $(".swiper-control.prev2.focus20").click(function() {
         $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
        $("#form [name='data_maior']").blur();
});
  });
});


$(function() {
  $(".swiper-control.next2.focus21").click(function() {
         $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
        $("#form [name='email_maior']").blur();
});
  });
});


$(function() {
  $(".swiper-control.prev2.focus22").click(function() {
         $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
        $("#form [name='celular_maior']").blur();
});
  });
});


$(function() {
  $(".swiper-control.prev2.focus23").click(function() {
         $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
        $("#form [name='email_maior']").blur();
});
  });
});


$(function() {
  $(".swiper-control.next2.focus24").click(function() {
         $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
        $("#form [name='cpf_maior']").blur();
});
  });
});


$(function() {
  $(".swiper-control.prev2.focus25").click(function() {
         $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
        $("#form [name='cpf_maior']").blur();
});
  });
});

//FOCUS SETAS MAIOR

$("#premium_menor").click(function() {
  $('#myModal').modal('hide');
  menor.slideNext();
  $("#form2 [name='ig_menor']").blur();
});

$("#premium_maior").click(function() {
  $('#Modalmaior-premium').modal('hide');
  $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#ig_maior').blur();
});
});

$(".sim_acordo_termo_premium_mobile").click(function() {
  $('#termo_premium_mobile').modal('hide');
  menor.slideNext();
  $("#form2 [name='ig_menor']").blur();
});

$(".sim_acordo_termo_premium_mobile.maior").click(function() {
  $('#termo_maior_premium_mobile').modal('hide');
  $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#ig_maior').blur();
});
});


// ESCONDER MODAL GRATUITO
$("#gratuito_menor").click(function() {
  $('#myModal2').modal('hide');
  menor.slideNext();
  $("#form2 [name='ig_menor']").blur();
});

$("#gratuito_maior").click(function() {
  $('#Modalmaior-gratuito').modal('hide');
  $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#ig_maior').blur();
});
});


$(".sim_acordo_termo_gratuito_mobile").click(function() {
  $('#termo_gratuito_mobile').modal('hide');
  menor.slideNext();
  $("#form2 [name='ig_menor']").blur();
});

$(".sim_acordo_termo_gratuito_mobile.maior").click(function() {
  $('#termo_maior_gratuito_mobile').modal('hide');
   $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#ig_maior').blur();
});
});

// ESCONDER MODAL PROFISSIONAL
$("#profissional_menor").click(function() {
  $('#myModal3').modal('hide');
  menor.slideNext();
  $("#form2 [name='ig_menor']").blur();
});

$("#profissional_maior").click(function() {
  $('#Modalmaior-profissional').modal('hide');;
   $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#ig_maior').blur();
});
});

$(".sim_acordo_termo_profissional_mobile").click(function() {
  $('#termo_profissional_mobile').modal('hide');
  menor.slideNext();
  $("#form2 [name='ig_menor']").blur();
});

$(".sim_acordo_termo_profissional_mobile.maior").click(function() {
  $('#termo_maior_profissional_mobile').modal('hide');
   $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#ig_maior').blur();
});
});

 
 }
};
  $(window).resize(tabletedesktop);
  tabletedesktop();  

});


//FOCUS ARROW SWIPER-CONTROL NEXT PREV MOBILE

if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {


//FOCUS BUTTON OK
$(document).ready(function() {
  $("#seta").click(function() {
    $("#form2 [name='nome_responsavel']").blur();
  });
});

$(document).ready(function() {
  $("#seta4").click(function() {
    $("#form2 [name='sobrenome_menor']").blur();
  });
});

$(document).ready(function() {
  $("#seta6").click(function() {
    $("#form2 [name='celular_responsavel']").blur();
  });
});

$(document).ready(function() {
  $("#seta10").click(function() {
    $("#form2 [name='email_responsavel']").blur();
  });
});
//FOCUS BUTTON OK

//TAB ENTER
$("#cpf_responsavel").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    menor.slideNext();
    $("#form2 [name='nome_responsavel']").blur();
  }
});

$("#nome_responsavel").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    menor.slideNext();
    $("#form2 [name='sexo_menor']").blur();
  }
});

$("#nome_menor").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    menor.slideNext();
    $("#form2 [name='sobrenome_menor']").blur();
  }
});

$("#data_menor").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    menor.slideNext();
    $("#form2 [name='celular_responsavel']").blur();
  }
});

$("#celular_responsavel").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    menor.slideNext();
    $("#form2 [name='email_responsavel']").blur();
  }
});

$("#ig_menor").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    $("#form2 [name='face_menor']").blur();
  }
});

$("#face_menor").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    $("#form2 [name='tt_menor']").blur();
  }
});

$("#nome_maior").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
 $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#sobrenome_maior').blur();
});
    return false;
  }
});

$("#data_maior").keypress(function(e) {
var ENTER = 13;

var getKey = function(e) {
  if(window.event) { return e.keyCode; }  // IE
  else if(e.which) { return e.which; }    // Netscape/Firefox/Opera
};
var keynum = getKey(e);

if(keynum === ENTER) {
  //code focus    
  $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#celular_maior').blur();
});
}
});
$("#ig_maior").keypress(function(e) {
var ENTER = 13;

var getKey = function(e) {
  if(window.event) { return e.keyCode; }  // IE
  else if(e.which) { return e.which; }    // Netscape/Firefox/Opera
};
var keynum = getKey(e);

if(keynum === ENTER) {
  //code focus    
    $('#face_maior').blur();

}
});


$("#face_maior").keypress(function(e) {
var ENTER = 13;

var getKey = function(e) {
  if(window.event) { return e.keyCode; }  // IE
  else if(e.which) { return e.which; }    // Netscape/Firefox/Opera
};
var keynum = getKey(e);

if(keynum === ENTER) {
  //code focus    
    $('#tt_maior').blur();

}
});


$("#ig_responsavel").keypress(function(e) {
var ENTER = 13;

var getKey = function(e) {
  if(window.event) { return e.keyCode; }  // IE
  else if(e.which) { return e.which; }    // Netscape/Firefox/Opera
};
var keynum = getKey(e);

if(keynum === ENTER) {
  //code focus    
    $('#face_responsavel').blur();

}
});


$("#face_responsavel").keypress(function(e) {
var ENTER = 13;

var getKey = function(e) {
  if(window.event) { return e.keyCode; }  // IE
  else if(e.which) { return e.which; }    // Netscape/Firefox/Opera
};
var keynum = getKey(e);
if(keynum === ENTER) {

  //code focus    
    $('#tt_responsavel').blur();

}
});

//TAB ENTER

//FOCUS MENOR PARA MAIOR
function inputFocus(){
    $('html, body').animate({ scrollTop: $("#17").offset().top }, 200);
    $("#form [name='nome_maior']").blur();
}

//FOCUS MENOR PARA MAIOR

$(function() {
  $(".swiper-control.next.focus1").click(function() {
        $('#cpf_responsavel').blur();
  });
});

$(function() {
  $(".swiper-control.prev.focus2").click(function() {
        $('#cpf_responsavel').blur();
  });
});

$(function() {
  $(".swiper-control.next.focus2").click(function() {
        $('#nome_responsavel').blur();
  });
});

$(function() {
  $(".swiper-control.prev.focus3").click(function() {
        $('#nome_responsavel').blur();
  });
});

$(function() {
  $(".swiper-control.next.focus4").click(function() {
        $('#nome_menor').blur();
  });
});

$(function() {
  $(".swiper-control.next.focus5").click(function() {
        $('#sobrenome_menor').blur();
  });
});

$(function() {
  $(".swiper-control.prev.focus6").click(function() {
        $('#nome_menor').blur();
  });
});

$(function() {
  $(".swiper-control.prev.focus7").click(function() {
        $('#sobrenome_menor').blur();
  });
});

$(function() {
  $(".swiper-control.next.focus8").click(function() {
        $('#data_menor').blur();
  });
});

$(function() {
  $(".swiper-control.next.focus9").click(function() {
        $('#celular_responsavel').blur();
  });
});

$(function() {
  $(".swiper-control.prev.focus10").click(function() {
        $('#data_menor').blur();
  });
});

$(function() {
  $(".swiper-control.next.focus11").click(function() {
        $('#email_responsavel').blur();
  });
});

$(function() {
  $(".swiper-control.prev.focus12").click(function() {
        $('#celular_responsavel').blur();
  });
});

$(function() {
  $(".swiper-control.prev.focus13").click(function() {
        $('#email_responsavel').blur();
  });
});

$(function() {
  $(".swiper-control.next.focus14").click(function() {
        $('#ig_responsavel').blur();
  });
});

$("#premium_menor").click(function() {
  $('#myModal').modal('hide');
  menor.slideNext();
  $("#form2 [name='ig_menor']").blur();
});

$("#premium_maior").click(function() {
  $('#Modalmaior-premium').modal('hide');
  $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#ig_maior').blur();
});
});

$(".sim_acordo_termo_premium_mobile").click(function() {
  $('#termo_premium_mobile').modal('hide');
  menor.slideNext();
  $("#form2 [name='ig_menor']").blur();
});

$(".sim_acordo_termo_premium_mobile.maior").click(function() {
  $('#termo_maior_premium_mobile').modal('hide');
  $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#ig_maior').blur();
});
});


// ESCONDER MODAL GRATUITO
$("#gratuito_menor").click(function() {
  $('#myModal2').modal('hide');
  menor.slideNext();
  $("#form2 [name='ig_menor']").blur();
});

$("#gratuito_maior").click(function() {
  $('#Modalmaior-gratuito').modal('hide');
  $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#ig_maior').blur();
});
});


$(".sim_acordo_termo_gratuito_mobile").click(function() {
  $('#termo_gratuito_mobile').modal('hide');
  menor.slideNext();
  $("#form2 [name='ig_menor']").blur();
});

$(".sim_acordo_termo_gratuito_mobile.maior").click(function() {
  $('#termo_maior_gratuito_mobile').modal('hide');
   $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#ig_maior').blur();
});
});

// ESCONDER MODAL PROFISSIONAL
$("#profissional_menor").click(function() {
  $('#myModal3').modal('hide');
  menor.slideNext();
  $("#form2 [name='ig_menor']").blur();
});

$("#profissional_maior").click(function() {
  $('#Modalmaior-profissional').modal('hide');;
   $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#ig_maior').blur();
});
});

$(".sim_acordo_termo_profissional_mobile").click(function() {
  $('#termo_profissional_mobile').modal('hide');
  menor.slideNext();
  $("#form2 [name='ig_menor']").blur();
});

$(".sim_acordo_termo_profissional_mobile.maior").click(function() {
  $('#termo_maior_profissional_mobile').modal('hide');
   $('.swiper-container.maior').animate({scrollTop: $('.swiper-container.maior').offset().top}, 200, function() {
    $('#ig_maior').blur();
});
});


 }

//FOCUS ARROW SWIPER-CONTROL NEXT PREV MOBILE
