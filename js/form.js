var swiper = new Swiper('.swiper-container', {
  pagination: '.swiper-pagination',
  keyboardControl: true,
  direction: 'vertical',
  simulateTouch: false,
  onlyExternal: true,
  nextButton: '.swiper-control.next',
  prevButton: '.swiper-control.prev',
  speed: 900
});

var colors = new Array(
  [165, 0, 200], [176, 116, 255], [255, 41, 129], [237, 107, 107], [201, 87, 222], [35, 188, 237]
);

var step = 0;
// color table indices for:
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0, 1, 2, 3];

//transition speed
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

    //pick two new target color indices
    //do not pick the same as the current one
    colorIndices[1] = (colorIndices[1] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = (colorIndices[3] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;

  }
}
setInterval(function() {
  updateGradient('.gradient')
}, 10);


var colors = new Array(
  [165, 0, 200], [176, 116, 255], [255, 41, 129], [237, 107, 107], [201, 87, 222], [35, 188, 237]
);

var step = 0;
//color table indices for:
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0, 1, 2, 3];

//transition speed
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

    //pick two new target color indices
    //do not pick the same as the current one
    colorIndices[1] = (colorIndices[1] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = (colorIndices[3] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;

  }
}
setInterval(function() {
  updateGradient('.gradient2')
}, 10);

var colors = new Array(
  [165, 0, 200], [176, 116, 255], [255, 41, 129], [237, 107, 107], [201, 87, 222], [35, 188, 237]
);

var step = 0;
//color table indices for:
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0, 1, 2, 3];

//transition speed
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

    //pick two new target color indices
    //do not pick the same as the current one
    colorIndices[1] = (colorIndices[1] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = (colorIndices[3] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;
  }
}
setInterval(function() {
  updateGradient('.gradient3')
}, 10);

var colors = new Array(
  [165, 0, 200], [176, 116, 255], [255, 41, 129], [237, 107, 107], [201, 87, 222], [35, 188, 237]
);

var step = 0;
//color table indices for:
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0, 1, 2, 3];

//transition speed
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

    //pick two new target color indices
    //do not pick the same as the current one
    colorIndices[1] = (colorIndices[1] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = (colorIndices[3] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;

  }
}
setInterval(function() {
  updateGradient('.gradient4')
}, 10);

// JAVACRIPT PROGRESS BAR
$(document).ready(function() {
  $(window).scroll(function() {
    var s = $(this).scrollTop(),
      d = $(document).height() - $(window).height(),
      scrollPercent = (s / d);

    var position = (scrollPercent) * 1.1;
    $("#progressbar").attr('value', position);
  });
});

$(window).load(function() {
  $('#nome').keyup(function() {
    if ($.trim(this.value).length > 2) {
      $('#btSend').show()
      $('#seta').show()
    } else {
      $('#btSend').hide()
      $('#seta').hide()
    }
  });
});

$(window).load(function() {
  $('#cpf').keyup(function() {
    if ($.trim(this.value).length > 2) {
      $('#btSend').show()
      $('#seta').show()
    } else {
      $('#btSend').hide()
      $('#seta').hide()
    }
  });
});

$(window).load(function() {
  $('#sobrenome').keyup(function() {
    if ($.trim(this.value).length > 2) {
      $('#btSend2').show()
      $('#seta2').show()
    } else {
      $('#btSend2').hide()
      $('#seta2').hide()
    }
  });
});


$(window).load(function() {
  $('#nome_menor').keyup(function() {
    if ($.trim(this.value).length > 2) {
      $('#btSend4').show()
      $('#seta4').show()
    } else {
      $('#btSend4').hide()
      $('#seta4').hide()
    }
  });
});


$(window).load(function() {
  $('#nome_responsavel').keyup(function() {
    if ($.trim(this.value).length > 2) {
      $('#btSend2').show()
      $('#seta2').show()
    } else {
      $('#btSend2').hide()
      $('#seta2').hide()
    }
  });
});


