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

$('#ul-menu-notificacao').magNote({
	breakpoint: 960,
	top: 52,
	background: "transparent",
	color: "white"
 });

(function( $, window ) {
$.fn.magNote = function( options ) {
	// Opções	
	var configs = $.extend({
			breakpoint: 768,
			top: 50,
			color: 'white'
	}, options );
	
	var mobileLargura = configs.breakpoint,
			color = configs.color,
			background = configs.background,
			hambugerActive = false,
			hamburger = '<a id="mag-note"></a>',
			menu = $(this);
	
	var estilos = '<style>\
					#mag-menu-note { background-color: ' + background + '; top: ' + configs.top + 'px; }\
					#mag-menu-note li { border-color: ' + color + '; }\
					#mag-menu-note li:last-of-type { border-color: ' + color + '; }\
					#mag-menu-note li a { color: ' + color + '; }\
					#mag-note::before { background:' + color + '; }\
					#mag-note::after { box-shadow: 0 4px 0 0 ' + color + ', 0 -4px 0 0 ' + color + '; }\
					#mag-note.active::before, #mag-note.active::after { background:' + color + '; }\
				</style>';

	var noteFunction = function() {
		var width = $(window).width();
		if (width < mobileLargura) {
			menu.attr('id', 'mag-menu-note');
			if(!hambugerActive) {
				hambugerActive = true;
				menu.before(hamburger);
				$('#mag-menu-note').append(styles);
			} else {
				return false;
			}

		} else if (width > mobileLargura) {
			hambugerActive = false;
			$('#mag-note').remove();
			$('#mag-menu-note style').remove();
			menu.attr('id', '');
		}

		$('#mag-note').on('click touchstart', function(e) {
			e.preventDefault();
			$('#mag-note').toggleClass('active');
			menu.toggleClass('active');
		});
	}

	noteFunction();
	$(window).resize(noteFunction);

};

}( jQuery, window ));


//accordion

