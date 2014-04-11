<?php 
/*
 *---------------------------------------------------------------
 * PHPUnit runner
 *---------------------------------------------------------------
 *
 * This file just loads CCF and all needed resources to run the 
 * php unit tests. PHPUnit is a really elegant way to make sure 
 * that everything works how it should.
 *
 *
 * force the environment to phpunit
 *
 * By default the the environment detector defines the current 
 * environment. But you can force another one using the this var.
 */
$environment = 'phpunit';

/*
 *---------------------------------------------------------------
 * Require CCF
 *---------------------------------------------------------------
 *
 * load the framework file wich wil initialize CCF. 
 */
require_once __DIR__."/../framework.php";

/*
 *---------------------------------------------------------------
 * CCUnit resources
 *---------------------------------------------------------------
 *
 * For the unit tests we need some additional resources like
 * controllers, views, ect... 
 */
CCOrbit::enter( 'CCUnit' );

// writ header
CCCli::line("==============================
    _____ _____ ______ 
   / ____/ ____|  ____|
  | |   | |    | |__   
  | |   | |    |  __|  
  | |___| |____| |     
   \_____\_____|_| ramework
==============================
", 'cyan');