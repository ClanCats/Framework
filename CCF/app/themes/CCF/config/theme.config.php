<?php
/**
 * CCFTheme default configuration
 */
return array(
	
	/*
	 * The theme defualts
	 */
	'default' => array(
		/*
		 * the topic gets added to the title
		 */
		'topic'     => 'no title',
		
		/*
		 * the html title template
		 */
		'title'     => '%s | ClanCatsFramework',
		
		/*
		 * the default html description
		 */
		'description'   => 'The ClanCatsFramework for fast and modern PHP Web Applications.',
		
		/*
		 * sidebar ( if false full container gets used )
		 */
		'sidebar'	=> false
	),
	
	/*
	 * Assets configuration
	 *
	 * you can pack files to gether:
	 * <holder>@<pack>
	 */
	'assets' => array(
		
		// Boostrap
		'css/bootstrap.min.css'		=> 'theme@style',
		
		
		// mixins
		'less/mixins/mixins.less'		=> 'theme@style',
		'less/mixins/background.less'	=> 'theme@style',
		'less/mixins/css3.less'			=> 'theme@style',
		'less/mixins/transform.less'		=> 'theme@style',
		
		// Main style
		'less/style.less' 				=> 'theme@style',
		'less/typography.less'			=> 'theme@style',
		'less/layout.less'				=> 'theme@style',
		
		// js core
		'../js/jquery/jquery.js'			=> 'theme@core',
		'js/bootstrap.min.js'			=> 'theme@core',
		'js/application.js'				=> 'theme@app',
	)
);