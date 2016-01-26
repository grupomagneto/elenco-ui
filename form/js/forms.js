/*
$( "input" ).change(function() {
  var $this = $(this);
  $('html, body').animate({
    scrollTop: $($this).parent().next().offset().top
 }, 800);
});*/


function autoTab(input, e)  {   
  var ind = 0;  
  var isNN = (navigator.appName.indexOf("Netscape")!=-1);  
  var keyCode = (isNN) ? e.which : e.keyCode;   
  var nKeyCode = e.keyCode;   
  if(keyCode == 13){
$('html,body').animate({
    scrollTop: window.scrollY + window.innerHeight
}, 1000);  
    if (!isNN) {window.event.keyCode = 0;} // evitar o beep  
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
    var index = -1, i = 0, found = false;   
    while (i < input.form.length && index == -1)   
      if (input.form[i] == input) {  
        index = i;  
          if (i < (input.form.length -1)) {  
           if (input.form[i+1].type == 'hidden') {  
       index++;   
     }  
     if (input.form[i+1].type == 'button' && input.form[i+1].id == 'tabstopfalse') {  
       index++;   
     }  
   }  
      }  
      else   
   i++;   
    return index;   
  }  
}




/* home page */

/* color transitions */
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
var colorIndices = [0,1,2,3,4,5,6,7,8,9,10,11,12,13];

//transition speed
var gradientSpeed = 0.008;

function updateGradient(container) {
  var c0_0 = colors[colorIndices[0]];
  var c0_1 = colors[colorIndices[1]];
  var c1_0 = colors[colorIndices[2]];
  var c1_1 = colors[colorIndices[3]];
  var c2_0 = colors[colorIndices[4]];
  var c2_1 = colors[colorIndices[5]];
  var c3_0 = colors[colorIndices[6]];
  var c3_1 = colors[colorIndices[7]];
  var c4_0 = colors[colorIndices[8]];
  var c4_1 = colors[colorIndices[9]];
  var c5_0 = colors[colorIndices[10]];
  var c5_1 = colors[colorIndices[11]];
  var c6_0 = colors[colorIndices[12]];
  var c6_1 = colors[colorIndices[13]];

  var istep = 1 - step;
  var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
  var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
  var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
  var color1 = "rgb("+r1+","+g1+","+b1+")";

  var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
  var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
  var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
  var color2 = "rgb("+r2+","+g2+","+b2+")";

  var r3 = Math.round(istep * c2_0[0] + step * c2_1[0]);
  var g3 = Math.round(istep * c2_0[1] + step * c2_1[1]);
  var b3 = Math.round(istep * c2_0[2] + step * c2_1[2]);
  var color3 = "rgb("+r3+","+g3+","+b3+")";

  var r4 = Math.round(istep * c4_0[0] + step * c4_1[0]);
  var g4 = Math.round(istep * c4_0[1] + step * c4_1[1]);
  var b4 = Math.round(istep * c4_0[2] + step * c4_1[2]);
  var color4 = "rgb("+r4+","+g4+","+b4+")";

  var r5 = Math.round(istep * c5_0[0] + step * c5_1[0]);
  var g5 = Math.round(istep * c5_0[1] + step * c5_1[1]);
  var b5 = Math.round(istep * c5_0[2] + step * c5_1[2]);
  var color5 = "rgb("+r5+","+g5+","+b5+")";

  var r6 = Math.round(istep * c6_0[0] + step * c6_1[0]);
  var g6 = Math.round(istep * c6_0[1] + step * c6_1[1]);
  var b6 = Math.round(istep * c6_0[2] + step * c6_1[2]);
  var color6 = "rgb("+r6+","+g6+","+b6+")";


  $(container).css({
    background: "-webkit-gradient(204deg, ("+color1+"), ("+color2+"), ("+color3+"),("+color4+"),("+color5+"),("+color6+"))"}).css({
    background: "-moz-linear-gradient(204deg, "+color1+" 50%, "+color2+" 50%)"});



  step += gradientSpeed;
  if ( step >= 1 ) {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];
    colorIndices[4] = colorIndices[5];
    colorIndices[6] = colorIndices[7];
    colorIndices[8] = colorIndices[9];
    colorIndices[10] = colorIndices[11];
    colorIndices[11] = colorIndices[12];
    colorIndices[12] = colorIndices[13];

    //pick two new target color indices
    //do not pick the same as the current one
    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;

  }
}
setInterval(function(){updateGradient('#gradient')},10);



