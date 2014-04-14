<?php 
/*
 *---------------------------------------------------------------
 * Documentation configuration
 *---------------------------------------------------------------
 *
 * This is your main application configuration file 
 */
return array(

	/*
	 * router configuration
	 */
	'router'   => array(
		
		// When we register a documentation what prefix should be used
		'default_prefix'			=> 'docs',
		
		// And with wich controller should they get renderd
		'default_controller'		=> 'Doc::Doc'
	),
	
);