$(window).load(function() {
  $('#sobrenome_menor').keyup(function() {
    if ($.trim(this.value).length > 2) {
      $('#btSend5').show()
      $('#seta5').show()
    } else {
      $('#btSend5').hide()
      $('#seta5').hide()
    }
  });
});

$(window).load(function() {
  $('#celular').keyup(function() {
    if ($.trim(this.value).length > 7) {
      $('#btSend8').show()
      $('#seta8').show()
      $('#btSend10').show()
      $('#seta10').show()
    } else {
      $('#btSend8').hide()
      $('#seta8').hide()
      $('#btSend10').hide()
      $('#seta10').hide()
    }
  });
});

$(window).load(function() {
  $('#email').keyup(function() {
    if ($.trim(this.value).length > 7) {
      $('#btSend9').show()
      $('#seta9').show()
      $('#btSend11').show()
      $('#seta11').show()
    } else {
      $('#btSend11').hide()
      $('#seta11').hide()
    }
  });
});

$(document).ready(function() {
  //set focus to 1st input field
  $("#form [name='nome']").focus();
  //attach click event to button
  $("#seta").click(function() {
    $("#form [name='sobrenome']").focus();
  });
});

$(document).ready(function() {
  $("#form [name='sexo']").click(function() {
    if ($(this).attr("value") == "masculino") {
      var delay = 1000;
      setTimeout(function() {
        $("#proxima").focus();
      }, 200);
    }
    if ($(this).attr("value") == "feminino") {
      var delay = 1000;
      setTimeout(function() {
        $("#proxima").focus();
      }, 200);
    }
  });
});

$(document).ready(function() {
  $("#form2 [name='sexo']").click(function() {
    if ($(this).attr("value") == "masculino") {
      var delay = 1000;
      setTimeout(function() {
        $("#nome_menor").focus();
      }, 200);
    }
    if ($(this).attr("value") == "feminino") {
      var delay = 1000;
      setTimeout(function() {
        $("#nome_menor").focus();
      }, 200);
    }
  });
});

$(function() {
  //Runs focus of div on click of button/link/whatever
  $("#seta2").click(function() {
    $("#3").focus();
  });
});

$(document).on("keypress", ".TabOnEnter", function(e) {
  //Only do something when the user presses enter
  if (e.keyCode == 13) {
    var nextElement = $('[tabindex="' + (this.tabIndex + 1) + '"]');
    console.log(this, nextElement);
    if (nextElement.length)
      nextElement.focus()
    else
      $('[tabindex="1"]').focus();
  }
});

$('form')[0].addEventListener('focus', function(e) {
  //Index of focused slide
  var focusIndex = $(e.target).parents('.swiper-slide').index();
  //Reset scrolltop set by browser on focus
  $('.swiper-container')[0].scrollTop = 0;
  setTimeout(function() {
    $('.swiper-container')[0].scrollTop = 0;
  }, 0);
  //Slide to focused slide
  swiper.slideTo(focusIndex);
}, true);

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
      break;
    default:
      document.getElementById('txt2').innerHTML = 'Nenhum valor informado';
      document.getElementById('txt3').innerHTML = 'Nenhum valor informado';
      break;
  }
}


function exibeMsg3(valor) {
  switch (valor) {
    case 'sim':
      document.getElementById('txtpremium1').innerHTML = 'Você não precisa pagar para se agenciar;';
     document.getElementById("txtpremium2").setAttribute("style","display:none"); 
     document.getElementById("txtpremium1").setAttribute("style","display:block"); 
      document.getElementById('txtpremium1_mobile').innerHTML = 'Você não precisa pagar para se agenciar;';
     document.getElementById("txtpremium2_mobile").setAttribute("style","display:none"); 
     document.getElementById("txtpremium1_mobile").setAttribute("style","display:block"); 
      break;
    case 'nao':
      document.getElementById('txtpremium2').innerHTML = 'Para efetivar seu contrato você deverá pagar R$ 299 em até 10x ou comprar um de nossos ensaios fotográficos;';
      document.getElementById("txtpremium1").setAttribute("style","display:none");
      document.getElementById("txtpremium2").setAttribute("style","display:block");
      document.getElementById('txtpremium2_mobile').innerHTML = 'Para efetivar seu contrato você deverá pagar R$ 299 em até 10x ou comprar um de nossos ensaios fotográficos;';
      document.getElementById("txtpremium1_mobile").setAttribute("style","display:none");
      document.getElementById("txtpremium2_mobile").setAttribute("style","display:block");  
      break;
    default:
      document.getElementById('txtpremium3').innerHTML = 'não clicou';
      break;
  }
}




