<?php
/**
 * Auth Controller
 ** 
 *
 * @package		ClanCatsFramework
 * @author		Mario Döring <mario@clancats.com>
 * @version		2.0
 * @copyright 	2010 - 2014 ClanCats GmbH
 *
 */
class AuthController extends CCViewController 
{	
	/**
	 * the index function is just "function <controller_name>Index() {}" 
	 */
	public function action_index() 
	{
		$this->theme->topic = "Auth";
		
		$this->view = $this->theme->view( 'auth/sign_in' );
		
		// Is this a post request ?
		if ( CCIn::method( 'post' ) )
		{
			echo "POST"; die;
		}
	}
}