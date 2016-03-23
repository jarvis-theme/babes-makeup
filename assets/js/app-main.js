var dirTema = document.querySelector("meta[name='theme_path']").getAttribute('content');

require.config({
	baseUrl: '/',
    urlArgs: "v=001",
	waitSeconds: 60,
	shim: {
		"bootstrap"	: {
			deps: ['jquery'],
		},
		'jq_ui' : {
			deps : ['jquery'],
		},
		"noty" : {
			deps : ['jquery'],
		},
		"cart" : {
			deps : ['jquery'],
		},
		'fancybox' : {
			deps : ['jquery'],
		},
		'flexslider' : {
			deps : ['jquery'],
		},
		'carousel' : {
			deps : ['jquery'],
		},
	},

	paths: {
		// LIBRARY
		jquery 			: '//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min',
		cart			: 'js/shop_cart',
		jq_ui			: 'js/jquery-ui',
		noty			: 'js/jquery.noty',
		bootstrap		: '//maxcdn.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min',
		fancybox		: dirTema+'/assets/js/lib/jquery.fancybox.pack',
		flexslider		: dirTema+'/assets/js/lib/jquery.flexslider-min',
		carousel		: dirTema+'/assets/js/lib/owl.carousel.min',
		modernizr		: dirTema+'/assets/js/lib/modernizr.custom.28468',
		
		// ROUTE
		router          : 'js/router',

		// CONTROLLER
		main	        : dirTema+'/assets/js/default',
	}
});
require([
	'jquery',
	'router',
	'cart',
	'main'
], function($,router,cart,main){
	router.run();
	cart.run();
	main.run();
});