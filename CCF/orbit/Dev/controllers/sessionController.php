<?php
/**
 * Development session sandbox
 **
 * 
 * @package       Dev
 * @author        Mario Döring <mario@clancats.com>
 * @version       1.0
 * @copyright     2010 - 2014 ClanCats GmbH
 *
 */
namespace Dev;

use CCIn;
use CCSession;

class SessionController extends \CCViewController 
{	
	/**
	 * The current session manager
	 */
	private $manager = null;
	
	/**
	 * Get the session instance on controller wake
	 */
	public function wake()
	{
		$this->manager = \CCSession::manager( CCIn::get( 'manager' ) );
	}
	
	/**
	 * Session index
	 */
	public function action_index() 
	{	
		// Did we recive post values?
		if ( CCIn::method( 'post' ) ) 
		{
			$this->manager->set( CCIn::post( 'key' ), CCIn::post( 'value' ) );
		}
		
		// set our session view
		$this->view = \CCView::create( 'Dev::session' );
		
		// title
		$this->theme->topic = 'Session Sandbox';
		
		// set view data
		$this->view->data_dump = print_r( $this->manager->raw(), true );
		$this->view->config_dump = print_r( $this->manager, true );
	}
	
	/**
	 * Switch the current session manager
	 */
	public function action_manager()
	{
		return \CCRedirect::action( 'index', array( 'manager' => CCIn::post( 'name' ) ) );
	}
	
	/**
	 * regenerate session
	 */
	public function action_regenerate( $instance_key ) {
		CCSession::instance( $instance_key )->regenerate(); 
		return CCRedirect::to( static::uri( $instance_key ) );
	}
	
	/**
	 * destroy session
	 */
	public function action_destroy( $instance_key ) {
		CCSession::instance( $instance_key )->destroy(); 
		return CCRedirect::to( static::uri( $instance_key ) );
	}
	
	/**
	 * create database table
	 */
	public function action_installdb( $instance_key ) {
		$query = "
		CREATE TABLE  `".CCSession::$config->get('database.table')."` (
			`id` CHAR( 32 ) NOT null ,
			`instance` VARCHAR( 12 ) NOT null ,
			`last_active` INT NOT null ,
			`user_agent` VARCHAR( 255 ) NOT null ,
			`client_ip` VARCHAR( 16 ) NOT null ,
			`client_port` INT NOT null ,
			`language` VARCHAR( 5 ) NOT null ,
			`user_id` INT NOT null ,
			`content` TEXT NOT null ,
		PRIMARY KEY (  `id` ) ,
		INDEX (  `instance` ,  `user_id` )
		) ENGINE = MYISAM ;
		";
		
		DB::query( $query, array(), CCSession::$config->get('database.instance') );
		
		return CCRedirect::to( static::uri( $instance_key ) );
	}
}