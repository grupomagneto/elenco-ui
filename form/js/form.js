    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        keyboardControl: true,
        direction: 'vertical',
        simulateTouch: false,
        nextButton: '.swiper-control.next',
        prevButton: '.swiper-control.prev',
        speed: 900
    });
/*
 $('.sendBtn').on('click', function(e){
    e.preventDefault()
    mySwiper.swipeNext()
  });*/



var colors = new Array(
[165, 0, 200],
  [176, 116, 255],
  [255, 41, 129],
  [237, 107, 107],
  [201, 87, 222],
  [35, 188, 237]
);

var step = 0;
//color table indices for: 
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0,1,2,3];

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
  var color1 = "rgb("+r1+","+g1+","+b1+")";

  var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
  var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
  var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
  var color2 = "rgb("+r2+","+g2+","+b2+")";

  $(container).css({
    background: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"}).css({
    background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});

  step += gradientSpeed;
  if ( step >= 1 ) {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];

    //pick two new target color indices
    //do not pick the same as the current one
    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;

  }
}
setInterval(function(){updateGradient('.gradient')},10);


var colors = new Array(
[165, 0, 200],
  [176, 116, 255],
  [255, 41, 129],
  [237, 107, 107],
  [201, 87, 222],
  [35, 188, 237]
);

var step = 0;
//color table indices for: 
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0,1,2,3];

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
  var color1 = "rgb("+r1+","+g1+","+b1+")";

  var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
  var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
  var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
  var color2 = "rgb("+r2+","+g2+","+b2+")";

  $(container).css({
    background: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"}).css({
    background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});

  step += gradientSpeed;
  if ( step >= 1 ) {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];

    //pick two new target color indices
    //do not pick the same as the current one
    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;

  }
}
setInterval(function(){updateGradient('.gradient2')},10);



var colors = new Array(
[165, 0, 200],
  [176, 116, 255],
  [255, 41, 129],
  [237, 107, 107],
  [201, 87, 222],
  [35, 188, 237]
);

var step = 0;
//color table indices for: 
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0,1,2,3];

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
  var color1 = "rgb("+r1+","+g1+","+b1+")";

  var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
  var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
  var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
  var color2 = "rgb("+r2+","+g2+","+b2+")";

  $(container).css({
    background: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"}).css({
    background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});

  step += gradientSpeed;
  if ( step >= 1 ) {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];

    //pick two new target color indices
    //do not pick the same as the current one
    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;

  }
}
setInterval(function(){updateGradient('.gradient3')},10);



var colors = new Array(
[165, 0, 200],
  [176, 116, 255],
  [255, 41, 129],
  [237, 107, 107],
  [201, 87, 222],
  [35, 188, 237]
);

var step = 0;
//color table indices for: 
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0,1,2,3];

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
  var color1 = "rgb("+r1+","+g1+","+b1+")";

  var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
  var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
  var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
  var color2 = "rgb("+r2+","+g2+","+b2+")";

  $(container).css({
    background: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"}).css({
    background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});

  step += gradientSpeed;
  if ( step >= 1 ) {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];

    //pick two new target color indices
    //do not pick the same as the current one
    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;

  }
}
setInterval(function(){updateGradient('.gradient4')},10);



//JAVACRIPT  PROGRESS BAR

$(document).ready(function () {
    $(window).scroll(function () {
        var s = $(this).scrollTop(),
            d = $(document).height() - $(window).height(),
            scrollPercent = (s / d);

        var position = (scrollPercent)*1.1;     
        $("#progressbar").attr('value', position);
     });
 });


$(window).load(function(){
$('#nome').keyup(function () {
    if ($.trim(this.value).length > 2){

       $('#btSend').show()
         $('#seta').show()

    }
    else {
      $('#btSend').hide()
      $('#seta').hide()
    }
});
});


$(window).load(function(){
$('#cpf').keyup(function () {
    if ($.trim(this.value).length > 2){

       $('#btSend').show()
         $('#seta').show()

    }
    else {
      $('#btSend').hide()
      $('#seta').hide()
    }
});
});

$(window).load(function(){
$('#sobrenome').keyup(function () {
    if ($.trim(this.value).length > 2){

       $('#btSend2').show()
         $('#seta2').show()

    }
    else {
      $('#btSend2').hide()
      $('#seta2').hide()
    }
});
});


$(window).load(function(){
$('#nome_menor').keyup(function () {
    if ($.trim(this.value).length > 2){

       $('#btSend4').show()
         $('#seta4').show()

    }
    else {
      $('#btSend4').hide()
      $('#seta4').hide()
    }
});
});


