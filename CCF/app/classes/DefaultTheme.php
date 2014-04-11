<?php
/**
 * Array
 * php array helpers
 ** 
 *
 * @package		ClanCatsFramework
 * @author		Mario Döring <mario@clancats.com>
 * @version		2.0
 * @copyright 	2010 - 2014 ClanCats GmbH
 *
 */
class DefaultTheme extends CCTheme {

	/*
	 * should the page topic be added as class to the body?
	 */
	public $_topic_body_class = true;
	
	/*
	 * init theme
	 */
	protected function wake() {
		
		$has_packer = (bool) CCOrbit::path( 'Packtacular' );
		
		// add assets from config
		foreach( $this->config->assets as $asset => $container ) {
			
			$container = explode( "@", $container );
			
			if ( isset( $container[1] ) == $has_packer ) {
				CCAsset::pack( $asset, $container[0], $container[1] );
			}
			else {
				CCAsset::add( $asset, $container[0] );
			}	
		}
		
		// set some vars
		$this->favicon = $this->config->favicon;
		
		/*
		 * Options
		 */
		$this->options = new stdClass();
		$this->options->manual_container = false;
		
		// set body classes array
		$this->classes = array();
	}

	/**
	 * Render the Theme
	 *
	 * @param string 	$file this parameter gets ignored
	 * @return CCResponse
	 */
	public function render( $file = null ) {

		/*
		 * set layout defaults
		 */
		$this->get( 'topic', 		$this->config->get( 'default_topic', 		'No Title' ) );
		$this->get( 'description', $this->config->get( 'default_description', 'No Description' ) );
		$this->get( 'author', 		$this->config->get( 'default_author', 		'ClanCats GmbH' ) );
		$this->title = sprintf( 	$this->config->get( 'title', 				'%s | ClanCatsFramework' ), $this->topic );

		// add the topic to the body classes
		if ( $this->_topic_body_class ) { 
			$this->data['classes'][] = CCStr::friendly_url( strtolower( $this->topic ) );
		}

		// render the view
		return parent::render();
	}	
}