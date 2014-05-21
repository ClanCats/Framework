<?php 
/*
 *---------------------------------------------------------------
 * Router map configuration
 *---------------------------------------------------------------
 *
 * You can use this configuration to set you default application
 * routes.
 */
return array(
	/*
	 * Application root
	 * Warning the application root controller cannot detect
	 * an action automatically. If you need to execute one use
	 * an secound route with the @ ( to action ) command.
	 *
	 * example: 
	 *     '#root'         => 'Root',                 // private route
	 *
	 *     'foo'           => function() {  },        // closure
	 *     'bar'           => 'Bar',                  // controller
	 *     'detail'        => 'Root@detail',          // controller with action
	 *     'route@alias'   => 'controller?foo,bar',   // alias, controller with parameters
	 *
	 *     '@myalias'      => 'to/my/url/'            // alias only
	 */
	'#root' => 'Welcome',

	/*
	 * Not Found and internal Server Error
	 */
	'#404'	=> 'Error@404',
	'#500'	=> 'Error@500',
	
	/*
	 * The authentication module
	 */
	'login'				 	=> 'Auth@sign_in',
	'logout' 				=> 'Auth@sign_out',
	'join@auth.sign_up' 		=> 'Auth@sign_up',
	
	'@auth.sign_in'			=> to( 'login/', array( ':back' ) ),
	'@auth.sign_out'			=> to( 'logout/', array( ':fingerprint' ) ),
);