/* home page */

/* color transitions */
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
var colorIndices = [0,1,2,3,4,5,6,7,8,9,10,11,12,13];

//transition speed
var gradientSpeed = 0.010;

function updateGradient(container) {
  var c0_0 = colors[colorIndices[0]];
  var c0_1 = colors[colorIndices[1]];
  var c1_0 = colors[colorIndices[2]];
  var c1_1 = colors[colorIndices[3]];
  var c2_0 = colors[colorIndices[4]];
  var c2_1 = colors[colorIndices[5]];
  var c3_0 = colors[colorIndices[6]];
  var c3_1 = colors[colorIndices[7]];
  var c4_0 = colors[colorIndices[8]];
  var c4_1 = colors[colorIndices[9]];
  var c5_0 = colors[colorIndices[10]];
  var c5_1 = colors[colorIndices[11]];
  var c6_0 = colors[colorIndices[12]];
  var c6_1 = colors[colorIndices[13]];

  var istep = 1 - step;
  var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
  var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
  var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
  var color1 = "rgb("+r1+","+g1+","+b1+")";

  var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
  var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
  var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
  var color2 = "rgb("+r2+","+g2+","+b2+")";

  var r3 = Math.round(istep * c2_0[0] + step * c2_1[0]);
  var g3 = Math.round(istep * c2_0[1] + step * c2_1[1]);
  var b3 = Math.round(istep * c2_0[2] + step * c2_1[2]);
  var color3 = "rgb("+r3+","+g3+","+b3+")";

  var r4 = Math.round(istep * c4_0[0] + step * c4_1[0]);
  var g4 = Math.round(istep * c4_0[1] + step * c4_1[1]);
  var b4 = Math.round(istep * c4_0[2] + step * c4_1[2]);
  var color4 = "rgb("+r4+","+g4+","+b4+")";

  var r5 = Math.round(istep * c5_0[0] + step * c5_1[0]);
  var g5 = Math.round(istep * c5_0[1] + step * c5_1[1]);
  var b5 = Math.round(istep * c5_0[2] + step * c5_1[2]);
  var color5 = "rgb("+r5+","+g5+","+b5+")";

  var r6 = Math.round(istep * c6_0[0] + step * c6_1[0]);
  var g6 = Math.round(istep * c6_0[1] + step * c6_1[1]);
  var b6 = Math.round(istep * c6_0[2] + step * c6_1[2]);
  var color6 = "rgb("+r6+","+g6+","+b6+")";


  $(container).css({
    background: "-webkit-gradient(204deg, ("+color1+"), ("+color2+"), ("+color3+"),("+color4+"),("+color5+"),("+color6+"))"}).css({
    background: "-moz-linear-gradient(204deg, "+color1+" 50%, "+color2+" 50%)"});



  step += gradientSpeed;
  if ( step >= 1 ) {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];
    colorIndices[4] = colorIndices[5];
    colorIndices[6] = colorIndices[7];
    colorIndices[8] = colorIndices[9];
    colorIndices[10] = colorIndices[11];
    colorIndices[11] = colorIndices[12];
    colorIndices[12] = colorIndices[13];

    //pick two new target color indices
    //do not pick the same as the current one
    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;

  }
}
setInterval(function(){updateGradient('.gradient')},10);



/* home page */

/* color transitions */
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
var colorIndices = [0,1,2,3,4,5,6,7,8,9,10,11,12,13];

//transition speed
var gradientSpeed = 0.002;

