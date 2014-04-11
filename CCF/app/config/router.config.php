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
	 *     '#root'   => 'Root',
	 *     'detail'  => 'Root@detail'
	 */
	'#root' => 'Welcome',

	/*
	 * Not Found and internal Server Error
	 */
	'#404'	=> 'Error@404',
	'#500'	=> 'Error@500',
);
