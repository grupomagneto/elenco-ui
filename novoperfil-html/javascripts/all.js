//texto
var div = document.getElementById('log');
var textos = ['Cadastre-se e encontre os trabalhos da sua cidade.', 'Diga adeus a horas em filas de teste de elenco.', 'Você diz quanto quer receber e recebe em 15 dias.', 'Convide 10 amigos e ganhe um upgrade no cadastro.', 'Cadastre-se em minutos sem pagar nada.', 'Oportunidades de trabalho para todas as idades e perfis.'];

function escrever(str, done) {
    var char = str.split('').reverse();
    var typer = setInterval(function() {
        if (!char.length) {
            clearInterval(typer);
            return setTimeout(done, 500);
        }
        var next = char.pop();
        div.innerHTML += next;
    }, 50);
}

function limpar(done) {
    var char = div.innerHTML;
    var nr = char.length;
    var typer = setInterval(function() {
        if (nr-- == 0) {
            clearInterval(typer);
            return done();
        }
        div.innerHTML = char.slice(0, nr);
    }, 0);
}

function rodape(conteudos, el) {
    var atual = -1;
  function prox(cb){
    if (atual < conteudos.length - 1) atual++;
    else atual = 0;
    var str = conteudos[atual];
    escrever(str, function(){
      limpar(prox);
    });
  }
  prox(prox);
}
rodape(textos);


// Gradient

var colors = new Array(
 [165, 0, 200], [176, 116, 255], [255, 41, 129], [237, 107, 107], [201, 87, 222], [35, 188, 237]);

var step = 0;
//color table indices for: 
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0,1,2,3];

//transition speed
var gradientSpeed = 0.002;

function updateGradient()
{
  
  if ( $===undefined ) return;
  
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

 $('.gradient').css({
   background: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"}).css({
    background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});
  
  step += gradientSpeed;
  if ( step >= 1 )
  {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];
    
    //pick two new target color indices
    //do not pick the same as the current one
    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    
  }
}

setInterval(updateGradient,10);

//SLIDE
$(document).on('ready', function() {
  $(".regular").slick({
    dots: false,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 341,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 340,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
  });
});



var menuTrigger = $('#menu-trigger');
console.log($('.site-header').outerHeight());

var isToggled = false;

menuTrigger.click(function(e){
  e.preventDefault();  
  if(!isToggled){
   $(this).find('.fa').addClass('rotate-clockwise').removeClass('rotate-counter');
    console.log("rotate clockwise");
    isToggled = true;
    $('#responsive-menu').slideToggle();
  }else{
    $(this).find('.fa').addClass('rotate-counter').removeClass('rotate-clockwise');
    console.log("rotate counterclockwise");
    $('#responsive-menu').slideToggle();
    isToggled = false;
  }
  
});
