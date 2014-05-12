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
	 * Sign in action
	 */
	public function action_sign_in() 
	{
		$this->theme->topic = "Auth";
		
		$this->view = $this->theme->view( 'auth/sign_in' );
		
		$this->view->last_identifier = CCIn::post( 'identifier' );
		
		// Is this a post request ?
		if ( CCIn::method( 'post' ) )
		{
			// validate the data and get the user object
			if ( $user = CCAuth::validate( CCIn::post( 'identifier' ), CCIn::post( 'password' ) ) )
			{
				CCAuth::sign_in( $user );
				return CCRedirect::next();
			}
			
			
			UI\Alert::add( 'danger', "Invalid login data" );
		}
	}
	
	/**
	 * Sign out action
	 */
	public function action_sign_out() 
	{
		if ( !CCSession::valid_fingerprint() )
		{
			return CCRedirect::to( '/' );
		}
		
		CCAuth::sign_out(); return CCRedirect::to( '/' );
	}
}