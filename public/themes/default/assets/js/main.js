'use strict';
$( document ).ready(function() {
	/**
	 * remove the attributes and classes from collapsible navbar when the window is resized
	 */
	$( window ).on( 'resize', _.debounce( function () {
		if ( Modernizr.mq( '(min-width: 992px)' ) ) {
			$( '#buildpress-navbar-collapse' )
				.removeAttr( 'style' )
				.removeClass( 'in' );
		}
	}, 500 ) );

	
	$( '[data-toggle="tooltip"]' ).tooltip();



    $("a[data-rel^='prettyPhoto']").prettyPhoto({
        theme: 'pp_default',
		hook: 'data-rel',
		social_tools: ''
    });

/* ---------------------------------------------------
	Isotope Portfolio and Blog
-------------------------------------------------- */

/*-------------------------------------------------*/
	/* =  portfolio isotope
	/*-------------------------------------------------*/

	var winDow = $(window);
		// Needed variables
		var $container=$('.projects-container');
		var $filter=$('.filter');

		try{
			$container.imagesLoaded( function(){
				$container.show();
				$container.isotope({
					filter:'*',
					itemSelector: '.project-post',
					layoutMode:'masonry',
					animationOptions:{
						duration:750,
						easing:'linear'
					}
				});
			});
		} catch(err) {
		}

		winDow.bind('resize', function(){
			var selector = $filter.find('li.active a').attr('data-filter');

			try {
				$container.isotope({ 
					filter	: selector,
					animationOptions: {
						duration: 750,
						easing	: 'linear',
						queue	: false,
					}
				});
			} catch(err) {
			}
			return false;
		});
		
		// Isotope Filter 
		$filter.find('li').click(function(){
			var selector = $(this).find('a').attr('data-filter');

			try {
				$container.isotope({ 
					filter	: selector,
					 itemSelector: '.project-post',
					
					animationOptions: {
						duration: 750,
						easing	: 'linear',
						queue	: false,
						
					}
				});
			} catch(err) {

			}
			return false;
		});
		$('.filter li').click(function(){
			$('.filter li').removeClass('active');
			$(this).addClass('active');
		});
		 $('.filter a').click(function(){
			$('.filter li').removeClass('active');
			$(this).parent().addClass('active');
		});
} );