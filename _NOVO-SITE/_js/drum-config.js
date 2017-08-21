// DRUM
//select
var selects = document.querySelectorAll('.drum-selector');
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
  dail_h: 4, 
  dail_stroke_color: '#FFFFFF', 
  dail_stroke_width: 3 
});

$("#hour").drum({ 
  panelCount: 18, 
  dail_w: 50, 
  dail_h: 4, 
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
