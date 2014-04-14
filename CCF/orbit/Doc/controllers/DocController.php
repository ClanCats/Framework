<?php namespace Doc;
/**
 * Documentaion Controller
 ** 
 *
 * @package		ClanCatsFramework
 * @author		Mario Döring <mario@clancats.com>
 * @version		2.0
 * @copyright 	2010 - 2014 ClanCats GmbH
 *
 */
class DocController extends \CCViewController 
{	
	/**
	 * the index function 
	 *
	 * @return Response|void
	 */
	public function action_index( $file ) 
	{
		$md = "No contents";
		$conf = array();
		
		if ( file_exists( $file ) )
		{
			$md = \CCFile::read( $file );
		}
		
		// try to read the configuration form the markdown file
		if ( substr( $md, 0, 1 ) == '{' )
		{
			$conf = \CCJson::decode( substr( $md, 0, strpos( $md, '}' )+1 ) );
			if ( !is_array( $conf ) )
			{
				$conf = array();
			}
			
			$md = substr( $md, strpos( $md, '}' )+1 );
		}
		
		// try to parse the topic from the file
		$file_name = basename( $file );
		if ( strpos( $file_name, '_' ) !== false )
		{
			$file_name = substr( $file_name, strpos( $file_name, '_' )+1 );
		}
		$file_name = \CCStr::replace( \CCStr::cut( $file_name, '.md' ), array( '_' => ' ' ) );
		
		
		$this->theme->topic = \CCArr::get( 'topic', $conf, $file_name );
		
		$this->theme->sidebar = \CCView::create( 'Doc::sidebar' );
		
		echo \Parsedown::instance()->parse( "<h1 style='padding-top: 0;'>".$this->theme->topic."</h1>".$md );	
	}
}