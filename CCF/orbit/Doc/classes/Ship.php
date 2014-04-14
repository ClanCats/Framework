<?php namespace Doc;
/**
 * Doc ship
 **
 * 
 * @package       Doc
 * @author        ClanCats GmbH <info@clancats.com>
 * @version       1.0.0
 * @copyright     2010 - 2014 ClanCats GmbH
 */
class Ship extends \CCOrbit_Ship
{
	/**
	 * initialize the ship
	 * 
	 * @return void
	 */
	public function wake()
	{
		\CCFinder::bind( 'Parsedown', __DIR__.'/Parsedown'.EXT );
		
		\ClanCats::directories( array(
			'doc'	 => 'docs/',
		));
		
		// make a shadow
		\CCFinder::shadow( 'Doc', 'Doc' );
	}
	
	/**
	 * install the ship
	 * 
	 * @return void
	 */
	public function install()
	{
		// Do stuff
	}
	
	/**
	 * uninstall the ship
	 * 
	 * @return void
	 */
	public function unsintall()
	{
		// Do stuff
	}
}