function updateGradient(container) {
  var c0_0 = colors[colorIndices[0]];
  var c0_1 = colors[colorIndices[1]];
  var c1_0 = colors[colorIndices[2]];
  var c1_1 = colors[colorIndices[3]];
  var c2_0 = colors[colorIndices[4]];
  var c2_1 = colors[colorIndices[5]];
  var c3_0 = colors[colorIndices[6]];
  var c3_1 = colors[colorIndices[7]];
  var c4_0 = colors[colorIndices[8]];
  var c4_1 = colors[colorIndices[9]];
  var c5_0 = colors[colorIndices[10]];
  var c5_1 = colors[colorIndices[11]];
  var c6_0 = colors[colorIndices[12]];
  var c6_1 = colors[colorIndices[13]];

  var istep = 1 - step;
  var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
  var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
  var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
  var color1 = "rgb("+r1+","+g1+","+b1+")";

  var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
  var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
  var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
  var color2 = "rgb("+r2+","+g2+","+b2+")";

  var r3 = Math.round(istep * c2_0[0] + step * c2_1[0]);
  var g3 = Math.round(istep * c2_0[1] + step * c2_1[1]);
  var b3 = Math.round(istep * c2_0[2] + step * c2_1[2]);
  var color3 = "rgb("+r3+","+g3+","+b3+")";

  var r4 = Math.round(istep * c4_0[0] + step * c4_1[0]);
  var g4 = Math.round(istep * c4_0[1] + step * c4_1[1]);
  var b4 = Math.round(istep * c4_0[2] + step * c4_1[2]);
  var color4 = "rgb("+r4+","+g4+","+b4+")";

  var r5 = Math.round(istep * c5_0[0] + step * c5_1[0]);
  var g5 = Math.round(istep * c5_0[1] + step * c5_1[1]);
  var b5 = Math.round(istep * c5_0[2] + step * c5_1[2]);
  var color5 = "rgb("+r5+","+g5+","+b5+")";

  var r6 = Math.round(istep * c6_0[0] + step * c6_1[0]);
  var g6 = Math.round(istep * c6_0[1] + step * c6_1[1]);
  var b6 = Math.round(istep * c6_0[2] + step * c6_1[2]);
  var color6 = "rgb("+r6+","+g6+","+b6+")";


  $(container).css({
    background: "-webkit-gradient(204deg, ("+color1+"), ("+color2+"), ("+color3+"),("+color4+"),("+color5+"),("+color6+"))"}).css({
    background: "-moz-linear-gradient(204deg, "+color1+" 50%, "+color2+" 50%)"});



  step += gradientSpeed;
  if ( step >= 1 ) {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];
    colorIndices[4] = colorIndices[5];
    colorIndices[6] = colorIndices[7];
    colorIndices[8] = colorIndices[9];
    colorIndices[10] = colorIndices[11];
    colorIndices[11] = colorIndices[12];
    colorIndices[12] = colorIndices[13];

    //pick two new target color indices
    //do not pick the same as the current one
    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;

  }
}
setInterval(function(){updateGradient('.gradient2')},10);

/* home page */

/* color transitions */
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
var colorIndices = [0,1,2,3,4,5,6,7,8,9,10,11,12,13];

//transition speed
var gradientSpeed = 0.002;

function updateGradient(container) {
  var c0_0 = colors[colorIndices[0]];
  var c0_1 = colors[colorIndices[1]];
  var c1_0 = colors[colorIndices[2]];
  var c1_1 = colors[colorIndices[3]];
  var c2_0 = colors[colorIndices[4]];
  var c2_1 = colors[colorIndices[5]];
  var c3_0 = colors[colorIndices[6]];
  var c3_1 = colors[colorIndices[7]];
  var c4_0 = colors[colorIndices[8]];
  var c4_1 = colors[colorIndices[9]];
  var c5_0 = colors[colorIndices[10]];
  var c5_1 = colors[colorIndices[11]];
  var c6_0 = colors[colorIndices[12]];
  var c6_1 = colors[colorIndices[13]];

  var istep = 1 - step;
  var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
  var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
  var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
  var color1 = "rgb("+r1+","+g1+","+b1+")";

  var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
  var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
  var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
  var color2 = "rgb("+r2+","+g2+","+b2+")";

  var r3 = Math.round(istep * c2_0[0] + step * c2_1[0]);
  var g3 = Math.round(istep * c2_0[1] + step * c2_1[1]);
  var b3 = Math.round(istep * c2_0[2] + step * c2_1[2]);
  var color3 = "rgb("+r3+","+g3+","+b3+")";

  var r4 = Math.round(istep * c4_0[0] + step * c4_1[0]);
  var g4 = Math.round(istep * c4_0[1] + step * c4_1[1]);
  var b4 = Math.round(istep * c4_0[2] + step * c4_1[2]);
  var color4 = "rgb("+r4+","+g4+","+b4+")";

  var r5 = Math.round(istep * c5_0[0] + step * c5_1[0]);
  var g5 = Math.round(istep * c5_0[1] + step * c5_1[1]);
  var b5 = Math.round(istep * c5_0[2] + step * c5_1[2]);
  var color5 = "rgb("+r5+","+g5+","+b5+")";

  var r6 = Math.round(istep * c6_0[0] + step * c6_1[0]);
  var g6 = Math.round(istep * c6_0[1] + step * c6_1[1]);
  var b6 = Math.round(istep * c6_0[2] + step * c6_1[2]);
  var color6 = "rgb("+r6+","+g6+","+b6+")";


  $(container).css({
    background: "-webkit-gradient(204deg, ("+color1+"), ("+color2+"), ("+color3+"),("+color4+"),("+color5+"),("+color6+"))"}).css({
    background: "-moz-linear-gradient(204deg, "+color1+" 50%, "+color2+" 50%)"});



  step += gradientSpeed;
  if ( step >= 1 ) {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];
    colorIndices[4] = colorIndices[5];
    colorIndices[6] = colorIndices[7];
    colorIndices[8] = colorIndices[9];
    colorIndices[10] = colorIndices[11];
    colorIndices[11] = colorIndices[12];
    colorIndices[12] = colorIndices[13];

    //pick two new target color indices
    //do not pick the same as the current one
    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;

  }
}
setInterval(function(){updateGradient('.gradient3')},10);