$("#nome").keyup(function() {
  $(".concat_texto").html($(this).val());
})

$("#nome_menor").keyup(function() {
  $(".concat2_texto").html($(this).val());
})

//Código da div ator

$(document).ready(function() {
  $(".blue").hide();
  $('input[type="radio"]').click(function() {
    if ($(this).attr("value") == "sim") {

      $(".box").not(".blue").hide();
      $(".blue").show();
     document.getElementById("premium_desktop1").setAttribute("style","display:none"); 
     document.getElementById("premium_desktop2").setAttribute("style","display:none"); 
     document.getElementById("premium_desktop3").setAttribute("style","display:block");
     document.getElementById("premium_desktop1_1").setAttribute("style","display:none"); 
     document.getElementById("premium_desktop2_1").setAttribute("style","display:none"); 
     document.getElementById("premium_desktop3_1").setAttribute("style","display:block"); 

     document.getElementById("premium_desktop1_mobile").setAttribute("style","display:none"); 
     document.getElementById("premium_desktop2_mobile").setAttribute("style","display:none"); 
     document.getElementById("premium_desktop3_mobile").setAttribute("style","display:block");
 

     document.getElementById("div14_box2").setAttribute("style","opacity:0.5; -moz-opacity:0.5; filter:alpha(opacity=50)"); 
      document.getElementById('botao2').setAttribute("disabled","disabled");
      $(".div_m2").css({ opacity: 0.5 }); 
      $('.div_m2').removeAttr('data-toggle');

      var delay = 1000;
      setTimeout(function() {
        $(".penultimo_p ").focus()();
      }, 3000);
    }
    if ($(this).attr("value") == "nao") {

      $(".box").not(".blue").hide();
      $(".blue").hide();
     document.getElementById("premium_desktop1").setAttribute("style","display:block"); 
     document.getElementById("premium_desktop2").setAttribute("style","display:block"); 
     document.getElementById("premium_desktop3").setAttribute("style","display:none"); 
     document.getElementById("premium_desktop1_1").setAttribute("style","display:block"); 
     document.getElementById("premium_desktop2_1").setAttribute("style","display:block"); 
     document.getElementById("premium_desktop3_1").setAttribute("style","display:none"); 


     document.getElementById("premium_desktop1_mobile").setAttribute("style","display:block"); 
     document.getElementById("premium_desktop2_mobile").setAttribute("style","display:block"); 
     document.getElementById("premium_desktop3_mobile").setAttribute("style","display:none");

      document.getElementById("div14_box2").removeAttribute("style","opacity:0.5; -moz-opacity:0.5; filter:alpha(opacity=50)"); 
      document.getElementById('botao2').removeAttribute("disabled","disabled");
      $(".div_m2").css({ opacity: 1.0 }); 
      $('.div_m2').attr('data-toggle','modal');

      var delay = 1000;
      setTimeout(function() {
        $(".penultimo_p ").focus()();
      }, 200);
    }
  });
});


