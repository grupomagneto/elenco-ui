(function( $, window ) {
$.fn.magMenu = function( options ) {
	// Opções	
	var settings = $.extend({
			breakpoint: 768,
			top: 50,
			color: 'white'
	}, options );
	
	var mobileWidth = settings.breakpoint,
			color = settings.color,
			background = settings.background,
			hambugerActive = false,
			hamburger = '<a id="mag-icon"></a>',
			menu = $(this);
	
	var styles = '<style>\
					#mag-menu { background-color: ' + background + '; top: ' + settings.top + 'px; }\
					#mag-menu li { border-color: ' + color + '; }\
					#mag-menu li:last-of-type { border-color: ' + color + '; }\
					#mag-menu li a { color: ' + color + '; }\
					#mag-icon::before { background:' + color + '; }\
					#mag-icon::after { box-shadow: 0 4px 0 0 ' + color + ', 0 -4px 0 0 ' + color + '; }\
					#mag-icon.active::before, #mag-icon.active::after { background:' + color + '; }\
				</style>';

	var menuFunction = function() {
		var width = $(window).width();
		if (width < mobileWidth) {
			menu.attr('id', 'mag-menu');
			if(!hambugerActive) {
				hambugerActive = true;
				menu.before(hamburger);
				$('#mag-menu').append(styles);
			} else {
				return false;
			}

		} else if (width > mobileWidth) {
			hambugerActive = false;
			$('#mag-icon').remove();
			$('#mag-menu style').remove();
			menu.attr('id', '');
		}

		$('#mag-icon').on('click touchstart', function(e) {
			e.preventDefault();
			$('#mag-icon').toggleClass('active');
			menu.toggleClass('active');
		});
	}
	
	menuFunction();
	$(window).resize(menuFunction);
};
}( jQuery, window ));

$('#ul-menu-trigger').magMenu({
	breakpoint: 960,
	top: 52,
	background: "#A216E9",
	color: "white"
});


var menuTrigger = $('#menu-trigger');
console.log($('.site-header').outerHeight());

var isToggled = false;

menuTrigger.click(function(e){
  e.preventDefault();  
  if(!isToggled){
   $(this).find('.notificacao').addClass('rotate-clockwise').removeClass('rotate-counter');
    console.log("rotate clockwise");
    isToggled = true;
    $('#responsive-menu').slideToggle();
  }else{
    $(this).find('.notificacao').addClass('rotate-counter').removeClass('rotate-clockwise');
    console.log("rotate counterclockwise");
    $('#responsive-menu').slideToggle();
    isToggled = false;
  }
  
});


// slide

$('.slider-nav').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: true,
    centerMode: true,
    focusOnSelect: true,
    autoplay: true,
});
