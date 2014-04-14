/*
 * Affix
 */
$(function() {
	$('.ccf-header-subline').data( 'offset-top', $('.ccf-header-subline').offset().top );
});

/*
 * main navigation
 */
$(function() {
	var current = window.location.pathname;
	$('#ccf-main-nav li a').each( function() {
		var $this = $(this);
		
		if( $this.attr('href') === current ) {
			$this.parent().addClass( 'current active' );
		}
		if( $this.attr('href') != '/' && current.substr( 0, $this.attr('href').length ) == $this.attr('href') ) {
			$this.parent().addClass( 'active' );
		}
	});
});

/*
 * side navigation
 */
$(function() {
	var current = window.location.pathname;
	$('#ccf-sidenav li a').each( function() {
		var $this = $(this);
		
		if( $this.attr('href') === current ) {
			$this.parent().addClass( 'current active' );
		}
		if( $this.attr('href') != '/' && current.substr( 0, $this.attr('href').length ) == $this.attr('href') ) {
			$this.parent().addClass( 'active' );
		}
	});
});

/*
 * start pretty
 */
$(function() {
	$( 'pre' ).each( function() {
		var $this = $(this);
		if( $this.find( 'code' ).is('[class*="language"]') ) {
			$this.addClass( 'prettyprint' ); prettyPrint();
		}
	});
});