/* GRADIENT DOIS SORRIA */

/* color transitions */
var colors = new Array(
  [176, 116, 255],
  [255, 41, 129],
  [165, 0, 200],
  [237, 107, 107],
  [201, 87, 222],
  [34, 51, 204]
  );

var step = 0;
//color table indices for: 
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0,1,2,3];

//transition speed
var gradientSpeed = 0.002;

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
setInterval(function(){updateGradient('#gradient2')},10);


/* GRADIENT DOIS SÉRIO */

/* color transitions */
var colors = new Array(
  [176, 116, 255],
  [255, 41, 129],
  [165, 0, 200],
  [237, 107, 107],
  [201, 87, 222],
  [34, 51, 204]
  );

var step = 0;
//color table indices for: 
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0,1,2,3];

//transition speed
var gradientSpeed = 0.002;

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
setInterval(function(){updateGradient('#gradient3')},10);


/* GRADIENT ULTIMA DIV */

/* color transitions */
var colors = new Array(
  [176, 116, 255],
  [255, 41, 129],
  [165, 0, 200],
  [237, 107, 107],
  [201, 87, 222],
  [34, 51, 204]
  );

var step = 0;
//color table indices for: 
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0,1,2,3];

//transition speed
var gradientSpeed = 0.002;

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
setInterval(function(){updateGradient('#gradient4')},10);


/* color transitions */
var colors = new Array(
  [176, 116, 255],
  [255, 41, 129],
  [165, 0, 200],
  [237, 107, 107],
  [201, 87, 222],
  [34, 51, 204]
  );

var step = 0;
//color table indices for: 
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0,1,2,3];

//transition speed
var gradientSpeed = 0.002;

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



//JAVASCRIPT DOS BOTÕES ATOR OU ATRIZ

$(".sim2").hide();
$('input[type="radio"]').click(function() {
  if ($(this).attr("value") == "sim") {
    $(".sim2").show();
  } else {
    $(".sim2").hide();
  }
});




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



$(document).ready(function () {
    $(window).scroll(function () {
        var s = $(this).scrollTop(),
            d = $(document).height() - $(window).height(),
            scrollPercent = (s / d);

        var position = (scrollPercent)*1.1;     
        $("#progressbar2").attr('value', position);
     });
 });


$(document).ready(function () {
    $(window).scroll(function () {
        var s = $(this).scrollTop(),
            d = $(document).height() - $(window).height(),
            scrollPercent = (s / d);

        var position = (scrollPercent)*1.1;     
        $("#progressbar3").attr('value', position);
     });
 });


$(document).ready(function () {
    $(window).scroll(function () {
        var s = $(this).scrollTop(),
            d = $(document).height() - $(window).height(),
            scrollPercent = (s / d);

        var position = (scrollPercent)*1.1;     
        $("#progressbar4").attr('value', position);
     });
 });


