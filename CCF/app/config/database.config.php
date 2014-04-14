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
	'main' => 'CCF',
	
	/*
	 * your databases
	 */
	'CCF' => array(
		// selected database
		'db'	 => 'db_ccf2',
	
		// driver
		'driver' => 'mysql',
	
		// auth
		'host'		=> '127.0.0.1',
		'user' 		=> 'root',
		'pass'		=> '',
		'charset'	=> 'utf8'
	),
);
