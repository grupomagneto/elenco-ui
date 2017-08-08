// Gradient
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
  updateGradient('.gradient');
}, 10);

//select
var selects = document.querySelectorAll('.multi-select .select');
selects = Array.prototype.slice.call(selects);

var limit = function(num, min, max){
    return Math.min( Math.max(num, min), max );
};

var delay = function(fn, delay, bind){
    var timer = null;
    return function(){
        bind = bind || this;
        if(timer){clearTimeout(timer);}
        var args = arguments;
        timer = setTimeout(function(){
            fn.apply(bind, args);
        }, delay);
    };
};

selects.forEach(function(selectBox){
    var root = selectBox;
    var scrollHandle = root.querySelector('.handle');
    var scrollBox = root.querySelector('.box');
    var scrollFocus = root.querySelector('.focus');

    var scroll = new IScroll(scrollHandle, {
        scrollX : false,
        scrollY : true,
        indicators : [{
            el: scrollBox,
            resize: false,
            ignoreBoundaries: true
        },{
            el: scrollFocus,
            resize: false,
            ignoreBoundaries: true
        }]
    });

    var itemHeight = scrollHandle.querySelector('option').offsetHeight;
    var originScrollTo = scroll.scrollTo;
    scroll.scrollTo = delay(function(x, y, time, easing){
        var targetY = y;
        if(y > scroll.maxScrollY && y < 0){
            var absY = Math.abs(y);
            var step = Math.floor(absY / itemHeight);
            var itemDelta = absY - step * itemHeight;
            if(scroll.startY <= scroll.absStartY){
                if(y - scroll.absStartY < 0){
                    step = step + 1;
                }
            }           
            targetY = 0 - step * itemHeight;
            time = parseInt(time, 10) || 0;
            time = Math.max(time, Math.abs(targetY - y) * 10);
            targetY = limit(targetY, scroll.maxScrollY, 0);
        }
        originScrollTo.call(scroll, x, targetY, time, easing);
    }, 10);


});

$("#date").drum({ 
  panelCount: 9, 
  dail_w: 50, 
  dail_h: 9, 
  dail_stroke_color: '#FFFFFF', 
  dail_stroke_width: 3 
});

$("#hour").drum({ 
  panelCount: 18, 
  dail_w: 50, 
  dail_h: 18, 
  dail_stroke_color: '#FFFFFF', 
  dail_stroke_width: 3 
});

$("#minutes").drum({ 
  panelCount: 4, 
  dail_w: 50, 
  dail_h: 4, 
  dail_stroke_color: '#FFFFFF', 
  dail_stroke_width: 3 
});