$(document).ready(function () {
    $(window).scroll(function () {
        var s = $(this).scrollTop(),
            d = $(document).height() - $(window).height(),
            scrollPercent = (s / d);

        var position = (scrollPercent)*1.1;     
        $("#progressbar5").attr('value', position);
     });
 });



$(document).ready(function () {
    $(window).scroll(function () {
        var s = $(this).scrollTop(),
            d = $(document).height() - $(window).height(),
            scrollPercent = (s / d);

        var position = (scrollPercent)*1.1;     
        $("#progressbar6").attr('value', position);
     });
 });



$(document).ready(function () {
    $(window).scroll(function () {
        var s = $(this).scrollTop(),
            d = $(document).height() - $(window).height(),
            scrollPercent = (s / d);

        var position = (scrollPercent)*1.1;     
        $("#progressbar7").attr('value', position);
     });
 });



$(document).ready(function () {
    $(window).scroll(function () {
        var s = $(this).scrollTop(),
            d = $(document).height() - $(window).height(),
            scrollPercent = (s / d);

        var position = (scrollPercent)*1.1;     
        $("#progressbar8").attr('value', position);
     });
 });


$(document).ready(function () {
    $(window).scroll(function () {
        var s = $(this).scrollTop(),
            d = $(document).height() - $(window).height(),
            scrollPercent = (s / d);

        var position = (scrollPercent)*1.1;     
        $("#progressbar9").attr('value', position);
     });
 });

$(document).ready(function () {
    $(window).scroll(function () {
        var s = $(this).scrollTop(),
            d = $(document).height() - $(window).height(),
            scrollPercent = (s / d);

        var position = (scrollPercent)*1.1;     
        $("#progressbar10").attr('value', position);
     });
 });

$(document).ready(function () {
    $(window).scroll(function () {
        var s = $(this).scrollTop(),
            d = $(document).height() - $(window).height(),
            scrollPercent = (s / d);

        var position = (scrollPercent)*1.1;     
        $("#progressbar11").attr('value', position);
     });
 });

$(document).ready(function () {
    $(window).scroll(function () {
        var s = $(this).scrollTop(),
            d = $(document).height() - $(window).height(),
            scrollPercent = (s / d);

        var position = (scrollPercent)*1.1;     
        $("#progressbar12").attr('value', position);
     });
 });

$(document).ready(function () {
    $(window).scroll(function () {
        var s = $(this).scrollTop(),
            d = $(document).height() - $(window).height(),
            scrollPercent = (s / d);

        var position = (scrollPercent)*1.1;     
        $("#progressbar13").attr('value', position);
     });
 });


$(document).ready(function () {
    $(window).scroll(function () {
        var s = $(this).scrollTop(),
            d = $(document).height() - $(window).height(),
            scrollPercent = (s / d);

        var position = (scrollPercent)*1.1;     
        $("#progressbar14").attr('value', position);
     });
 });


$(document).ready(function () {
    $(window).scroll(function () {
        var s = $(this).scrollTop(),
            d = $(document).height() - $(window).height(),
            scrollPercent = (s / d);

        var position = (scrollPercent)*1.1;     
        $("#progressbar15").attr('value', position);
     });
 });


/**/

$(document).ready(function() {  
$('a[href^="#"]').click(function() {  
var target = $(this.hash);  
if (target.length == 0) target = $('a[name="' + this.hash.substr(1) + '"]');  
if (target.length == 0) target = $('html');  
$('html, body').animate({ scrollTop: target.offset().top }, 600);  
return false;  
});  
});


/*JAVASCRIPT DO BAIRRO E RAÇA*/



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
$(document).keydown(function(e){
  var current = $('section.current').data('section');
    if (e.keyCode == 40) {
        //SCROLL DOWN
        var next = current + 1;
        $('.section'+current).removeClass('current');
      $('body').scrollTo('.section'+next, {duration:600}, {queue:true});
      $('.section'+next).addClass('current');
        e.preventDefault();
        return false;
      } 
 
  else if (e.keyCode == 38) {
        //SCROLL UP
        var prev = current - 1;
        $('.section'+current).removeClass('current');
        $('body').scrollTo( '.section' + prev, 600, {queue:true} );
        $('.section'+prev).addClass('current');
        e.preventDefault();
        return false;
      }
});















