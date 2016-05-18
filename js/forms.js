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
      document.getElementById('txt3').innerHTML = 'ela';
      document.getElementById('txt4').innerHTML = 'dela';
      break;
    case 'masculino':
      document.getElementById('txt2').innerHTML = 'dele';
      document.getElementById('txt3').innerHTML = 'ele';
      document.getElementById('txt4').innerHTML = 'ele';
      break;
    default:
      document.getElementById('txt2').innerHTML = 'Nenhum valor informado';
      document.getElementById('txt3').innerHTML = 'Nenhum valor informado';
      break;
  }
}

// FIM MASCARA
function autoTab(input, e) {
  var ind = 0;
  var isNN = (navigator.appName.indexOf("Netscape") != -1);
  var keyCode = (isNN) ? e.which : e.keyCode;
  var nKeyCode = e.keyCode;
  if (keyCode == 13) {
    $('html,body').animate({
      scrollTop: window.scrollY + window.innerHeight
    }, 1000);
    if (!isNN) {
      window.event.keyCode = 0;
    } // evitar o beep
    ind = getIndex(input);
    if (input.form[ind].type == 'textarea') {
      return;
    }
    ind++;
    input.form[ind].focus();
    if (input.form[ind].type == 'text') {
      input.form[ind].select();
    }
  }

  function getIndex(input) {
    var index = -1,
      i = 0,
      found = false;
    while (i < input.form.length && index == -1)
      if (input.form[i] == input) {
        index = i;
        if (i < (input.form.length - 1)) {
          if (input.form[i + 1].type == 'hidden') {
            index++;
          }
          if (input.form[i + 1].type == 'button' && input.form[i + 1].id == 'tabstopfalse') {
            index++;
          }
        }
      } else
        i++;
    return index;
  }
}

var colors = new Array(
  [165, 0, 200, 0.1], [176, 116, 255, 0.1], [255, 41, 129, 0.1], [237, 107, 107, 0.1], [201, 87, 222, 0.1], [35, 188, 237, 0.1]
);

var step = 0;
// color table indices for:
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0, 1, 2, 3];

//transition speed
var gradientSpeed = 0.002;