$(window).load(function(){
$('#nome_responsavel').keyup(function () {
    if ($.trim(this.value).length > 2){

       $('#btSend2').show()
         $('#seta2').show()

    }
    else {
      $('#btSend2').hide()
      $('#seta2').hide()
    }
});
});


$(window).load(function(){
$('#sobrenome_menor').keyup(function () {
    if ($.trim(this.value).length > 2){

       $('#btSend5').show()
         $('#seta5').show()

    }
    else {
      $('#btSend5').hide()
      $('#seta5').hide()
    }
});
});




$(window).load(function(){
$('#celular').keyup(function () {
    if ($.trim(this.value).length > 7){

       $('#btSend8').show()
         $('#seta8').show()
       $('#btSend10').show()
         $('#seta10').show()


    }
    else {
      $('#btSend8').hide()
      $('#seta8').hide()
      $('#btSend10').hide()
      $('#seta10').hide()
    }
});
});

$(window).load(function(){
$('#email').keyup(function () {
    if ($.trim(this.value).length > 7){

       $('#btSend9').show()
         $('#seta9').show()
       $('#btSend11').show()
         $('#seta11').show()

    }
    else {
      $('#btSend11').hide()
      $('#seta11').hide()
    }
  });
});


$(window).load(function(){
    $('#tt').keyup(function () {
          if ($.trim(this.value).length > 2){

                  document.getElementById("cadastra").disabled = false;
            }
          else {
          } 
      });
});


   $(document).ready(function() {
            
            //set focus to 1st input field
            $("#form [name='nome']").focus();
            
            //attach click event to button
            $("#seta").click(function(){
                $("#form [name='sobrenome']").focus();
            });
            

        });


$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="masculino"){
          var delay = 1000;
            setTimeout(function() {
          $("#proxima").focus();
              }, 200);
        }  
        if($(this).attr("value")=="feminino"){
          var delay = 1000;
            setTimeout(function() {
          $("#proxima").focus();
              }, 200);
        }
    });
});





$(function(){
    //Runs focus of div on click of button/link/whatever
    $("#seta2").click(function(){
        $("#3").focus();
    });
});
 


$(document).on("keypress", ".TabOnEnter", function (e) {
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







$('form')[0].addEventListener('focus', function (e) {
    //Index of focused slide
    var focusIndex = $(e.target).parents('.swiper-slide').index();
    //Reset scrolltop set by browser on focus
    $('.swiper-container')[0].scrollTop = 0;
    setTimeout(function(){
        $('.swiper-container')[0].scrollTop = 0;
    },0);
    //Slide to focused slide
    swiper.slideTo(focusIndex);
}, true);



function exibeMsg( valor )
        {
            
            switch (valor)
            {
                case 'feminino':
                document.getElementById( 'txt' ).innerHTML = 'atriz';
                break;

                case 'masculino':
                document.getElementById( 'txt' ).innerHTML = 'ator';
                break;

                default:
                document.getElementById( 'txt' ).innerHTML = 'Nenhum valor informado';
                break;
            }
}


    function exibeMsg2( valor )
        {
            
            switch (valor)
            {
                case 'feminino':
                document.getElementById( 'txt2' ).innerHTML = 'dela';
                document.getElementById( 'txt3' ).innerHTML = 'dela';
                document.getElementById( 'txt4' ).innerHTML = 'ela';
                document.getElementById( 'txt5' ).innerHTML = 'da';
                break;

                case 'masculino':
                document.getElementById( 'txt2' ).innerHTML = 'dele';
                document.getElementById( 'txt3' ).innerHTML = 'dele';
                document.getElementById( 'txt4' ).innerHTML = 'ele';
                document.getElementById( 'txt5' ).innerHTML = 'do';
                break;

                default:
                document.getElementById( 'txt2' ).innerHTML = 'Nenhum valor informado';
                document.getElementById( 'txt3' ).innerHTML = 'Nenhum valor informado';
                break;
            }
        }


          function gravar(){
            var nome = document.getElementById("nomem").value;
            var div = document.getElementById("divResultado");
            var div2 = document.getElementById("divResultado2");
            var div3 = document.getElementById("divResultado3");
             
            div.innerHTML = "" + nome +"";
            div2.innerHTML = "" + nome +"";
            div3.innerHTML = "" + nome +"";
        }



$(document).ready(function(){
  $(".blue").hide();
    $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="sim"){
            $(".box").not(".blue").hide();
            $(".blue").show(); 
             var delay = 1000;
            setTimeout(function() {
          $("#ig").focus()();
              }, 3000);
        }  
        if($(this).attr("value")=="nao"){
            $(".box").not(".blue").hide();
            $(".blue").hide();        
            var delay = 1000;
            setTimeout(function() {
          $("#ig").focus()();
              }, 200);
        }
    });
});





































