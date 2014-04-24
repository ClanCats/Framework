<?php namespace Doc;
/**
 * Doc
 * Documentation handler generates nice documentations out of markdown files
 **
 * 
 * @package       Doc
 * @author        ClanCats GmbH <info@clancats.com>
 * @version       1.0.0
 * @copyright     2010 - 2014 ClanCats GmbH
 */
class Doc
{
	/**
	 * The documentation configuration
	 *
	 * @var CCConfig
	 */
	public static $config = null;
	
	/**
	 * static class initialisation
	 *
	 * @return void
	 */
	public static function _init()
	{
		static::$config = \CCConfig::create( 'Doc::docs' );
	}
	
	/**
	 * Creates an documentation instance
	 *
	 * @param string		$namespace
	 * @return Doc\Doc
	 */
	public static function create( $namespace = null )
	{
		return new static( $namespace );
	}
	
	/**
	 * The document tree holder
	 *
	 * @param array
	 */
	protected $_tree = array();
	
	/**
	 * Doc Constructor
	 *
	 * @param string		$namespace
	 */
	public function __construct( $namespace )
	{
		if ( is_null( $namespace ) )
		{
			$dir = \CCPath::get( '', CCDIR_DOC );
		}
		else 
		{
			$dir = \CCPath::get( $namespace.'::', CCDIR_DOC );
		}
		
		$this->_tree = array();
		
		$directory_iterator = new \RecursiveIteratorIterator( new \RecursiveDirectoryIterator($dir) );
		foreach( $directory_iterator as $filename => $path_object )
		{
			if ( \CCStr::extension( $filename ) == 'md' )
			{
				$key = \CCStr::replace( substr( \CCStr::cut( $filename, '.', true, true ), strlen( $dir ) ), array( '/' => '.' ));
				\CCArr::set( $key, $filename, $this->_tree );
			}
		}
	}
	
	/**
	 * registers the documentation routes
	 * 
	 * @param string		$prefix
	 * @param string		$controller
	 */
	public function register( $prefix = null, $controller = null )
	{
		if ( is_null( $prefix ) )
		{
			$prefix = static::$config->get( 'router.default_prefix' );
		}
		
		if ( is_null( $controller ) )
		{
			$controller = static::$config->get( 'router.default_controller' );
		}
		
		\CCRouter::on( $this->_tree_to_routes( $this->_tree, $prefix, $controller ) );
		
		// we share the navigation with all views
		\CCView::share( 'doc_navigation', $this->navigation( $this->_tree, $prefix ) );
	}
	
	/**
	 * This wil generate a html navigation tree based on routes
	 *
	 * @param array 		$tree
	 * @return UI\E
	 */
	public function navigation( $tree, $prefix )
	{
		$buffer = "";
		$prefix .= '/';
		
		foreach( $tree as $key => $file )
		{	
			if ( strpos( $key, '_' ) !== false )
			{
				$key = substr( $key, strpos( $key, '_' )+1 );
			}
			
			// when the key start with an _ we use it as title in the 
			// navigation sidebar
			if ( substr( $key, 0, 1 ) == '_' )
			{
				$buffer .= \UI\HTML::tag( 'li', trim( \CCStr::replace( $key, array( '_' =>' ' ) ) ) )
					->add_class( 'sidebar-title' ); continue;
			}
			
			$name = \CCStr::replace( $key, array( '_' =>' ' ) );
			$key = \CCStr::lower( $key );
			
			if ( is_array( $file ) )
			{
				if ( array_key_exists( 'index', $file ) )
				{
					$buffer .= \UI\HTML::create( 'li', 
						\UI\HTML::create( 'a', $name )
							->href( \CCUrl::to( $prefix.$key.'/' ) )
							->render().
						$this->navigation( $file, $prefix.$key )
					);
				}
				else 
				{
					$buffer .= \UI\HTML::create( 'li', 
						\UI\HTML::create( 'a', $name )
							->href( \CCUrl::to( $prefix.$key.'/'.\CCStr::lower( substr( key( $file ), strpos( key( $file ), '_' )+1 ) ) ) )
							->render().
						$this->navigation( $file, $prefix.$key )
					);
				}
			}
			else 
			{
				if ( $key != 'index' )
				{
					$buffer .= \UI\HTML::create( 'li', 
						\UI\HTML::create( 'a', $name )
						->href( \CCUrl::to( $prefix.$key ) )
						->render() 
					);
				}
			}
		}
		
		return \UI\HTML::create( 'ul', $buffer )->add_class( 'nav' );
	}
	
	/**
	 * this method formats the documentation tree
	 * to a routes array.
	 *
	 * @param array 		$tree
	 */
	private function _tree_to_routes( $tree, $prefix, $controller )
	{
		$routes = array();
		
		$prefix .= '/';
		
		foreach( $tree as $key => $file )
		{	
			if ( strpos( $key, '_' ) !== false )
			{
				$key = substr( $key, strpos( $key, '_' )+1 );
			}
			
			$key = \CCStr::lower( $key );
			
			if ( is_array( $file ) )
			{
				$routes = array_merge( $routes, $this->_tree_to_routes( $file, $prefix.$key, $controller ) );
			}
			else 
			{
				if ( $key == 'index' )
				{
					$routes[substr( $prefix, 0, -1 )] = $controller.'?'.$file;
				}
				else 
				{
					$routes[$prefix.$key] = $controller.'?'.$file;
				}
			}
		}
		
		return $routes;
	}
}