function updateGradient() {

  if ($ === undefined) return;

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

  $('#gradient').css({
    background: "-webkit-gradient(linear, left top, right top, from(" + color1 + "), to(" + color2 + "))"
  }).css({
    background: "-moz-linear-gradient(to left, " + color1 + " 0%, " + color2 + " 100%)"
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

setInterval(updateGradient, 10);

// JAVASCRIPT DOS BOTÕES ATOR OU ATRIZ
$(".sim2").hide();
$('input[type="radio"]').click(function() {
  if ($(this).attr("value") == "sim") {
    $(".sim2").show();
  } else {
    $(".sim2").hide();
  }
});

//JAVACRIPT  PROGRESS BAR
$(document).ready(function() {
  $(window).scroll(function() {
    var s = $(this).scrollTop(),
      d = $(document).height() - $(window).height(),
      scrollPercent = (s / d);
    var position = (scrollPercent) * 1.1;
    $("#progressbar").attr('value', position);
  });
});

$(document).ready(function() {
  $(window).scroll(function() {
    var s = $(this).scrollTop(),
      d = $(document).height() - $(window).height(),
      scrollPercent = (s / d);
    var position = (scrollPercent) * 1.1;
    $("#progressbar2").attr('value', position);
  });
});

$(document).ready(function() {
  $(window).scroll(function() {
    var s = $(this).scrollTop(),
      d = $(document).height() - $(window).height(),
      scrollPercent = (s / d);
    $("#progressbar3").attr('value', position);
  });
});

$(document).ready(function() {
  $(window).scroll(function() {
    var s = $(this).scrollTop(),
      d = $(document).height() - $(window).height(),
      scrollPercent = (s / d);
    var position = (scrollPercent) * 1.1;
    $("#progressbar4").attr('value', position);
  });
});

$(document).ready(function() {
  $(window).scroll(function() {
    var s = $(this).scrollTop(),
      d = $(document).height() - $(window).height(),
      scrollPercent = (s / d);
    var position = (scrollPercent) * 1.1;
    $("#progressbar5").attr('value', position);
  });
});

$(document).ready(function() {
  $(window).scroll(function() {
    var s = $(this).scrollTop(),
      d = $(document).height() - $(window).height(),
      scrollPercent = (s / d);
    var position = (scrollPercent) * 1.1;
    $("#progressbar6").attr('value', position);
  });
});

$(document).ready(function() {
  $(window).scroll(function() {
    var s = $(this).scrollTop(),
      d = $(document).height() - $(window).height(),
      scrollPercent = (s / d);
    var position = (scrollPercent) * 1.1;
    $("#progressbar7").attr('value', position);
  });
});

$(document).ready(function() {
  $(window).scroll(function() {
    var s = $(this).scrollTop(),
      d = $(document).height() - $(window).height(),
      scrollPercent = (s / d);
    var position = (scrollPercent) * 1.1;
    $("#progressbar8").attr('value', position);
  });
});

$(document).ready(function() {
  $(window).scroll(function() {
    var s = $(this).scrollTop(),
      d = $(document).height() - $(window).height(),
      scrollPercent = (s / d);
    var position = (scrollPercent) * 1.1;
    $("#progressbar9").attr('value', position);
  });
});

$(document).ready(function() {
  $(window).scroll(function() {
    var s = $(this).scrollTop(),
      d = $(document).height() - $(window).height(),
      scrollPercent = (s / d);
    var position = (scrollPercent) * 1.1;
    $("#progressbar10").attr('value', position);
  });
});

$(document).ready(function() {
  $(window).scroll(function() {
    var s = $(this).scrollTop(),
      d = $(document).height() - $(window).height(),
      scrollPercent = (s / d);
    var position = (scrollPercent) * 1.1;
    $("#progressbar11").attr('value', position);
  });
});

$(document).ready(function() {
  $(window).scroll(function() {
    var s = $(this).scrollTop(),
      d = $(document).height() - $(window).height(),
      scrollPercent = (s / d);
    var position = (scrollPercent) * 1.1;
    $("#progressbar12").attr('value', position);
  });
});

$(document).ready(function() {
  $(window).scroll(function() {
    var s = $(this).scrollTop(),
      d = $(document).height() - $(window).height(),
      scrollPercent = (s / d);
    var position = (scrollPercent) * 1.1;
    $("#progressbar13").attr('value', position);
  });
});


$(document).ready(function() {
  $(window).scroll(function() {
    var s = $(this).scrollTop(),
      d = $(document).height() - $(window).height(),
      scrollPercent = (s / d);
    var position = (scrollPercent) * 1.1;
    $("#progressbar14").attr('value', position);
  });
});


$(document).ready(function() {
  $(window).scroll(function() {
    var s = $(this).scrollTop(),
      d = $(document).height() - $(window).height(),
      scrollPercent = (s / d);
    var position = (scrollPercent) * 1.1;
    $("#progressbar15").attr('value', position);
  });
});

$(document).ready(function() {
  $('a[href^="#"]').click(function() {
    var target = $(this.hash);
    if (target.length == 0) target = $('a[name="' + this.hash.substr(1) + '"]');
    if (target.length == 0) target = $('html');
    $('html, body').animate({
      scrollTop: target.offset().top
    }, 600);
    return false;
  });
});


/* JAVASCRIPT DO BAIRRO E RAÇA*/
$(".sim2").hide();
$('input[type="radio"]').click(function() {
  if ($(this).attr("value") == "sim") {
    $(".sim2").show();
  } else {
    $(".sim2").hide();
  }
});

var bodyTag = document.getElementsByTagName("body")[0];
bodyTag.className = bodyTag.className.replace("noJS", "hasJS");

$(function() {
  $("select.custom").each(function() {
    var sb = new SelectBox({
      selectbox: $(this),
      height: 160,
      width: 265
    });
  });
});

//FORMULARIO 3
$(document).keydown(function(e) {
  var current = $('section.current').data('section');
  if (e.keyCode == 40) {
    //SCROLL DOWN
    var next = current + 1;
    $('.section' + current).removeClass('current');
    $('body').scrollTo('.section' + next, {
      duration: 600
    }, {
      queue: true
    });
    $('.section' + next).addClass('current');
    e.preventDefault();
    return false;
  } else if (e.keyCode == 38) {
    //SCROLL UP
    var prev = current - 1;
    $('.section' + current).removeClass('current');
    $('body').scrollTo('.section' + prev, 600, {
      queue: true
    });
    $('.section' + prev).addClass('current');
    e.preventDefault();
    return false;
  }
});
