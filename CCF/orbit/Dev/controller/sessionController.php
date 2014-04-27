<?php
/**
 * Session Playground
 */
class SessionController extends CCViewController {
	
	/**
	 * Session index
	 */
	public function SessionIndex( $instance_key ) {
		
		// session
		$session = CCSession::instance( $instance_key );
		
		// is post request?
		if ( ClanCats::$POST ) {
			
			$key = ClanCats::post('key', 'foo');
			$value = ClanCats::post('value', 'bar');
			
			if ( ClanCats::post('static') == 'yes' ) {
				$session->$key = $value;
			}
			else {
				$session->set( $key, $value );
			}
		}
		
		// set our session view
		$this->view = CCView::create( 'development/sessionView' );
		
		// title
		$this->theme->topic = 'Session Demo';
		
		// set view data
		$this->view->session_dump 	= print_r( $session, true );
		$this->view->current_uri 	= static::uri( $instance_key );
	}
	
	/**
	 * uri
	 */
	private function uri( $instance_key ) {
		return 'dev/session-'.$instance_key;
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