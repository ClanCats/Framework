<?php 
/*
 *---------------------------------------------------------------
 * Database configuration
 *---------------------------------------------------------------
 */
return array(
	/*
	 * the default database
	 */
	'main' =>  array(
		// selected database
		'db'	 => 'db_'.CCStr::clean_url( App::name() ),
	
		// driver
		'driver' => 'mysql',
	
		// auth
		'host'		=> '127.0.0.1',
		'user' 		=> 'root',
		'pass'		=> '',
		'charset'	=> 'utf8'
	),
);