function valida_form() {
  if (document.getElementById("nome").value == "") {
    $("#erro").toggle();
    return false
  }
  if (document.getElementById("sobrenome").value == "") {
    $("#erro").toggle();
    return false
  }
  if (document.form.sexo[0].checked == false && document.form.sexo[1].checked == false) {
    $("#erro").toggle();
    return false
  }
  if (document.getElementById("foto").value == "") {
    $("#erro").toggle();
    return false
  }
  if (document.getElementById("foto2").value == "") {
    $("#erro").toggle();
    return false
  }
  if (document.getElementById("dia").value == "") {
    $("#erro").toggle();
    return false
  }
  if (document.getElementById("mes").value == "") {
    $("#erro").toggle();
    return false
  }
  if (document.getElementById("ano").value == "") {
    $("#erro").toggle();
    return false
  }
  if (document.getElementById("celular").value == "") {
    $("#erro").toggle();
    return false
  }
  if (document.getElementById("email").value == "") {
    $("#erro").toggle();
    return false
  }
  if (document.getElementById("raca").value == "") {
    $("#erro").toggle();
    return false
  }
  if (document.getElementById("drt").value == "") {
    $("#erro").toggle();
    return false
  }
}

function valida_form2() {
  if (document.getElementById("cpf").value == "") {
    $("#erro").toggle();
    return false
  }
  if (document.getElementById("nome_responsavel").value == "") {
    $("#erro").toggle();
    return false
  }
  if (document.form2.sexo[0].checked == false && document.form2.sexo[1].checked == false) {
    $("#erro").toggle();
    return false
  }
  if (document.getElementById("nome_menor").value == "") {
    $("#erro").toggle();
    return false
  }
  if (document.getElementById("sobrenome_menor").value == "") {
    $("#erro").toggle();
    return false
  }
  if (document.getElementById("foto").value == "") {
    $("#erro").toggle();
    return false
  }
  if (document.getElementById("foto2").value == "") {
    $("#erro").toggle();
    return false
  }
  if (document.getElementById("dia").value == "") {
    $("#erro").toggle();
    return false
  }
  if (document.getElementById("mes").value == "") {
    $("#erro").toggle();
    return false
  }
  if (document.getElementById("ano").value == "") {
    $("#erro").toggle();
    return false
  }
  if (document.getElementById("celular").value == "") {
    $("#erro").toggle();
    return false
  }
  if (document.getElementById("email").value == "") {
    $("#erro").toggle();
    return false
  }
  if (document.getElementById("raca").value == "") {
    $("#erro").toggle();
    return false
  }
}

$("#cpf").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
  }
});

$("#nome_responsavel").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    $("#radio0").focus();
  }
});

$("#nome_menor").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    $("#sobrenome_menor").focus();
  }
});

$("#sobrenome_menor").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
  }
});

$("#nome").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
  }
});

$("#sobrenome").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    $("#radio0").focus();
  }
});

$("#radio0").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
  }
});

$("#radio1").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
  }
});

$("#proxima").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
  }
});

$("#foto").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    $("#foto2").focus();
  }
});

$("#foto2").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
  }
});

$("#data").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    $("#celular").focus();
  }
});

$("#celular").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
  }
});

$("#email").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
  }
});

$(".ig").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    $(".face").focus();
  }
});

$(".face").keypress(function(e) {
  if (e.keyCode === 13) {
    e.preventDefault();
    $(".tt").focus();
  }
});

$('#myModal').appendTo("form");
$('#myModal1_m').appendTo("form");
$('#myModal2_m').appendTo("form");

$('#myModal2').appendTo("form");
$('#myModal1_m2').appendTo("form");
$('#gratuito_mobile').appendTo("form");

$('#myModal3').appendTo("form");
$('#myModal3_m1').appendTo("form");
$('#gratuito_mobile3').appendTo("form");

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
  $("#ig").focus();
});

$(".sim_acordo").click(function() {
  $('#myModal2_m').modal('hide');
  $("#ig").focus();
});

// ESCONDER MODAL GRATUITO
$(".button2").click(function() {
  $('#myModal2').modal('hide');
  $("#ig").focus();
});

$(".sim_acordo_gratuito").click(function() {
  $('#gratuito_mobile').modal('hide');
  $("#ig").focus();
});

// ESCONDER MODAL PROFISSIONAL
$(".button3").click(function() {
  $("#ig").focus();
  $('#myModal3').modal('hide');
});

$(".sim_acordo_gratuito3").click(function() {
  $('#gratuito_mobile3').modal('hide');
  $("#ig").focus();
});



