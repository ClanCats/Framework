<?php
/**
 *---------------------------------------------------------------
 * Framework initialisation
 *---------------------------------------------------------------
 *
 * This is the framework initialisation. Thats the point where
 * all important parts come together to build something 
 * awesome.
 *
 * @package		ClanCatsFramework
 * @author		Mario Döring <mario@clancats.com>
 * @version		2.1
 * @copyright 	2010 - 2015 ClanCats GmbH
 *
 * ###
 *
 *---------------------------------------------------------------
 * Application root 
 *---------------------------------------------------------------
 * 
 * The application root or CCROOT defines the absoulte path to 
 * the framework.
 */
define( 'CCROOT', __DIR__.'/' );

/*
 *---------------------------------------------------------------
 * File extension 
 *---------------------------------------------------------------
 * 
 * This defines the global used file extention of the php files.
 */
define( 'EXT', '.php' );

/*
 *---------------------------------------------------------------
 * Get the boot paths
 *---------------------------------------------------------------
 * 
 * You can modify that file, its yours. Its especially useful
 * if you have multiple installations on one server and want 
 * to use just one core or one orbit for them all.
 */
$paths = require CCROOT.'boot/paths'.EXT;

/*
 *---------------------------------------------------------------
 * Custom directories
 *---------------------------------------------------------------
 * 
 * You can define or overwrite custom resource directories.
 */
$directories = array();

/*
 *---------------------------------------------------------------
 * Wake CCF
 *---------------------------------------------------------------
 * 
 * Lets require the ClanCatsFramework resources
 */
require $paths['core'].'wake'.EXT;

/*
 *---------------------------------------------------------------
 * Wake the application
 *---------------------------------------------------------------
 * 
 * As final step we wake our main application.
 */
ClanCats::wake_app( 'App' );

// profile that stuff
CCProfiler::check( "[CCF] app wake completed" );